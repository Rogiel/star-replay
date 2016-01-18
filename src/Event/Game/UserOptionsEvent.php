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

namespace Rogiel\StarReplay\Event\Game;

class UserOptionsEvent extends AbstractGameEvent {

	/** @var boolean */
	public $gameFullyDownloaded;

	/** @var boolean */
	public $developmentCheatsEnabled;

	/** @var boolean */
	public $testCheatsEnabled;

	/** @var boolean */
	public $multiplayerCheatsEnabled;

	/** @var boolean */
	public $syncChecksummingEnabled;

	/** @var boolean */
	public $isMapToMapTransition;

	/** @var boolean */
	public $debugPauseEnabled;

	/** @var boolean */
	public $useGalaxyAsserts;

	/** @var boolean */
	public $platformMac;

	/** @var boolean */
	public $cameraFollow;

	/** @var integer */
	public $baseBuildNum;

	/** @var integer */
	public $buildNum;

	/** @var integer */
	public $versionFlags;

	/** @var string */
	public $hotkeyProfile;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Game.SUserOptionsEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ gameFullyDownloaded = $this->gameFullyDownloaded, developmentCheatsEnabled = $this->developmentCheatsEnabled, testCheatsEnabled = $this->testCheatsEnabled, multiplayerCheatsEnabled = $this->multiplayerCheatsEnabled, syncChecksummingEnabled = $this->syncChecksummingEnabled, isMapToMapTransition = $this->isMapToMapTransition, debugPauseEnabled = $this->debugPauseEnabled, useGalaxyAsserts = $this->useGalaxyAsserts, platformMac = $this->platformMac, cameraFollow = $this->cameraFollow, baseBuildNum = $this->baseBuildNum, buildNum = $this->buildNum, versionFlags = $this->versionFlags, hotkeyProfile = $this->hotkeyProfile }";
	}

	/** @return boolean */
	public function getGameFullyDownloaded() { return $this->gameFullyDownloaded; }

	/** @return boolean */
	public function getDevelopmentCheatsEnabled() { return $this->developmentCheatsEnabled; }

	/** @return boolean */
	public function getTestCheatsEnabled() { return $this->testCheatsEnabled; }

	/** @return boolean */
	public function getMultiplayerCheatsEnabled() { return $this->multiplayerCheatsEnabled; }

	/** @return boolean */
	public function getSyncChecksummingEnabled() { return $this->syncChecksummingEnabled; }

	/** @return boolean */
	public function getIsMapToMapTransition() { return $this->isMapToMapTransition; }

	/** @return boolean */
	public function getDebugPauseEnabled() { return $this->debugPauseEnabled; }

	/** @return boolean */
	public function getUseGalaxyAsserts() { return $this->useGalaxyAsserts; }

	/** @return boolean */
	public function getPlatformMac() { return $this->platformMac; }

	/** @return boolean */
	public function getCameraFollow() { return $this->cameraFollow; }

	/** @return integer */
	public function getBaseBuildNum() { return $this->baseBuildNum; }

	/** @return integer */
	public function getBuildNum() { return $this->buildNum; }

	/** @return integer */
	public function getVersionFlags() { return $this->versionFlags; }

	/** @return string */
	public function getHotkeyProfile() { return $this->hotkeyProfile; }

}