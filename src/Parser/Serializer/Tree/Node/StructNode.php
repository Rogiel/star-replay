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

namespace Rogiel\StarReplay\Parser\Serializer\Tree\Node;


use Rogiel\StarReplay\Parser\Serializer\Tree\Tree;
use Rogiel\StarReplay\Stream\Parser\ReplayStreamParser;

class StructNode extends AbstractNode {

	/**
	 * @var mixed[]
	 */
	private $fields;

	/**
	 * @var bool a flag that indicates if the struct is abstract
	 */
	private $abstract = false;

	/**
	 * StructNode constructor.
	 * @param \integer[] $fields
	 * @param $className string the class name
	 * @param $abstract boolean ignores the versioned type when extracting this struct
	 */
	public function __construct(array $fields, $className = null, $abstract = false) {
		parent::__construct($className);
		$this->fields = $fields;
		$this->abstract = $abstract;
	}

	/**
	 * @return int[]
	 */
	public function getFields() {
		return array_map(function($field) {
			return $field['type'];
		}, $this->fields);
	}

	public function getFieldMetadata() {
		return $this->fields;
	}

	/**
	 * @return boolean
	 */
	public function isAbstract() {
		return $this->abstract;
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function getNamedFieldType($field) {
		return $this->fields[$field]['type'];
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function hasTaggedField($tag) {
		foreach($this->fields as $id => $field) {
			if($field['tag'] == $tag) {
				return true;
			}
		}
		return false;
	}

	public function getTaggedField($tag) {
		foreach($this->fields as $key => $field) {
			if($field['tag'] == $tag) {
				return $key;
			}
		}
		return NULL;
	}

}