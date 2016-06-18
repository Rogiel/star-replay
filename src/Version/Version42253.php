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

class Version42253 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 42253;
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
	    return self::$TREE->getNode(68);
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

Version42253::$TREE = new Tree([
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
	"randomValue" => array('type' => 6, 'tag' => -26),
	"gameCacheName" => array('type' => 29, 'tag' => -25),
	"gameOptions" => array('type' => 49, 'tag' => -24),
	"gameSpeed" => array('type' => 12, 'tag' => -23),
	"gameType" => array('type' => 12, 'tag' => -22),
	"maxUsers" => array('type' => 2, 'tag' => -21),
	"maxObservers" => array('type' => 2, 'tag' => -20),
	"maxPlayers" => array('type' => 2, 'tag' => -19),
	"maxTeams" => array('type' => 50, 'tag' => -18),
	"maxColors" => array('type' => 3, 'tag' => -17),
	"maxRaces" => array('type' => 51, 'tag' => -16),
	"maxControls" => array('type' => 10, 'tag' => -15),
	"mapSizeX" => array('type' => 10, 'tag' => -14),
	"mapSizeY" => array('type' => 10, 'tag' => -13),
	"mapFileSyncChecksum" => array('type' => 6, 'tag' => -12),
	"mapFileName" => array('type' => 30, 'tag' => -11),
	"mapAuthorName" => array('type' => 9, 'tag' => -10),
	"modFileSyncChecksum" => array('type' => 6, 'tag' => -9),
	"slotDescriptions" => array('type' => 56, 'tag' => -8),
	"defaultDifficulty" => array('type' => 3, 'tag' => -7),
	"defaultAIBuild" => array('type' => 10, 'tag' => -6),
	"cacheHandles" => array('type' => 36, 'tag' => -5),
	"hasExtensionMod" => array('type' => 13, 'tag' => -4),
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
64 => new StructNode([
	"control" => array('type' => 10, 'tag' => -23),
	"userId" => array('type' => 58, 'tag' => -22),
	"teamId" => array('type' => 1, 'tag' => -21),
	"colorPref" => array('type' => 60, 'tag' => -20),
	"racePref" => array('type' => 44, 'tag' => -19),
	"difficulty" => array('type' => 3, 'tag' => -18),
	"aiBuild" => array('type' => 10, 'tag' => -17),
	"handicap" => array('type' => 0, 'tag' => -16),
	"observe" => array('type' => 24, 'tag' => -15),
	"logoIndex" => array('type' => 6, 'tag' => -14),
	"hero" => array('type' => 46, 'tag' => -13),
	"skin" => array('type' => 46, 'tag' => -12),
	"mount" => array('type' => 46, 'tag' => -11),
	"artifacts" => array('type' => 61, 'tag' => -10),
	"workingSetSlotId" => array('type' => 25, 'tag' => -9),
	"rewards" => array('type' => 62, 'tag' => -8),
	"toonHandle" => array('type' => 20, 'tag' => -7),
	"licenses" => array('type' => 63, 'tag' => -6),
	"tandemLeaderId" => array('type' => 58, 'tag' => -5),
	"commander" => array('type' => 46, 'tag' => -4),
	"commanderLevel" => array('type' => 6, 'tag' => -3),
	"hasSilencePenalty" => array('type' => 13, 'tag' => -2),
	"tandemId" => array('type' => 58, 'tag' => -1),
]),
65 => new ArrayNode(
	new IntegerNode(5, 0),
	64
),
66 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -11),
	"maxUsers" => array('type' => 2, 'tag' => -10),
	"maxObservers" => array('type' => 2, 'tag' => -9),
	"slots" => array('type' => 65, 'tag' => -8),
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
67 => new StructNode([
	"userInitialData" => array('type' => 48, 'tag' => -3),
	"gameDescription" => array('type' => 57, 'tag' => -2),
	"lobbyState" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
68 => new StructNode([
	"syncLobbyState" => array('type' => 67, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
69 => new StructNode([
	"name" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
70 => new BlobNode(new IntegerNode(6, 0)),
71 => new StructNode([
	"name" => array('type' => 70, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
72 => new StructNode([
	"name" => array('type' => 70, 'tag' => -3),
	"type" => array('type' => 6, 'tag' => -2),
	"data" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
73 => new StructNode([
	"type" => array('type' => 6, 'tag' => -3),
	"name" => array('type' => 70, 'tag' => -2),
	"data" => array('type' => 34, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
74 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
75 => new StructNode([
	"signature" => array('type' => 74, 'tag' => -2),
	"toonHandle" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
76 => new StructNode([
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
77 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
78 => new IntegerNode(16, 0),
79 => new StructNode([
	"x" => array('type' => 78, 'tag' => -2),
	"y" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
80 => new StructNode([
	"which" => array('type' => 12, 'tag' => -2),
	"target" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraSaveEvent'
),
81 => new StructNode([
	"fileName" => array('type' => 30, 'tag' => -5),
	"automatic" => array('type' => 13, 'tag' => -4),
	"overwrite" => array('type' => 13, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
82 => new StructNode([
	"sequence" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CommandManagerResetEvent'
),
83 => new IntegerNode(32, -2147483648),
84 => new StructNode([
	"x" => array('type' => 83, 'tag' => -2),
	"y" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
85 => new StructNode([
	"point" => array('type' => 84, 'tag' => -4),
	"time" => array('type' => 83, 'tag' => -3),
	"verb" => array('type' => 29, 'tag' => -2),
	"arguments" => array('type' => 29, 'tag' => -1),
]),
86 => new StructNode([
	"data" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
87 => new IntegerNode(25, 0),
88 => new StructNode([
	"abilLink" => array('type' => 78, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"abilCmdData" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
89 => new OptionalNode(88),
90 => new NullNode(),
91 => new IntegerNode(20, 0),
92 => new StructNode([
	"x" => array('type' => 91, 'tag' => -3),
	"y" => array('type' => 91, 'tag' => -2),
	"z" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
93 => new StructNode([
	"targetUnitFlags" => array('type' => 78, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 6, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 78, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 58, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 58, 'tag' => -2),
	"snapshotPoint" => array('type' => 92, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
94 => new ChoiceNode(new IntegerNode(2), [
	0 => 90,
	1 => 92,
	2 => 93,
	3 => 6,
]),
95 => new IntegerNode(32, 1),
96 => new StructNode([
	"cmdFlags" => array('type' => 87, 'tag' => -6),
	"abil" => array('type' => 89, 'tag' => -5),
	"data" => array('type' => 94, 'tag' => -4),
	"sequence" => array('type' => 95, 'tag' => -3),
	"otherUnit" => array('type' => 43, 'tag' => -2),
	"unitGroup" => array('type' => 43, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
97 => new IntegerNode(9, 0),
98 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
99 => new ArrayNode(
	new IntegerNode(9, 0),
	97,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
100 => new ChoiceNode(new IntegerNode(2), [
	0 => 90,
	1 => 98,
	2 => 99,
	3 => 99,
]),
101 => new StructNode([
	"unitLink" => array('type' => 78, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 97, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
102 => new ArrayNode(
	new IntegerNode(9, 0),
	101
),
103 => new StructNode([
	"subgroupIndex" => array('type' => 97, 'tag' => -4),
	"removeMask" => array('type' => 100, 'tag' => -3),
	"addSubgroups" => array('type' => 102, 'tag' => -2),
	"addUnitTags" => array('type' => 63, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
104 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
105 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 12, 'tag' => -2),
	"mask" => array('type' => 100, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
106 => new StructNode([
	"count" => array('type' => 97, 'tag' => -6),
	"subgroupCount" => array('type' => 97, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 97, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 6, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 6, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 6, 'tag' => -1),
]),
107 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 106, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
108 => new ArrayNode(
	new IntegerNode(3, 0),
	83,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
109 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 108, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
110 => new StructNode([
	"chatMessage" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
111 => new IntegerNode(8, -128),
112 => new StructNode([
	"x" => array('type' => 83, 'tag' => -3),
	"y" => array('type' => 83, 'tag' => -2),
	"z" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
113 => new StructNode([
	"beacon" => array('type' => 111, 'tag' => -9),
	"ally" => array('type' => 111, 'tag' => -8),
	"flags" => array('type' => 111, 'tag' => -7),
	"build" => array('type' => 111, 'tag' => -6),
	"targetUnitTag" => array('type' => 6, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 78, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 111, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 111, 'tag' => -2),
	"targetPoint" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
114 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
115 => new StructNode([
	"delta" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
116 => new StructNode([
	"point" => array('type' => 84, 'tag' => -9),
	"unit" => array('type' => 6, 'tag' => -8),
	"unitLink" => array('type' => 78, 'tag' => -7),
	"unitControlPlayerId" => array('type' => 58, 'tag' => -6),
	"unitUpkeepPlayerId" => array('type' => 58, 'tag' => -5),
	"unitPosition" => array('type' => 92, 'tag' => -4),
	"unitIsUnderConstruction" => array('type' => 13, 'tag' => -3),
	"pingedMinimap" => array('type' => 13, 'tag' => -2),
	"option" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
117 => new StructNode([
	"verb" => array('type' => 29, 'tag' => -2),
	"arguments" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
118 => new StructNode([
	"alliance" => array('type' => 6, 'tag' => -2),
	"control" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
119 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
120 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
121 => new StructNode([
	"conversationId" => array('type' => 83, 'tag' => -2),
	"replyId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
122 => new OptionalNode(20),
123 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -6),
	"observe" => array('type' => 24, 'tag' => -5),
	"name" => array('type' => 9, 'tag' => -4),
	"toonHandle" => array('type' => 122, 'tag' => -3),
	"clanTag" => array('type' => 41, 'tag' => -2),
	"clanLogo" => array('type' => 42, 'tag' => -1),
]),
124 => new ArrayNode(
	new IntegerNode(5, 0),
	123
),
125 => new IntegerNode(1, 0),
126 => new StructNode([
	"userInfos" => array('type' => 124, 'tag' => -2),
	"method" => array('type' => 125, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
127 => new StructNode([
	"purchaseItemId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
128 => new StructNode([
	"difficultyLevel" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
129 => new ChoiceNode(new IntegerNode(3), [
	0 => 90,
	1 => 13,
	2 => 6,
	3 => 83,
	4 => 30,
	5 => 6,
]),
130 => new StructNode([
	"controlId" => array('type' => 83, 'tag' => -3),
	"eventType" => array('type' => 83, 'tag' => -2),
	"eventData" => array('type' => 129, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
131 => new StructNode([
	"soundHash" => array('type' => 6, 'tag' => -2),
	"length" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
132 => new ArrayNode(
	new IntegerNode(7, 0),
	6
),
133 => new StructNode([
	"soundHash" => array('type' => 132, 'tag' => -2),
	"length" => array('type' => 132, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
134 => new StructNode([
	"syncInfo" => array('type' => 133, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
135 => new StructNode([
	"queryId" => array('type' => 78, 'tag' => -3),
	"lengthMs" => array('type' => 6, 'tag' => -2),
	"finishGameLoop" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimLengthQueryByNameEvent'
),
136 => new StructNode([
	"queryId" => array('type' => 78, 'tag' => -2),
	"lengthMs" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimLengthQueryByPropsEvent'
),
137 => new StructNode([
	"animWaitQueryId" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerAnimOffsetEvent'
),
138 => new StructNode([
	"sound" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
139 => new StructNode([
	"transmissionId" => array('type' => 83, 'tag' => -2),
	"thread" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
140 => new StructNode([
	"transmissionId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
141 => new OptionalNode(79),
142 => new OptionalNode(78),
143 => new OptionalNode(111),
144 => new StructNode([
	"target" => array('type' => 141, 'tag' => -6),
	"distance" => array('type' => 142, 'tag' => -5),
	"pitch" => array('type' => 142, 'tag' => -4),
	"yaw" => array('type' => 142, 'tag' => -3),
	"reason" => array('type' => 143, 'tag' => -2),
	"follow" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
145 => new StructNode([
	"skipType" => array('type' => 125, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
146 => new IntegerNode(11, 0),
147 => new StructNode([
	"x" => array('type' => 146, 'tag' => -2),
	"y" => array('type' => 146, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
148 => new StructNode([
	"button" => array('type' => 6, 'tag' => -5),
	"down" => array('type' => 13, 'tag' => -4),
	"posUI" => array('type' => 147, 'tag' => -3),
	"posWorld" => array('type' => 92, 'tag' => -2),
	"flags" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
149 => new StructNode([
	"posUI" => array('type' => 147, 'tag' => -3),
	"posWorld" => array('type' => 92, 'tag' => -2),
	"flags" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
150 => new StructNode([
	"achievementLink" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
151 => new StructNode([
	"hotkey" => array('type' => 6, 'tag' => -2),
	"down" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerHotkeyPressedEvent'
),
152 => new StructNode([
	"abilLink" => array('type' => 78, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"state" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
153 => new StructNode([
	"soundtrack" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
154 => new StructNode([
	"planetId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
155 => new StructNode([
	"key" => array('type' => 111, 'tag' => -2),
	"flags" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
156 => new StructNode([
	"resources" => array('type' => 108, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
157 => new StructNode([
	"fulfillRequestId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
158 => new StructNode([
	"cancelRequestId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
159 => new StructNode([
	"error" => array('type' => 83, 'tag' => -2),
	"abil" => array('type' => 89, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCommandErrorEvent'
),
160 => new StructNode([
	"researchItemId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
161 => new StructNode([
	"mercenaryId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
162 => new StructNode([
	"battleReportId" => array('type' => 83, 'tag' => -2),
	"difficultyLevel" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
163 => new StructNode([
	"battleReportId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
164 => new StructNode([
	"decrementSeconds" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
165 => new StructNode([
	"portraitId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
166 => new StructNode([
	"functionName" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
167 => new StructNode([
	"result" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
168 => new StructNode([
	"gameMenuItemIndex" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
169 => new IntegerNode(16, -32768),
170 => new StructNode([
	"wheelSpin" => array('type' => 169, 'tag' => -2),
	"flags" => array('type' => 111, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseWheelEvent'
),
171 => new StructNode([
	"purchaseCategoryId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
172 => new StructNode([
	"button" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
173 => new StructNode([
	"cutsceneId" => array('type' => 83, 'tag' => -2),
	"bookmarkName" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
174 => new StructNode([
	"cutsceneId" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
175 => new StructNode([
	"cutsceneId" => array('type' => 83, 'tag' => -3),
	"conversationLine" => array('type' => 20, 'tag' => -2),
	"altConversationLine" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
176 => new StructNode([
	"cutsceneId" => array('type' => 83, 'tag' => -2),
	"conversationLine" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
177 => new StructNode([
	"leaveReason" => array('type' => 1, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserLeaveEvent'
),
178 => new StructNode([
	"observe" => array('type' => 24, 'tag' => -7),
	"name" => array('type' => 9, 'tag' => -6),
	"toonHandle" => array('type' => 122, 'tag' => -5),
	"clanTag" => array('type' => 41, 'tag' => -4),
	"clanLogo" => array('type' => 42, 'tag' => -3),
	"hijack" => array('type' => 13, 'tag' => -2),
	"hijackCloneGameUserId" => array('type' => 58, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
179 => new OptionalNode(95),
180 => new StructNode([
	"state" => array('type' => 24, 'tag' => -2),
	"sequence" => array('type' => 179, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CommandManagerStateEvent'
),
181 => new StructNode([
	"target" => array('type' => 92, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdUpdateTargetPointEvent'
),
182 => new StructNode([
	"target" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdUpdateTargetUnitEvent'
),
183 => new StructNode([
	"catalog" => array('type' => 10, 'tag' => -4),
	"entry" => array('type' => 78, 'tag' => -3),
	"field" => array('type' => 9, 'tag' => -2),
	"value" => array('type' => 9, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CatalogModifyEvent'
),
184 => new StructNode([
	"index" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HeroTalentTreeSelectedEvent'
),
185 => new StructNode([
	"shown" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HeroTalentTreeSelectionPanelToggledEvent'
),
186 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 30, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
187 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
188 => new StructNode([
	"progress" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
189 => new StructNode([
	"status" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ReconnectNotifyMessage'
),
190 => new StructNode([
	"scoreValueMineralsCurrent" => array('type' => 83, 'tag' => 0),
	"scoreValueVespeneCurrent" => array('type' => 83, 'tag' => 1),
	"scoreValueMineralsCollectionRate" => array('type' => 83, 'tag' => 2),
	"scoreValueVespeneCollectionRate" => array('type' => 83, 'tag' => 3),
	"scoreValueWorkersActiveCount" => array('type' => 83, 'tag' => 4),
	"scoreValueMineralsUsedInProgressArmy" => array('type' => 83, 'tag' => 5),
	"scoreValueMineralsUsedInProgressEconomy" => array('type' => 83, 'tag' => 6),
	"scoreValueMineralsUsedInProgressTechnology" => array('type' => 83, 'tag' => 7),
	"scoreValueVespeneUsedInProgressArmy" => array('type' => 83, 'tag' => 8),
	"scoreValueVespeneUsedInProgressEconomy" => array('type' => 83, 'tag' => 9),
	"scoreValueVespeneUsedInProgressTechnology" => array('type' => 83, 'tag' => 10),
	"scoreValueMineralsUsedCurrentArmy" => array('type' => 83, 'tag' => 11),
	"scoreValueMineralsUsedCurrentEconomy" => array('type' => 83, 'tag' => 12),
	"scoreValueMineralsUsedCurrentTechnology" => array('type' => 83, 'tag' => 13),
	"scoreValueVespeneUsedCurrentArmy" => array('type' => 83, 'tag' => 14),
	"scoreValueVespeneUsedCurrentEconomy" => array('type' => 83, 'tag' => 15),
	"scoreValueVespeneUsedCurrentTechnology" => array('type' => 83, 'tag' => 16),
	"scoreValueMineralsLostArmy" => array('type' => 83, 'tag' => 17),
	"scoreValueMineralsLostEconomy" => array('type' => 83, 'tag' => 18),
	"scoreValueMineralsLostTechnology" => array('type' => 83, 'tag' => 19),
	"scoreValueVespeneLostArmy" => array('type' => 83, 'tag' => 20),
	"scoreValueVespeneLostEconomy" => array('type' => 83, 'tag' => 21),
	"scoreValueVespeneLostTechnology" => array('type' => 83, 'tag' => 22),
	"scoreValueMineralsKilledArmy" => array('type' => 83, 'tag' => 23),
	"scoreValueMineralsKilledEconomy" => array('type' => 83, 'tag' => 24),
	"scoreValueMineralsKilledTechnology" => array('type' => 83, 'tag' => 25),
	"scoreValueVespeneKilledArmy" => array('type' => 83, 'tag' => 26),
	"scoreValueVespeneKilledEconomy" => array('type' => 83, 'tag' => 27),
	"scoreValueVespeneKilledTechnology" => array('type' => 83, 'tag' => 28),
	"scoreValueFoodUsed" => array('type' => 83, 'tag' => 29),
	"scoreValueFoodMade" => array('type' => 83, 'tag' => 30),
	"scoreValueMineralsUsedActiveForces" => array('type' => 83, 'tag' => 31),
	"scoreValueVespeneUsedActiveForces" => array('type' => 83, 'tag' => 32),
	"scoreValueMineralsFriendlyFireArmy" => array('type' => 83, 'tag' => 33),
	"scoreValueMineralsFriendlyFireEconomy" => array('type' => 83, 'tag' => 34),
	"scoreValueMineralsFriendlyFireTechnology" => array('type' => 83, 'tag' => 35),
	"scoreValueVespeneFriendlyFireArmy" => array('type' => 83, 'tag' => 36),
	"scoreValueVespeneFriendlyFireEconomy" => array('type' => 83, 'tag' => 37),
	"scoreValueVespeneFriendlyFireTechnology" => array('type' => 83, 'tag' => 38),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStats'
),
191 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"stats" => array('type' => 190, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStatsEvent'
),
192 => new StructNode([
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
193 => new StructNode([
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
194 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"controlPlayerId" => array('type' => 1, 'tag' => 2),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\UnitOwnerChangeEvent'
),
195 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 29, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UnitTypeChangeEvent'
),
196 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"upgradeTypeName" => array('type' => 29, 'tag' => 1),
	"count" => array('type' => 83, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UpgradeEvent'
),
197 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDoneEvent'
),
198 => new ArrayNode(
	new IntegerNode(10, 0),
	83,
	'Rogiel\StarReplay\Event\Tracker\UnitPositions'

),
199 => new StructNode([
	"firstUnitIndex" => array('type' => 6, 'tag' => 0),
	"items" => array('type' => 198, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent'
),
200 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"type" => array('type' => 6, 'tag' => 1),
	"userId" => array('type' => 43, 'tag' => 2),
	"slotId" => array('type' => 43, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerSetupEvent'
),
]
);
Version42253::$GAME_EVENT_MAPPING = [
	5 => 77,
	7 => 76,
	9 => 69,
	10 => 71,
	11 => 72,
	12 => 73,
	13 => 75,
	14 => 80,
	21 => 81,
	22 => 77,
	23 => 77,
	25 => 82,
	26 => 86,
	27 => 96,
	28 => 104,
	29 => 105,
	30 => 107,
	31 => 109,
	32 => 110,
	33 => 113,
	34 => 114,
	35 => 115,
	36 => 116,
	37 => 117,
	38 => 118,
	39 => 119,
	40 => 120,
	41 => 121,
	43 => 126,
	44 => 77,
	45 => 131,
	46 => 138,
	47 => 139,
	48 => 140,
	49 => 144,
	50 => 77,
	51 => 127,
	52 => 77,
	53 => 128,
	54 => 77,
	55 => 130,
	56 => 134,
	57 => 145,
	58 => 148,
	59 => 149,
	60 => 150,
	61 => 151,
	62 => 152,
	63 => 77,
	64 => 153,
	65 => 154,
	66 => 155,
	67 => 166,
	68 => 77,
	69 => 77,
	70 => 156,
	71 => 157,
	72 => 158,
	73 => 77,
	74 => 77,
	75 => 160,
	76 => 159,
	77 => 77,
	78 => 77,
	79 => 161,
	80 => 77,
	81 => 77,
	82 => 162,
	83 => 163,
	84 => 163,
	85 => 128,
	86 => 77,
	87 => 77,
	88 => 164,
	89 => 165,
	90 => 167,
	91 => 168,
	92 => 170,
	93 => 127,
	94 => 171,
	95 => 172,
	96 => 77,
	97 => 173,
	98 => 174,
	99 => 175,
	100 => 176,
	101 => 177,
	102 => 178,
	103 => 180,
	104 => 181,
	105 => 182,
	106 => 135,
	107 => 136,
	108 => 137,
	109 => 183,
	110 => 184,
	111 => 77,
	112 => 185,
];
Version42253::$MESSAGE_EVENT_MAPPING = [
	0 => 186,
	1 => 187,
	2 => 188,
	3 => 77,
	4 => 189,
];
Version42253::$TRACKER_EVENT_MAPPING = [
	0 => 191,
	1 => 192,
	2 => 193,
	3 => 194,
	4 => 195,
	5 => 196,
	6 => 192,
	7 => 197,
	8 => 199,
	9 => 200,
];
