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

namespace Rogiel\StarReplay\Event\Tracker;

class UnitDiedEvent extends AbstractTrackerEvent {

	/** @var integer */
	public $unitTagIndex;

	/** @var integer */
	public $unitTagRecycle;

	/** @var null|integer */
	public $killerPlayerId;

	/** @var integer */
	public $x;

	/** @var integer */
	public $y;

	/** @var null|integer */
	public $killerUnitTagIndex;

	/** @var null|integer */
	public $killerUnitTagRecycle;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Replay.Tracker.SUnitDiedEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ unitTagIndex = $this->unitTagIndex, unitTagRecycle = $this->unitTagRecycle, killerPlayerId = $this->killerPlayerId, x = $this->x, y = $this->y, killerUnitTagIndex = $this->killerUnitTagIndex, killerUnitTagRecycle = $this->killerUnitTagRecycle }";
	}

	/** @return integer */
	public function getUnitTagIndex() { return $this->unitTagIndex; }

	/** @return integer */
	public function getUnitTagRecycle() { return $this->unitTagRecycle; }

	/** @return null|integer */
	public function getKillerPlayerId() { return $this->killerPlayerId; }

	/** @return integer */
	public function getX() { return $this->x; }

	/** @return integer */
	public function getY() { return $this->y; }

	/** @return null|integer */
	public function getKillerUnitTagIndex() { return $this->killerUnitTagIndex; }

	/** @return null|integer */
	public function getKillerUnitTagRecycle() { return $this->killerUnitTagRecycle; }

}