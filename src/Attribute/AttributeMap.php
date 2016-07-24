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


use Rogiel\MPQ\Stream\Parser\BinaryStreamParser;
use Rogiel\MPQ\Stream\Stream;

class AttributeMap {

    /**
     * In StarCraft 2, game atributes are stored as a player
     */
    const GAME_ATTRIBUTES_PLAYER_ID = 16;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var integer
     */
    private $source;

    /**
     * @var integer
     */
    private $namespace;

    /**
     * @var Attribute[]
     */
    private $attributes;

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct(Stream $stream) {
        $stream = new BinaryStreamParser($stream);

        $this->source = $stream->readByte();
        $this->namespace = $stream->readUInt32();
        $count = $stream->readUInt32();

        for($i = 0; $i<$count; $i++) {
            $namespace = $stream->readUInt32();
            $attrid = $stream->readUInt32();
            $scope = $stream->readByte();
            $value = trim(strrev($stream->readBytes(4)));
            if(!isset($this->attributes[$scope])) {
                $this->attributes[$scope] = array();
            }
            $this->attributes[$scope][$attrid] = new Attribute(
                $attrid, $namespace, $scope, $value
            );
        }

    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Get the player attribute for the given player ID
     *
     * @param $playerID     integer the player ID
     * @param $attributeID  integer the attribute ID
     *
     * @return Attribute|null
     */
    public function getPlayerAttribute($playerID, $attributeID) {
        if(!isset($this->attributes[$playerID])) {
            return NULL;
        }
        $playerScope = $this->attributes[$playerID];
        if(!isset($playerScope[$attributeID])) {
            return NULL;
        }
        return $playerScope[$attributeID];
    }

    /**
     * Get a list of all player attributes for the given player ID
     *
     * @param $playerID     integer the player ID
     *
     * @return Attribute[]
     */
    public function getPlayerAttributes($playerID) {
        if(!isset($this->attributes[$playerID])) {
            return array();
        }
        return $this->attributes[$playerID];
    }

    /**
     * Get the game attribute given by the attribute ID
     *
     * @param $attributeID integer the attribute ID
     *
     * @return null|Attribute
     */
    public function getGameAttribute($attributeID) {
        return $this->getPlayerAttribute(self::GAME_ATTRIBUTES_PLAYER_ID, $attributeID);
    }

    /**
     * Get a list of all game attributes
     *
     * @return Attribute[]
     */
    public function getGameAttributes() {
        return $this->getPlayerAttributes(self::GAME_ATTRIBUTES_PLAYER_ID);
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return int
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * @return int
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes() {
        return $this->attributes;
    }

}