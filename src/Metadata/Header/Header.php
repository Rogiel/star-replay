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

namespace Rogiel\StarReplay\Metadata\Header;

class Header {

	/**
	 * @var string
	 */
	private $signature;

	/**
	 * @var Version
	 */
	private $version;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var integer
	 */
	private $elapsedGameLoops;

	/**
	 * @var integer
	 */
	private $useScaledTime;

	/**
	 * @var Hash
	 */
	private $ngdpRootKey;

	/**
	 * @var integer
	 */
	private $dataBuildNum;

	/**
	 * @var Hash
	 */
	private $fixedFileHash;

	/**
	 * @return string
	 */
	public function getSignature() {
		return $this->signature;
	}

	/**
	 * @return Version
	 */
	public function getVersion() {
		return $this->version;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return int
	 */
	public function getElapsedGameLoops() {
		return $this->elapsedGameLoops;
	}

	/**
	 * @return int
	 */
	public function getUseScaledTime() {
		return $this->useScaledTime;
	}

	/**
	 * @return Hash
	 */
	public function getNgdpRootKey() {
		return $this->ngdpRootKey;
	}

	/**
	 * @return int
	 */
	public function getDataBuildNum() {
		return $this->dataBuildNum;
	}

	/**
	 * @return Hash
	 */
	public function getFixedFileHash() {
		return $this->fixedFileHash;
	}

}