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


class GameDescription {

	/**
	 * @var integer
	 */
	private $randomValue;

	/**
	 * @var string
	 */
	private $gameCacheName;

	/**
	 * @var GameOptions
	 */
	private $gameOptions;

	/**
	 * @var integer
	 */
	private $gameSpeed;

	/**
	 * @var integer
	 */
	private $gameType;

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
	private $maxPlayers;

	/**
	 * @var integer
	 */
	private $maxTeams;

	/**
	 * @var integer
	 */
	private $maxColors;

	/**
	 * @var integer
	 */
	private $maxRaces;

	/**
	 * @var integer
	 */
	private $maxControls;

	/**
	 * @var integer
	 */
	private $mapSizeX;

	/**
	 * @var integer
	 */
	private $mapSizeY;

	/**
	 * @var integer
	 */
	private $mapFileSyncChecksum;

	/**
	 * @var string
	 */
	private $mapFileName;

	/**
	 * @var string
	 */
	private $mapAuthorName;

	/**
	 * @var integer
	 */
	private $modFileSyncChecksum;

	/**
	 * @var array
	 */
	private $slotDescriptions;

	/**
	 * @var integer
	 */
	private $defaultDifficulty;

	/**
	 * @var integer
	 */
	private $defaultAIBuild;

	/**
	 * @var array
	 */
	private $cacheHandles;

	/**
	 * @var boolean
	 */
	private $hasExtensionMod;

	/**
	 * @var boolean
	 */
	private $isBlizzardMap;

	/**
	 * @var boolean
	 */
	private $isPremadeFFA;

	/**
	 * @var boolean
	 */
	private $isCoopMode;

	/**
	 * @return int
	 */
	public function getRandomValue() {
		return $this->randomValue;
	}

	/**
	 * @return string
	 */
	public function getGameCacheName() {
		return $this->gameCacheName;
	}

	/**
	 * @return GameOptions
	 */
	public function getGameOptions() {
		return $this->gameOptions;
	}

	/**
	 * @return int
	 */
	public function getGameSpeed() {
		return $this->gameSpeed;
	}

	/**
	 * @return int
	 */
	public function getGameType() {
		return $this->gameType;
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
	public function getMaxPlayers() {
		return $this->maxPlayers;
	}

	/**
	 * @return int
	 */
	public function getMaxTeams() {
		return $this->maxTeams;
	}

	/**
	 * @return int
	 */
	public function getMaxColors() {
		return $this->maxColors;
	}

	/**
	 * @return int
	 */
	public function getMaxRaces() {
		return $this->maxRaces;
	}

	/**
	 * @return int
	 */
	public function getMaxControls() {
		return $this->maxControls;
	}

	/**
	 * @return int
	 */
	public function getMapSizeX() {
		return $this->mapSizeX;
	}

	/**
	 * @return int
	 */
	public function getMapSizeY() {
		return $this->mapSizeY;
	}

	/**
	 * @return int
	 */
	public function getMapFileSyncChecksum() {
		return $this->mapFileSyncChecksum;
	}

	/**
	 * @return string
	 */
	public function getMapFileName() {
		return $this->mapFileName;
	}

	/**
	 * @return string
	 */
	public function getMapAuthorName() {
		return $this->mapAuthorName;
	}

	/**
	 * @return int
	 */
	public function getModFileSyncChecksum() {
		return $this->modFileSyncChecksum;
	}

	/**
	 * @return array
	 */
	public function getSlotDescriptions() {
		return $this->slotDescriptions;
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

	/**
	 * @return array
	 */
	public function getCacheHandles() {
		return $this->cacheHandles;
	}

	/**
	 * @return boolean
	 */
	public function hasExtensionMod() {
		return $this->hasExtensionMod;
	}

	/**
	 * @return boolean
	 */
	public function isBlizzardMap() {
		return $this->isBlizzardMap;
	}

	/**
	 * @return boolean
	 */
	public function isPremadeFFA() {
		return $this->isPremadeFFA;
	}

	/**
	 * @return boolean
	 */
	public function isCoopMode() {
		return $this->isCoopMode;
	}


}