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

namespace Rogiel\StarReplay\Version;

class VersionLoader {

	private $versions = array();

	public function __construct($versions = NULL) {
		if($versions == NULL) {
			$versions = Versions::getVersions();
		}
		$this->versions = $versions;
	}

	/**
	 * @param $version string|int the version string
	 * @return Version
	 */
	public function load($version) {
		if(!array_key_exists($version, $this->versions)) {
			return NULL;
		}
		$className = $this->versions[$version];
		return new $className();
	}

	/**
	 * @param $version string|int the version string
	 * @return bool
	 */
	public function exists($version) {
		return array_key_exists($version, $this->versions);
	}

	/**
	 * @return Version
	 */
	public function earliest() {
		$version = min(array_keys($this->versions));
		return $this->load($version);
	}

	/**
	 * @return Version
	 */
	public function latest() {
		$version = max(array_keys($this->versions));
		return $this->load($version);
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function addVersion($version, $class = NULL) {
		if($class == NULL) {
			$class = 'Rogiel\StarReplay\Version\Version'.$version;
		}
		$this->versions[$version] = $class;
	}

	public function removeVersion($version) {
		unset($this->versions[$version]);
	}

}