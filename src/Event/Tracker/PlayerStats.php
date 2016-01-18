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


class PlayerStats {

	/**
	 * @var integer
	 */
	private $scoreValueMineralsCurrent;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneCurrent;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsCollectionRate;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneCollectionRate;

	/**
	 * @var integer
	 */
	private $scoreValueWorkersActiveCount;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedInProgressArmy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedInProgressEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedInProgressTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedInProgressArmy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedInProgressEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedInProgressTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedCurrentArmy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedCurrentEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedCurrentTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedCurrentArmy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedCurrentEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedCurrentTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsLostArmy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsLostEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsLostTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneLostArmy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneLostEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneLostTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsKilledArmy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsKilledEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsKilledTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneKilledArmy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneKilledEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneKilledTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueFoodUsed;

	/**
	 * @var integer
	 */
	private $scoreValueFoodMade;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsUsedActiveForces;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneUsedActiveForces;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsFriendlyFireArmy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsFriendlyFireEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueMineralsFriendlyFireTechnology;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneFriendlyFireArmy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneFriendlyFireEconomy;

	/**
	 * @var integer
	 */
	private $scoreValueVespeneFriendlyFireTechnology;

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * @return int
	 */
	public function getScoreValueMineralsCurrent() {
		return $this->scoreValueMineralsCurrent;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneCurrent() {
		return $this->scoreValueVespeneCurrent;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsCollectionRate() {
		return $this->scoreValueMineralsCollectionRate;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneCollectionRate() {
		return $this->scoreValueVespeneCollectionRate;
	}

	/**
	 * @return int
	 */
	public function getScoreValueWorkersActiveCount() {
		return $this->scoreValueWorkersActiveCount;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedInProgressArmy() {
		return $this->scoreValueMineralsUsedInProgressArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedInProgressEconomy() {
		return $this->scoreValueMineralsUsedInProgressEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedInProgressTechnology() {
		return $this->scoreValueMineralsUsedInProgressTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedInProgressArmy() {
		return $this->scoreValueVespeneUsedInProgressArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedInProgressEconomy() {
		return $this->scoreValueVespeneUsedInProgressEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedInProgressTechnology() {
		return $this->scoreValueVespeneUsedInProgressTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedCurrentArmy() {
		return $this->scoreValueMineralsUsedCurrentArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedCurrentEconomy() {
		return $this->scoreValueMineralsUsedCurrentEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedCurrentTechnology() {
		return $this->scoreValueMineralsUsedCurrentTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedCurrentArmy() {
		return $this->scoreValueVespeneUsedCurrentArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedCurrentEconomy() {
		return $this->scoreValueVespeneUsedCurrentEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedCurrentTechnology() {
		return $this->scoreValueVespeneUsedCurrentTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsLostArmy() {
		return $this->scoreValueMineralsLostArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsLostEconomy() {
		return $this->scoreValueMineralsLostEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsLostTechnology() {
		return $this->scoreValueMineralsLostTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneLostArmy() {
		return $this->scoreValueVespeneLostArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneLostEconomy() {
		return $this->scoreValueVespeneLostEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneLostTechnology() {
		return $this->scoreValueVespeneLostTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsKilledArmy() {
		return $this->scoreValueMineralsKilledArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsKilledEconomy() {
		return $this->scoreValueMineralsKilledEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsKilledTechnology() {
		return $this->scoreValueMineralsKilledTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneKilledArmy() {
		return $this->scoreValueVespeneKilledArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneKilledEconomy() {
		return $this->scoreValueVespeneKilledEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneKilledTechnology() {
		return $this->scoreValueVespeneKilledTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueFoodUsed() {
		return $this->scoreValueFoodUsed;
	}

	/**
	 * @return int
	 */
	public function getScoreValueFoodMade() {
		return $this->scoreValueFoodMade;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsUsedActiveForces() {
		return $this->scoreValueMineralsUsedActiveForces;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneUsedActiveForces() {
		return $this->scoreValueVespeneUsedActiveForces;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsFriendlyFireArmy() {
		return $this->scoreValueMineralsFriendlyFireArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsFriendlyFireEconomy() {
		return $this->scoreValueMineralsFriendlyFireEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueMineralsFriendlyFireTechnology() {
		return $this->scoreValueMineralsFriendlyFireTechnology;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneFriendlyFireArmy() {
		return $this->scoreValueVespeneFriendlyFireArmy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneFriendlyFireEconomy() {
		return $this->scoreValueVespeneFriendlyFireEconomy;
	}

	/**
	 * @return int
	 */
	public function getScoreValueVespeneFriendlyFireTechnology() {
		return $this->scoreValueVespeneFriendlyFireTechnology;
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function __toString() {
		return "PlayerStats {scoreValueMineralsCurrent = $this->scoreValueMineralsCurrent, scoreValueVespeneCurrent = $this->scoreValueVespeneCurrent, scoreValueMineralsCollectionRate = $this->scoreValueMineralsCollectionRate, scoreValueVespeneCollectionRate = $this->scoreValueVespeneCollectionRate, scoreValueWorkersActiveCount = $this->scoreValueWorkersActiveCount, scoreValueMineralsUsedInProgressArmy = $this->scoreValueMineralsUsedInProgressArmy, scoreValueMineralsUsedInProgressEconomy = $this->scoreValueMineralsUsedInProgressEconomy, scoreValueMineralsUsedInProgressTechnology = $this->scoreValueMineralsUsedInProgressTechnology, scoreValueVespeneUsedInProgressArmy = $this->scoreValueVespeneUsedInProgressArmy, scoreValueVespeneUsedInProgressEconomy = $this->scoreValueVespeneUsedInProgressEconomy, scoreValueVespeneUsedInProgressTechnology = $this->scoreValueVespeneUsedInProgressTechnology, scoreValueMineralsUsedCurrentArmy = $this->scoreValueMineralsUsedCurrentArmy, scoreValueMineralsUsedCurrentEconomy = $this->scoreValueMineralsUsedCurrentEconomy, scoreValueMineralsUsedCurrentTechnology = $this->scoreValueMineralsUsedCurrentTechnology, scoreValueVespeneUsedCurrentArmy = $this->scoreValueVespeneUsedCurrentArmy, scoreValueVespeneUsedCurrentEconomy = $this->scoreValueVespeneUsedCurrentEconomy, scoreValueVespeneUsedCurrentTechnology = $this->scoreValueVespeneUsedCurrentTechnology, scoreValueMineralsLostArmy = $this->scoreValueMineralsLostArmy, scoreValueMineralsLostEconomy = $this->scoreValueMineralsLostEconomy, scoreValueMineralsLostTechnology = $this->scoreValueMineralsLostTechnology, scoreValueVespeneLostArmy = $this->scoreValueVespeneLostArmy, scoreValueVespeneLostEconomy = $this->scoreValueVespeneLostEconomy, scoreValueVespeneLostTechnology = $this->scoreValueVespeneLostTechnology, scoreValueMineralsKilledArmy = $this->scoreValueMineralsKilledArmy, scoreValueMineralsKilledEconomy = $this->scoreValueMineralsKilledEconomy, scoreValueMineralsKilledTechnology = $this->scoreValueMineralsKilledTechnology, scoreValueVespeneKilledArmy = $this->scoreValueVespeneKilledArmy, scoreValueVespeneKilledEconomy = $this->scoreValueVespeneKilledEconomy, scoreValueVespeneKilledTechnology = $this->scoreValueVespeneKilledTechnology, scoreValueFoodUsed = $this->scoreValueFoodUsed, scoreValueFoodMade = $this->scoreValueFoodMade, scoreValueMineralsUsedActiveForces = $this->scoreValueMineralsUsedActiveForces, scoreValueVespeneUsedActiveForces = $this->scoreValueVespeneUsedActiveForces, scoreValueMineralsFriendlyFireArmy = $this->scoreValueMineralsFriendlyFireArmy, scoreValueMineralsFriendlyFireEconomy = $this->scoreValueMineralsFriendlyFireEconomy, scoreValueMineralsFriendlyFireTechnology = $this->scoreValueMineralsFriendlyFireTechnology, scoreValueVespeneFriendlyFireArmy = $this->scoreValueVespeneFriendlyFireArmy, scoreValueVespeneFriendlyFireEconomy = $this->scoreValueVespeneFriendlyFireEconomy, scoreValueVespeneFriendlyFireTechnology = $this->scoreValueVespeneFriendlyFireTechnology }";
	}

}