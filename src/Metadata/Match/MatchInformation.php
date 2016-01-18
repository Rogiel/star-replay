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

namespace Rogiel\StarReplay\Metadata\Match;

use Rogiel\StarReplay\Entity\Thumbnail;

class MatchInformation  {

	/**
	 * @var PlayerList
	 */
	private $playerList;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var integer
	 */
	private $difficulty;

	/**
	 * @var Thumbnail
	 */
	private $thumbnail;

	/**
	 * @var boolean
	 */
	private $isBlizzardMap;

	/**
	 * @var integer
	 */
	private $timeUTC;

	/**
	 * @var integer
	 */
	private $timeLocalOffset;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $imageFilePath;

	/**
	 * @var string
	 */
	private $mapFileName;

	/**
	 * @var array
	 */
	private $cacheHandles;

	/**
	 * @var boolean
	 */
	private $miniSave;

	/**
	 * @var integer
	 */
	private $gameSpeed;

	/**
	 * @var integer
	 */
	private $defaultDifficulty;

	/**
	 * @var string
	 */
	private $modPaths;

	/**
	 * @var integer
	 */
	private $campaignIndex;

	/**
	 * @var boolean
	 */
	private $restartAsTransitionMap;

	/**
	 * @return PlayerList
	 */
	public function getPlayerList() {
		return $this->playerList;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return int
	 */
	public function getDifficulty() {
		return $this->difficulty;
	}

	/**
	 * @return Thumbnail
	 */
	public function getThumbnail() {
		return $this->thumbnail;
	}

	/**
	 * @return boolean
	 */
	public function isIsBlizzardMap() {
		return $this->isBlizzardMap;
	}

	/**
	 * @return int
	 */
	public function getTimeUTC() {
		return $this->timeUTC;
	}

	/**
	 * @return int
	 */
	public function getTimeLocalOffset() {
		return $this->timeLocalOffset;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getImageFilePath() {
		return $this->imageFilePath;
	}

	/**
	 * @return string
	 */
	public function getMapFileName() {
		return $this->mapFileName;
	}

	/**
	 * @return array
	 */
	public function getCacheHandles() {
		return $this->cacheHandles;
	}

	/**
	 * @return boolean
	 */
	public function isMiniSave() {
		return $this->miniSave;
	}

	/**
	 * @return int
	 */
	public function getGameSpeed() {
		return $this->gameSpeed;
	}

	/**
	 * @return int
	 */
	public function getDefaultDifficulty() {
		return $this->defaultDifficulty;
	}

	/**
	 * @return string
	 */
	public function getModPaths() {
		return $this->modPaths;
	}

	/**
	 * @return int
	 */
	public function getCampaignIndex() {
		return $this->campaignIndex;
	}

	/**
	 * @return boolean
	 */
	public function isRestartAsTransitionMap() {
		return $this->restartAsTransitionMap;
	}

}