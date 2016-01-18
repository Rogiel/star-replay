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

namespace Rogiel\StarReplay\Stream\Parser;

use Rogiel\MPQ\Stream\Parser\BinaryStreamParser;
use Rogiel\StarReplay\Stream\BitStream;

class ReplayStreamParser extends BinaryStreamParser {

	/**
	 * @var BitStream
	 */
	private $stream;

	/**
	 * BinaryStreamParser constructor.
	 * @param BitStream $stream
	 */
	public function __construct(BitStream $stream) {
		parent::__construct($stream);
		$this->stream = $stream;
	}

	public function align() {
		$this->stream->align();
	}

	public function readBit() {
		return $this->stream->readBit();
	}

	public function readBits($bits) {
		return $this->stream->readBits($bits);
	}

	public function readTimestamp() {
		$length = $this->readBits(2);
		return $this->readBits(6 + $length * 8);
	}

	public function readPlayerID() {
		return $this->readBits(5);
	}

	public function readVariableLengthNumber() {
		$number = 0;
		$first = true;
		$multiplier = 1;
		for ($i = $this->readBits(8),$bytes = 0;true;$i = $this->readBits(8),$bytes++) {
			$number += ($i & 0x7F) * pow(2,$bytes * 7);
			if ($first) {
				if ($number & 1) {
					$multiplier = -1;
					$number--;
				}
				$first = false;
			}
			if (($i & 0x80) == 0) break;
		}
		$number *= $multiplier;
		$number /= 2; // can't use right-shift because the datatype will be float for large values on 32-bit systems
		return $number;
	}

}