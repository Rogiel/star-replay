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

class AICommunicateEvent extends AbstractGameEvent {

	/** @var integer */
	public $beacon;

	/** @var integer */
	public $ally;

	/** @var integer */
	public $flags;

	/** @var integer */
	public $build;

	/** @var integer */
	public $targetUnitTag;

	/** @var integer */
	public $targetUnitSnapshotUnitLink;

	/** @var integer */
	public $targetUnitSnapshotUpkeepPlayerId;

	/** @var integer */
	public $targetUnitSnapshotControlPlayerId;

	/** @var \Rogiel\StarReplay\Entity\Point */
	public $targetPoint;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Game.SAICommunicateEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ beacon = $this->beacon, ally = $this->ally, flags = $this->flags, build = $this->build, targetUnitTag = $this->targetUnitTag, targetUnitSnapshotUnitLink = $this->targetUnitSnapshotUnitLink, targetUnitSnapshotUpkeepPlayerId = $this->targetUnitSnapshotUpkeepPlayerId, targetUnitSnapshotControlPlayerId = $this->targetUnitSnapshotControlPlayerId, targetPoint = $this->targetPoint }";
	}

	/** @return integer */
	public function getBeacon() { return $this->beacon; }

	/** @return integer */
	public function getAlly() { return $this->ally; }

	/** @return integer */
	public function getFlags() { return $this->flags; }

	/** @return integer */
	public function getBuild() { return $this->build; }

	/** @return integer */
	public function getTargetUnitTag() { return $this->targetUnitTag; }

	/** @return integer */
	public function getTargetUnitSnapshotUnitLink() { return $this->targetUnitSnapshotUnitLink; }

	/** @return integer */
	public function getTargetUnitSnapshotUpkeepPlayerId() { return $this->targetUnitSnapshotUpkeepPlayerId; }

	/** @return integer */
	public function getTargetUnitSnapshotControlPlayerId() { return $this->targetUnitSnapshotControlPlayerId; }

	/** @return \Rogiel\StarReplay\Entity\Point */
	public function getTargetPoint() { return $this->targetPoint; }

}