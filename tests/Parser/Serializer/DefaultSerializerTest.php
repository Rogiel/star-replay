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

namespace Rogiel\StarReplay\Tests;

use Rogiel\StarReplay\Parser\Serializer\DefaultSerializer;
use Rogiel\StarReplay\Parser\Serializer\Serializer;

class DefaultSerializerTest extends AbstractTestCase {

	/**
	 * @var Serializer
	 */
	private $serializer;

	public function setUp() {
		$this->serializer = new DefaultSerializer();
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function testVariableLengthInteger() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"09". /* variable integer type */
			"AC01" /* 86 */
		)));
		$this->assertEquals(86, $result);

		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"09". /* variable integer type */
			"0A" /* 5 */
		)));
		$this->assertEquals(5, $result);
	}

	public function testUnserializeString() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"02". /* string type */
			"2C". /* string length (variable length int) */
			"48656c6c6f20576f726c64" /* "Hello World" */
		)));
		$this->assertEquals("Hello World", $result);
	}

	public function testUnserializeNonEmptyArray() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"04". /* array type */
			"0100". /* non empty */
			"04". /* 2 items */
			"0902". /* integer 1 */
			"0904" /* integer 2 */
		)));
		$this->assertEquals(array(1, 2), $result);
	}

	public function testUnserializeEmptyArray() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"04". /* array type */
			"00" /* empty */
		)));
		$this->assertEquals(NULL, $result);
	}

	public function testUnserializeIndexedArray() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"05". /* indexed array type */
			"04". /* 2 items */
			"020914". /* 1 => 10 */
			"04090A" /* 2 => 5  */
		)));
		$this->assertEquals(array(1 => 10, 2 => 5), $result);
	}

	public function testUnserializeEmptyIndexedArray() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"05". /* indexed array type */
			"00" /* 0 items */
		)));
		$this->assertEquals(array(), $result);
	}

	public function testUnserializeByte() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"06". /* byte type */
			"FF" /* 0 items */
		)));
		$this->assertEquals(0xFF, $result);
	}

	public function testUnserializeUInt32() {
		$result = $this->serializer->unserialize($this->createMemoryParser(hex2bin(
			"07". /* UInt32 type */
			"BEEF0000" /* 0 items */
		)));
		$this->assertEquals(0x0000EFBE, $result);
	}

}
