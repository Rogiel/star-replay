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

class Version24764 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 24764;
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
	    return self::$TREE->getNode(61);
	}

	public function getGameDetailsNode() {
	    return self::$TREE->getNode(35);
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

Version24764::$TREE = new Tree([
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
	"userId" => array('type' => 7, 'tag' => -1),
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
20 => new OptionalNode(10),
21 => new StructNode([
	"name" => array('type' => 9, 'tag' => 0),
	"toon" => array('type' => 17, 'tag' => 1),
	"race" => array('type' => 9, 'tag' => 2),
	"color" => array('type' => 18, 'tag' => 3),
	"control" => array('type' => 10, 'tag' => 4),
	"teamId" => array('type' => 1, 'tag' => 5),
	"handicap" => array('type' => 0, 'tag' => 6),
	"observe" => array('type' => 19, 'tag' => 7),
	"result" => array('type' => 19, 'tag' => 8),
	"workingSetSlotId" => array('type' => 20, 'tag' => 9),
],
	'Rogiel\StarReplay\Entity\Player'
),
22 => new ArrayNode(
	new IntegerNode(5, 0),
	21,
	'Rogiel\StarReplay\Metadata\Match\PlayerList'

),
23 => new OptionalNode(22),
24 => new BlobNode(new IntegerNode(10, 0)),
25 => new BlobNode(new IntegerNode(11, 0)),
26 => new StructNode([
	"file" => array('type' => 25, 'tag' => 0),
],
	'Rogiel\StarReplay\Entity\Thumbnail'
),
27 => new BooleanNode(),
28 => new IntegerNode(64, -9223372036854775808),
29 => new BlobNode(new IntegerNode(12, 0)),
30 => new BlobNode(new IntegerNode(0, 40)),
31 => new ArrayNode(
	new IntegerNode(6, 0),
	30
),
32 => new OptionalNode(31),
33 => new ArrayNode(
	new IntegerNode(6, 0),
	25
),
34 => new OptionalNode(33),
35 => new StructNode([
	"playerList" => array('type' => 23, 'tag' => 0),
	"title" => array('type' => 24, 'tag' => 1),
	"difficulty" => array('type' => 9, 'tag' => 2),
	"thumbnail" => array('type' => 26, 'tag' => 3),
	"isBlizzardMap" => array('type' => 27, 'tag' => 4),
	"timeUTC" => array('type' => 28, 'tag' => 5),
	"timeLocalOffset" => array('type' => 28, 'tag' => 6),
	"description" => array('type' => 29, 'tag' => 7),
	"imageFilePath" => array('type' => 25, 'tag' => 8),
	"campaignIndex" => array('type' => 10, 'tag' => 15),
	"mapFileName" => array('type' => 25, 'tag' => 9),
	"cacheHandles" => array('type' => 32, 'tag' => 10),
	"miniSave" => array('type' => 27, 'tag' => 11),
	"gameSpeed" => array('type' => 12, 'tag' => 12),
	"defaultDifficulty" => array('type' => 2, 'tag' => 13),
	"modPaths" => array('type' => 34, 'tag' => 14),
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
36 => new OptionalNode(9),
37 => new OptionalNode(5),
38 => new StructNode([
	"race" => array('type' => 20, 'tag' => -1),
]),
39 => new StructNode([
	"team" => array('type' => 20, 'tag' => -1),
]),
40 => new StructNode([
	"name" => array('type' => 9, 'tag' => -12),
	"clanTag" => array('type' => 36, 'tag' => -11),
	"highestLeague" => array('type' => 20, 'tag' => -10),
	"combinedRaceLevels" => array('type' => 37, 'tag' => -9),
	"randomSeed" => array('type' => 5, 'tag' => -8),
	"racePreference" => array('type' => 38, 'tag' => -7),
	"teamPreference" => array('type' => 39, 'tag' => -6),
	"testMap" => array('type' => 27, 'tag' => -5),
	"testAuto" => array('type' => 27, 'tag' => -4),
	"examine" => array('type' => 27, 'tag' => -3),
	"customInterface" => array('type' => 27, 'tag' => -2),
	"observe" => array('type' => 19, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
41 => new ArrayNode(
	new IntegerNode(5, 0),
	40,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
42 => new StructNode([
	"lockTeams" => array('type' => 27, 'tag' => -12),
	"teamsTogether" => array('type' => 27, 'tag' => -11),
	"advancedSharedControl" => array('type' => 27, 'tag' => -10),
	"randomRaces" => array('type' => 27, 'tag' => -9),
	"battleNet" => array('type' => 27, 'tag' => -8),
	"amm" => array('type' => 27, 'tag' => -7),
	"competitive" => array('type' => 27, 'tag' => -6),
	"noVictoryOrDefeat" => array('type' => 27, 'tag' => -5),
	"fog" => array('type' => 19, 'tag' => -4),
	"observers" => array('type' => 19, 'tag' => -3),
	"userDifficulty" => array('type' => 19, 'tag' => -2),
	"clientDebugFlags" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameOptions'
),
43 => new IntegerNode(4, 1),
44 => new IntegerNode(8, 1),
45 => new BitArrayNode(
	new IntegerNode(6, 0)
),
46 => new BitArrayNode(
	new IntegerNode(8, 0)
),
47 => new BitArrayNode(
	new IntegerNode(2, 0)
),
48 => new BitArrayNode(
	new IntegerNode(7, 0)
),
49 => new StructNode([
	"allowedColors" => array('type' => 45, 'tag' => -6),
	"allowedRaces" => array('type' => 46, 'tag' => -5),
	"allowedDifficulty" => array('type' => 45, 'tag' => -4),
	"allowedControls" => array('type' => 46, 'tag' => -3),
	"allowedObserveTypes" => array('type' => 47, 'tag' => -2),
	"allowedAIBuilds" => array('type' => 48, 'tag' => -1),
]),
50 => new ArrayNode(
	new IntegerNode(5, 0),
	49
),
51 => new StructNode([
	"randomValue" => array('type' => 5, 'tag' => -25),
	"gameCacheName" => array('type' => 24, 'tag' => -24),
	"gameOptions" => array('type' => 42, 'tag' => -23),
	"gameSpeed" => array('type' => 12, 'tag' => -22),
	"gameType" => array('type' => 12, 'tag' => -21),
	"maxUsers" => array('type' => 7, 'tag' => -20),
	"maxObservers" => array('type' => 7, 'tag' => -19),
	"maxPlayers" => array('type' => 7, 'tag' => -18),
	"maxTeams" => array('type' => 43, 'tag' => -17),
	"maxColors" => array('type' => 2, 'tag' => -16),
	"maxRaces" => array('type' => 44, 'tag' => -15),
	"maxControls" => array('type' => 44, 'tag' => -14),
	"mapSizeX" => array('type' => 10, 'tag' => -13),
	"mapSizeY" => array('type' => 10, 'tag' => -12),
	"mapFileSyncChecksum" => array('type' => 5, 'tag' => -11),
	"mapFileName" => array('type' => 25, 'tag' => -10),
	"mapAuthorName" => array('type' => 9, 'tag' => -9),
	"modFileSyncChecksum" => array('type' => 5, 'tag' => -8),
	"slotDescriptions" => array('type' => 50, 'tag' => -7),
	"defaultDifficulty" => array('type' => 2, 'tag' => -6),
	"defaultAIBuild" => array('type' => 0, 'tag' => -5),
	"cacheHandles" => array('type' => 31, 'tag' => -4),
	"isBlizzardMap" => array('type' => 27, 'tag' => -3),
	"isPremadeFFA" => array('type' => 27, 'tag' => -2),
	"isCoopMode" => array('type' => 27, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
52 => new OptionalNode(1),
53 => new OptionalNode(7),
54 => new StructNode([
	"color" => array('type' => 53, 'tag' => -1),
]),
55 => new ArrayNode(
	new IntegerNode(6, 0),
	5
),
56 => new ArrayNode(
	new IntegerNode(9, 0),
	5
),
57 => new StructNode([
	"control" => array('type' => 10, 'tag' => -13),
	"userId" => array('type' => 52, 'tag' => -12),
	"teamId" => array('type' => 1, 'tag' => -11),
	"colorPref" => array('type' => 54, 'tag' => -10),
	"racePref" => array('type' => 38, 'tag' => -9),
	"difficulty" => array('type' => 2, 'tag' => -8),
	"aiBuild" => array('type' => 0, 'tag' => -7),
	"handicap" => array('type' => 0, 'tag' => -6),
	"observe" => array('type' => 19, 'tag' => -5),
	"workingSetSlotId" => array('type' => 20, 'tag' => -4),
	"rewards" => array('type' => 55, 'tag' => -3),
	"toonHandle" => array('type' => 15, 'tag' => -2),
	"licenses" => array('type' => 56, 'tag' => -1),
]),
58 => new ArrayNode(
	new IntegerNode(5, 0),
	57
),
59 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -10),
	"maxUsers" => array('type' => 7, 'tag' => -9),
	"maxObservers" => array('type' => 7, 'tag' => -8),
	"slots" => array('type' => 58, 'tag' => -7),
	"randomSeed" => array('type' => 5, 'tag' => -6),
	"hostUserId" => array('type' => 52, 'tag' => -5),
	"isSinglePlayer" => array('type' => 27, 'tag' => -4),
	"gameDuration" => array('type' => 5, 'tag' => -3),
	"defaultDifficulty" => array('type' => 2, 'tag' => -2),
	"defaultAIBuild" => array('type' => 0, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
60 => new StructNode([
	"userInitialData" => array('type' => 41, 'tag' => -3),
	"gameDescription" => array('type' => 51, 'tag' => -2),
	"lobbyState" => array('type' => 59, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
61 => new StructNode([
	"syncLobbyState" => array('type' => 60, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
62 => new StructNode([
	"name" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
63 => new BlobNode(new IntegerNode(6, 0)),
64 => new StructNode([
	"name" => array('type' => 63, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
65 => new StructNode([
	"name" => array('type' => 63, 'tag' => -3),
	"type" => array('type' => 5, 'tag' => -2),
	"data" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
66 => new StructNode([
	"type" => array('type' => 5, 'tag' => -3),
	"name" => array('type' => 63, 'tag' => -2),
	"data" => array('type' => 29, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
67 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
68 => new StructNode([
	"signature" => array('type' => 67, 'tag' => -2),
	"toonHandle" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
69 => new StructNode([
	"gameFullyDownloaded" => array('type' => 27, 'tag' => -7),
	"developmentCheatsEnabled" => array('type' => 27, 'tag' => -6),
	"multiplayerCheatsEnabled" => array('type' => 27, 'tag' => -5),
	"syncChecksummingEnabled" => array('type' => 27, 'tag' => -4),
	"isMapToMapTransition" => array('type' => 27, 'tag' => -3),
	"startingRally" => array('type' => 27, 'tag' => -2),
	"baseBuildNum" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
70 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
71 => new StructNode([
	"fileName" => array('type' => 25, 'tag' => -5),
	"automatic" => array('type' => 27, 'tag' => -4),
	"overwrite" => array('type' => 27, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
72 => new IntegerNode(32, -2147483648),
73 => new StructNode([
	"x" => array('type' => 72, 'tag' => -2),
	"y" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
74 => new StructNode([
	"point" => array('type' => 73, 'tag' => -4),
	"time" => array('type' => 72, 'tag' => -3),
	"verb" => array('type' => 24, 'tag' => -2),
	"arguments" => array('type' => 24, 'tag' => -1),
]),
75 => new StructNode([
	"data" => array('type' => 74, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
76 => new IntegerNode(20, 0),
77 => new IntegerNode(16, 0),
78 => new StructNode([
	"abilLink" => array('type' => 77, 'tag' => -3),
	"abilCmdIndex" => array('type' => 7, 'tag' => -2),
	"abilCmdData" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
79 => new OptionalNode(78),
80 => new NullNode(),
81 => new StructNode([
	"x" => array('type' => 76, 'tag' => -3),
	"y" => array('type' => 76, 'tag' => -2),
	"z" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
82 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 5, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 77, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 52, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 52, 'tag' => -2),
	"snapshotPoint" => array('type' => 81, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
83 => new ChoiceNode(new IntegerNode(2), [
	0 => 80,
	1 => 81,
	2 => 82,
	3 => 5,
]),
84 => new StructNode([
	"cmdFlags" => array('type' => 76, 'tag' => -4),
	"abil" => array('type' => 79, 'tag' => -3),
	"data" => array('type' => 83, 'tag' => -2),
	"otherUnit" => array('type' => 37, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
85 => new IntegerNode(9, 0),
86 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
87 => new ArrayNode(
	new IntegerNode(9, 0),
	85,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
88 => new ChoiceNode(new IntegerNode(2), [
	0 => 80,
	1 => 86,
	2 => 87,
	3 => 87,
]),
89 => new StructNode([
	"unitLink" => array('type' => 77, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
90 => new ArrayNode(
	new IntegerNode(9, 0),
	89
),
91 => new StructNode([
	"subgroupIndex" => array('type' => 85, 'tag' => -4),
	"removeMask" => array('type' => 88, 'tag' => -3),
	"addSubgroups" => array('type' => 90, 'tag' => -2),
	"addUnitTags" => array('type' => 56, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
92 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 91, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
93 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 19, 'tag' => -2),
	"mask" => array('type' => 88, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
94 => new StructNode([
	"count" => array('type' => 85, 'tag' => -6),
	"subgroupCount" => array('type' => 85, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 85, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 5, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 5, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 5, 'tag' => -1),
]),
95 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
96 => new ArrayNode(
	new IntegerNode(3, 0),
	72,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
97 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 96, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
98 => new StructNode([
	"chatMessage" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
99 => new IntegerNode(8, -128),
100 => new StructNode([
	"x" => array('type' => 72, 'tag' => -3),
	"y" => array('type' => 72, 'tag' => -2),
	"z" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
101 => new StructNode([
	"beacon" => array('type' => 99, 'tag' => -9),
	"ally" => array('type' => 99, 'tag' => -8),
	"flags" => array('type' => 99, 'tag' => -7),
	"build" => array('type' => 99, 'tag' => -6),
	"targetUnitTag" => array('type' => 5, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 77, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 99, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 99, 'tag' => -2),
	"targetPoint" => array('type' => 100, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
102 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
103 => new StructNode([
	"delta" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
104 => new StructNode([
	"point" => array('type' => 73, 'tag' => -3),
	"unit" => array('type' => 5, 'tag' => -2),
	"pingedMinimap" => array('type' => 27, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
105 => new StructNode([
	"verb" => array('type' => 24, 'tag' => -2),
	"arguments" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
106 => new StructNode([
	"alliance" => array('type' => 5, 'tag' => -2),
	"control" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
107 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
108 => new StructNode([
	"unitTag" => array('type' => 5, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
109 => new StructNode([
	"conversationId" => array('type' => 72, 'tag' => -2),
	"replyId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
110 => new OptionalNode(15),
111 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -4),
	"name" => array('type' => 9, 'tag' => -3),
	"toonHandle" => array('type' => 110, 'tag' => -2),
	"clanTag" => array('type' => 36, 'tag' => -1),
]),
112 => new ArrayNode(
	new IntegerNode(5, 0),
	111
),
113 => new StructNode([
	"userInfos" => array('type' => 112, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
114 => new StructNode([
	"purchaseItemId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
115 => new StructNode([
	"difficultyLevel" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
116 => new ChoiceNode(new IntegerNode(3), [
	0 => 80,
	1 => 27,
	2 => 5,
	3 => 72,
	4 => 25,
	5 => 5,
]),
117 => new StructNode([
	"controlId" => array('type' => 72, 'tag' => -3),
	"eventType" => array('type' => 72, 'tag' => -2),
	"eventData" => array('type' => 116, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
118 => new StructNode([
	"soundHash" => array('type' => 5, 'tag' => -2),
	"length" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
119 => new ArrayNode(
	new IntegerNode(7, 0),
	5
),
120 => new StructNode([
	"soundHash" => array('type' => 119, 'tag' => -2),
	"length" => array('type' => 119, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
121 => new StructNode([
	"syncInfo" => array('type' => 120, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
122 => new StructNode([
	"sound" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
123 => new StructNode([
	"transmissionId" => array('type' => 72, 'tag' => -2),
	"thread" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
124 => new StructNode([
	"transmissionId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
125 => new StructNode([
	"x" => array('type' => 77, 'tag' => -2),
	"y" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
126 => new OptionalNode(125),
127 => new OptionalNode(77),
128 => new StructNode([
	"target" => array('type' => 126, 'tag' => -4),
	"distance" => array('type' => 127, 'tag' => -3),
	"pitch" => array('type' => 127, 'tag' => -2),
	"yaw" => array('type' => 127, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
129 => new IntegerNode(1, 0),
130 => new StructNode([
	"skipType" => array('type' => 129, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
131 => new IntegerNode(11, 0),
132 => new StructNode([
	"x" => array('type' => 131, 'tag' => -2),
	"y" => array('type' => 131, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
133 => new StructNode([
	"button" => array('type' => 5, 'tag' => -4),
	"down" => array('type' => 27, 'tag' => -3),
	"posUI" => array('type' => 132, 'tag' => -2),
	"posWorld" => array('type' => 81, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
134 => new StructNode([
	"posUI" => array('type' => 132, 'tag' => -2),
	"posWorld" => array('type' => 81, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
135 => new StructNode([
	"achievementLink" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
136 => new StructNode([
	"abilLink" => array('type' => 77, 'tag' => -3),
	"abilCmdIndex" => array('type' => 7, 'tag' => -2),
	"state" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
137 => new StructNode([
	"soundtrack" => array('type' => 5, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
138 => new StructNode([
	"planetId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
139 => new StructNode([
	"key" => array('type' => 99, 'tag' => -2),
	"flags" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
140 => new StructNode([
	"resources" => array('type' => 96, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
141 => new StructNode([
	"fulfillRequestId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
142 => new StructNode([
	"cancelRequestId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
143 => new StructNode([
	"researchItemId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
144 => new StructNode([
	"mercenaryId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
145 => new StructNode([
	"battleReportId" => array('type' => 72, 'tag' => -2),
	"difficultyLevel" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
146 => new StructNode([
	"battleReportId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
147 => new IntegerNode(19, 0),
148 => new StructNode([
	"decrementMs" => array('type' => 147, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
149 => new StructNode([
	"portraitId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
150 => new StructNode([
	"functionName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
151 => new StructNode([
	"result" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
152 => new StructNode([
	"gameMenuItemIndex" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
153 => new StructNode([
	"reason" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
154 => new StructNode([
	"purchaseCategoryId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
155 => new StructNode([
	"button" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
156 => new StructNode([
	"cutsceneId" => array('type' => 72, 'tag' => -2),
	"bookmarkName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
157 => new StructNode([
	"cutsceneId" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
158 => new StructNode([
	"cutsceneId" => array('type' => 72, 'tag' => -3),
	"conversationLine" => array('type' => 15, 'tag' => -2),
	"altConversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
159 => new StructNode([
	"cutsceneId" => array('type' => 72, 'tag' => -2),
	"conversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
160 => new StructNode([
	"observe" => array('type' => 19, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"toonHandle" => array('type' => 110, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
161 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
162 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 73, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
163 => new StructNode([
	"progress" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
]
);
Version24764::$GAME_EVENT_MAPPING = [
	5 => 70,
	7 => 69,
	9 => 62,
	10 => 64,
	11 => 65,
	12 => 66,
	13 => 68,
	21 => 71,
	22 => 70,
	23 => 70,
	26 => 75,
	27 => 84,
	28 => 92,
	29 => 93,
	30 => 95,
	31 => 97,
	32 => 98,
	33 => 101,
	34 => 102,
	35 => 103,
	36 => 104,
	37 => 105,
	38 => 106,
	39 => 107,
	40 => 108,
	41 => 109,
	43 => 113,
	44 => 70,
	45 => 118,
	46 => 122,
	47 => 123,
	48 => 124,
	49 => 128,
	50 => 70,
	51 => 114,
	52 => 70,
	53 => 115,
	54 => 70,
	55 => 117,
	56 => 121,
	57 => 130,
	58 => 133,
	59 => 134,
	60 => 135,
	62 => 136,
	63 => 70,
	64 => 137,
	65 => 138,
	66 => 139,
	67 => 150,
	68 => 70,
	69 => 70,
	70 => 140,
	71 => 141,
	72 => 142,
	73 => 70,
	74 => 70,
	75 => 143,
	77 => 70,
	78 => 70,
	79 => 144,
	80 => 70,
	81 => 70,
	82 => 145,
	83 => 146,
	84 => 146,
	85 => 115,
	86 => 70,
	87 => 70,
	88 => 148,
	89 => 149,
	90 => 151,
	91 => 152,
	92 => 153,
	93 => 114,
	94 => 154,
	95 => 155,
	96 => 70,
	97 => 156,
	98 => 157,
	99 => 158,
	100 => 159,
	101 => 70,
	102 => 160,
];
Version24764::$MESSAGE_EVENT_MAPPING = [
	0 => 161,
	1 => 162,
	2 => 163,
	3 => 70,
];
Version24764::$TRACKER_EVENT_MAPPING = NULL;
