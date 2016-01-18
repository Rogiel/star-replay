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

namespace Rogiel\StarReplay\Entity;

class Player extends AbstractEntity {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var Toon
	 */
	private $toon;

	/**
	 * @var string
	 */
	private $race;

	/**
	 * @var Color
	 */
	private $color;

	/**
	 * @var integer
	 */
	private $control;

	/**
	 * @var integer
	 */
	private $teamId;

	/**
	 * @var integer
	 */
	private $handicap;

	/**
	 * @var boolean
	 */
	private $observe;

	/**
	 * @var boolean
	 */
	private $result;

	/**
	 * @var integer
	 */
	private $workingSetSlotId;

	/**
	 * @var mixed
	 */
	private $hero;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return Toon
	 */
	public function getToon() {
		return $this->toon;
	}

	/**
	 * @return string
	 */
	public function getRace() {
		return $this->race;
	}

	/**
	 * @return Color
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * @return int
	 */
	public function getControl() {
		return $this->control;
	}

	/**
	 * @return int
	 */
	public function getTeamId() {
		return $this->teamId;
	}

	/**
	 * @return int
	 */
	public function getHandicap() {
		return $this->handicap;
	}

	/**
	 * @return boolean
	 */
	public function isObserve() {
		return $this->observe;
	}

	/**
	 * @return boolean
	 */
	public function isResult() {
		return $this->result;
	}

	/**
	 * @return int
	 */
	public function getWorkingSetSlotId() {
		return $this->workingSetSlotId;
	}

	/**
	 * @return mixed
	 */
	public function getHero() {
		return $this->hero;
	}

	public function __toString() {
		return "Player{ name = $this->name, race = $this->race, color = $this->color, teamID = $this->teamId }";
	}

}