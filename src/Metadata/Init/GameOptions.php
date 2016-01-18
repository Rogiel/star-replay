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


class GameOptions {

	/**
	 * @var boolean
	 */
	private $lockTeams;

	/**
	 * @var boolean
	 */
	private $teamsTogether;

	/**
	 * @var boolean
	 */
	private $advancedSharedControl;

	/**
	 * @var boolean
	 */
	private $randomRaces;

	/**
	 * @var boolean
	 */
	private $battleNet;

	/**
	 * @var boolean
	 */
	private $amm;

	/**
	 * @var boolean
	 */
	private $competitive;

	/**
	 * @var boolean
	 */
	private $practice;

	/**
	 * @var boolean
	 */
	private $cooperative;

	/**
	 * @var boolean
	 */
	private $noVictoryOrDefeat;

	/**
	 * @var boolean
	 */
	private $heroDuplicatesAllowed;

	/**
	 * @var boolean
	 */
	private $fog;

	/**
	 * @var integer
	 */
	private $observers;

	/**
	 * @var integer
	 */
	private $userDifficulty;

	/**
	 * @var integer
	 */
	private $clientDebugFlags;

	/**
	 * @return boolean
	 */
	public function isLockTeams() {
		return $this->lockTeams;
	}

	/**
	 * @return boolean
	 */
	public function isTeamsTogether() {
		return $this->teamsTogether;
	}

	/**
	 * @return boolean
	 */
	public function isAdvancedSharedControl() {
		return $this->advancedSharedControl;
	}

	/**
	 * @return boolean
	 */
	public function isRandomRaces() {
		return $this->randomRaces;
	}

	/**
	 * @return boolean
	 */
	public function isBattleNet() {
		return $this->battleNet;
	}

	/**
	 * @return boolean
	 */
	public function isAmm() {
		return $this->amm;
	}

	/**
	 * @return boolean
	 */
	public function isCompetitive() {
		return $this->competitive;
	}

	/**
	 * @return boolean
	 */
	public function isPractice() {
		return $this->practice;
	}

	/**
	 * @return boolean
	 */
	public function isCooperative() {
		return $this->cooperative;
	}

	/**
	 * @return boolean
	 */
	public function isNoVictoryOrDefeat() {
		return $this->noVictoryOrDefeat;
	}

	/**
	 * @return boolean
	 */
	public function isHeroDuplicatesAllowed() {
		return $this->heroDuplicatesAllowed;
	}

	/**
	 * @return boolean
	 */
	public function isFog() {
		return $this->fog;
	}

	/**
	 * @return int
	 */
	public function getObservers() {
		return $this->observers;
	}

	/**
	 * @return int
	 */
	public function getUserDifficulty() {
		return $this->userDifficulty;
	}

	/**
	 * @return int
	 */
	public function getClientDebugFlags() {
		return $this->clientDebugFlags;
	}

}