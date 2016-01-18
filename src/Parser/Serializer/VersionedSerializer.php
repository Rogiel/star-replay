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

namespace Rogiel\StarReplay\Parser\Serializer;


use GeneratedHydrator\Configuration;
use Rogiel\StarReplay\Event\Tracker\PlayerStats;
use Rogiel\StarReplay\Event\Tracker\UnitPositions;
use Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\ArrayNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BitArrayNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BlobNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BooleanNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\ChoiceNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\FourCCNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\IntegerNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\Node;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\NullNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\OptionalNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\StructNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Tree;
use Rogiel\StarReplay\Stream\Parser\ReplayStreamParser;
use SebastianBergmann\Comparator\Struct;

class VersionedSerializer extends AbstractSerializer {

	public function expectSkip($expected) {
		$type = $this->parser->readBits(8);
		if ($type != $expected) {
			throw new \RuntimeException(sprintf("Expected %s, got %s. Near %s", $expected, $type, bin2hex($this->parser->readBytes(10))));
		}
	}

	public function parseVersionedInt() {
		$b = $this->parser->readBits(8);
		$negative = $b & 1;
		$result = ($b >> 1) & 0x3f;
		$bits = 6;
		while (($b & 0x80) != 0) {
			$b = $this->parser->readBits(8);
			$result |= ($b & 0x7f) << $bits;
			$bits += 7;
		}

		if($negative) {
			return -$result;
		}
		return $result;
	}

	public function parseArray(ArrayNode $arrayNode) {
		$this->expectSkip(0);

		$size = $this->parseVersionedInt();
		$array = array();
		for($i = 0; $i<$size; $i++) {
			$array[$i] = $this->parse($arrayNode->getItem());
		}
		return $array;
	}

	public function parseBitArray(BitArrayNode $arrayNode) {
		throw new \RuntimeException("Unsupported operation.");
	}

	public function parseBlob(BlobNode $blobNode) {
		$this->expectSkip(2);

		$size = $this->parseVersionedInt();
		$this->parser->align();
		return $this->parser->readBytes($size);
	}

	public function parseBoolean(BooleanNode $booleanNode) {
		$this->expectSkip(6);
		return $this->parser->readBits(8);
	}

	public function parseChoice(ChoiceNode $choiceNode) {
		$this->expectSkip(3);

		$tag = $this->parseVersionedInt();
		$field = $this->tree->getNode($choiceNode->getChoices()[$tag]);
		if($field === NULL) {
			$this->skip();
			return NULL;
		}

		return $this->parse($field);
	}

	public function parseInteger(IntegerNode $integerNode) {
		$this->expectSkip(9);
		return $this->parseVersionedInt();
	}

	public function parseFourCC(FourCCNode $fourCCNode) {
		$this->expectSkip(7);
		$this->parser->align();
		return $this->parser->readBits(4*8);
	}

	public function parseNull(NullNode $nullNode) {
		return NULL;
	}

	public function parseOptional(OptionalNode $optionalNode) {
		$this->expectSkip(4);

		$bool = $this->parser->readBits(8);
		if($bool != 0) {
			return $this->parse($optionalNode->getIndex());
		}
		return NULL;
	}

	public function parseStruct(StructNode $structNode) {
		if ($structNode->isAbstract()) {
			return $this->parseAbstractStruct($structNode);
		} else {
			return $this->parseRegularStruct($structNode);
		}
	}

	public function parseRegularStruct(StructNode $structNode) {
		$this->expectSkip(5);

		$struct = array();
		$length = $this->parseVersionedInt();
		for($i = 0; $i < $length; $i++) {
			$tag = $this->parseVersionedInt();
			$key = $structNode->getTaggedField($tag);

			if($key === NULL) {
				$this->skip();
				continue;
			}

			$index = $structNode->getNamedFieldType($key);
			$struct[$key] = $this->parse($index);
		}
		return $struct;
	}

	public function parseAbstractStruct(StructNode $structNode) {
		$struct = array();
		foreach($structNode->getFields() as $key => $index) {
			$struct[$key] = $this->parse($index);
		}

		return $struct;
	}

	private function skip() {
		$skip = $this->parser->readBits(8);
		if ($skip == 0) {  # array
			$length = $this->parseVersionedInt();
			for ($i = 0; $i < $length; $i++) {
				$this->skip();
			}
		} else if($skip == 1) {
			$length = $this->parseVersionedInt();
			$this->parser->align();
			$this->parser->readBytes(($length + 7) / 8);
		} else if($skip == 2) {
			$length = $this->parseVersionedInt();
			$this->parser->align();
			$this->parser->readBytes($length);
		} else if($skip == 3) {
			$this->parseVersionedInt(); // tag
			$this->skip();
		} else if($skip == 4) {
			$exists = $this->parser->readBits(8);
			if($exists != 0) {
				$this->skip();
			}
		} else if($skip == 5) {
			$length = $this->parseVersionedInt();
			for ($i = 0; $i < $length; $i++) {
				$this->parseVersionedInt(); // tag
				$this->skip();
			}
		} else if($skip == 6) {
			$this->parser->align();
			$this->parser->readBytes(1);
		} else if($skip == 7) {
			$this->parser->align();
			$this->parser->readBytes(4);
		} else if($skip == 8) {
			$this->parser->align();
			$this->parser->readBytes(8);
		} else if($skip == 9) {
			$this->parseVersionedInt();
		} else {
			throw new \RuntimeException(sprintf("Invalid skip type: %s around %s", $skip, bin2hex($this->parser->readBytes(20))));
		}
	}

}