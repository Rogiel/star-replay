<?php
/**
 * PixForce
 *
 * @link      http://www.pixforce.com.br/
 * @copyright Copyright (c) 2016 PixForce (http://www.pixforce.com.br)
 * @license   Proprietary
 */

namespace Rogiel\StarReplay\Metadata\Init;


class LobbySlot {

    private $control;
    private $userId;
    private $teamId;

    /**
     * @var array
     */
    private $colorPref;

    /**
     *
     */
    private $racePref;

    private $difficulty;
    private $aiBuild;
    private $handicap;

    private $observe;
    private $logoIndex;

    private $hero;
    private $skin;
    private $mount;

    /**
     * @var array
     */
    private $artifacts;

    private $workingSetSlotId;

    /**
     * @var array
     */
    private $rewards;

    private $toonHandle;

    private $licenses;
    private $tandemLeaderId;

    private $commander;
    private $commanderLevel;

    private $hasSilencePenalty;
    private $tandemId;

    private $commanderMasteryLevel;
    private $commanderMasteryTalents;

    /**
     * @return mixed
     */
    public function getControl() {
        return $this->control;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getTeamId() {
        return $this->teamId;
    }

    /**
     * @return array
     */
    public function getColorPref() {
        return $this->colorPref;
    }

    /**
     * @return mixed
     */
    public function getRacePref() {
        return $this->racePref;
    }

    /**
     * @return mixed
     */
    public function getDifficulty() {
        return $this->difficulty;
    }

    /**
     * @return mixed
     */
    public function getAiBuild() {
        return $this->aiBuild;
    }

    /**
     * @return mixed
     */
    public function getHandicap() {
        return $this->handicap;
    }

    /**
     * @return mixed
     */
    public function getObserve() {
        return $this->observe;
    }

    /**
     * @return mixed
     */
    public function getLogoIndex() {
        return $this->logoIndex;
    }

    /**
     * @return mixed
     */
    public function getHero() {
        return $this->hero;
    }

    /**
     * @return mixed
     */
    public function getSkin() {
        return $this->skin;
    }

    /**
     * @return mixed
     */
    public function getMount() {
        return $this->mount;
    }

    /**
     * @return array
     */
    public function getArtifacts() {
        return $this->artifacts;
    }

    /**
     * @return mixed
     */
    public function getWorkingSetSlotId() {
        return $this->workingSetSlotId;
    }

    /**
     * @return array
     */
    public function getRewards() {
        return $this->rewards;
    }

    /**
     * @return mixed
     */
    public function getToonHandle() {
        return $this->toonHandle;
    }

    /**
     * @return mixed
     */
    public function getLicenses() {
        return $this->licenses;
    }

    /**
     * @return mixed
     */
    public function getTandemLeaderId() {
        return $this->tandemLeaderId;
    }

    /**
     * @return mixed
     */
    public function getCommander() {
        return $this->commander;
    }

    /**
     * @return mixed
     */
    public function getCommanderLevel() {
        return $this->commanderLevel;
    }

    /**
     * @return mixed
     */
    public function getHasSilencePenalty() {
        return $this->hasSilencePenalty;
    }

    /**
     * @return mixed
     */
    public function getTandemId() {
        return $this->tandemId;
    }

    /**
     * @return mixed
     */
    public function getCommanderMasteryLevel() {
        return $this->commanderMasteryLevel;
    }

    /**
     * @return mixed
     */
    public function getCommanderMasteryTalents() {
        return $this->commanderMasteryTalents;
    }

}