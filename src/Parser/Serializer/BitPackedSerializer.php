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
use Zend\Hydrator\HydratorInterface;

class BitPackedSerializer extends AbstractSerializer {

	public function parseArray(ArrayNode $arrayNode) {
		$size = $this->parse($arrayNode->getHeader());
		$array = array();
		for ($i = 0; $i < $size; $i++) {
			$array[$i] = $this->parse($arrayNode->getItem());
		}

		return $array;
	}

	public function parseBitArray(BitArrayNode $arrayNode) {
		$length = $this->parse($arrayNode->getHeader());
		return $this->parser->readBits($length);
	}

	public function parseBlob(BlobNode $blobNode) {
		$size = $this->parse($blobNode->getHeader());
		$this->parser->align();
		return $this->parser->readBytes($size);
	}

	public function parseBoolean(BooleanNode $booleanNode) {
		return $this->parser->readBit() != 0;
	}

	public function parseChoice(ChoiceNode $choiceNode) {
		$tag = $this->parse($choiceNode->getTag());
		return$this->parse($choiceNode->getChoices()[$tag]);
	}

	public function parseInteger(IntegerNode $integerNode) {
		return $this->parser->readBits($integerNode->getBits()) + $integerNode->getConstant();
	}

	public function parseFourCC(FourCCNode $fourCCNode) {
		return $this->parser->readBits(4 * 8);
	}

	public function parseNull(NullNode $nullNode) {
		return NULL;
	}

	public function parseOptional(OptionalNode $optionalNode) {
		$bool = $this->parser->readBit();
		if($bool !== 0) {
			return $this->parse($optionalNode->getIndex());
		}
		return NULL;
	}

	public function parseStruct(StructNode $structNode) {
		$struct = array();
		foreach($structNode->getFields() as $key => $index) {
			$struct[$key] = $this->parse($index);
		}
		return $struct;
	}

}