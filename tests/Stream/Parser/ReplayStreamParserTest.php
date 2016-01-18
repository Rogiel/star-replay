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

namespace Rogiel\StarReplay\Tests\Stream\Parser;

use Rogiel\StarReplay\Tests\AbstractTestCase;

class ReplayStreamParserTest extends AbstractTestCase {

	public function testReadTimestamp() {
		$parser = $this->createMemoryParser(hex2bin(
			"00"
		));
		$this->assertEquals(0, $parser->readTimestamp());

		$parser = $this->createMemoryParser(hex2bin(
			"B9FF"
		));
		$this->assertEquals(16366, $parser->readTimestamp());

		$parser = $this->createMemoryParser(hex2bin(
			"BAFFA0"
		));
		$this->assertEquals(2637806, $parser->readTimestamp());

		$parser = $this->createMemoryParser(hex2bin(
			"BBFFA004"
		));
		$this->assertEquals(19415022, $parser->readTimestamp());
	}

	public function testReadVariableLengthNumber() {
		$parser = $this->createMemoryParser(hex2bin(
			"00"
		));
		$this->assertEquals(0, $parser->readVariableLengthNumber());

		$parser = $this->createMemoryParser(hex2bin(
			"0A"
		));
		$this->assertEquals(5, $parser->readVariableLengthNumber());

		$parser = $this->createMemoryParser(hex2bin(
			"FA16"
		));
		$this->assertEquals(1469, $parser->readVariableLengthNumber());
	}

	public function testReadPlayerID() {
		$parser = $this->createMemoryParser(hex2bin(
			"03"
		));
		$this->assertEquals(3, $parser->readPlayerID());

		$parser = $this->createMemoryParser(hex2bin(
			"06"
		));
		$this->assertEquals(6, $parser->readPlayerID());
	}

	public function testReadBit() {
		$parser = $this->createMemoryParser(hex2bin(
			"01"
		));

		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());
		$this->assertEquals(0, $parser->readBit());

		$parser = $this->createMemoryParser(hex2bin(
			"FF"
		));

		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
		$this->assertEquals(1, $parser->readBit());
	}

	public function testReadBits() {
		$parser = $this->createMemoryParser(hex2bin(
			"01"
		));

		$this->assertEquals(1, $parser->readBits(2));
		$this->assertEquals(0, $parser->readBits(2));
		$this->assertEquals(0, $parser->readBits(2));
		$this->assertEquals(0, $parser->readBits(2));

		$parser = $this->createMemoryParser(hex2bin(
			"FF"
		));
		$this->assertEquals(3, $parser->readBits(2));
		$this->assertEquals(3, $parser->readBits(2));
		$this->assertEquals(3, $parser->readBits(2));
		$this->assertEquals(3, $parser->readBits(2));

	}

	public function testReadBitsMultiByteAligned() {
		// multi byte (aligned)
		$parser = $this->createMemoryParser(hex2bin(
			"00FF"
		));
		$this->assertEquals(0xFF00, $parser->readBits(16));
	}

	public function testReadBitsMultiByteNotAligned() {
		// multi byte (not aligned)
		$parser = $this->createMemoryParser(hex2bin(
			"FFAA"
		));
		$this->assertEquals(15, $parser->readBits(4));
		$this->assertEquals(2735, $parser->readBits(12));
	}

}
