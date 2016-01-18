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

namespace Rogiel\StarReplay\Tests\Stream;

use Rogiel\StarReplay\Tests\AbstractTestCase;

class BitStreamTest extends AbstractTestCase {

	public function testReadBit() {
		$stream = $this->createMemoryBitStream(hex2bin(
			"01"
		));

		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());
		$this->assertEquals(0, $stream->readBit());

		$stream = $this->createMemoryBitStream(hex2bin(
			"FF"
		));

		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
		$this->assertEquals(1, $stream->readBit());
	}

	public function testReadBits() {
		$stream = $this->createMemoryBitStream(hex2bin(
			"01"
		));

		$this->assertEquals(1, $stream->readBits(2));
		$this->assertEquals(0, $stream->readBits(2));
		$this->assertEquals(0, $stream->readBits(2));
		$this->assertEquals(0, $stream->readBits(2));

		$stream = $this->createMemoryBitStream(hex2bin(
			"FF"
		));
		$this->assertEquals(3, $stream->readBits(2));
		$this->assertEquals(3, $stream->readBits(2));
		$this->assertEquals(3, $stream->readBits(2));
		$this->assertEquals(3, $stream->readBits(2));

	}

	public function testReadBitsMultiByteAligned() {
		// multi byte (aligned)
		$stream = $this->createMemoryBitStream(hex2bin(
			"00FF"
		));
		$this->assertEquals(0xFF00, $stream->readBits(16));
	}

	public function testReadBitsMultiByteNotAligned() {
		// multi byte (not aligned)
		$stream = $this->createMemoryBitStream(hex2bin(
			"FFAA"
		));
		$this->assertEquals(15, $stream->readBits(4));
		$this->assertEquals(2735, $stream->readBits(12));
	}


}
