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

class CmdEvent extends AbstractGameEvent {

	/** @var integer */
	public $cmdFlags;

	/** @var null|\Rogiel\StarReplay\Event\Game\Entity\Ability */
	public $abil;

	/** @var null|\Rogiel\StarReplay\Entity\Point|\Rogiel\StarReplay\Event\Game\Entity\TargetUnit|integer */
	public $data;

	/** @var integer */
	public $sequence;

	/** @var null|integer */
	public $otherUnit;

	/** @var null|integer */
	public $unitGroup;

    /**
     * @return string the event name
     */
    public function getEventName() {
		return "NNet.Game.SCmdEvent";
	}

    /**
     * @return string a string representation of the event
     */
	public function __toString() {
	    return $this->getEventName()."{ cmdFlags = $this->cmdFlags, abil = $this->abil, data = $this->data, sequence = $this->sequence, otherUnit = $this->otherUnit, unitGroup = $this->unitGroup }";
	}

	/** @return integer */
	public function getCmdFlags() { return $this->cmdFlags; }

	/** @return null|\Rogiel\StarReplay\Event\Game\Entity\Ability */
	public function getAbil() { return $this->abil; }

	/** @return null|\Rogiel\StarReplay\Entity\Point|\Rogiel\StarReplay\Event\Game\Entity\TargetUnit|integer */
	public function getData() { return $this->data; }

	/** @return integer */
	public function getSequence() { return $this->sequence; }

	/** @return null|integer */
	public function getOtherUnit() { return $this->otherUnit; }

	/** @return null|integer */
	public function getUnitGroup() { return $this->unitGroup; }

}