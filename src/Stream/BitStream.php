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

namespace Rogiel\StarReplay\Stream;

use Rogiel\MPQ\Stream\Stream;

class BitStream implements Stream {

	/**
	 * @var Stream
	 */
	private $stream;

	// -----------------------------------------------------------------------------------------------------------------

	private $currentByte;
	private $currentBit;

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * BitStream constructor.
	 * @param $stream
	 */
	public function __construct(Stream $stream) {
		$this->stream = $stream;

		$this->currentByte = NULL;
		$this->currentBit = 0;
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function readBit() {
		return $this->readBits(1);
	}

	public function readBits($bits) {
		$result = 0;
        $resultbits = 0;
        while($resultbits != $bits) {
	        if($this->currentBit == 0) {
		        $this->currentByte = ord($this->stream->readByte());
		        $this->currentBit = 8;
	        }
            $copybits = min($bits - $resultbits, $this->currentBit);
            $copy = ($this->currentByte & ((1 << $copybits) - 1));
	        $result |= $copy << ($bits - $resultbits - $copybits);

	        $this->currentByte >>= $copybits; // self . _next >>= copybits
	        $this->currentBit -= $copybits; // self . _nextbits -= copybits
	        $resultbits += $copybits; // resultbits += copybits
        }
        return $result;
	}

	public function align() {
		$this->currentBit = 0;
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @inheritDoc
	 */
	public function close() {
		$this->stream->close();
	}

	/**
	 * @inheritDoc
	 */
	public function readByte() {
		$this->align();
		return $this->stream->readByte();
	}

	/**
	 * @inheritDoc
	 */
	public function readBytes($bytes) {
		$this->align();
		return $this->stream->readBytes($bytes);
	}

	/**
	 * @inheritDoc
	 */
	public function seek($position) {
		return $this->stream->seek($position);
	}

	/**
	 * @inheritDoc
	 */
	public function skip($bytes) {
		return $this->stream->skip($bytes);
	}

	/**
	 * {@inheritdoc}
	 */
	public function eof() {
		return $this->stream->eof();
	}
}