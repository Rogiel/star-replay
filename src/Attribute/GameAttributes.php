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

class GameAttributes {

    /**
     * Controller attribute id.
     */
    const CONTROLLER = 500;

    /**
     * Rules attribute id.
     */
    const RULES = 1000;

    /**
     * Is premade game attribute id.
     */
    const IS_PREMADE_GAME = 1001;

    /**
     * Parties private attribute id.
     */
    const PARTIES_PRIVATE = 2000;

    /**
     * Parties premade attribute id.
     */
    const PARTIES_PREMADE = 2001;

    /**
     * Game speed attribute id.
     */
    const GAME_SPEED = 3000;

    /**
     * Lobby delay attribute id.
     */
    const LOBBY_DELAY = 3006;

    /**
     * Game mode attribute id.
     */
    const GAME_MODE = 3009;

    /**
     * Privacy option attribute id.
     */
    const PRIVACY_OPTION = 4000;

    /**
     * Locked alliances attribute id.
     */
    const LOCKED_ALLIANCES = 3010;

}