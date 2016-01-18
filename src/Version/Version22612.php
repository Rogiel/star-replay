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

class Version22612 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 22612;
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
	    return self::$TREE->getNode(13);
	}

    public function getReplayInitDataNode() {
	    return self::$TREE->getNode(58);
	}

	public function getGameDetailsNode() {
	    return self::$TREE->getNode(34);
	}

	public function getGameEventHeaderNode() {
		return new StructNode(
		    [
                'timestamp' => ['type' => 6],
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
                'timestamp' => ['type' => 6],
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
                'timestamp' => ['type' => 6],
                'event' => ['type' => NULL]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}

}

Version22612::$TREE = new Tree([
0 => new IntegerNode(7, 0),
1 => new IntegerNode(4, 0),
2 => new IntegerNode(6, 0),
3 => new IntegerNode(14, 0),
4 => new IntegerNode(22, 0),
5 => new IntegerNode(32, 0),
6 => new ChoiceNode(new IntegerNode(2), [
	0 => 2,
	1 => 3,
	2 => 4,
	3 => 5,
]),
7 => new IntegerNode(5, 0),
8 => new StructNode([
	"playerId" => array('type' => 7, 'tag' => -1),
]),
9 => new BlobNode(new IntegerNode(8, 0)),
10 => new IntegerNode(8, 0),
11 => new StructNode([
	"flags" => array('type' => 10, 'tag' => 0),
	"major" => array('type' => 10, 'tag' => 1),
	"minor" => array('type' => 10, 'tag' => 2),
	"revision" => array('type' => 10, 'tag' => 3),
	"build" => array('type' => 5, 'tag' => 4),
	"baseBuild" => array('type' => 5, 'tag' => 5),
],
	'Rogiel\StarReplay\Metadata\Header\Version'
),
12 => new IntegerNode(3, 0),
13 => new StructNode([
	"signature" => array('type' => 9, 'tag' => 0),
	"version" => array('type' => 11, 'tag' => 1),
	"type" => array('type' => 12, 'tag' => 2),
	"elapsedGameLoops" => array('type' => 5, 'tag' => 3),
],
	'Rogiel\StarReplay\Metadata\Header\Header'
),
14 => new FourCCNode(),
15 => new BlobNode(new IntegerNode(7, 0)),
16 => new IntegerNode(64, 0),
17 => new StructNode([
	"region" => array('type' => 10, 'tag' => 0),
	"programId" => array('type' => 14, 'tag' => 1),
	"realm" => array('type' => 5, 'tag' => 2),
	"name" => array('type' => 15, 'tag' => 3),
	"id" => array('type' => 16, 'tag' => 4),
],
	'Rogiel\StarReplay\Entity\Toon'
),
18 => new StructNode([
	"a" => array('type' => 10, 'tag' => 0),
	"r" => array('type' => 10, 'tag' => 1),
	"g" => array('type' => 10, 'tag' => 2),
	"b" => array('type' => 10, 'tag' => 3),
],
	'Rogiel\StarReplay\Entity\Color'
),
19 => new IntegerNode(2, 0),
20 => new StructNode([
	"name" => array('type' => 9, 'tag' => 0),
	"toon" => array('type' => 17, 'tag' => 1),
	"race" => array('type' => 9, 'tag' => 2),
	"color" => array('type' => 18, 'tag' => 3),
	"control" => array('type' => 10, 'tag' => 4),
	"teamId" => array('type' => 1, 'tag' => 5),
	"handicap" => array('type' => 0, 'tag' => 6),
	"observe" => array('type' => 19, 'tag' => 7),
	"result" => array('type' => 19, 'tag' => 8),
],
	'Rogiel\StarReplay\Entity\Player'
),
21 => new ArrayNode(
	new IntegerNode(5, 0),
	20,
	'Rogiel\StarReplay\Metadata\Match\PlayerList'

),
22 => new OptionalNode(21),
23 => new BlobNode(new IntegerNode(10, 0)),
24 => new BlobNode(new IntegerNode(11, 0)),
25 => new StructNode([
	"file" => array('type' => 24, 'tag' => 0),
],
	'Rogiel\StarReplay\Entity\Thumbnail'
),
26 => new BooleanNode(),
27 => new IntegerNode(64, -9223372036854775808),
28 => new BlobNode(new IntegerNode(12, 0)),
29 => new BlobNode(new IntegerNode(0, 40)),
30 => new ArrayNode(
	new IntegerNode(6, 0),
	29
),
31 => new OptionalNode(30),
32 => new ArrayNode(
	new IntegerNode(6, 0),
	24
),
33 => new OptionalNode(32),
34 => new StructNode([
	"playerList" => array('type' => 22, 'tag' => 0),
	"title" => array('type' => 23, 'tag' => 1),
	"difficulty" => array('type' => 9, 'tag' => 2),
	"thumbnail" => array('type' => 25, 'tag' => 3),
	"isBlizzardMap" => array('type' => 26, 'tag' => 4),
	"timeUTC" => array('type' => 27, 'tag' => 5),
	"timeLocalOffset" => array('type' => 27, 'tag' => 6),
	"description" => array('type' => 28, 'tag' => 7),
	"imageFilePath" => array('type' => 24, 'tag' => 8),
	"mapFileName" => array('type' => 24, 'tag' => 9),
	"cacheHandles" => array('type' => 31, 'tag' => 10),
	"miniSave" => array('type' => 26, 'tag' => 11),
	"gameSpeed" => array('type' => 12, 'tag' => 12),
	"defaultDifficulty" => array('type' => 2, 'tag' => 13),
	"modPaths" => array('type' => 33, 'tag' => 14),
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
35 => new OptionalNode(10),
36 => new StructNode([
	"race" => array('type' => 35, 'tag' => -1),
]),
37 => new StructNode([
	"team" => array('type' => 35, 'tag' => -1),
]),
38 => new StructNode([
	"name" => array('type' => 9, 'tag' => -8),
	"randomSeed" => array('type' => 5, 'tag' => -7),
	"racePreference" => array('type' => 36, 'tag' => -6),
	"teamPreference" => array('type' => 37, 'tag' => -5),
	"testMap" => array('type' => 26, 'tag' => -4),
	"testAuto" => array('type' => 26, 'tag' => -3),
	"examine" => array('type' => 26, 'tag' => -2),
	"observe" => array('type' => 19, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
39 => new ArrayNode(
	new IntegerNode(5, 0),
	38,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
40 => new StructNode([
	"lockTeams" => array('type' => 26, 'tag' => -12),
	"teamsTogether" => array('type' => 26, 'tag' => -11),
	"advancedSharedControl" => array('type' => 26, 'tag' => -10),
	"randomRaces" => array('type' => 26, 'tag' => -9),
	"battleNet" => array('type' => 26, 'tag' => -8),
	"amm" => array('type' => 26, 'tag' => -7),
	"ranked" => array('type' => 26, 'tag' => -6),
	"noVictoryOrDefeat" => array('type' => 26, 'tag' => -5),
	"fog" => array('type' => 19, 'tag' => -4),
	"observers" => array('type' => 19, 'tag' => -3),
	"userDifficulty" => array('type' => 19, 'tag' => -2),
	"clientDebugFlags" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameOptions'
),
41 => new IntegerNode(4, 1),
42 => new IntegerNode(8, 1),
43 => new BitArrayNode(
	new IntegerNode(6, 0)
),
44 => new BitArrayNode(
	new IntegerNode(8, 0)
),
45 => new BitArrayNode(
	new IntegerNode(2, 0)
),
46 => new StructNode([
	"allowedColors" => array('type' => 43, 'tag' => -5),
	"allowedRaces" => array('type' => 44, 'tag' => -4),
	"allowedDifficulty" => array('type' => 43, 'tag' => -3),
	"allowedControls" => array('type' => 44, 'tag' => -2),
	"allowedObserveTypes" => array('type' => 45, 'tag' => -1),
]),
47 => new ArrayNode(
	new IntegerNode(5, 0),
	46
),
48 => new StructNode([
	"randomValue" => array('type' => 5, 'tag' => -23),
	"gameCacheName" => array('type' => 23, 'tag' => -22),
	"gameOptions" => array('type' => 40, 'tag' => -21),
	"gameSpeed" => array('type' => 12, 'tag' => -20),
	"gameType" => array('type' => 12, 'tag' => -19),
	"maxUsers" => array('type' => 7, 'tag' => -18),
	"maxObservers" => array('type' => 7, 'tag' => -17),
	"maxPlayers" => array('type' => 7, 'tag' => -16),
	"maxTeams" => array('type' => 41, 'tag' => -15),
	"maxColors" => array('type' => 2, 'tag' => -14),
	"maxRaces" => array('type' => 42, 'tag' => -13),
	"maxControls" => array('type' => 42, 'tag' => -12),
	"mapSizeX" => array('type' => 10, 'tag' => -11),
	"mapSizeY" => array('type' => 10, 'tag' => -10),
	"mapFileSyncChecksum" => array('type' => 5, 'tag' => -9),
	"mapFileName" => array('type' => 24, 'tag' => -8),
	"mapAuthorName" => array('type' => 9, 'tag' => -7),
	"modFileSyncChecksum" => array('type' => 5, 'tag' => -6),
	"slotDescriptions" => array('type' => 47, 'tag' => -5),
	"defaultDifficulty" => array('type' => 2, 'tag' => -4),
	"cacheHandles" => array('type' => 30, 'tag' => -3),
	"isBlizzardMap" => array('type' => 26, 'tag' => -2),
	"isPremadeFFA" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
49 => new OptionalNode(1),
50 => new OptionalNode(7),
51 => new StructNode([
	"color" => array('type' => 50, 'tag' => -1),
]),
52 => new ArrayNode(
	new IntegerNode(5, 0),
	5
),
53 => new ArrayNode(
	new IntegerNode(9, 0),
	5
),
54 => new StructNode([
	"control" => array('type' => 10, 'tag' => -11),
	"userId" => array('type' => 49, 'tag' => -10),
	"teamId" => array('type' => 1, 'tag' => -9),
	"colorPref" => array('type' => 51, 'tag' => -8),
	"racePref" => array('type' => 36, 'tag' => -7),
	"difficulty" => array('type' => 2, 'tag' => -6),
	"handicap" => array('type' => 0, 'tag' => -5),
	"observe" => array('type' => 19, 'tag' => -4),
	"rewards" => array('type' => 52, 'tag' => -3),
	"toonHandle" => array('type' => 15, 'tag' => -2),
	"licenses" => array('type' => 53, 'tag' => -1),
]),
55 => new ArrayNode(
	new IntegerNode(5, 0),
	54
),
56 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -9),
	"maxUsers" => array('type' => 7, 'tag' => -8),
	"maxObservers" => array('type' => 7, 'tag' => -7),
	"slots" => array('type' => 55, 'tag' => -6),
	"randomSeed" => array('type' => 5, 'tag' => -5),
	"hostUserId" => array('type' => 49, 'tag' => -4),
	"isSinglePlayer" => array('type' => 26, 'tag' => -3),
	"gameDuration" => array('type' => 5, 'tag' => -2),
	"defaultDifficulty" => array('type' => 2, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
57 => new StructNode([
	"userInitialData" => array('type' => 39, 'tag' => -3),
	"gameDescription" => array('type' => 48, 'tag' => -2),
	"lobbyState" => array('type' => 56, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
58 => new StructNode([
	"syncLobbyState" => array('type' => 57, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
59 => new StructNode([
	"name" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
60 => new BlobNode(new IntegerNode(6, 0)),
61 => new StructNode([
	"name" => array('type' => 60, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
62 => new StructNode([
	"name" => array('type' => 60, 'tag' => -3),
	"type" => array('type' => 5, 'tag' => -2),
	"data" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
63 => new StructNode([
	"type" => array('type' => 5, 'tag' => -3),
	"name" => array('type' => 60, 'tag' => -2),
	"data" => array('type' => 28, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
64 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
65 => new StructNode([
	"signature" => array('type' => 64, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
66 => new StructNode([
	"gameFullyDownloaded" => array('type' => 26, 'tag' => -6),
	"developmentCheatsEnabled" => array('type' => 26, 'tag' => -5),
	"multiplayerCheatsEnabled" => array('type' => 26, 'tag' => -4),
	"syncChecksummingEnabled" => array('type' => 26, 'tag' => -3),
	"isMapToMapTransition" => array('type' => 26, 'tag' => -2),
	"useAIBeacons" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
67 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
68 => new StructNode([
	"fileName" => array('type' => 24, 'tag' => -5),
	"automatic" => array('type' => 26, 'tag' => -4),
	"overwrite" => array('type' => 26, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
69 => new IntegerNode(32, -2147483648),
70 => new StructNode([
	"x" => array('type' => 69, 'tag' => -2),
	"y" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
71 => new StructNode([
	"point" => array('type' => 70, 'tag' => -4),
	"time" => array('type' => 69, 'tag' => -3),
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
]),
72 => new StructNode([
	"data" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
73 => new IntegerNode(20, 0),
74 => new IntegerNode(16, 0),
75 => new StructNode([
	"abilLink" => array('type' => 74, 'tag' => -3),
	"abilCmdIndex" => array('type' => 7, 'tag' => -2),
	"abilCmdData" => array('type' => 35, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
76 => new OptionalNode(75),
77 => new NullNode(),
78 => new StructNode([
	"x" => array('type' => 73, 'tag' => -3),
	"y" => array('type' => 73, 'tag' => -2),
	"z" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
79 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 5, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 74, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 49, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 49, 'tag' => -2),
	"snapshotPoint" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
80 => new ChoiceNode(new IntegerNode(2), [
	0 => 77,
	1 => 78,
	2 => 79,
	3 => 5,
]),
81 => new OptionalNode(5),
82 => new StructNode([
	"cmdFlags" => array('type' => 73, 'tag' => -4),
	"abil" => array('type' => 76, 'tag' => -3),
	"data" => array('type' => 80, 'tag' => -2),
	"otherUnit" => array('type' => 81, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
83 => new IntegerNode(9, 0),
84 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
85 => new ArrayNode(
	new IntegerNode(9, 0),
	83,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
86 => new ChoiceNode(new IntegerNode(2), [
	0 => 77,
	1 => 84,
	2 => 85,
	3 => 85,
]),
87 => new StructNode([
	"unitLink" => array('type' => 74, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
88 => new ArrayNode(
	new IntegerNode(9, 0),
	87
),
89 => new StructNode([
	"subgroupIndex" => array('type' => 83, 'tag' => -4),
	"removeMask" => array('type' => 86, 'tag' => -3),
	"addSubgroups" => array('type' => 88, 'tag' => -2),
	"addUnitTags" => array('type' => 53, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
90 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 89, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
91 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 19, 'tag' => -2),
	"mask" => array('type' => 86, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
92 => new StructNode([
	"count" => array('type' => 83, 'tag' => -6),
	"subgroupCount" => array('type' => 83, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 83, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 5, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 5, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 5, 'tag' => -1),
]),
93 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 92, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
94 => new ArrayNode(
	new IntegerNode(3, 0),
	69,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
95 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
96 => new StructNode([
	"chatMessage" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
97 => new IntegerNode(8, -128),
98 => new StructNode([
	"x" => array('type' => 69, 'tag' => -3),
	"y" => array('type' => 69, 'tag' => -2),
	"z" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
99 => new StructNode([
	"beacon" => array('type' => 97, 'tag' => -9),
	"ally" => array('type' => 97, 'tag' => -8),
	"flags" => array('type' => 97, 'tag' => -7),
	"build" => array('type' => 97, 'tag' => -6),
	"targetUnitTag" => array('type' => 5, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 74, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 97, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 97, 'tag' => -2),
	"targetPoint" => array('type' => 98, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
100 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
101 => new StructNode([
	"delta" => array('type' => 97, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
102 => new StructNode([
	"point" => array('type' => 70, 'tag' => -3),
	"unit" => array('type' => 5, 'tag' => -2),
	"pingedMinimap" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
103 => new StructNode([
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
104 => new StructNode([
	"alliance" => array('type' => 5, 'tag' => -2),
	"control" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
105 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
106 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
107 => new StructNode([
	"conversationId" => array('type' => 69, 'tag' => -2),
	"replyId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
108 => new StructNode([
	"purchaseItemId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
109 => new StructNode([
	"difficultyLevel" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
110 => new ChoiceNode(new IntegerNode(3), [
	0 => 77,
	1 => 26,
	2 => 5,
	3 => 69,
	4 => 24,
]),
111 => new StructNode([
	"controlId" => array('type' => 69, 'tag' => -3),
	"eventType" => array('type' => 69, 'tag' => -2),
	"eventData" => array('type' => 110, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
112 => new StructNode([
	"soundHash" => array('type' => 5, 'tag' => -2),
	"length" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
113 => new ArrayNode(
	new IntegerNode(8, 0),
	5
),
114 => new StructNode([
	"soundHash" => array('type' => 113, 'tag' => -2),
	"length" => array('type' => 113, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
115 => new StructNode([
	"syncInfo" => array('type' => 114, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
116 => new StructNode([
	"sound" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
117 => new StructNode([
	"transmissionId" => array('type' => 69, 'tag' => -2),
	"thread" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
118 => new StructNode([
	"transmissionId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
119 => new StructNode([
	"x" => array('type' => 74, 'tag' => -2),
	"y" => array('type' => 74, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
120 => new OptionalNode(74),
121 => new StructNode([
	"target" => array('type' => 119, 'tag' => -4),
	"distance" => array('type' => 120, 'tag' => -3),
	"pitch" => array('type' => 120, 'tag' => -2),
	"yaw" => array('type' => 120, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
122 => new IntegerNode(1, 0),
123 => new StructNode([
	"skipType" => array('type' => 122, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
124 => new IntegerNode(11, 0),
125 => new StructNode([
	"x" => array('type' => 124, 'tag' => -2),
	"y" => array('type' => 124, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
126 => new StructNode([
	"button" => array('type' => 5, 'tag' => -4),
	"down" => array('type' => 26, 'tag' => -3),
	"posUI" => array('type' => 125, 'tag' => -2),
	"posWorld" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
127 => new StructNode([
	"posUI" => array('type' => 125, 'tag' => -2),
	"posWorld" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
128 => new StructNode([
	"achievementLink" => array('type' => 74, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
129 => new StructNode([
	"soundtrack" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
130 => new StructNode([
	"planetId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
131 => new StructNode([
	"key" => array('type' => 97, 'tag' => -2),
	"flags" => array('type' => 97, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
132 => new StructNode([
	"resources" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
133 => new StructNode([
	"fulfillRequestId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
134 => new StructNode([
	"cancelRequestId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
135 => new StructNode([
	"researchItemId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
136 => new StructNode([
	"laggingPlayerId" => array('type' => 1, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\LagMessageEvent'
),
137 => new StructNode([
	"mercenaryId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
138 => new StructNode([
	"battleReportId" => array('type' => 69, 'tag' => -2),
	"difficultyLevel" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
139 => new StructNode([
	"battleReportId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
140 => new IntegerNode(19, 0),
141 => new StructNode([
	"decrementMs" => array('type' => 140, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
142 => new StructNode([
	"portraitId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
143 => new StructNode([
	"functionName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
144 => new StructNode([
	"result" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
145 => new StructNode([
	"gameMenuItemIndex" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
146 => new StructNode([
	"reason" => array('type' => 97, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
147 => new StructNode([
	"purchaseCategoryId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
148 => new StructNode([
	"button" => array('type' => 74, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
149 => new StructNode([
	"cutsceneId" => array('type' => 69, 'tag' => -2),
	"bookmarkName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
150 => new StructNode([
	"cutsceneId" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
151 => new StructNode([
	"cutsceneId" => array('type' => 69, 'tag' => -3),
	"conversationLine" => array('type' => 15, 'tag' => -2),
	"altConversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
152 => new StructNode([
	"cutsceneId" => array('type' => 69, 'tag' => -2),
	"conversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
153 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
154 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 70, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
155 => new StructNode([
	"progress" => array('type' => 69, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
]
);
Version22612::$GAME_EVENT_MAPPING = [
	5 => 67,
	7 => 59,
	8 => 61,
	9 => 62,
	10 => 63,
	11 => 65,
	12 => 66,
	22 => 68,
	23 => 67,
	25 => 67,
	26 => 72,
	27 => 82,
	28 => 90,
	29 => 91,
	30 => 93,
	31 => 95,
	32 => 96,
	33 => 99,
	34 => 100,
	35 => 101,
	36 => 102,
	37 => 103,
	38 => 104,
	39 => 105,
	40 => 106,
	41 => 107,
	44 => 67,
	45 => 112,
	46 => 116,
	47 => 117,
	48 => 118,
	49 => 121,
	50 => 67,
	51 => 108,
	52 => 67,
	53 => 109,
	54 => 67,
	55 => 111,
	56 => 115,
	57 => 123,
	58 => 126,
	59 => 127,
	60 => 128,
	63 => 67,
	64 => 129,
	65 => 130,
	66 => 131,
	67 => 143,
	68 => 67,
	69 => 67,
	70 => 132,
	71 => 133,
	72 => 134,
	73 => 67,
	74 => 67,
	75 => 135,
	76 => 136,
	77 => 67,
	78 => 67,
	79 => 137,
	80 => 67,
	81 => 67,
	82 => 138,
	83 => 139,
	84 => 139,
	85 => 109,
	86 => 67,
	87 => 67,
	88 => 141,
	89 => 142,
	90 => 144,
	91 => 145,
	92 => 146,
	93 => 108,
	94 => 147,
	95 => 148,
	96 => 67,
	97 => 149,
	98 => 150,
	99 => 151,
	100 => 152,
];
Version22612::$MESSAGE_EVENT_MAPPING = [
	0 => 153,
	1 => 154,
	2 => 155,
	3 => 67,
];
Version22612::$TRACKER_EVENT_MAPPING = NULL;
