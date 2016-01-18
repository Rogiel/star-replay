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

class Version24944 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 24944;
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

Version24944::$TREE = new Tree([
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
13 => new StructNode([
	"signature" => array('type' => 9, 'tag' => 0),
	"version" => array('type' => 11, 'tag' => 1),
	"type" => array('type' => 12, 'tag' => 2),
	"elapsedGameLoops" => array('type' => 6, 'tag' => 3),
],
	'Rogiel\StarReplay\Metadata\Header\Header'
),
14 => new FourCCNode(),
15 => new BlobNode(new IntegerNode(7, 0)),
16 => new IntegerNode(64, 0),
17 => new StructNode([
	"region" => array('type' => 10, 'tag' => 0),
	"programId" => array('type' => 14, 'tag' => 1),
	"realm" => array('type' => 6, 'tag' => 2),
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
	"defaultDifficulty" => array('type' => 3, 'tag' => 13),
	"modPaths" => array('type' => 34, 'tag' => 14),
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
36 => new OptionalNode(9),
37 => new OptionalNode(6),
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
	"randomSeed" => array('type' => 6, 'tag' => -8),
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
	"randomValue" => array('type' => 6, 'tag' => -25),
	"gameCacheName" => array('type' => 24, 'tag' => -24),
	"gameOptions" => array('type' => 42, 'tag' => -23),
	"gameSpeed" => array('type' => 12, 'tag' => -22),
	"gameType" => array('type' => 12, 'tag' => -21),
	"maxUsers" => array('type' => 2, 'tag' => -20),
	"maxObservers" => array('type' => 2, 'tag' => -19),
	"maxPlayers" => array('type' => 2, 'tag' => -18),
	"maxTeams" => array('type' => 43, 'tag' => -17),
	"maxColors" => array('type' => 3, 'tag' => -16),
	"maxRaces" => array('type' => 44, 'tag' => -15),
	"maxControls" => array('type' => 44, 'tag' => -14),
	"mapSizeX" => array('type' => 10, 'tag' => -13),
	"mapSizeY" => array('type' => 10, 'tag' => -12),
	"mapFileSyncChecksum" => array('type' => 6, 'tag' => -11),
	"mapFileName" => array('type' => 25, 'tag' => -10),
	"mapAuthorName" => array('type' => 9, 'tag' => -9),
	"modFileSyncChecksum" => array('type' => 6, 'tag' => -8),
	"slotDescriptions" => array('type' => 50, 'tag' => -7),
	"defaultDifficulty" => array('type' => 3, 'tag' => -6),
	"defaultAIBuild" => array('type' => 0, 'tag' => -5),
	"cacheHandles" => array('type' => 31, 'tag' => -4),
	"isBlizzardMap" => array('type' => 27, 'tag' => -3),
	"isPremadeFFA" => array('type' => 27, 'tag' => -2),
	"isCoopMode" => array('type' => 27, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
52 => new OptionalNode(1),
53 => new OptionalNode(2),
54 => new StructNode([
	"color" => array('type' => 53, 'tag' => -1),
]),
55 => new ArrayNode(
	new IntegerNode(6, 0),
	6
),
56 => new ArrayNode(
	new IntegerNode(9, 0),
	6
),
57 => new StructNode([
	"control" => array('type' => 10, 'tag' => -13),
	"userId" => array('type' => 52, 'tag' => -12),
	"teamId" => array('type' => 1, 'tag' => -11),
	"colorPref" => array('type' => 54, 'tag' => -10),
	"racePref" => array('type' => 38, 'tag' => -9),
	"difficulty" => array('type' => 3, 'tag' => -8),
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
	"maxUsers" => array('type' => 2, 'tag' => -9),
	"maxObservers" => array('type' => 2, 'tag' => -8),
	"slots" => array('type' => 58, 'tag' => -7),
	"randomSeed" => array('type' => 6, 'tag' => -6),
	"hostUserId" => array('type' => 52, 'tag' => -5),
	"isSinglePlayer" => array('type' => 27, 'tag' => -4),
	"gameDuration" => array('type' => 6, 'tag' => -3),
	"defaultDifficulty" => array('type' => 3, 'tag' => -2),
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
	"type" => array('type' => 6, 'tag' => -2),
	"data" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
66 => new StructNode([
	"type" => array('type' => 6, 'tag' => -3),
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
	"baseBuildNum" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
70 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
71 => new IntegerNode(16, 0),
72 => new StructNode([
	"x" => array('type' => 71, 'tag' => -2),
	"y" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
73 => new StructNode([
	"which" => array('type' => 12, 'tag' => -2),
	"target" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraSaveEvent'
),
74 => new StructNode([
	"fileName" => array('type' => 25, 'tag' => -5),
	"automatic" => array('type' => 27, 'tag' => -4),
	"overwrite" => array('type' => 27, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
75 => new IntegerNode(32, -2147483648),
76 => new StructNode([
	"x" => array('type' => 75, 'tag' => -2),
	"y" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
77 => new StructNode([
	"point" => array('type' => 76, 'tag' => -4),
	"time" => array('type' => 75, 'tag' => -3),
	"verb" => array('type' => 24, 'tag' => -2),
	"arguments" => array('type' => 24, 'tag' => -1),
]),
78 => new StructNode([
	"data" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
79 => new IntegerNode(20, 0),
80 => new StructNode([
	"abilLink" => array('type' => 71, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"abilCmdData" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
81 => new OptionalNode(80),
82 => new NullNode(),
83 => new StructNode([
	"x" => array('type' => 79, 'tag' => -3),
	"y" => array('type' => 79, 'tag' => -2),
	"z" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
84 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 6, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 71, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 52, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 52, 'tag' => -2),
	"snapshotPoint" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
85 => new ChoiceNode(new IntegerNode(2), [
	0 => 82,
	1 => 83,
	2 => 84,
	3 => 6,
]),
86 => new StructNode([
	"cmdFlags" => array('type' => 79, 'tag' => -4),
	"abil" => array('type' => 81, 'tag' => -3),
	"data" => array('type' => 85, 'tag' => -2),
	"otherUnit" => array('type' => 37, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
87 => new IntegerNode(9, 0),
88 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
89 => new ArrayNode(
	new IntegerNode(9, 0),
	87,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
90 => new ChoiceNode(new IntegerNode(2), [
	0 => 82,
	1 => 88,
	2 => 89,
	3 => 89,
]),
91 => new StructNode([
	"unitLink" => array('type' => 71, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 87, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
92 => new ArrayNode(
	new IntegerNode(9, 0),
	91
),
93 => new StructNode([
	"subgroupIndex" => array('type' => 87, 'tag' => -4),
	"removeMask" => array('type' => 90, 'tag' => -3),
	"addSubgroups" => array('type' => 92, 'tag' => -2),
	"addUnitTags" => array('type' => 56, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
94 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 93, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
95 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 19, 'tag' => -2),
	"mask" => array('type' => 90, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
96 => new StructNode([
	"count" => array('type' => 87, 'tag' => -6),
	"subgroupCount" => array('type' => 87, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 87, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 6, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 6, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 6, 'tag' => -1),
]),
97 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 96, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
98 => new ArrayNode(
	new IntegerNode(3, 0),
	75,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
99 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 98, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
100 => new StructNode([
	"chatMessage" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
101 => new IntegerNode(8, -128),
102 => new StructNode([
	"x" => array('type' => 75, 'tag' => -3),
	"y" => array('type' => 75, 'tag' => -2),
	"z" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
103 => new StructNode([
	"beacon" => array('type' => 101, 'tag' => -9),
	"ally" => array('type' => 101, 'tag' => -8),
	"flags" => array('type' => 101, 'tag' => -7),
	"build" => array('type' => 101, 'tag' => -6),
	"targetUnitTag" => array('type' => 6, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 71, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 101, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 101, 'tag' => -2),
	"targetPoint" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
104 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
105 => new StructNode([
	"delta" => array('type' => 101, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
106 => new StructNode([
	"point" => array('type' => 76, 'tag' => -3),
	"unit" => array('type' => 6, 'tag' => -2),
	"pingedMinimap" => array('type' => 27, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
107 => new StructNode([
	"verb" => array('type' => 24, 'tag' => -2),
	"arguments" => array('type' => 24, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
108 => new StructNode([
	"alliance" => array('type' => 6, 'tag' => -2),
	"control" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
109 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
110 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
111 => new StructNode([
	"conversationId" => array('type' => 75, 'tag' => -2),
	"replyId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
112 => new OptionalNode(15),
113 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -5),
	"observe" => array('type' => 19, 'tag' => -4),
	"name" => array('type' => 9, 'tag' => -3),
	"toonHandle" => array('type' => 112, 'tag' => -2),
	"clanTag" => array('type' => 36, 'tag' => -1),
]),
114 => new ArrayNode(
	new IntegerNode(5, 0),
	113
),
115 => new IntegerNode(1, 0),
116 => new StructNode([
	"userInfos" => array('type' => 114, 'tag' => -2),
	"method" => array('type' => 115, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
117 => new StructNode([
	"purchaseItemId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
118 => new StructNode([
	"difficultyLevel" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
119 => new ChoiceNode(new IntegerNode(3), [
	0 => 82,
	1 => 27,
	2 => 6,
	3 => 75,
	4 => 25,
	5 => 6,
]),
120 => new StructNode([
	"controlId" => array('type' => 75, 'tag' => -3),
	"eventType" => array('type' => 75, 'tag' => -2),
	"eventData" => array('type' => 119, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
121 => new StructNode([
	"soundHash" => array('type' => 6, 'tag' => -2),
	"length" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
122 => new ArrayNode(
	new IntegerNode(7, 0),
	6
),
123 => new StructNode([
	"soundHash" => array('type' => 122, 'tag' => -2),
	"length" => array('type' => 122, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
124 => new StructNode([
	"syncInfo" => array('type' => 123, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
125 => new StructNode([
	"sound" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
126 => new StructNode([
	"transmissionId" => array('type' => 75, 'tag' => -2),
	"thread" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
127 => new StructNode([
	"transmissionId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
128 => new OptionalNode(72),
129 => new OptionalNode(71),
130 => new StructNode([
	"target" => array('type' => 128, 'tag' => -4),
	"distance" => array('type' => 129, 'tag' => -3),
	"pitch" => array('type' => 129, 'tag' => -2),
	"yaw" => array('type' => 129, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
131 => new StructNode([
	"skipType" => array('type' => 115, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
132 => new IntegerNode(11, 0),
133 => new StructNode([
	"x" => array('type' => 132, 'tag' => -2),
	"y" => array('type' => 132, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
134 => new StructNode([
	"button" => array('type' => 6, 'tag' => -4),
	"down" => array('type' => 27, 'tag' => -3),
	"posUI" => array('type' => 133, 'tag' => -2),
	"posWorld" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
135 => new StructNode([
	"posUI" => array('type' => 133, 'tag' => -2),
	"posWorld" => array('type' => 83, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
136 => new StructNode([
	"achievementLink" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
137 => new StructNode([
	"abilLink" => array('type' => 71, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"state" => array('type' => 101, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
138 => new StructNode([
	"soundtrack" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
139 => new StructNode([
	"planetId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
140 => new StructNode([
	"key" => array('type' => 101, 'tag' => -2),
	"flags" => array('type' => 101, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
141 => new StructNode([
	"resources" => array('type' => 98, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
142 => new StructNode([
	"fulfillRequestId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
143 => new StructNode([
	"cancelRequestId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
144 => new StructNode([
	"researchItemId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
145 => new StructNode([
	"mercenaryId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
146 => new StructNode([
	"battleReportId" => array('type' => 75, 'tag' => -2),
	"difficultyLevel" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
147 => new StructNode([
	"battleReportId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
148 => new IntegerNode(19, 0),
149 => new StructNode([
	"decrementMs" => array('type' => 148, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
150 => new StructNode([
	"portraitId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
151 => new StructNode([
	"functionName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
152 => new StructNode([
	"result" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
153 => new StructNode([
	"gameMenuItemIndex" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
154 => new StructNode([
	"reason" => array('type' => 101, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
155 => new StructNode([
	"purchaseCategoryId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
156 => new StructNode([
	"button" => array('type' => 71, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
157 => new StructNode([
	"cutsceneId" => array('type' => 75, 'tag' => -2),
	"bookmarkName" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
158 => new StructNode([
	"cutsceneId" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
159 => new StructNode([
	"cutsceneId" => array('type' => 75, 'tag' => -3),
	"conversationLine" => array('type' => 15, 'tag' => -2),
	"altConversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
160 => new StructNode([
	"cutsceneId" => array('type' => 75, 'tag' => -2),
	"conversationLine" => array('type' => 15, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
161 => new StructNode([
	"observe" => array('type' => 19, 'tag' => -4),
	"name" => array('type' => 9, 'tag' => -3),
	"toonHandle" => array('type' => 112, 'tag' => -2),
	"clanTag" => array('type' => 36, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
162 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
163 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
164 => new StructNode([
	"progress" => array('type' => 75, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
165 => new StructNode([
	"scoreValueMineralsCurrent" => array('type' => 75, 'tag' => 0),
	"scoreValueVespeneCurrent" => array('type' => 75, 'tag' => 1),
	"scoreValueMineralsCollectionRate" => array('type' => 75, 'tag' => 2),
	"scoreValueVespeneCollectionRate" => array('type' => 75, 'tag' => 3),
	"scoreValueWorkersActiveCount" => array('type' => 75, 'tag' => 4),
	"scoreValueMineralsUsedInProgressArmy" => array('type' => 75, 'tag' => 5),
	"scoreValueMineralsUsedInProgressEconomy" => array('type' => 75, 'tag' => 6),
	"scoreValueMineralsUsedInProgressTechnology" => array('type' => 75, 'tag' => 7),
	"scoreValueVespeneUsedInProgressArmy" => array('type' => 75, 'tag' => 8),
	"scoreValueVespeneUsedInProgressEconomy" => array('type' => 75, 'tag' => 9),
	"scoreValueVespeneUsedInProgressTechnology" => array('type' => 75, 'tag' => 10),
	"scoreValueMineralsUsedCurrentArmy" => array('type' => 75, 'tag' => 11),
	"scoreValueMineralsUsedCurrentEconomy" => array('type' => 75, 'tag' => 12),
	"scoreValueMineralsUsedCurrentTechnology" => array('type' => 75, 'tag' => 13),
	"scoreValueVespeneUsedCurrentArmy" => array('type' => 75, 'tag' => 14),
	"scoreValueVespeneUsedCurrentEconomy" => array('type' => 75, 'tag' => 15),
	"scoreValueVespeneUsedCurrentTechnology" => array('type' => 75, 'tag' => 16),
	"scoreValueMineralsLostArmy" => array('type' => 75, 'tag' => 17),
	"scoreValueMineralsLostEconomy" => array('type' => 75, 'tag' => 18),
	"scoreValueMineralsLostTechnology" => array('type' => 75, 'tag' => 19),
	"scoreValueVespeneLostArmy" => array('type' => 75, 'tag' => 20),
	"scoreValueVespeneLostEconomy" => array('type' => 75, 'tag' => 21),
	"scoreValueVespeneLostTechnology" => array('type' => 75, 'tag' => 22),
	"scoreValueMineralsKilledArmy" => array('type' => 75, 'tag' => 23),
	"scoreValueMineralsKilledEconomy" => array('type' => 75, 'tag' => 24),
	"scoreValueMineralsKilledTechnology" => array('type' => 75, 'tag' => 25),
	"scoreValueVespeneKilledArmy" => array('type' => 75, 'tag' => 26),
	"scoreValueVespeneKilledEconomy" => array('type' => 75, 'tag' => 27),
	"scoreValueVespeneKilledTechnology" => array('type' => 75, 'tag' => 28),
	"scoreValueFoodUsed" => array('type' => 75, 'tag' => 29),
	"scoreValueFoodMade" => array('type' => 75, 'tag' => 30),
	"scoreValueMineralsUsedActiveForces" => array('type' => 75, 'tag' => 31),
	"scoreValueVespeneUsedActiveForces" => array('type' => 75, 'tag' => 32),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStats'
),
166 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"stats" => array('type' => 165, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStatsEvent'
),
167 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 24, 'tag' => 2),
	"controlPlayerId" => array('type' => 1, 'tag' => 3),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 4),
	"x" => array('type' => 10, 'tag' => 5),
	"y" => array('type' => 10, 'tag' => 6),
],
	'Rogiel\StarReplay\Event\Tracker\UnitInitEvent'
),
168 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"killerPlayerId" => array('type' => 52, 'tag' => 2),
	"x" => array('type' => 10, 'tag' => 3),
	"y" => array('type' => 10, 'tag' => 4),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDiedEvent'
),
169 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"controlPlayerId" => array('type' => 1, 'tag' => 2),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\UnitOwnerChangeEvent'
),
170 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 24, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UnitTypeChangeEvent'
),
171 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"upgradeTypeName" => array('type' => 24, 'tag' => 1),
	"count" => array('type' => 75, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UpgradeEvent'
),
172 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDoneEvent'
),
173 => new ArrayNode(
	new IntegerNode(10, 0),
	75,
	'Rogiel\StarReplay\Event\Tracker\UnitPositions'

),
174 => new StructNode([
	"firstUnitIndex" => array('type' => 6, 'tag' => 0),
	"items" => array('type' => 173, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent'
),
]
);
Version24944::$GAME_EVENT_MAPPING = [
	5 => 70,
	7 => 69,
	9 => 62,
	10 => 64,
	11 => 65,
	12 => 66,
	13 => 68,
	14 => 73,
	21 => 74,
	22 => 70,
	23 => 70,
	26 => 78,
	27 => 86,
	28 => 94,
	29 => 95,
	30 => 97,
	31 => 99,
	32 => 100,
	33 => 103,
	34 => 104,
	35 => 105,
	36 => 106,
	37 => 107,
	38 => 108,
	39 => 109,
	40 => 110,
	41 => 111,
	43 => 116,
	44 => 70,
	45 => 121,
	46 => 125,
	47 => 126,
	48 => 127,
	49 => 130,
	50 => 70,
	51 => 117,
	52 => 70,
	53 => 118,
	54 => 70,
	55 => 120,
	56 => 124,
	57 => 131,
	58 => 134,
	59 => 135,
	60 => 136,
	62 => 137,
	63 => 70,
	64 => 138,
	65 => 139,
	66 => 140,
	67 => 151,
	68 => 70,
	69 => 70,
	70 => 141,
	71 => 142,
	72 => 143,
	73 => 70,
	74 => 70,
	75 => 144,
	77 => 70,
	78 => 70,
	79 => 145,
	80 => 70,
	81 => 70,
	82 => 146,
	83 => 147,
	84 => 147,
	85 => 118,
	86 => 70,
	87 => 70,
	88 => 149,
	89 => 150,
	90 => 152,
	91 => 153,
	92 => 154,
	93 => 117,
	94 => 155,
	95 => 156,
	96 => 70,
	97 => 157,
	98 => 158,
	99 => 159,
	100 => 160,
	101 => 70,
	102 => 161,
];
Version24944::$MESSAGE_EVENT_MAPPING = [
	0 => 162,
	1 => 163,
	2 => 164,
	3 => 70,
];
Version24944::$TRACKER_EVENT_MAPPING = [
	0 => 166,
	1 => 167,
	2 => 168,
	3 => 169,
	4 => 170,
	5 => 171,
	6 => 167,
	7 => 172,
	8 => 174,
];
