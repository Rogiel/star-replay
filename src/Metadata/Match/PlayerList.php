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


use Rogiel\StarReplay\Entity\Player;

class PlayerList implements \ArrayAccess, \IteratorAggregate {

	private $players;

	/**
	 * PlayerList constructor.
	 * @param $players
	 */
	public function __construct($players) {
		$this->players = $players;
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @param $id
	 * @return Player|null
	 */
	public function getPlayer($id) {
		if(!isset($this->players[$id])) {
			return NULL;
		}
		return $this->players[$id];
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @return mixed
	 */
	public function getPlayers() {
		return $this->players;
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @inheritDoc
	 */
	public function offsetExists($offset) {
		return array_key_exists($offset, $this->players);
	}

	/**
	 * @inheritDoc
	 */
	public function offsetGet($offset) {
		return $this->players[$offset];
	}

	/**
	 * @inheritDoc
	 */
	public function offsetSet($offset, $value) {
		$this->players[$offset] = $value;
	}

	/**
	 * @inheritDoc
	 */
	public function offsetUnset($offset) {
		unset($this->players[$offset]);
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @inheritDoc
	 */
	public function getIterator() {
		return new \ArrayIterator($this->players);
	}

	public function __toString() {
		return join(', ', $this->players);
	}

}