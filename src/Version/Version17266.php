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

class Version17266 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 17266;
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
	    return self::$TREE->getNode(55);
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

Version17266::$TREE = new Tree([
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
40 => new IntegerNode(8, 1),
41 => new BitArrayNode(
	new IntegerNode(6, 0)
),
42 => new BitArrayNode(
	new IntegerNode(8, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
43 => new BitArrayNode(
	new IntegerNode(2, 0)
),
44 => new StructNode([
	"allowedColors" => array('type' => 41, 'tag' => -5),
	"allowedRaces" => array('type' => 42, 'tag' => -4),
	"allowedDifficulty" => array('type' => 41, 'tag' => -3),
	"allowedControls" => array('type' => 42, 'tag' => -2),
	"allowedObserveTypes" => array('type' => 43, 'tag' => -1),
]),
45 => new ArrayNode(
	new IntegerNode(5, 0),
	44
),
46 => new StructNode([
	"randomValue" => array('type' => 5, 'tag' => -23),
	"gameCacheName" => array('type' => 23, 'tag' => -22),
	"gameOptions" => array('type' => 38, 'tag' => -21),
	"gameSpeed" => array('type' => 12, 'tag' => -20),
	"gameType" => array('type' => 12, 'tag' => -19),
	"maxUsers" => array('type' => 7, 'tag' => -18),
	"maxObservers" => array('type' => 7, 'tag' => -17),
	"maxPlayers" => array('type' => 7, 'tag' => -16),
	"maxTeams" => array('type' => 39, 'tag' => -15),
	"maxColors" => array('type' => 2, 'tag' => -14),
	"maxRaces" => array('type' => 40, 'tag' => -13),
	"maxControls" => array('type' => 40, 'tag' => -12),
	"mapSizeX" => array('type' => 10, 'tag' => -11),
	"mapSizeY" => array('type' => 10, 'tag' => -10),
	"mapFileSyncChecksum" => array('type' => 5, 'tag' => -9),
	"mapFileName" => array('type' => 24, 'tag' => -8),
	"mapAuthorName" => array('type' => 9, 'tag' => -7),
	"modFileSyncChecksum" => array('type' => 5, 'tag' => -6),
	"slotDescriptions" => array('type' => 45, 'tag' => -5),
	"defaultDifficulty" => array('type' => 2, 'tag' => -4),
	"cacheHandles" => array('type' => 30, 'tag' => -3),
	"isBlizzardMap" => array('type' => 26, 'tag' => -2),
	"isPremadeFFA" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
47 => new OptionalNode(1),
48 => new OptionalNode(7),
49 => new StructNode([
	"color" => array('type' => 48, 'tag' => -1),
]),
50 => new ArrayNode(
	new IntegerNode(5, 0),
	5
),
51 => new StructNode([
	"control" => array('type' => 10, 'tag' => -10),
	"userId" => array('type' => 47, 'tag' => -9),
	"teamId" => array('type' => 1, 'tag' => -8),
	"colorPref" => array('type' => 49, 'tag' => -7),
	"racePref" => array('type' => 34, 'tag' => -6),
	"difficulty" => array('type' => 2, 'tag' => -5),
	"handicap" => array('type' => 0, 'tag' => -4),
	"observe" => array('type' => 19, 'tag' => -3),
	"rewards" => array('type' => 50, 'tag' => -2),
	"toonHandle" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbySlot'
),
52 => new ArrayNode(
	new IntegerNode(5, 0),
	51
),
53 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -9),
	"maxUsers" => array('type' => 7, 'tag' => -8),
	"maxObservers" => array('type' => 7, 'tag' => -7),
	"slots" => array('type' => 52, 'tag' => -6),
	"randomSeed" => array('type' => 5, 'tag' => -5),
	"hostUserId" => array('type' => 47, 'tag' => -4),
	"isSinglePlayer" => array('type' => 26, 'tag' => -3),
	"gameDuration" => array('type' => 5, 'tag' => -2),
	"defaultDifficulty" => array('type' => 2, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
54 => new StructNode([
	"userInitialData" => array('type' => 37, 'tag' => -3),
	"gameDescription" => array('type' => 46, 'tag' => -2),
	"lobbyState" => array('type' => 53, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
55 => new StructNode([
	"syncLobbyState" => array('type' => 54, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
56 => new StructNode([
	"name" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
57 => new BlobNode(new IntegerNode(6, 0)),
58 => new StructNode([
	"name" => array('type' => 57, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
59 => new StructNode([
	"name" => array('type' => 57, 'tag' => -3),
	"type" => array('type' => 5, 'tag' => -2),
	"data" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
60 => new StructNode([
	"type" => array('type' => 5, 'tag' => -3),
	"name" => array('type' => 57, 'tag' => -2),
	"data" => array('type' => 28, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
61 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
62 => new StructNode([
	"signature" => array('type' => 61, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
63 => new StructNode([
	"developmentCheatsEnabled" => array('type' => 26, 'tag' => -4),
	"multiplayerCheatsEnabled" => array('type' => 26, 'tag' => -3),
	"syncChecksummingEnabled" => array('type' => 26, 'tag' => -2),
	"isMapToMapTransition" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
64 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
65 => new StructNode([
	"fileName" => array('type' => 24, 'tag' => -5),
	"automatic" => array('type' => 26, 'tag' => -4),
	"overwrite" => array('type' => 26, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
66 => new IntegerNode(32, -2147483648),
67 => new StructNode([
	"x" => array('type' => 66, 'tag' => -2),
	"y" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
68 => new StructNode([
	"point" => array('type' => 67, 'tag' => -4),
	"time" => array('type' => 66, 'tag' => -3),
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
]),
69 => new StructNode([
	"data" => array('type' => 68, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
70 => new IntegerNode(17, 0),
71 => new IntegerNode(16, 0),
72 => new StructNode([
	"abilLink" => array('type' => 71, 'tag' => -3),
	"abilCmdIndex" => array('type' => 7, 'tag' => -2),
	"abilCmdData" => array('type' => 33, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
73 => new OptionalNode(72),
74 => new NullNode(),
75 => new IntegerNode(20, 0),
76 => new StructNode([
	"x" => array('type' => 75, 'tag' => -3),
	"y" => array('type' => 75, 'tag' => -2),
	"z" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
77 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -6),
	"timer" => array('type' => 10, 'tag' => -5),
	"tag" => array('type' => 5, 'tag' => -4),
	"snapshotUnitLink" => array('type' => 71, 'tag' => -3),
	"snapshotPlayerId" => array('type' => 47, 'tag' => -2),
	"snapshotPoint" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
78 => new ChoiceNode(new IntegerNode(2), [
	0 => 74,
	1 => 76,
	2 => 77,
	3 => 5,
]),
79 => new OptionalNode(5),
80 => new StructNode([
	"cmdFlags" => array('type' => 70, 'tag' => -4),
	"abil" => array('type' => 73, 'tag' => -3),
	"data" => array('type' => 78, 'tag' => -2),
	"otherUnit" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
81 => new ArrayNode(
	new IntegerNode(8, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
82 => new ChoiceNode(new IntegerNode(2), [
	0 => 74,
	1 => 42,
	2 => 81,
	3 => 81,
]),
83 => new StructNode([
	"unitLink" => array('type' => 71, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
84 => new ArrayNode(
	new IntegerNode(8, 0),
	83
),
85 => new ArrayNode(
	new IntegerNode(8, 0),
	5
),
86 => new StructNode([
	"subgroupIndex" => array('type' => 10, 'tag' => -4),
	"removeMask" => array('type' => 82, 'tag' => -3),
	"addSubgroups" => array('type' => 84, 'tag' => -2),
	"addUnitTags" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
87 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 86, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
88 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 19, 'tag' => -2),
	"mask" => array('type' => 82, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
89 => new StructNode([
	"count" => array('type' => 10, 'tag' => -6),
	"subgroupCount" => array('type' => 10, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 10, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 5, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 5, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 5, 'tag' => -1),
]),
90 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 89, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
91 => new ArrayNode(
	new IntegerNode(3, 0),
	66,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
92 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 91, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
93 => new StructNode([
	"chatMessage" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
94 => new IntegerNode(8, -128),
95 => new StructNode([
	"x" => array('type' => 66, 'tag' => -3),
	"y" => array('type' => 66, 'tag' => -2),
	"z" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
96 => new StructNode([
	"beacon" => array('type' => 94, 'tag' => -7),
	"ally" => array('type' => 94, 'tag' => -6),
	"autocast" => array('type' => 94, 'tag' => -5),
	"targetUnitTag" => array('type' => 5, 'tag' => -4),
	"targetUnitSnapshotUnitLink" => array('type' => 71, 'tag' => -3),
	"targetUnitSnapshotPlayerId" => array('type' => 47, 'tag' => -2),
	"targetPoint" => array('type' => 95, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
97 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
98 => new StructNode([
	"delta" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
99 => new StructNode([
	"verb" => array('type' => 23, 'tag' => -2),
	"arguments" => array('type' => 23, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
100 => new StructNode([
	"alliance" => array('type' => 5, 'tag' => -2),
	"control" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
101 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
102 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
103 => new StructNode([
	"conversationId" => array('type' => 66, 'tag' => -2),
	"replyId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
104 => new StructNode([
	"purchaseItemId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
105 => new StructNode([
	"difficultyLevel" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
106 => new ChoiceNode(new IntegerNode(3), [
	0 => 74,
	1 => 26,
	2 => 5,
	3 => 66,
	4 => 24,
]),
107 => new StructNode([
	"controlId" => array('type' => 66, 'tag' => -3),
	"eventType" => array('type' => 66, 'tag' => -2),
	"eventData" => array('type' => 106, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
108 => new StructNode([
	"soundHash" => array('type' => 5, 'tag' => -2),
	"length" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
109 => new StructNode([
	"soundHash" => array('type' => 85, 'tag' => -2),
	"length" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
110 => new StructNode([
	"syncInfo" => array('type' => 109, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
111 => new StructNode([
	"sound" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
112 => new StructNode([
	"transmissionId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
113 => new StructNode([
	"x" => array('type' => 71, 'tag' => -2),
	"y" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
114 => new OptionalNode(71),
115 => new StructNode([
	"target" => array('type' => 113, 'tag' => -4),
	"distance" => array('type' => 114, 'tag' => -3),
	"pitch" => array('type' => 114, 'tag' => -2),
	"yaw" => array('type' => 114, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
116 => new IntegerNode(1, 0),
117 => new StructNode([
	"skipType" => array('type' => 116, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
118 => new IntegerNode(11, 0),
119 => new StructNode([
	"x" => array('type' => 118, 'tag' => -2),
	"y" => array('type' => 118, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
120 => new StructNode([
	"button" => array('type' => 5, 'tag' => -4),
	"down" => array('type' => 26, 'tag' => -3),
	"posUI" => array('type' => 119, 'tag' => -2),
	"posWorld" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
121 => new StructNode([
	"posUI" => array('type' => 119, 'tag' => -2),
	"posWorld" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
122 => new StructNode([
	"soundtrack" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
123 => new StructNode([
	"planetId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
124 => new StructNode([
	"key" => array('type' => 94, 'tag' => -2),
	"flags" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
125 => new StructNode([
	"resources" => array('type' => 91, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
126 => new StructNode([
	"fulfillRequestId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
127 => new StructNode([
	"cancelRequestId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
128 => new StructNode([
	"researchItemId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
129 => new StructNode([
	"laggingPlayerId" => array('type' => 1, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\LagMessageEvent'
),
130 => new StructNode([
	"mercenaryId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
131 => new StructNode([
	"battleReportId" => array('type' => 66, 'tag' => -2),
	"difficultyLevel" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
132 => new StructNode([
	"battleReportId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
133 => new IntegerNode(19, 0),
134 => new StructNode([
	"decrementMs" => array('type' => 133, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
135 => new StructNode([
	"portraitId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
136 => new StructNode([
	"functionName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
137 => new StructNode([
	"result" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
138 => new StructNode([
	"gameMenuItemIndex" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
139 => new StructNode([
	"reason" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
140 => new StructNode([
	"purchaseCategoryId" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
141 => new StructNode([
	"button" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
142 => new StructNode([
	"recipient" => array('type' => 19, 'tag' => -2),
	"string" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
143 => new StructNode([
	"recipient" => array('type' => 19, 'tag' => -2),
	"point" => array('type' => 67, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
144 => new StructNode([
	"progress" => array('type' => 66, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
]
);
Version17266::$GAME_EVENT_MAPPING = [
	5 => 64,
	7 => 56,
	8 => 58,
	9 => 59,
	10 => 60,
	11 => 62,
	12 => 63,
	22 => 65,
	23 => 64,
	25 => 64,
	26 => 69,
	27 => 80,
	28 => 87,
	29 => 88,
	30 => 90,
	31 => 92,
	32 => 93,
	33 => 96,
	34 => 97,
	35 => 98,
	37 => 99,
	38 => 100,
	39 => 101,
	40 => 102,
	41 => 103,
	44 => 64,
	45 => 108,
	46 => 111,
	47 => 112,
	48 => 112,
	49 => 115,
	50 => 64,
	51 => 104,
	52 => 64,
	53 => 105,
	54 => 64,
	55 => 107,
	56 => 110,
	57 => 117,
	58 => 120,
	59 => 121,
	63 => 64,
	64 => 122,
	65 => 123,
	66 => 124,
	67 => 136,
	68 => 64,
	69 => 64,
	70 => 125,
	71 => 126,
	72 => 127,
	73 => 64,
	74 => 64,
	75 => 128,
	76 => 129,
	77 => 64,
	78 => 64,
	79 => 130,
	80 => 64,
	81 => 64,
	82 => 131,
	83 => 132,
	84 => 132,
	85 => 105,
	86 => 64,
	87 => 64,
	88 => 134,
	89 => 135,
	90 => 137,
	91 => 138,
	92 => 139,
	93 => 104,
	94 => 140,
	95 => 141,
	96 => 64,
];
Version17266::$MESSAGE_EVENT_MAPPING = [
	0 => 142,
	1 => 143,
	2 => 144,
	3 => 64,
];
Version17266::$TRACKER_EVENT_MAPPING = NULL;
