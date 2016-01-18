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

class CameraUpdateEvent extends AbstractGameEvent {

	/** @var null|\Rogiel\StarReplay\Entity\Point */
	public $target;

	/** @var null|integer */
	public $distance;

	/** @var null|integer */
	public $pitch;

	/** @var null|integer */
	public $yaw;

	/** @var null|integer */
	public $reason;

	/** @var boolean */
	public $follow;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Game.SCameraUpdateEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ target = $this->target, distance = $this->distance, pitch = $this->pitch, yaw = $this->yaw, reason = $this->reason, follow = $this->follow }";
	}

	/** @return null|\Rogiel\StarReplay\Entity\Point */
	public function getTarget() { return $this->target; }

	/** @return null|integer */
	public function getDistance() { return $this->distance; }

	/** @return null|integer */
	public function getPitch() { return $this->pitch; }

	/** @return null|integer */
	public function getYaw() { return $this->yaw; }

	/** @return null|integer */
	public function getReason() { return $this->reason; }

	/** @return boolean */
	public function getFollow() { return $this->follow; }

}