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

namespace Rogiel\StarReplay\Metadata\Init;


class UserInitialData {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $clanTag;

	/**
	 * @var string
	 */
	private $clanLogo;

	/**
	 * @var integer
	 */
	private $highestLeague;

	/**
	 * @var integer
	 */
	private $combinedRaceLevels;

	/**
	 * @var string
	 */
	private $randomSeed;

	/**
	 * @var string
	 */
	private $racePreference;

	/**
	 * @var string
	 */
	private $teamPreference;

	/**
	 * @var string
	 */
	private $testMap;

	/**
	 * @var boolean
	 */
	private $testAuto;

	/**
	 * @var boolean
	 */
	private $examine;

	/**
	 * @var boolean
	 */
	private $customInterface;

	/**
	 * @var boolean
	 */
	private $testType;

	/**
	 * @var boolean
	 */
	private $observe;

	/**
	 * @var integer
	 */
	private $hero;

	/**
	 * @var integer
	 */
	private $skin;

	/**
	 * @var integer
	 */
	private $mount;

	/**
	 * @var array
	 */
	private $toonHandle;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getClanTag() {
		return $this->clanTag;
	}

	/**
	 * @return string
	 */
	public function getClanLogo() {
		return $this->clanLogo;
	}

	/**
	 * @return int
	 */
	public function getHighestLeague() {
		return $this->highestLeague;
	}

	/**
	 * @return int
	 */
	public function getCombinedRaceLevels() {
		return $this->combinedRaceLevels;
	}

	/**
	 * @return string
	 */
	public function getRandomSeed() {
		return $this->randomSeed;
	}

	/**
	 * @return string
	 */
	public function getRacePreference() {
		return $this->racePreference;
	}

	/**
	 * @return string
	 */
	public function getTeamPreference() {
		return $this->teamPreference;
	}

	/**
	 * @return string
	 */
	public function getTestMap() {
		return $this->testMap;
	}

	/**
	 * @return boolean
	 */
	public function isTestAuto() {
		return $this->testAuto;
	}

	/**
	 * @return boolean
	 */
	public function isExamine() {
		return $this->examine;
	}

	/**
	 * @return boolean
	 */
	public function isCustomInterface() {
		return $this->customInterface;
	}

	/**
	 * @return boolean
	 */
	public function isTestType() {
		return $this->testType;
	}

	/**
	 * @return boolean
	 */
	public function isObserve() {
		return $this->observe;
	}

	/**
	 * @return int
	 */
	public function getHero() {
		return $this->hero;
	}

	/**
	 * @return int
	 */
	public function getSkin() {
		return $this->skin;
	}

	/**
	 * @return int
	 */
	public function getMount() {
		return $this->mount;
	}

	/**
	 * @return array
	 */
	public function getToonHandle() {
		return $this->toonHandle;
	}

}