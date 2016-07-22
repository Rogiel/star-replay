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

use Rogiel\StarReplay\Hydrator\HydratorFactory;
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

abstract class AbstractSerializer implements Serializer{

	/**
	 * @var ReplayStreamParser
	 */
	protected $parser;

	/**
	 * @var Tree
	 */
	protected $tree;

	/**
	 * @var HydratorFactory
	 */
	protected $hydratorFactory;

	/**
	 * BitPackedSerializer constructor.
	 * @param ReplayStreamParser $parser
	 * @param Tree $tree
	 * @param HydratorFactory $hydratorFactory the hydrator factory
	 */
	public function __construct(ReplayStreamParser $parser, Tree $tree, HydratorFactory $hydratorFactory) {
		$this->parser = $parser;
		$this->tree = $tree;
		$this->hydratorFactory = $hydratorFactory;
	}

	/**
	 * @param $rootNode Node|int
	 * @return array|int|object|string|null
	 */
	public function parse($rootNode) {
		if(is_int($rootNode)) {
			$rootNode = $this->tree->getNode($rootNode);
		}

		if($rootNode instanceof ArrayNode) {
			return $this->decorateObject(
				$this->parseArray($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof BitArrayNode) {
			return $this->decorateObject(
				$this->parseBitArray($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof BlobNode) {
			return $this->decorateObject(
				$this->parseBlob($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof BooleanNode) {
			return $this->decorateObject(
				$this->parseBoolean($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof ChoiceNode) {
			return $this->decorateObject(
				$this->parseChoice($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof IntegerNode) {
			return $this->decorateObject(
				$this->parseInteger($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof FourCCNode) {
			return $this->decorateObject(
				$this->parseFourCC($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof NullNode) {
			return $this->decorateObject(
				$this->parseNull($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof OptionalNode) {
			return $this->decorateObject(
				$this->parseOptional($rootNode),
				$rootNode
			);
		} else if($rootNode instanceof StructNode) {
			return $this->hydrateStruct(
				$this->parseStruct($rootNode),
				$rootNode
			);
		} else {
			throw new \RuntimeException(sprintf("Invalid type: %s", get_class($rootNode)));
		}
	}

	protected abstract function parseArray(ArrayNode $arrayNode);
	protected abstract function parseBitArray(BitArrayNode $arrayNode);
	protected abstract function parseBlob(BlobNode $blobNode);
	protected abstract function parseBoolean(BooleanNode $booleanNode);
	protected abstract function parseChoice(ChoiceNode $choiceNode);
	protected abstract function parseInteger(IntegerNode $integerNode);
	protected abstract function parseFourCC(FourCCNode $fourCCNode);
	protected abstract function parseNull(NullNode $nullNode);
	protected abstract function parseOptional(OptionalNode $optionalNode);
	protected abstract function parseStruct(StructNode $structNode);

	protected function decorateObject($raw, Node $node) {
		$className = $node->getClassName();
		if($className === null) {
			return $raw;
		}
		return new $className($raw);
	}

	protected function hydrateStruct(array $struct, StructNode $structNode) {
		$className = $structNode->getClassName();
		if($className !== NULL) {
			$structObject = new $className();
			$hydrator = $this->hydratorFactory->getHydrator($className);

			$defaultData = $hydrator->extract($structObject);
			$struct = array_merge($defaultData, $struct);
			$hydrator->hydrate($struct, $structObject);

			return $structObject;
		}
		return $struct;
	}

	public function align() {
		$this->parser->align();
	}

	public function eof() {
		return $this->parser->eof();
	}

}