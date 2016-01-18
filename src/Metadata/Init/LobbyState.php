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


class LobbyState {

	/**
	 * @var integer
	 */
	private $phase;

	/**
	 * @var integer
	 */
	private $maxUsers;

	/**
	 * @var integer
	 */
	private $maxObservers;

	/**
	 * @var integer
	 */
	private $slots;

	/**
	 * @var integer
	 */
	private $randomSeed;

	/**
	 * @var integer
	 */
	private $hostUserId;

	/**
	 * @var boolean
	 */
	private $isSinglePlayer;

	/**
	 * @var integer
	 */
	private $pickedMapTag;

	/**
	 * @var integer
	 */
	private $gameDuration;

	/**
	 * @var integer
	 */
	private $defaultDifficulty;

	/**
	 * @var integer
	 */
	private $defaultAIBuild;

	/**
	 * @return int
	 */
	public function getPhase() {
		return $this->phase;
	}

	/**
	 * @return int
	 */
	public function getMaxUsers() {
		return $this->maxUsers;
	}

	/**
	 * @return int
	 */
	public function getMaxObservers() {
		return $this->maxObservers;
	}

	/**
	 * @return int
	 */
	public function getSlots() {
		return $this->slots;
	}

	/**
	 * @return int
	 */
	public function getRandomSeed() {
		return $this->randomSeed;
	}

	/**
	 * @return int
	 */
	public function getHostUserId() {
		return $this->hostUserId;
	}

	/**
	 * @return boolean
	 */
	public function isSinglePlayer() {
		return $this->isSinglePlayer;
	}

	/**
	 * @return int
	 */
	public function getPickedMapTag() {
		return $this->pickedMapTag;
	}

	/**
	 * @return int
	 */
	public function getGameDuration() {
		return $this->gameDuration;
	}

	/**
	 * @return int
	 */
	public function getDefaultDifficulty() {
		return $this->defaultDifficulty;
	}

	/**
	 * @return int
	 */
	public function getDefaultAIBuild() {
		return $this->defaultAIBuild;
	}



}