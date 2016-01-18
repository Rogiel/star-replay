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

namespace Rogiel\StarReplay\Tests\Parser\Header;


use Rogiel\StarReplay\Parser\Header\HeaderParser;
use Rogiel\StarReplay\Tests\AbstractTestCase;

class HeaderParserTest extends AbstractTestCase {

	/**
	 * 3.1.0.38215
	 */
	const SAMPLE_HEADER_3_1_0_38215 = "051000022c537461724372616674204949207265706c61791b313102050c00090202090604090006090008098ed5040a098ed5040409040609f0c3030806000a05020202204a573d3b894e57d56e3f96a77e29eb800c098ed5040e0502020220620a2cb0fb47fb61d17ab256d535531a";

	/**
	 * @var HeaderParser
	 */
	private $headerParser;

	public function setUp() {
		$this->headerParser = new HeaderParser();
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function testParsePatch3_1_0_38215() {
		$header = $this->headerParser->parse($this->createMemoryParser(hex2bin(self::SAMPLE_HEADER_3_1_0_38215)));
		$this->assertEquals(3, $header->getMajorVersion());
		$this->assertEquals(1, $header->getMinorVersion());
		$this->assertEquals(0, $header->getPatchVersion());
		$this->assertEquals(38215, $header->getBuildVersion());

		$this->assertEquals("StarCraft II replay\e11", (string)$header->getMagicString());
	}

}
