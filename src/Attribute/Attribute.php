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

namespace Rogiel\StarReplay\Attribute;


class Attribute {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $namespace;

    /**
     * @var integer
     */
    private $playerID;

    /**
     * @var string
     */
    private $value;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Attribute constructor.
     *
     * @param int    $id
     * @param int    $namespace
     * @param int    $playerID
     * @param string $value
     */
    public function __construct($id, $namespace, $playerID, $value) {
        $this->id = $id;
        $this->namespace = $namespace;
        $this->playerID = $playerID;
        $this->value = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return int
     */
    public function getID() {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @return int
     */
    public function getPlayerID() {
        return $this->playerID;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return bool true if the attribute is for a player
     */
    public function isPlayerAttribute() {
        return $this->playerID != 16;
    }

    /**
     * @return bool true if the attribute is for the game
     */
    public function isGameAttribute() {
        return $this->playerID == 16;
    }

}