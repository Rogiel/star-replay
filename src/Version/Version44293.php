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

namespace Rogiel\StarReplay\Version;

use Rogiel\StarReplay\Parser\Serializer\Tree\Tree;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\ArrayNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BitArrayNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BlobNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\BooleanNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\ChoiceNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\IntegerNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\FourCCNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\NullNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\OptionalNode;
use Rogiel\StarReplay\Parser\Serializer\Tree\Node\StructNode;

class Version44293 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 44293;
    }

	public function getTree() {
		return self::$TREE;
	}

    public function getGameEventMapping() {
	    return self::$GAME_EVENT_MAPPING;
	}

	public function getMessageEventMapping() {
	    return self::$MESSAGE_EVENT_MAPPING;
	}

	public function getTrackerEventMapping() {
	    return self::$TRACKER_EVENT_MAPPING;
	}

	public function getReplayHeaderNode() {
	    return self::$TREE->getNode(18);
	}

    public function getReplayInitDataNode() {
	    return self::$TREE->getNode(69);
	}

	public function getGameDetailsNode() {
	    return self::$TREE->getNode(40);
	}

	public function getGameEventHeaderNode() {
		return new StructNode(
		    [
                'timestamp' => ['type' => 7],
                'user' => ['type' => 8],
                'event' => ['type' => 0]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}

	public function getMessageEventHeaderNode() {
		return new StructNode(
            [
                'timestamp' => ['type' => 7],
                'user' => ['type' => 8],
                'event' => ['type' => 1]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}

	public function getTrackerEventHeaderNode() {
		return new StructNode(
            [
                'timestamp' => ['type' => 7],
                'event' => ['type' => 2]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}

}

Version44293::$TREE = new Tree([
0 => new IntegerNode(7, 0),
1 => new IntegerNode(4, 0),
2 => new IntegerNode(5, 0),
3 => new IntegerNode(6, 0),
4 => new IntegerNode(14, 0),
5 => new IntegerNode(22, 0),
6 => new IntegerNode(32, 0),
7 => new ChoiceNode(new IntegerNode(2), [
	0 => 3,
	1 => 4,
	2 => 5,
	3 => 6,
]),
8 => new StructNode([
	"userId" => array('type' => 2, 'tag' => -1),
]),
9 => new BlobNode(new IntegerNode(8, 0)),
10 => new IntegerNode(8, 0),
11 => new StructNode([
	"flags" => array('type' => 10, 'tag' => 0),
	"major" => array('type' => 10, 'tag' => 1),
	"minor" => array('type' => 10, 'tag' => 2),
	"revision" => array('type' => 10, 'tag' => 3),
	"build" => array('type' => 6, 'tag' => 4),
	"baseBuild" => array('type' => 6, 'tag' => 5),
],
	'Rogiel\StarReplay\Metadata\Header\Version'
),
12 => new IntegerNode(3, 0),
13 => new BooleanNode(),
14 => new ArrayNode(
	new IntegerNode(0, 16),
	10
),
15 => new OptionalNode(14),
16 => new BlobNode(new IntegerNode(0, 16)),
17 => new StructNode([
	"dataDeprecated" => array('type' => 15, 'tag' => 0),
	"data" => array('type' => 16, 'tag' => 1),
],
	'Rogiel\StarReplay\Metadata\Header\Hash'
),
18 => new StructNode([
	"signature" => array('type' => 9, 'tag' => 0),
	"version" => array('type' => 11, 'tag' => 1),
	"type" => array('type' => 12, 'tag' => 2),
	"elapsedGameLoops" => array('type' => 6, 'tag' => 3),
	"useScaledTime" => array('type' => 13, 'tag' => 4),
	"ngdpRootKey" => array('type' => 17, 'tag' => 5),
	"dataBuildNum" => array('type' => 6, 'tag' => 6),
	"replayCompatibilityHash" => array('type' => 17, 'tag' => 7),
],
	'Rogiel\StarReplay\Metadata\Header\Header'
),
19 => new FourCCNode(),
20 => new BlobNode(new IntegerNode(7, 0)),
21 => new IntegerNode(64, 0),
22 => new StructNode([
	"region" => array('type' => 10, 'tag' => 0),
	"programId" => array('type' => 19, 'tag' => 1),
	"realm" => array('type' => 6, 'tag' => 2),
	"name" => array('type' => 20, 'tag' => 3),
	"id" => array('type' => 21, 'tag' => 4),
],
	'Rogiel\StarReplay\Entity\Toon'
),
23 => new StructNode([
	"a" => array('type' => 10, 'tag' => 0),
	"r" => array('type' => 10, 'tag' => 1),
	"g" => array('type' => 10, 'tag' => 2),
	"b" => array('type' => 10, 'tag' => 3),
],
	'Rogiel\StarReplay\Entity\Color'
),
24 => new IntegerNode(2, 0),
25 => new OptionalNode(10),
26 => new StructNode([
	"name" => array('type' => 9, 'tag' => 0),
	"toon" => array('type' => 22, 'tag' => 1),
	"race" => array('type' => 9, 'tag' => 2),
	"color" => array('type' => 23, 'tag' => 3),
	"control" => array('type' => 10, 'tag' => 4),
	"teamId" => array('type' => 1, 'tag' => 5),
	"handicap" => array('type' => 0, 'tag' => 6),
	"observe" => array('type' => 24, 'tag' => 7),
	"result" => array('type' => 24, 'tag' => 8),
	"workingSetSlotId" => array('type' => 25, 'tag' => 9),
	"hero" => array('type' => 9, 'tag' => 10),
],
	'Rogiel\StarReplay\Entity\Player'
),
27 => new ArrayNode(
	new IntegerNode(5, 0),
	26,
	'Rogiel\StarReplay\Metadata\Match\PlayerList'

),
28 => new OptionalNode(27),
29 => new BlobNode(new IntegerNode(10, 0)),
30 => new BlobNode(new IntegerNode(11, 0)),
31 => new StructNode([
	"file" => array('type' => 30, 'tag' => 0),
],
	'Rogiel\StarReplay\Entity\Thumbnail'
),
32 => new OptionalNode(13),
33 => new IntegerNode(64, -9223372036854775808),
34 => new BlobNode(new IntegerNode(12, 0)),
35 => new BlobNode(new IntegerNode(0, 40)),
36 => new ArrayNode(
	new IntegerNode(6, 0),
	35
),
37 => new OptionalNode(36),
38 => new ArrayNode(
	new IntegerNode(6, 0),
	30
),
39 => new OptionalNode(38),
40 => new StructNode([
	"playerList" => array('type' => 28, 'tag' => 0),
	"title" => array('type' => 29, 'tag' => 1),
	"difficulty" => array('type' => 9, 'tag' => 2),
	"thumbnail" => array('type' => 31, 'tag' => 3),
	"isBlizzardMap" => array('type' => 13, 'tag' => 4),
	"restartAsTransitionMap" => array('type' => 32, 'tag' => 16),
	"timeUTC" => array('type' => 33, 'tag' => 5),
	"timeLocalOffset" => array('type' => 33, 'tag' => 6),
	"description" => array('type' => 34, 'tag' => 7),
	"imageFilePath" => array('type' => 30, 'tag' => 8),
	"campaignIndex" => array('type' => 10, 'tag' => 15),
	"mapFileName" => array('type' => 30, 'tag' => 9),
	"cacheHandles" => array('type' => 37, 'tag' => 10),
	"miniSave" => array('type' => 13, 'tag' => 11),
	"gameSpeed" => array('type' => 12, 'tag' => 12),
	"defaultDifficulty" => array('type' => 3, 'tag' => 13),
	"modPaths" => array('type' => 39, 'tag' => 14),
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
41 => new OptionalNode(9),
42 => new OptionalNode(35),
43 => new OptionalNode(6),
44 => new StructNode([
	"race" => array('type' => 25, 'tag' => -1),
]),
45 => new StructNode([
	"team" => array('type' => 25, 'tag' => -1),
]),
46 => new BlobNode(new IntegerNode(9, 0)),
47 => new StructNode([
	"name" => array('type' => 9, 'tag' => -18),
	"clanTag" => array('type' => 41, 'tag' => -17),
	"clanLogo" => array('type' => 42, 'tag' => -16),
	"highestLeague" => array('type' => 25, 'tag' => -15),
	"combinedRaceLevels" => array('type' => 43, 'tag' => -14),
	"randomSeed" => array('type' => 6, 'tag' => -13),
	"racePreference" => array('type' => 44, 'tag' => -12),
	"teamPreference" => array('type' => 45, 'tag' => -11),
	"testMap" => array('type' => 13, 'tag' => -10),
	"testAuto" => array('type' => 13, 'tag' => -9),
	"examine" => array('type' => 13, 'tag' => -8),
	"customInterface" => array('type' => 13, 'tag' => -7),
	"testType" => array('type' => 6, 'tag' => -6),
	"observe" => array('type' => 24, 'tag' => -5),
	"hero" => array('type' => 46, 'tag' => -4),
	"skin" => array('type' => 46, 'tag' => -3),
	"mount" => array('type' => 46, 'tag' => -2),
	"toonHandle" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
48 => new ArrayNode(
	new IntegerNode(5, 0),
	47,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
49 => new StructNode([
	"lockTeams" => array('type' => 13, 'tag' => -15),
	"teamsTogether" => array('type' => 13, 'tag' => -14),
	"advancedSharedControl" => array('type' => 13, 'tag' => -13),
	"randomRaces" => array('type' => 13, 'tag' => -12),
	"battleNet" => array('type' => 13, 'tag' => -11),
	"amm" => array('type' => 13, 'tag' => -10),
	"competitive" => array('type' => 13, 'tag' => -9),
	"practice" => array('type' => 13, 'tag' => -8),
	"cooperative" => array('type' => 13, 'tag' => -7),
	"noVictoryOrDefeat" => array('type' => 13, 'tag' => -6),
	"heroDuplicatesAllowed" => array('type' => 13, 'tag' => -5),
	"fog" => array('type' => 24, 'tag' => -4),
	"observers" => array('type' => 24, 'tag' => -3),
	"userDifficulty" => array('type' => 24, 'tag' => -2),
	"clientDebugFlags" => array('type' => 21, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameOptions'
),
50 => new IntegerNode(4, 1),
51 => new IntegerNode(8, 1),
52 => new BitArrayNode(
	new IntegerNode(6, 0)
),
53 => new BitArrayNode(
	new IntegerNode(8, 0)
),
54 => new BitArrayNode(
	new IntegerNode(2, 0)
),
55 => new StructNode([
	"allowedColors" => array('type' => 52, 'tag' => -6),
	"allowedRaces" => array('type' => 53, 'tag' => -5),
	"allowedDifficulty" => array('type' => 52, 'tag' => -4),
	"allowedControls" => array('type' => 53, 'tag' => -3),
	"allowedObserveTypes" => array('type' => 54, 'tag' => -2),
	"allowedAIBuilds" => array('type' => 53, 'tag' => -1),
]),
56 => new ArrayNode(
	new IntegerNode(5, 0),
	55
),
57 => new StructNode([
	"randomValue" => array('type' => 6, 'tag' => -27),
	"gameCacheName" => array('type' => 29, 'tag' => -26),
	"gameOptions" => array('type' => 49, 'tag' => -25),
	"gameSpeed" => array('type' => 12, 'tag' => -24),
	"gameType" => array('type' => 12, 'tag' => -23),
	"maxUsers" => array('type' => 2, 'tag' => -22),
	"maxObservers" => array('type' => 2, 'tag' => -21),
	"maxPlayers" => array('type' => 2, 'tag' => -20),
	"maxTeams" => array('type' => 50, 'tag' => -19),
	"maxColors" => array('type' => 3, 'tag' => -18),
	"maxRaces" => array('type' => 51, 'tag' => -17),
	"maxControls" => array('type' => 10, 'tag' => -16),
	"mapSizeX" => array('type' => 10, 'tag' => -15),
	"mapSizeY" => array('type' => 10, 'tag' => -14),
	"mapFileSyncChecksum" => array('type' => 6, 'tag' => -13),
	"mapFileName" => array('type' => 30, 'tag' => -12),
	"mapAuthorName" => array('type' => 9, 'tag' => -11),
	"modFileSyncChecksum" => array('type' => 6, 'tag' => -10),
	"slotDescriptions" => array('type' => 56, 'tag' => -9),
	"defaultDifficulty" => array('type' => 3, 'tag' => -8),
	"defaultAIBuild" => array('type' => 10, 'tag' => -7),
	"cacheHandles" => array('type' => 36, 'tag' => -6),
	"hasExtensionMod" => array('type' => 13, 'tag' => -5),
	"hasNonBlizzardExtensionMod" => array('type' => 13, 'tag' => -4),
	"isBlizzardMap" => array('type' => 13, 'tag' => -3),
	"isPremadeFFA" => array('type' => 13, 'tag' => -2),
	"isCoopMode" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
58 => new OptionalNode(1),
59 => new OptionalNode(2),
60 => new StructNode([
	"color" => array('type' => 59, 'tag' => -1),
]),
61 => new ArrayNode(
	new IntegerNode(4, 0),
	46
),
62 => new ArrayNode(
	new IntegerNode(17, 0),
	6
),
63 => new ArrayNode(
	new IntegerNode(9, 0),
	6
),
64 => new ArrayNode(
	new IntegerNode(3, 0),
	6
),
65 => new StructNode([
	"control" => array('type' => 10, 'tag' => -25),
	"userId" => array('type' => 58, 'tag' => -24),
	"teamId" => array('type' => 1, 'tag' => -23),
	"colorPref" => array('type' => 60, 'tag' => -22),
	"racePref" => array('type' => 44, 'tag' => -21),
	"difficulty" => array('type' => 3, 'tag' => -20),
	"aiBuild" => array('type' => 10, 'tag' => -19),
	"handicap" => array('type' => 0, 'tag' => -18),
	"observe" => array('type' => 24, 'tag' => -17),
	"logoIndex" => array('type' => 6, 'tag' => -16),
	"hero" => array('type' => 46, 'tag' => -15),
	"skin" => array('type' => 46, 'tag' => -14),
	"mount" => array('type' => 46, 'tag' => -13),
	"artifacts" => array('type' => 61, 'tag' => -12),
	"workingSetSlotId" => array('type' => 25, 'tag' => -11),
	"rewards" => array('type' => 62, 'tag' => -10),
	"toonHandle" => array('type' => 20, 'tag' => -9),
	"licenses" => array('type' => 63, 'tag' => -8),
	"tandemLeaderId" => array('type' => 58, 'tag' => -7),
	"commander" => array('type' => 46, 'tag' => -6),
	"commanderLevel" => array('type' => 6, 'tag' => -5),
	"hasSilencePenalty" => array('type' => 13, 'tag' => -4),
	"tandemId" => array('type' => 58, 'tag' => -3),
	"commanderMasteryLevel" => array('type' => 6, 'tag' => -2),
	"commanderMasteryTalents" => array('type' => 64, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbySlot'
),
66 => new ArrayNode(
	new IntegerNode(5, 0),
	65
),
67 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -11),
	"maxUsers" => array('type' => 2, 'tag' => -10),
	"maxObservers" => array('type' => 2, 'tag' => -9),
	"slots" => array('type' => 66, 'tag' => -8),
	"randomSeed" => array('type' => 6, 'tag' => -7),
	"hostUserId" => array('type' => 58, 'tag' => -6),
	"isSinglePlayer" => array('type' => 13, 'tag' => -5),
	"pickedMapTag" => array('type' => 10, 'tag' => -4),
	"gameDuration" => array('type' => 6, 'tag' => -3),
	"defaultDifficulty" => array('type' => 3, 'tag' => -2),
	"defaultAIBuild" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
68 => new StructNode([
	"userInitialData" => array('type' => 48, 'tag' => -3),
	"gameDescription" => array('type' => 57, 'tag' => -2),
	"lobbyState" => array('type' => 67, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
69 => new StructNode([
	"syncLobbyState" => array('type' => 68, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
70 => new StructNode([
	"name" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
71 => new BlobNode(new IntegerNode(6, 0)),
72 => new StructNode([
	"name" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
73 => new StructNode([
	"name" => array('type' => 71, 'tag' => -3),
	"type" => array('type' => 6, 'tag' => -2),
	"data" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
74 => new StructNode([
	"type" => array('type' => 6, 'tag' => -3),
	"name" => array('type' => 71, 'tag' => -2),
	"data" => array('type' => 34, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
75 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
76 => new StructNode([
	"signature" => array('type' => 75, 'tag' => -2),
	"toonHandle" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
77 => new StructNode([
	"gameFullyDownloaded" => array('type' => 13, 'tag' => -14),
	"developmentCheatsEnabled" => array('type' => 13, 'tag' => -13),
	"testCheatsEnabled" => array('type' => 13, 'tag' => -12),
	"multiplayerCheatsEnabled" => array('type' => 13, 'tag' => -11),
	"syncChecksummingEnabled" => array('type' => 13, 'tag' => -10),
	"isMapToMapTransition" => array('type' => 13, 'tag' => -9),
	"debugPauseEnabled" => array('type' => 13, 'tag' => -8),
	"useGalaxyAsserts" => array('type' => 13, 'tag' => -7),
	"platformMac" => array('type' => 13, 'tag' => -6),
	"cameraFollow" => array('type' => 13, 'tag' => -5),
	"baseBuildNum" => array('type' => 6, 'tag' => -4),
	"buildNum" => array('type' => 6, 'tag' => -3),
	"versionFlags" => array('type' => 6, 'tag' => -2),
	"hotkeyProfile" => array('type' => 46, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
78 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
79 => new IntegerNode(16, 0),
80 => new StructNode([
	"x" => array('type' => 79, 'tag' => -2),
	"y" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
81 => new StructNode([
	"which" => array('type' => 12, 'tag' => -2),
	"target" => array('type' => 80, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraSaveEvent'
),
82 => new StructNode([
	"fileName" => array('type' => 30, 'tag' => -5),
	"automatic" => array('type' => 13, 'tag' => -4),
	"overwrite" => array('type' => 13, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
83 => new StructNode([
	"sequence" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CommandManagerResetEvent'
),
84 => new IntegerNode(32, -2147483648),
85 => new StructNode([
	"x" => array('type' => 84, 'tag' => -2),
	"y" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
86 => new StructNode([
	"point" => array('type' => 85, 'tag' => -4),
	"time" => array('type' => 84, 'tag' => -3),
	"verb" => array('type' => 29, 'tag' => -2),
	"arguments" => array('type' => 29, 'tag' => -1),
]),
87 => new StructNode([
	"data" => array('type' => 86, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
88 => new IntegerNode(25, 0),
89 => new StructNode([
	"abilLink" => array('type' => 79, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"abilCmdData" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
90 => new OptionalNode(89),
91 => new NullNode(),
92 => new IntegerNode(20, 0),
93 => new StructNode([
	"x" => array('type' => 92, 'tag' => -3),
	"y" => array('type' => 92, 'tag' => -2),
	"z" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
94 => new StructNode([
	"targetUnitFlags" => array('type' => 79, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 6, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 79, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 58, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 58, 'tag' => -2),
	"snapshotPoint" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
95 => new ChoiceNode(new IntegerNode(2), [
	0 => 91,
	1 => 93,
	2 => 94,
	3 => 6,
]),
96 => new IntegerNode(32, 1),
97 => new StructNode([
	"cmdFlags" => array('type' => 88, 'tag' => -6),
	"abil" => array('type' => 90, 'tag' => -5),
	"data" => array('type' => 95, 'tag' => -4),
	"sequence" => array('type' => 96, 'tag' => -3),
	"otherUnit" => array('type' => 43, 'tag' => -2),
	"unitGroup" => array('type' => 43, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
98 => new IntegerNode(9, 0),
99 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
100 => new ArrayNode(
	new IntegerNode(9, 0),
	98,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
101 => new ChoiceNode(new IntegerNode(2), [
	0 => 91,
	1 => 99,
	2 => 100,
	3 => 100,
]),
102 => new StructNode([
	"unitLink" => array('type' => 79, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 98, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
103 => new ArrayNode(
	new IntegerNode(9, 0),
	102
),
104 => new StructNode([
	"subgroupIndex" => array('type' => 98, 'tag' => -4),
	"removeMask" => array('type' => 101, 'tag' => -3),
	"addSubgroups" => array('type' => 103, 'tag' => -2),
	"addUnitTags" => array('type' => 63, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
105 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 104, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
106 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 12, 'tag' => -2),
	"mask" => array('type' => 101, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
107 => new StructNode([
	"count" => array('type' => 98, 'tag' => -6),
	"subgroupCount" => array('type' => 98, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 98, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 6, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 6, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 6, 'tag' => -1),
]),
108 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 107, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
109 => new ArrayNode(
	new IntegerNode(3, 0),
	84,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
110 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 109, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
111 => new StructNode([
	"chatMessage" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
112 => new IntegerNode(8, -128),
113 => new StructNode([
	"x" => array('type' => 84, 'tag' => -3),
	"y" => array('type' => 84, 'tag' => -2),
	"z" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
114 => new StructNode([
	"beacon" => array('type' => 112, 'tag' => -9),
	"ally" => array('type' => 112, 'tag' => -8),
	"flags" => array('type' => 112, 'tag' => -7),
	"build" => array('type' => 112, 'tag' => -6),
	"targetUnitTag" => array('type' => 6, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 79, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 112, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 112, 'tag' => -2),
	"targetPoint" => array('type' => 113, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
115 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
116 => new StructNode([
	"delta" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
117 => new StructNode([
	"point" => array('type' => 85, 'tag' => -9),
	"unit" => array('type' => 6, 'tag' => -8),
	"unitLink" => array('type' => 79, 'tag' => -7),
	"unitControlPlayerId" => array('type' => 58, 'tag' => -6),
	"unitUpkeepPlayerId" => array('type' => 58, 'tag' => -5),
	"unitPosition" => array('type' => 93, 'tag' => -4),
	"unitIsUnderConstruction" => array('type' => 13, 'tag' => -3),
	"pingedMinimap" => array('type' => 13, 'tag' => -2),
	"option" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
118 => new StructNode([
	"verb" => array('type' => 29, 'tag' => -2),
	"arguments" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
119 => new StructNode([
	"alliance" => array('type' => 6, 'tag' => -2),
	"control" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
120 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
121 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
122 => new StructNode([
	"conversationId" => array('type' => 84, 'tag' => -2),
	"replyId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
123 => new OptionalNode(20),
124 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -6),
	"observe" => array('type' => 24, 'tag' => -5),
	"name" => array('type' => 9, 'tag' => -4),
	"toonHandle" => array('type' => 123, 'tag' => -3),
	"clanTag" => array('type' => 41, 'tag' => -2),
	"clanLogo" => array('type' => 42, 'tag' => -1),
]),
125 => new ArrayNode(
	new IntegerNode(5, 0),
	124
),
126 => new IntegerNode(1, 0),
127 => new StructNode([
	"userInfos" => array('type' => 125, 'tag' => -2),
	"method" => array('type' => 126, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
128 => new StructNode([
	"purchaseItemId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
129 => new StructNode([
	"difficultyLevel" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
130 => new ChoiceNode(new IntegerNode(3), [
	0 => 91,
	1 => 13,
	2 => 6,
	3 => 84,
	4 => 30,
	5 => 6,
]),
131 => new StructNode([
	"controlId" => array('type' => 84, 'tag' => -3),
	"eventType" => array('type' => 84, 'tag' => -2),
	"eventData" => array('type' => 130, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
132 => new StructNode([
	"soundHash" => array('type' => 6, 'tag' => -2),
	"length" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
133 => new ArrayNode(
	new IntegerNode(7, 0),
	6
),
134 => new StructNode([
	"soundHash" => array('type' => 133, 'tag' => -2),
	"length" => array('type' => 133, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
135 => new StructNode([
	"syncInfo" => array('type' => 134, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
136 => new StructNode([
	"queryId" => array('type' => 79, 'tag' => -3),
	"lengthMs" => array('type' => 6, 'tag' => -2),
	"finishGameLoop" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimLengthQueryByNameEvent'
),
137 => new StructNode([
	"queryId" => array('type' => 79, 'tag' => -2),
	"lengthMs" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimLengthQueryByPropsEvent'
),
138 => new StructNode([
	"animWaitQueryId" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimOffsetEvent'
),
139 => new StructNode([
	"sound" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
140 => new StructNode([
	"transmissionId" => array('type' => 84, 'tag' => -2),
	"thread" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
141 => new StructNode([
	"transmissionId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
142 => new OptionalNode(80),
143 => new OptionalNode(79),
144 => new OptionalNode(112),
145 => new StructNode([
	"target" => array('type' => 142, 'tag' => -6),
	"distance" => array('type' => 143, 'tag' => -5),
	"pitch" => array('type' => 143, 'tag' => -4),
	"yaw" => array('type' => 143, 'tag' => -3),
	"reason" => array('type' => 144, 'tag' => -2),
	"follow" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
146 => new StructNode([
	"skipType" => array('type' => 126, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
147 => new IntegerNode(11, 0),
148 => new StructNode([
	"x" => array('type' => 147, 'tag' => -2),
	"y" => array('type' => 147, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
149 => new StructNode([
	"button" => array('type' => 6, 'tag' => -5),
	"down" => array('type' => 13, 'tag' => -4),
	"posUI" => array('type' => 148, 'tag' => -3),
	"posWorld" => array('type' => 93, 'tag' => -2),
	"flags" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
150 => new StructNode([
	"posUI" => array('type' => 148, 'tag' => -3),
	"posWorld" => array('type' => 93, 'tag' => -2),
	"flags" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
151 => new StructNode([
	"achievementLink" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
152 => new StructNode([
	"hotkey" => array('type' => 6, 'tag' => -2),
	"down" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerHotkeyPressedEvent'
),
153 => new StructNode([
	"abilLink" => array('type' => 79, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"state" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
154 => new StructNode([
	"soundtrack" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
155 => new StructNode([
	"planetId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
156 => new StructNode([
	"key" => array('type' => 112, 'tag' => -2),
	"flags" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
157 => new StructNode([
	"resources" => array('type' => 109, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
158 => new StructNode([
	"fulfillRequestId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
159 => new StructNode([
	"cancelRequestId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
160 => new StructNode([
	"error" => array('type' => 84, 'tag' => -2),
	"abil" => array('type' => 90, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCommandErrorEvent'
),
161 => new StructNode([
	"researchItemId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
162 => new StructNode([
	"mercenaryId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
163 => new StructNode([
	"battleReportId" => array('type' => 84, 'tag' => -2),
	"difficultyLevel" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
164 => new StructNode([
	"battleReportId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
165 => new StructNode([
	"decrementSeconds" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
166 => new StructNode([
	"portraitId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
167 => new StructNode([
	"functionName" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
168 => new StructNode([
	"result" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
169 => new StructNode([
	"gameMenuItemIndex" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
170 => new IntegerNode(16, -32768),
171 => new StructNode([
	"wheelSpin" => array('type' => 170, 'tag' => -2),
	"flags" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseWheelEvent'
),
172 => new StructNode([
	"purchaseCategoryId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
173 => new StructNode([
	"button" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
174 => new StructNode([
	"cutsceneId" => array('type' => 84, 'tag' => -2),
	"bookmarkName" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
175 => new StructNode([
	"cutsceneId" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
176 => new StructNode([
	"cutsceneId" => array('type' => 84, 'tag' => -3),
	"conversationLine" => array('type' => 20, 'tag' => -2),
	"altConversationLine" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
177 => new StructNode([
	"cutsceneId" => array('type' => 84, 'tag' => -2),
	"conversationLine" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
178 => new StructNode([
	"leaveReason" => array('type' => 1, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserLeaveEvent'
),
179 => new StructNode([
	"observe" => array('type' => 24, 'tag' => -7),
	"name" => array('type' => 9, 'tag' => -6),
	"toonHandle" => array('type' => 123, 'tag' => -5),
	"clanTag" => array('type' => 41, 'tag' => -4),
	"clanLogo" => array('type' => 42, 'tag' => -3),
	"hijack" => array('type' => 13, 'tag' => -2),
	"hijackCloneGameUserId" => array('type' => 58, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
180 => new OptionalNode(96),
181 => new StructNode([
	"state" => array('type' => 24, 'tag' => -2),
	"sequence" => array('type' => 180, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CommandManagerStateEvent'
),
182 => new StructNode([
	"target" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdUpdateTargetPointEvent'
),
183 => new StructNode([
	"target" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdUpdateTargetUnitEvent'
),
184 => new StructNode([
	"catalog" => array('type' => 10, 'tag' => -4),
	"entry" => array('type' => 79, 'tag' => -3),
	"field" => array('type' => 9, 'tag' => -2),
	"value" => array('type' => 9, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CatalogModifyEvent'
),
185 => new StructNode([
	"index" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HeroTalentTreeSelectedEvent'
),
186 => new StructNode([
	"shown" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HeroTalentTreeSelectionPanelToggledEvent'
),
187 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 30, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
188 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
189 => new StructNode([
	"progress" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
190 => new StructNode([
	"status" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ReconnectNotifyMessage'
),
191 => new StructNode([
	"scoreValueMineralsCurrent" => array('type' => 84, 'tag' => 0),
	"scoreValueVespeneCurrent" => array('type' => 84, 'tag' => 1),
	"scoreValueMineralsCollectionRate" => array('type' => 84, 'tag' => 2),
	"scoreValueVespeneCollectionRate" => array('type' => 84, 'tag' => 3),
	"scoreValueWorkersActiveCount" => array('type' => 84, 'tag' => 4),
	"scoreValueMineralsUsedInProgressArmy" => array('type' => 84, 'tag' => 5),
	"scoreValueMineralsUsedInProgressEconomy" => array('type' => 84, 'tag' => 6),
	"scoreValueMineralsUsedInProgressTechnology" => array('type' => 84, 'tag' => 7),
	"scoreValueVespeneUsedInProgressArmy" => array('type' => 84, 'tag' => 8),
	"scoreValueVespeneUsedInProgressEconomy" => array('type' => 84, 'tag' => 9),
	"scoreValueVespeneUsedInProgressTechnology" => array('type' => 84, 'tag' => 10),
	"scoreValueMineralsUsedCurrentArmy" => array('type' => 84, 'tag' => 11),
	"scoreValueMineralsUsedCurrentEconomy" => array('type' => 84, 'tag' => 12),
	"scoreValueMineralsUsedCurrentTechnology" => array('type' => 84, 'tag' => 13),
	"scoreValueVespeneUsedCurrentArmy" => array('type' => 84, 'tag' => 14),
	"scoreValueVespeneUsedCurrentEconomy" => array('type' => 84, 'tag' => 15),
	"scoreValueVespeneUsedCurrentTechnology" => array('type' => 84, 'tag' => 16),
	"scoreValueMineralsLostArmy" => array('type' => 84, 'tag' => 17),
	"scoreValueMineralsLostEconomy" => array('type' => 84, 'tag' => 18),
	"scoreValueMineralsLostTechnology" => array('type' => 84, 'tag' => 19),
	"scoreValueVespeneLostArmy" => array('type' => 84, 'tag' => 20),
	"scoreValueVespeneLostEconomy" => array('type' => 84, 'tag' => 21),
	"scoreValueVespeneLostTechnology" => array('type' => 84, 'tag' => 22),
	"scoreValueMineralsKilledArmy" => array('type' => 84, 'tag' => 23),
	"scoreValueMineralsKilledEconomy" => array('type' => 84, 'tag' => 24),
	"scoreValueMineralsKilledTechnology" => array('type' => 84, 'tag' => 25),
	"scoreValueVespeneKilledArmy" => array('type' => 84, 'tag' => 26),
	"scoreValueVespeneKilledEconomy" => array('type' => 84, 'tag' => 27),
	"scoreValueVespeneKilledTechnology" => array('type' => 84, 'tag' => 28),
	"scoreValueFoodUsed" => array('type' => 84, 'tag' => 29),
	"scoreValueFoodMade" => array('type' => 84, 'tag' => 30),
	"scoreValueMineralsUsedActiveForces" => array('type' => 84, 'tag' => 31),
	"scoreValueVespeneUsedActiveForces" => array('type' => 84, 'tag' => 32),
	"scoreValueMineralsFriendlyFireArmy" => array('type' => 84, 'tag' => 33),
	"scoreValueMineralsFriendlyFireEconomy" => array('type' => 84, 'tag' => 34),
	"scoreValueMineralsFriendlyFireTechnology" => array('type' => 84, 'tag' => 35),
	"scoreValueVespeneFriendlyFireArmy" => array('type' => 84, 'tag' => 36),
	"scoreValueVespeneFriendlyFireEconomy" => array('type' => 84, 'tag' => 37),
	"scoreValueVespeneFriendlyFireTechnology" => array('type' => 84, 'tag' => 38),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStats'
),
192 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"stats" => array('type' => 191, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStatsEvent'
),
193 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 29, 'tag' => 2),
	"controlPlayerId" => array('type' => 1, 'tag' => 3),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 4),
	"x" => array('type' => 10, 'tag' => 5),
	"y" => array('type' => 10, 'tag' => 6),
],
	'Rogiel\StarReplay\Event\Tracker\UnitInitEvent'
),
194 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"killerPlayerId" => array('type' => 58, 'tag' => 2),
	"x" => array('type' => 10, 'tag' => 3),
	"y" => array('type' => 10, 'tag' => 4),
	"killerUnitTagIndex" => array('type' => 43, 'tag' => 5),
	"killerUnitTagRecycle" => array('type' => 43, 'tag' => 6),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDiedEvent'
),
195 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"controlPlayerId" => array('type' => 1, 'tag' => 2),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\UnitOwnerChangeEvent'
),
196 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 29, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UnitTypeChangeEvent'
),
197 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"upgradeTypeName" => array('type' => 29, 'tag' => 1),
	"count" => array('type' => 84, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UpgradeEvent'
),
198 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDoneEvent'
),
199 => new ArrayNode(
	new IntegerNode(10, 0),
	84,
	'Rogiel\StarReplay\Event\Tracker\UnitPositions'

),
200 => new StructNode([
	"firstUnitIndex" => array('type' => 6, 'tag' => 0),
	"items" => array('type' => 199, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent'
),
201 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"type" => array('type' => 6, 'tag' => 1),
	"userId" => array('type' => 43, 'tag' => 2),
	"slotId" => array('type' => 43, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerSetupEvent'
),
]
);
Version44293::$GAME_EVENT_MAPPING = [
	5 => 78,
	7 => 77,
	9 => 70,
	10 => 72,
	11 => 73,
	12 => 74,
	13 => 76,
	14 => 81,
	21 => 82,
	22 => 78,
	23 => 78,
	25 => 83,
	26 => 87,
	27 => 97,
	28 => 105,
	29 => 106,
	30 => 108,
	31 => 110,
	32 => 111,
	33 => 114,
	34 => 115,
	35 => 116,
	36 => 117,
	37 => 118,
	38 => 119,
	39 => 120,
	40 => 121,
	41 => 122,
	43 => 127,
	44 => 78,
	45 => 132,
	46 => 139,
	47 => 140,
	48 => 141,
	49 => 145,
	50 => 78,
	51 => 128,
	52 => 78,
	53 => 129,
	54 => 78,
	55 => 131,
	56 => 135,
	57 => 146,
	58 => 149,
	59 => 150,
	60 => 151,
	61 => 152,
	62 => 153,
	63 => 78,
	64 => 154,
	65 => 155,
	66 => 156,
	67 => 167,
	68 => 78,
	69 => 78,
	70 => 157,
	71 => 158,
	72 => 159,
	73 => 78,
	74 => 78,
	75 => 161,
	76 => 160,
	77 => 78,
	78 => 78,
	79 => 162,
	80 => 78,
	81 => 78,
	82 => 163,
	83 => 164,
	84 => 164,
	85 => 129,
	86 => 78,
	87 => 78,
	88 => 165,
	89 => 166,
	90 => 168,
	91 => 169,
	92 => 171,
	93 => 128,
	94 => 172,
	95 => 173,
	96 => 78,
	97 => 174,
	98 => 175,
	99 => 176,
	100 => 177,
	101 => 178,
	102 => 179,
	103 => 181,
	104 => 182,
	105 => 183,
	106 => 136,
	107 => 137,
	108 => 138,
	109 => 184,
	110 => 185,
	111 => 78,
	112 => 186,
];
Version44293::$MESSAGE_EVENT_MAPPING = [
	0 => 187,
	1 => 188,
	2 => 189,
	3 => 78,
	4 => 190,
];
Version44293::$TRACKER_EVENT_MAPPING = [
	0 => 192,
	1 => 193,
	2 => 194,
	3 => 195,
	4 => 196,
	5 => 197,
	6 => 193,
	7 => 198,
	8 => 200,
	9 => 201,
];
