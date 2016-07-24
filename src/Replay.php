<?php
/**
 * Copyright (c) 2016, Rogiel Sulzbach
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF
 * THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Rogiel\StarReplay;

use Rogiel\MPQ\MPQFile;
use Rogiel\MPQ\Stream\MemoryStream;
use Rogiel\StarReplay\Attribute\AttributeMap;
use Rogiel\StarReplay\Event\AbstractEvent;
use Rogiel\StarReplay\Exception\ReplayException;
use Rogiel\StarReplay\Hydrator\GeneratedHydratorFactory;
use Rogiel\StarReplay\Hydrator\HydratorFactory;
use Rogiel\StarReplay\Metadata\Event\Header as EventHeader;
use Rogiel\StarReplay\Metadata\Header\Header;
use Rogiel\StarReplay\Metadata\Init\InitData;
use Rogiel\StarReplay\Metadata\Match\MatchInformation;
use Rogiel\StarReplay\Parser\Serializer\BitPackedSerializer;
use Rogiel\StarReplay\Parser\Serializer\Serializer;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\Node;
use Rogiel\StarReplay\Parser\Serializer\VersionedSerializer;
use Rogiel\StarReplay\Stream\BitStream;
use Rogiel\StarReplay\Stream\Parser\ReplayStreamParser;
use Rogiel\StarReplay\Version\Version;
use Rogiel\StarReplay\Version\VersionLoader;

class Replay {

	/**
	 * @var MPQFile
	 */
	private $file;

	/**
	 * @var VersionLoader
	 */
	private $versionLoader;

	/**
	 * @var HydratorFactory
	 */
	private $hydratorFactory;

	/**
	 * @var Version
	 */
	private $version;

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @var Header
	 */
	private $header;

	/**
	 * @var MatchInformation
	 */
	private $matchInformation;

	/**
	 * @var InitData
	 */
	private $initData;

    /**
     * @var AttributeMap
     */
    private $attributeMap;

    // -----------------------------------------------------------------------------------------------------------------

	/**
	 * Replay constructor.
	 * @param $file string|MPQFile the replay file name or MPQFile instance
	 * @throws ReplayException if the file given is not a string or a mpq file
	 */
	public function __construct($file) {
		if(is_string($file)) {
			$file = MPQFile::parseFile($file);
		}
		if(!$file instanceof MPQFile) {
			throw new ReplayException("Invalid replay file given");
		}

		$this->file = $file;
		$this->versionLoader = new VersionLoader();
		$this->hydratorFactory = new GeneratedHydratorFactory();
	}

	public function parse() {
		$this->file->parse();
		return $this->getHeader();
	}

	// -----------------------------------------------------------------------------------------------------------------

	private function detectVersion() {
		$this->file->parse();
		$lowestVersion = $this->getVersionLoader()->earliest();

		$stream = new MemoryStream($this->file->getUserData()->getRawContent());
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new VersionedSerializer($parser, $lowestVersion->getTree(), $this->hydratorFactory);

		/** @var Header $header */
		$header = $serializer->parse($lowestVersion->getReplayHeaderNode());

		$buildNumber = $header->getVersion()->getBaseBuild();
		$version = $this->getVersionLoader()->load($buildNumber);
		if($version === NULL) {
			throw new ReplayException(sprintf('Build number %s is not supported.', $buildNumber));

		}
		return $version;
	}

	private function parseHeader() {
		$this->file->parse();
		$stream = new MemoryStream($this->file->getUserData()->getRawContent());
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new VersionedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);
		return $serializer->parse($this->getVersion()->getReplayHeaderNode());
	}

	private function parseDetails() {
		$this->file->parse();
		$stream = $this->file->openStream('replay.details');
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new VersionedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);
		return $serializer->parse($this->getVersion()->getGameDetailsNode());
	}

	private function parseInitData() {
		$this->file->parse();
		$stream = $this->file->openStream('replay.initData');
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new BitPackedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);
		return $serializer->parse($this->getVersion()->getReplayInitDataNode());
	}

    private function parseAttributeMap() {
        $this->file->parse();
        $stream = $this->file->openStream('replay.attributes.events');
        return new AttributeMap($stream);
    }

	// -----------------------------------------------------------------------------------------------------------------
	// EVENT PARSERS
	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * Parses a event stream by using the given serializer, the event mapping and a header node
	 *
	 * @param Serializer $serializer the data serializer
	 * @param $mapping array the mapping
	 * @param Node $headerNode the header node
	 * @return \Generator a generator that will yield a result on every event
	 */
	private function parseEventStream(Serializer $serializer, $mapping, Node $headerNode) {
		$gametime = 0;
		while(!$serializer->eof()) {
			/** @var EventHeader $header */
			$header = $serializer->parse($headerNode);
			$gametime = $gametime + $header->getTimestamp();

			if(!isset($mapping[$header->getEventID()])) {
				print_r($header);
				throw new \RuntimeException(sprintf("Event %s not found.", $header->getEventID()));
			}

			/** @var Node $node */
			$node = $mapping[$header->getEventID()];
			$event = $serializer->parse($node);
			$serializer->align();

			if($event instanceof AbstractEvent) {
				$event->setHeader($header);
			}

			yield $gametime => $event;
		}
	}

	/**
	 * @return \Generator
	 */
	public function getGameEvents() {
		$stream = $this->file->openStream('replay.game.events');
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new BitPackedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);

		return $this->parseEventStream(
			$serializer,
			$this->getVersion()->getGameEventMapping(),
			$this->getVersion()->getGameEventHeaderNode()
		);
	}

	/**
	 * @return \Generator
	 */
	public function getMessageEvents() {
		$stream = $this->file->openStream('replay.message.events');
		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new BitPackedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);

		return $this->parseEventStream(
			$serializer,
			$this->getVersion()->getMessageEventMapping(),
			$this->getVersion()->getMessageEventHeaderNode()
		);
	}

	/**
	 * @return \Generator
	 * @throws ReplayException
	 */
	public function getTrackerEvents() {
		if(!$this->getVersion()->hasTrackerEvents()) {
			throw new ReplayException('Tracker events are not supported on this version.');
		}

		$stream = $this->file->openStream('replay.tracker.events');
//        echo bin2hex($stream->readBytes(10));
//        die();

		$stream = new BitStream($stream);
		$parser = new ReplayStreamParser($stream);
		$serializer = new VersionedSerializer($parser, $this->getVersion()->getTree(), $this->hydratorFactory);

		return $this->parseEventStream(
			$serializer,
			$this->getVersion()->getTrackerEventMapping(),
			$this->getVersion()->getTrackerEventHeaderNode()
		);
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function getVersion() {
		if($this->version === null) {
			$this->version = $this->detectVersion();
		}
		return $this->version;
	}

	/**
	 * Gets the replay header. If the data is not yet parsed,
	 * it is parsed and its values are stored in memory.
	 *
	 * @return Header
	 */
	public function getHeader() {
		if($this->header === null) {
			$this->header = $this->parseHeader();
		}
		return $this->header;
	}

	/**
	 * Gets the replay match information. If the data is not yet parsed,
	 * it is parsed and its values are stored in memory.
	 *
	 * @return MatchInformation
	 */
	public function getMatchInformation() {
		if($this->matchInformation === null) {
			$this->matchInformation = $this->parseDetails();
		}
		return $this->matchInformation;
	}

	/**
	 * Gets the replay init data. If the data is not yet parsed,
	 * it is parsed and its values are stored in memory.
	 *
	 * @return InitData
	 */
	public function getInitData() {
		if($this->initData === null) {
			$this->initData = $this->parseInitData();
		}
		return $this->initData;
	}

    /**
     * Gets the replay attribute map. If the data is not yet parsed,
     * it is parsed and its values are stored in memory.
     *
     * @return AttributeMap
     */
    public function getAttributeMap() {
        if($this->attributeMap === null) {
            $this->attributeMap = $this->parseAttributeMap();
        }
        return $this->attributeMap;
    }

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @return Metadata\Match\PlayerList
	 */
	public function getPlayers() {
		return $this->getMatchInformation()->getPlayerList();
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @return VersionLoader
	 */
	public function getVersionLoader() {
		return $this->versionLoader;
	}

	/**
	 * @param VersionLoader $versionLoader
	 */
	public function setVersionLoader($versionLoader) {
		$this->versionLoader = $versionLoader;
	}

	/**
	 * @return HydratorFactory
	 */
	public function getHydratorFactory() {
		return $this->hydratorFactory;
	}

	/**
	 * @param HydratorFactory $hydratorFactory
	 */
	public function setHydratorFactory($hydratorFactory) {
		$this->hydratorFactory = $hydratorFactory;
	}

}