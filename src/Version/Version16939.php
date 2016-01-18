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

class Version16939 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 16939;
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
	    return self::$TREE->getNode(56);
	}

	public function getGameDetailsNode() {
	    return self::$TREE->getNode(32);
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

Version16939::$TREE = new Tree([
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
	new IntegerNode(4, 0),
	29
),
31 => new OptionalNode(30),
32 => new StructNode([
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
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
33 => new OptionalNode(10),
34 => new StructNode([
	"race" => array('type' => 33, 'tag' => -1),
]),
35 => new StructNode([
	"team" => array('type' => 33, 'tag' => -1),
]),
36 => new StructNode([
	"name" => array('type' => 9, 'tag' => -7),
	"randomSeed" => array('type' => 5, 'tag' => -6),
	"racePreference" => array('type' => 34, 'tag' => -5),
	"teamPreference" => array('type' => 35, 'tag' => -4),
	"testMap" => array('type' => 26, 'tag' => -3),
	"testAuto" => array('type' => 26, 'tag' => -2),
	"observe" => array('type' => 19, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
37 => new ArrayNode(
	new IntegerNode(5, 0),
	36,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
38 => new StructNode([
	"lockTeams" => array('type' => 26, 'tag' => -11),
	"teamsTogether" => array('type' => 26, 'tag' => -10),
	"advancedSharedControl" => array('type' => 26, 'tag' => -9),
	"randomRaces" => array('type' => 26, 'tag' => -8),
	"battleNet" => array('type' => 26, 'tag' => -7),
	"amm" => array('type' => 26, 'tag' => -6),
	"ranked" => array('type' => 26, 'tag' => -5),
	"noVictoryOrDefeat" => array('type' => 26, 'tag' => -4),
	"fog" => array('type' => 19, 'tag' => -3),
	"observers" => array('type' => 19, 'tag' => -2),
	"userDifficulty" => array('type' => 19, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameOptions'
),
39 => new IntegerNode(4, 1),
40 => new IntegerNode(5, 1),
41 => new IntegerNode(8, 1),
42 => new BitArrayNode(
	new IntegerNode(6, 0)
),
43 => new BitArrayNode(
	new IntegerNode(8, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
44 => new BitArrayNode(
	new IntegerNode(2, 0)
),
45 => new StructNode([
	"allowedColors" => array('type' => 42, 'tag' => -5),
	"allowedRaces" => array('type' => 43, 'tag' => -4),
	"allowedDifficulty" => array('type' => 42, 'tag' => -3),
	"allowedControls" => array('type' => 43, 'tag' => -2),
	"allowedObserveTypes" => array('type' => 44, 'tag' => -1),
]),
46 => new ArrayNode(
	new IntegerNode(5, 0),
	45
),
47 => new StructNode([
	"randomValue" => array('type' => 5, 'tag' => -23),
	"gameCacheName" => array('type' => 23, 'tag' => -22),
	"gameOptions" => array('type' => 38, 'tag' => -21),
	"gameSpeed" => array('type' => 12, 'tag' => -20),
	"gameType" => array('type' => 12, 'tag' => -19),
	"maxUsers" => array('type' => 7, 'tag' => -18),
	"maxObservers" => array('type' => 7, 'tag' => -17),
	"maxPlayers" => array('type' => 7, 'tag' => -16),
	"maxTeams" => array('type' => 39, 'tag' => -15),
	"maxColors" => array('type' => 40, 'tag' => -14),
	"maxRaces" => array('type' => 41, 'tag' => -13),
	"maxControls" => array('type' => 41, 'tag' => -12),
	"mapSizeX" => array('type' => 10, 'tag' => -11),
	"mapSizeY" => array('type' => 10, 'tag' => -10),
	"mapFileSyncChecksum" => array('type' => 5, 'tag' => -9),
	"mapFileName" => array('type' => 24, 'tag' => -8),
	"mapAuthorName" => array('type' => 9, 'tag' => -7),
	"modFileSyncChecksum" => array('type' => 5, 'tag' => -6),
	"slotDescriptions" => array('type' => 46, 'tag' => -5),
	"defaultDifficulty" => array('type' => 2, 'tag' => -4),
	"cacheHandles" => array('type' => 30, 'tag' => -3),
	"isBlizzardMap" => array('type' => 26, 'tag' => -2),
	"isPremadeFFA" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
48 => new OptionalNode(1),
49 => new OptionalNode(7),
50 => new StructNode([
	"color" => array('type' => 49, 'tag' => -1),
]),
51 => new ArrayNode(
	new IntegerNode(5, 0),
	5
),
52 => new StructNode([
	"control" => array('type' => 10, 'tag' => -9),
	"userId" => array('type' => 48, 'tag' => -8),
	"teamId" => array('type' => 1, 'tag' => -7),
	"colorPref" => array('type' => 50, 'tag' => -6),
	"racePref" => array('type' => 34, 'tag' => -5),
	"difficulty" => array('type' => 2, 'tag' => -4),
	"handicap" => array('type' => 0, 'tag' => -3),
	"observe" => array('type' => 19, 'tag' => -2),
	"rewards" => array('type' => 51, 'tag' => -1),
]),
53 => new ArrayNode(
	new IntegerNode(5, 0),
	52
),
54 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -9),
	"maxUsers" => array('type' => 7, 'tag' => -8),
	"maxObservers" => array('type' => 7, 'tag' => -7),
	"slots" => array('type' => 53, 'tag' => -6),
	"randomSeed" => array('type' => 5, 'tag' => -5),
	"hostUserId" => array('type' => 48, 'tag' => -4),
	"isSinglePlayer" => array('type' => 26, 'tag' => -3),
	"gameDuration" => array('type' => 5, 'tag' => -2),
	"defaultDifficulty" => array('type' => 2, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
55 => new StructNode([
	"userInitialData" => array('type' => 37, 'tag' => -3),
	"gameDescription" => array('type' => 47, 'tag' => -2),
	"lobbyState" => array('type' => 54, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
56 => new StructNode([
	"syncLobbyState" => array('type' => 55, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
57 => new StructNode([
	"name" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
58 => new BlobNode(new IntegerNode(6, 0)),
59 => new StructNode([
	"name" => array('type' => 58, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
60 => new StructNode([
	"name" => array('type' => 58, 'tag' => -3),
	"type" => array('type' => 5, 'tag' => -2),
	"data" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
61 => new StructNode([
	"type" => array('type' => 5, 'tag' => -3),
	"name" => array('type' => 58, 'tag' => -2),
	"data" => array('type' => 28, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
62 => new StructNode([
	"developmentCheatsEnabled" => array('type' => 26, 'tag' => -4),
	"multiplayerCheatsEnabled" => array('type' => 26, 'tag' => -3),
	"syncChecksummingEnabled" => array('type' => 26, 'tag' => -2),
	"isMapToMapTransition" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
63 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
64 => new StructNode([
	"fileName" => array('type' => 24, 'tag' => -5),
	"automatic" => array('type' => 26, 'tag' => -4),
	"overwrite" => array('type' => 26, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
65 => new IntegerNode(32, -2147483648),
66 => new StructNode([
	"x" => array('type' => 65, 'tag' => -2),
	"y" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
67 => new StructNode([
	"point" => array('type' => 66, 'tag' => -4),
	"time" => array('type' => 65, 'tag' => -3),
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
]),
68 => new StructNode([
	"data" => array('type' => 67, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
69 => new IntegerNode(17, 0),
70 => new IntegerNode(16, 0),
71 => new StructNode([
	"abilLink" => array('type' => 70, 'tag' => -3),
	"abilCmdIndex" => array('type' => 7, 'tag' => -2),
	"abilCmdData" => array('type' => 33, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
72 => new OptionalNode(71),
73 => new NullNode(),
74 => new IntegerNode(20, 0),
75 => new StructNode([
	"x" => array('type' => 74, 'tag' => -3),
	"y" => array('type' => 74, 'tag' => -2),
	"z" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
76 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -6),
	"timer" => array('type' => 10, 'tag' => -5),
	"tag" => array('type' => 5, 'tag' => -4),
	"snapshotUnitLink" => array('type' => 70, 'tag' => -3),
	"snapshotPlayerId" => array('type' => 48, 'tag' => -2),
	"snapshotPoint" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
77 => new ChoiceNode(new IntegerNode(2), [
	0 => 73,
	1 => 75,
	2 => 76,
	3 => 5,
]),
78 => new OptionalNode(5),
79 => new StructNode([
	"cmdFlags" => array('type' => 69, 'tag' => -4),
	"abil" => array('type' => 72, 'tag' => -3),
	"data" => array('type' => 77, 'tag' => -2),
	"otherUnit" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
80 => new ArrayNode(
	new IntegerNode(8, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
81 => new ChoiceNode(new IntegerNode(2), [
	0 => 73,
	1 => 43,
	2 => 80,
	3 => 80,
]),
82 => new StructNode([
	"unitLink" => array('type' => 70, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
83 => new ArrayNode(
	new IntegerNode(8, 0),
	82
),
84 => new ArrayNode(
	new IntegerNode(8, 0),
	5
),
85 => new StructNode([
	"subgroupIndex" => array('type' => 10, 'tag' => -4),
	"removeMask" => array('type' => 81, 'tag' => -3),
	"addSubgroups" => array('type' => 83, 'tag' => -2),
	"addUnitTags" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
86 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
87 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 19, 'tag' => -2),
	"mask" => array('type' => 81, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
88 => new StructNode([
	"count" => array('type' => 10, 'tag' => -6),
	"subgroupCount" => array('type' => 10, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 10, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 5, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 5, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 5, 'tag' => -1),
]),
89 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 88, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
90 => new ArrayNode(
	new IntegerNode(3, 0),
	65,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
91 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 90, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
92 => new StructNode([
	"chatMessage" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
93 => new IntegerNode(8, -128),
94 => new StructNode([
	"x" => array('type' => 65, 'tag' => -3),
	"y" => array('type' => 65, 'tag' => -2),
	"z" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
95 => new StructNode([
	"beacon" => array('type' => 93, 'tag' => -7),
	"ally" => array('type' => 93, 'tag' => -6),
	"autocast" => array('type' => 93, 'tag' => -5),
	"targetUnitTag" => array('type' => 5, 'tag' => -4),
	"targetUnitSnapshotUnitLink" => array('type' => 70, 'tag' => -3),
	"targetUnitSnapshotPlayerId" => array('type' => 48, 'tag' => -2),
	"targetPoint" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
96 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
97 => new StructNode([
	"delta" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
98 => new StructNode([
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
99 => new StructNode([
	"alliance" => array('type' => 5, 'tag' => -2),
	"control" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
100 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
101 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
102 => new StructNode([
	"conversationId" => array('type' => 65, 'tag' => -2),
	"replyId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
103 => new StructNode([
	"purchaseItemId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
104 => new StructNode([
	"difficultyLevel" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
105 => new ChoiceNode(new IntegerNode(3), [
	0 => 73,
	1 => 26,
	2 => 5,
	3 => 65,
	4 => 24,
]),
106 => new StructNode([
	"controlId" => array('type' => 65, 'tag' => -3),
	"eventType" => array('type' => 65, 'tag' => -2),
	"eventData" => array('type' => 105, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
107 => new StructNode([
	"soundHash" => array('type' => 5, 'tag' => -2),
	"length" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
108 => new StructNode([
	"soundHash" => array('type' => 84, 'tag' => -2),
	"length" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
109 => new StructNode([
	"syncInfo" => array('type' => 108, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
110 => new StructNode([
	"sound" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
111 => new StructNode([
	"transmissionId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
112 => new StructNode([
	"x" => array('type' => 70, 'tag' => -2),
	"y" => array('type' => 70, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
113 => new OptionalNode(70),
114 => new StructNode([
	"target" => array('type' => 112, 'tag' => -4),
	"distance" => array('type' => 113, 'tag' => -3),
	"pitch" => array('type' => 113, 'tag' => -2),
	"yaw" => array('type' => 113, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
115 => new IntegerNode(1, 0),
116 => new StructNode([
	"skipType" => array('type' => 115, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
117 => new StructNode([
	"button" => array('type' => 5, 'tag' => -7),
	"down" => array('type' => 26, 'tag' => -6),
	"posXUI" => array('type' => 5, 'tag' => -5),
	"posYUI" => array('type' => 5, 'tag' => -4),
	"posXWorld" => array('type' => 65, 'tag' => -3),
	"posYWorld" => array('type' => 65, 'tag' => -2),
	"posZWorld" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
118 => new StructNode([
	"soundtrack" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
119 => new StructNode([
	"planetId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
120 => new StructNode([
	"key" => array('type' => 93, 'tag' => -2),
	"flags" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
121 => new StructNode([
	"resources" => array('type' => 90, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
122 => new StructNode([
	"fulfillRequestId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
123 => new StructNode([
	"cancelRequestId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
124 => new StructNode([
	"researchItemId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
125 => new StructNode([
	"laggingPlayerId" => array('type' => 1, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\LagMessageEvent'
),
126 => new StructNode([
	"mercenaryId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
127 => new StructNode([
	"battleReportId" => array('type' => 65, 'tag' => -2),
	"difficultyLevel" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
128 => new StructNode([
	"battleReportId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
129 => new IntegerNode(19, 0),
130 => new StructNode([
	"decrementMs" => array('type' => 129, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
131 => new StructNode([
	"portraitId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
132 => new StructNode([
	"functionName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
133 => new StructNode([
	"result" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
134 => new StructNode([
	"gameMenuItemIndex" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
135 => new StructNode([
	"reason" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
136 => new StructNode([
	"purchaseCategoryId" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
137 => new StructNode([
	"button" => array('type' => 70, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
138 => new StructNode([
	"recipient" => array('type' => 19, 'tag' => -2),
	"string" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
139 => new StructNode([
	"recipient" => array('type' => 19, 'tag' => -2),
	"point" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
140 => new StructNode([
	"progress" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
]
);
Version16939::$GAME_EVENT_MAPPING = [
	5 => 63,
	7 => 57,
	8 => 59,
	9 => 60,
	10 => 61,
	11 => 62,
	22 => 64,
	23 => 63,
	25 => 63,
	26 => 68,
	27 => 79,
	28 => 86,
	29 => 87,
	30 => 89,
	31 => 91,
	32 => 92,
	33 => 95,
	34 => 96,
	35 => 97,
	37 => 98,
	38 => 99,
	39 => 100,
	40 => 101,
	41 => 102,
	44 => 63,
	45 => 107,
	46 => 110,
	47 => 111,
	48 => 111,
	49 => 114,
	50 => 63,
	51 => 103,
	52 => 63,
	53 => 104,
	54 => 63,
	55 => 106,
	56 => 109,
	57 => 116,
	58 => 117,
	63 => 63,
	64 => 118,
	65 => 119,
	66 => 120,
	67 => 132,
	68 => 63,
	69 => 63,
	70 => 121,
	71 => 122,
	72 => 123,
	73 => 63,
	74 => 63,
	75 => 124,
	76 => 125,
	77 => 63,
	78 => 63,
	79 => 126,
	80 => 63,
	81 => 63,
	82 => 127,
	83 => 128,
	84 => 128,
	85 => 104,
	86 => 63,
	87 => 63,
	88 => 130,
	89 => 131,
	90 => 133,
	91 => 134,
	92 => 135,
	93 => 103,
	94 => 136,
	95 => 137,
	96 => 63,
];
Version16939::$MESSAGE_EVENT_MAPPING = [
	0 => 138,
	1 => 139,
	2 => 140,
	3 => 63,
];
Version16939::$TRACKER_EVENT_MAPPING = NULL;
