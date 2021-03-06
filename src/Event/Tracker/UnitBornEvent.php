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

class UnitBornEvent extends AbstractTrackerEvent {

	/** @var integer */
	public $unitTagIndex;

	/** @var integer */
	public $unitTagRecycle;

	/** @var string */
	public $unitTypeName;

	/** @var integer */
	public $controlPlayerId;

	/** @var integer */
	public $upkeepPlayerId;

	/** @var integer */
	public $x;

	/** @var integer */
	public $y;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Replay.Tracker.SUnitBornEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ unitTagIndex = $this->unitTagIndex, unitTagRecycle = $this->unitTagRecycle, unitTypeName = $this->unitTypeName, controlPlayerId = $this->controlPlayerId, upkeepPlayerId = $this->upkeepPlayerId, x = $this->x, y = $this->y }";
	}

	/** @return integer */
	public function getUnitTagIndex() { return $this->unitTagIndex; }

	/** @return integer */
	public function getUnitTagRecycle() { return $this->unitTagRecycle; }

	/** @return string */
	public function getUnitTypeName() { return $this->unitTypeName; }

	/** @return integer */
	public function getControlPlayerId() { return $this->controlPlayerId; }

	/** @return integer */
	public function getUpkeepPlayerId() { return $this->upkeepPlayerId; }

	/** @return integer */
	public function getX() { return $this->x; }

	/** @return integer */
	public function getY() { return $this->y; }

}