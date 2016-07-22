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

class Version26490 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 26490;
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
	    return self::$TREE->getNode(14);
	}

    public function getReplayInitDataNode() {
	    return self::$TREE->getNode(62);
	}

	public function getGameDetailsNode() {
	    return self::$TREE->getNode(36);
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

Version26490::$TREE = new Tree([
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
14 => new StructNode([
	"signature" => array('type' => 9, 'tag' => 0),
	"version" => array('type' => 11, 'tag' => 1),
	"type" => array('type' => 12, 'tag' => 2),
	"elapsedGameLoops" => array('type' => 6, 'tag' => 3),
	"useScaledTime" => array('type' => 13, 'tag' => 4),
],
	'Rogiel\StarReplay\Metadata\Header\Header'
),
15 => new FourCCNode(),
16 => new BlobNode(new IntegerNode(7, 0)),
17 => new IntegerNode(64, 0),
18 => new StructNode([
	"region" => array('type' => 10, 'tag' => 0),
	"programId" => array('type' => 15, 'tag' => 1),
	"realm" => array('type' => 6, 'tag' => 2),
	"name" => array('type' => 16, 'tag' => 3),
	"id" => array('type' => 17, 'tag' => 4),
],
	'Rogiel\StarReplay\Entity\Toon'
),
19 => new StructNode([
	"a" => array('type' => 10, 'tag' => 0),
	"r" => array('type' => 10, 'tag' => 1),
	"g" => array('type' => 10, 'tag' => 2),
	"b" => array('type' => 10, 'tag' => 3),
],
	'Rogiel\StarReplay\Entity\Color'
),
20 => new IntegerNode(2, 0),
21 => new OptionalNode(10),
22 => new StructNode([
	"name" => array('type' => 9, 'tag' => 0),
	"toon" => array('type' => 18, 'tag' => 1),
	"race" => array('type' => 9, 'tag' => 2),
	"color" => array('type' => 19, 'tag' => 3),
	"control" => array('type' => 10, 'tag' => 4),
	"teamId" => array('type' => 1, 'tag' => 5),
	"handicap" => array('type' => 0, 'tag' => 6),
	"observe" => array('type' => 20, 'tag' => 7),
	"result" => array('type' => 20, 'tag' => 8),
	"workingSetSlotId" => array('type' => 21, 'tag' => 9),
],
	'Rogiel\StarReplay\Entity\Player'
),
23 => new ArrayNode(
	new IntegerNode(5, 0),
	22,
	'Rogiel\StarReplay\Metadata\Match\PlayerList'

),
24 => new OptionalNode(23),
25 => new BlobNode(new IntegerNode(10, 0)),
26 => new BlobNode(new IntegerNode(11, 0)),
27 => new StructNode([
	"file" => array('type' => 26, 'tag' => 0),
],
	'Rogiel\StarReplay\Entity\Thumbnail'
),
28 => new OptionalNode(13),
29 => new IntegerNode(64, -9223372036854775808),
30 => new BlobNode(new IntegerNode(12, 0)),
31 => new BlobNode(new IntegerNode(0, 40)),
32 => new ArrayNode(
	new IntegerNode(6, 0),
	31
),
33 => new OptionalNode(32),
34 => new ArrayNode(
	new IntegerNode(6, 0),
	26
),
35 => new OptionalNode(34),
36 => new StructNode([
	"playerList" => array('type' => 24, 'tag' => 0),
	"title" => array('type' => 25, 'tag' => 1),
	"difficulty" => array('type' => 9, 'tag' => 2),
	"thumbnail" => array('type' => 27, 'tag' => 3),
	"isBlizzardMap" => array('type' => 13, 'tag' => 4),
	"restartAsTransitionMap" => array('type' => 28, 'tag' => 16),
	"timeUTC" => array('type' => 29, 'tag' => 5),
	"timeLocalOffset" => array('type' => 29, 'tag' => 6),
	"description" => array('type' => 30, 'tag' => 7),
	"imageFilePath" => array('type' => 26, 'tag' => 8),
	"campaignIndex" => array('type' => 10, 'tag' => 15),
	"mapFileName" => array('type' => 26, 'tag' => 9),
	"cacheHandles" => array('type' => 33, 'tag' => 10),
	"miniSave" => array('type' => 13, 'tag' => 11),
	"gameSpeed" => array('type' => 12, 'tag' => 12),
	"defaultDifficulty" => array('type' => 3, 'tag' => 13),
	"modPaths" => array('type' => 35, 'tag' => 14),
],
	'Rogiel\StarReplay\Metadata\Match\MatchInformation'
),
37 => new OptionalNode(9),
38 => new OptionalNode(6),
39 => new StructNode([
	"race" => array('type' => 21, 'tag' => -1),
]),
40 => new StructNode([
	"team" => array('type' => 21, 'tag' => -1),
]),
41 => new StructNode([
	"name" => array('type' => 9, 'tag' => -12),
	"clanTag" => array('type' => 37, 'tag' => -11),
	"highestLeague" => array('type' => 21, 'tag' => -10),
	"combinedRaceLevels" => array('type' => 38, 'tag' => -9),
	"randomSeed" => array('type' => 6, 'tag' => -8),
	"racePreference" => array('type' => 39, 'tag' => -7),
	"teamPreference" => array('type' => 40, 'tag' => -6),
	"testMap" => array('type' => 13, 'tag' => -5),
	"testAuto" => array('type' => 13, 'tag' => -4),
	"examine" => array('type' => 13, 'tag' => -3),
	"customInterface" => array('type' => 13, 'tag' => -2),
	"observe" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
42 => new ArrayNode(
	new IntegerNode(5, 0),
	41,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
43 => new StructNode([
	"lockTeams" => array('type' => 13, 'tag' => -12),
	"teamsTogether" => array('type' => 13, 'tag' => -11),
	"advancedSharedControl" => array('type' => 13, 'tag' => -10),
	"randomRaces" => array('type' => 13, 'tag' => -9),
	"battleNet" => array('type' => 13, 'tag' => -8),
	"amm" => array('type' => 13, 'tag' => -7),
	"competitive" => array('type' => 13, 'tag' => -6),
	"noVictoryOrDefeat" => array('type' => 13, 'tag' => -5),
	"fog" => array('type' => 20, 'tag' => -4),
	"observers" => array('type' => 20, 'tag' => -3),
	"userDifficulty" => array('type' => 20, 'tag' => -2),
	"clientDebugFlags" => array('type' => 17, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameOptions'
),
44 => new IntegerNode(4, 1),
45 => new IntegerNode(8, 1),
46 => new BitArrayNode(
	new IntegerNode(6, 0)
),
47 => new BitArrayNode(
	new IntegerNode(8, 0)
),
48 => new BitArrayNode(
	new IntegerNode(2, 0)
),
49 => new BitArrayNode(
	new IntegerNode(7, 0)
),
50 => new StructNode([
	"allowedColors" => array('type' => 46, 'tag' => -6),
	"allowedRaces" => array('type' => 47, 'tag' => -5),
	"allowedDifficulty" => array('type' => 46, 'tag' => -4),
	"allowedControls" => array('type' => 47, 'tag' => -3),
	"allowedObserveTypes" => array('type' => 48, 'tag' => -2),
	"allowedAIBuilds" => array('type' => 49, 'tag' => -1),
]),
51 => new ArrayNode(
	new IntegerNode(5, 0),
	50
),
52 => new StructNode([
	"randomValue" => array('type' => 6, 'tag' => -25),
	"gameCacheName" => array('type' => 25, 'tag' => -24),
	"gameOptions" => array('type' => 43, 'tag' => -23),
	"gameSpeed" => array('type' => 12, 'tag' => -22),
	"gameType" => array('type' => 12, 'tag' => -21),
	"maxUsers" => array('type' => 2, 'tag' => -20),
	"maxObservers" => array('type' => 2, 'tag' => -19),
	"maxPlayers" => array('type' => 2, 'tag' => -18),
	"maxTeams" => array('type' => 44, 'tag' => -17),
	"maxColors" => array('type' => 3, 'tag' => -16),
	"maxRaces" => array('type' => 45, 'tag' => -15),
	"maxControls" => array('type' => 10, 'tag' => -14),
	"mapSizeX" => array('type' => 10, 'tag' => -13),
	"mapSizeY" => array('type' => 10, 'tag' => -12),
	"mapFileSyncChecksum" => array('type' => 6, 'tag' => -11),
	"mapFileName" => array('type' => 26, 'tag' => -10),
	"mapAuthorName" => array('type' => 9, 'tag' => -9),
	"modFileSyncChecksum" => array('type' => 6, 'tag' => -8),
	"slotDescriptions" => array('type' => 51, 'tag' => -7),
	"defaultDifficulty" => array('type' => 3, 'tag' => -6),
	"defaultAIBuild" => array('type' => 0, 'tag' => -5),
	"cacheHandles" => array('type' => 32, 'tag' => -4),
	"isBlizzardMap" => array('type' => 13, 'tag' => -3),
	"isPremadeFFA" => array('type' => 13, 'tag' => -2),
	"isCoopMode" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
53 => new OptionalNode(1),
54 => new OptionalNode(2),
55 => new StructNode([
	"color" => array('type' => 54, 'tag' => -1),
]),
56 => new ArrayNode(
	new IntegerNode(6, 0),
	6
),
57 => new ArrayNode(
	new IntegerNode(9, 0),
	6
),
58 => new StructNode([
	"control" => array('type' => 10, 'tag' => -13),
	"userId" => array('type' => 53, 'tag' => -12),
	"teamId" => array('type' => 1, 'tag' => -11),
	"colorPref" => array('type' => 55, 'tag' => -10),
	"racePref" => array('type' => 39, 'tag' => -9),
	"difficulty" => array('type' => 3, 'tag' => -8),
	"aiBuild" => array('type' => 0, 'tag' => -7),
	"handicap" => array('type' => 0, 'tag' => -6),
	"observe" => array('type' => 20, 'tag' => -5),
	"workingSetSlotId" => array('type' => 21, 'tag' => -4),
	"rewards" => array('type' => 56, 'tag' => -3),
	"toonHandle" => array('type' => 16, 'tag' => -2),
	"licenses" => array('type' => 57, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbySlot'
),
59 => new ArrayNode(
	new IntegerNode(5, 0),
	58
),
60 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -10),
	"maxUsers" => array('type' => 2, 'tag' => -9),
	"maxObservers" => array('type' => 2, 'tag' => -8),
	"slots" => array('type' => 59, 'tag' => -7),
	"randomSeed" => array('type' => 6, 'tag' => -6),
	"hostUserId" => array('type' => 53, 'tag' => -5),
	"isSinglePlayer" => array('type' => 13, 'tag' => -4),
	"gameDuration" => array('type' => 6, 'tag' => -3),
	"defaultDifficulty" => array('type' => 3, 'tag' => -2),
	"defaultAIBuild" => array('type' => 0, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
61 => new StructNode([
	"userInitialData" => array('type' => 42, 'tag' => -3),
	"gameDescription" => array('type' => 52, 'tag' => -2),
	"lobbyState" => array('type' => 60, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
62 => new StructNode([
	"syncLobbyState" => array('type' => 61, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
63 => new StructNode([
	"name" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
64 => new BlobNode(new IntegerNode(6, 0)),
65 => new StructNode([
	"name" => array('type' => 64, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
66 => new StructNode([
	"name" => array('type' => 64, 'tag' => -3),
	"type" => array('type' => 6, 'tag' => -2),
	"data" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
67 => new StructNode([
	"type" => array('type' => 6, 'tag' => -3),
	"name" => array('type' => 64, 'tag' => -2),
	"data" => array('type' => 30, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
68 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
69 => new StructNode([
	"signature" => array('type' => 68, 'tag' => -2),
	"toonHandle" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
70 => new StructNode([
	"gameFullyDownloaded" => array('type' => 13, 'tag' => -8),
	"developmentCheatsEnabled" => array('type' => 13, 'tag' => -7),
	"multiplayerCheatsEnabled" => array('type' => 13, 'tag' => -6),
	"syncChecksummingEnabled" => array('type' => 13, 'tag' => -5),
	"isMapToMapTransition" => array('type' => 13, 'tag' => -4),
	"startingRally" => array('type' => 13, 'tag' => -3),
	"debugPauseEnabled" => array('type' => 13, 'tag' => -2),
	"baseBuildNum" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UserOptionsEvent'
),
71 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
72 => new IntegerNode(16, 0),
73 => new StructNode([
	"x" => array('type' => 72, 'tag' => -2),
	"y" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
74 => new StructNode([
	"which" => array('type' => 12, 'tag' => -2),
	"target" => array('type' => 73, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraSaveEvent'
),
75 => new StructNode([
	"fileName" => array('type' => 26, 'tag' => -5),
	"automatic" => array('type' => 13, 'tag' => -4),
	"overwrite" => array('type' => 13, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
76 => new IntegerNode(32, -2147483648),
77 => new StructNode([
	"x" => array('type' => 76, 'tag' => -2),
	"y" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
78 => new StructNode([
	"point" => array('type' => 77, 'tag' => -4),
	"time" => array('type' => 76, 'tag' => -3),
	"verb" => array('type' => 25, 'tag' => -2),
	"arguments" => array('type' => 25, 'tag' => -1),
]),
79 => new StructNode([
	"data" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
80 => new IntegerNode(20, 0),
81 => new StructNode([
	"abilLink" => array('type' => 72, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"abilCmdData" => array('type' => 21, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
82 => new OptionalNode(81),
83 => new NullNode(),
84 => new StructNode([
	"x" => array('type' => 80, 'tag' => -3),
	"y" => array('type' => 80, 'tag' => -2),
	"z" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
85 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 6, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 72, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 53, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 53, 'tag' => -2),
	"snapshotPoint" => array('type' => 84, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
86 => new ChoiceNode(new IntegerNode(2), [
	0 => 83,
	1 => 84,
	2 => 85,
	3 => 6,
]),
87 => new StructNode([
	"cmdFlags" => array('type' => 80, 'tag' => -4),
	"abil" => array('type' => 82, 'tag' => -3),
	"data" => array('type' => 86, 'tag' => -2),
	"otherUnit" => array('type' => 38, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
88 => new IntegerNode(9, 0),
89 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
90 => new ArrayNode(
	new IntegerNode(9, 0),
	88,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
91 => new ChoiceNode(new IntegerNode(2), [
	0 => 83,
	1 => 89,
	2 => 90,
	3 => 90,
]),
92 => new StructNode([
	"unitLink" => array('type' => 72, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 88, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
93 => new ArrayNode(
	new IntegerNode(9, 0),
	92
),
94 => new StructNode([
	"subgroupIndex" => array('type' => 88, 'tag' => -4),
	"removeMask" => array('type' => 91, 'tag' => -3),
	"addSubgroups" => array('type' => 93, 'tag' => -2),
	"addUnitTags" => array('type' => 57, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
95 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 94, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
96 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 20, 'tag' => -2),
	"mask" => array('type' => 91, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
97 => new StructNode([
	"count" => array('type' => 88, 'tag' => -6),
	"subgroupCount" => array('type' => 88, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 88, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 6, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 6, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 6, 'tag' => -1),
]),
98 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 97, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
99 => new ArrayNode(
	new IntegerNode(3, 0),
	76,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
100 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
101 => new StructNode([
	"chatMessage" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
102 => new IntegerNode(8, -128),
103 => new StructNode([
	"x" => array('type' => 76, 'tag' => -3),
	"y" => array('type' => 76, 'tag' => -2),
	"z" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
104 => new StructNode([
	"beacon" => array('type' => 102, 'tag' => -9),
	"ally" => array('type' => 102, 'tag' => -8),
	"flags" => array('type' => 102, 'tag' => -7),
	"build" => array('type' => 102, 'tag' => -6),
	"targetUnitTag" => array('type' => 6, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 72, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 102, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 102, 'tag' => -2),
	"targetPoint" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
105 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
106 => new StructNode([
	"delta" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
107 => new StructNode([
	"point" => array('type' => 77, 'tag' => -3),
	"unit" => array('type' => 6, 'tag' => -2),
	"pingedMinimap" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
108 => new StructNode([
	"verb" => array('type' => 25, 'tag' => -2),
	"arguments" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
109 => new StructNode([
	"alliance" => array('type' => 6, 'tag' => -2),
	"control" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
110 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
111 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
112 => new StructNode([
	"conversationId" => array('type' => 76, 'tag' => -2),
	"replyId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
113 => new OptionalNode(16),
114 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -5),
	"observe" => array('type' => 20, 'tag' => -4),
	"name" => array('type' => 9, 'tag' => -3),
	"toonHandle" => array('type' => 113, 'tag' => -2),
	"clanTag" => array('type' => 37, 'tag' => -1),
]),
115 => new ArrayNode(
	new IntegerNode(5, 0),
	114
),
116 => new IntegerNode(1, 0),
117 => new StructNode([
	"userInfos" => array('type' => 115, 'tag' => -2),
	"method" => array('type' => 116, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
118 => new StructNode([
	"purchaseItemId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
119 => new StructNode([
	"difficultyLevel" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
120 => new ChoiceNode(new IntegerNode(3), [
	0 => 83,
	1 => 13,
	2 => 6,
	3 => 76,
	4 => 26,
	5 => 6,
]),
121 => new StructNode([
	"controlId" => array('type' => 76, 'tag' => -3),
	"eventType" => array('type' => 76, 'tag' => -2),
	"eventData" => array('type' => 120, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
122 => new StructNode([
	"soundHash" => array('type' => 6, 'tag' => -2),
	"length" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
123 => new ArrayNode(
	new IntegerNode(7, 0),
	6
),
124 => new StructNode([
	"soundHash" => array('type' => 123, 'tag' => -2),
	"length" => array('type' => 123, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
125 => new StructNode([
	"syncInfo" => array('type' => 124, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
126 => new StructNode([
	"sound" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
127 => new StructNode([
	"transmissionId" => array('type' => 76, 'tag' => -2),
	"thread" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
128 => new StructNode([
	"transmissionId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
129 => new OptionalNode(73),
130 => new OptionalNode(72),
131 => new StructNode([
	"target" => array('type' => 129, 'tag' => -4),
	"distance" => array('type' => 130, 'tag' => -3),
	"pitch" => array('type' => 130, 'tag' => -2),
	"yaw" => array('type' => 130, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
132 => new StructNode([
	"skipType" => array('type' => 116, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
133 => new IntegerNode(11, 0),
134 => new StructNode([
	"x" => array('type' => 133, 'tag' => -2),
	"y" => array('type' => 133, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
135 => new StructNode([
	"button" => array('type' => 6, 'tag' => -5),
	"down" => array('type' => 13, 'tag' => -4),
	"posUI" => array('type' => 134, 'tag' => -3),
	"posWorld" => array('type' => 84, 'tag' => -2),
	"flags" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
136 => new StructNode([
	"posUI" => array('type' => 134, 'tag' => -3),
	"posWorld" => array('type' => 84, 'tag' => -2),
	"flags" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
137 => new StructNode([
	"achievementLink" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
138 => new StructNode([
	"abilLink" => array('type' => 72, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"state" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
139 => new StructNode([
	"soundtrack" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
140 => new StructNode([
	"planetId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
141 => new StructNode([
	"key" => array('type' => 102, 'tag' => -2),
	"flags" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
142 => new StructNode([
	"resources" => array('type' => 99, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
143 => new StructNode([
	"fulfillRequestId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
144 => new StructNode([
	"cancelRequestId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
145 => new StructNode([
	"researchItemId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
146 => new StructNode([
	"mercenaryId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
147 => new StructNode([
	"battleReportId" => array('type' => 76, 'tag' => -2),
	"difficultyLevel" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
148 => new StructNode([
	"battleReportId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
149 => new IntegerNode(19, 0),
150 => new StructNode([
	"decrementMs" => array('type' => 149, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
151 => new StructNode([
	"portraitId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
152 => new StructNode([
	"functionName" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
153 => new StructNode([
	"result" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
154 => new StructNode([
	"gameMenuItemIndex" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
155 => new StructNode([
	"reason" => array('type' => 102, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCameraMoveEvent'
),
156 => new StructNode([
	"purchaseCategoryId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
157 => new StructNode([
	"button" => array('type' => 72, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
158 => new StructNode([
	"cutsceneId" => array('type' => 76, 'tag' => -2),
	"bookmarkName" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
159 => new StructNode([
	"cutsceneId" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
160 => new StructNode([
	"cutsceneId" => array('type' => 76, 'tag' => -3),
	"conversationLine" => array('type' => 16, 'tag' => -2),
	"altConversationLine" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
161 => new StructNode([
	"cutsceneId" => array('type' => 76, 'tag' => -2),
	"conversationLine" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
162 => new StructNode([
	"observe" => array('type' => 20, 'tag' => -4),
	"name" => array('type' => 9, 'tag' => -3),
	"toonHandle" => array('type' => 113, 'tag' => -2),
	"clanTag" => array('type' => 37, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
163 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
164 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
165 => new StructNode([
	"progress" => array('type' => 76, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
166 => new StructNode([
	"scoreValueMineralsCurrent" => array('type' => 76, 'tag' => 0),
	"scoreValueVespeneCurrent" => array('type' => 76, 'tag' => 1),
	"scoreValueMineralsCollectionRate" => array('type' => 76, 'tag' => 2),
	"scoreValueVespeneCollectionRate" => array('type' => 76, 'tag' => 3),
	"scoreValueWorkersActiveCount" => array('type' => 76, 'tag' => 4),
	"scoreValueMineralsUsedInProgressArmy" => array('type' => 76, 'tag' => 5),
	"scoreValueMineralsUsedInProgressEconomy" => array('type' => 76, 'tag' => 6),
	"scoreValueMineralsUsedInProgressTechnology" => array('type' => 76, 'tag' => 7),
	"scoreValueVespeneUsedInProgressArmy" => array('type' => 76, 'tag' => 8),
	"scoreValueVespeneUsedInProgressEconomy" => array('type' => 76, 'tag' => 9),
	"scoreValueVespeneUsedInProgressTechnology" => array('type' => 76, 'tag' => 10),
	"scoreValueMineralsUsedCurrentArmy" => array('type' => 76, 'tag' => 11),
	"scoreValueMineralsUsedCurrentEconomy" => array('type' => 76, 'tag' => 12),
	"scoreValueMineralsUsedCurrentTechnology" => array('type' => 76, 'tag' => 13),
	"scoreValueVespeneUsedCurrentArmy" => array('type' => 76, 'tag' => 14),
	"scoreValueVespeneUsedCurrentEconomy" => array('type' => 76, 'tag' => 15),
	"scoreValueVespeneUsedCurrentTechnology" => array('type' => 76, 'tag' => 16),
	"scoreValueMineralsLostArmy" => array('type' => 76, 'tag' => 17),
	"scoreValueMineralsLostEconomy" => array('type' => 76, 'tag' => 18),
	"scoreValueMineralsLostTechnology" => array('type' => 76, 'tag' => 19),
	"scoreValueVespeneLostArmy" => array('type' => 76, 'tag' => 20),
	"scoreValueVespeneLostEconomy" => array('type' => 76, 'tag' => 21),
	"scoreValueVespeneLostTechnology" => array('type' => 76, 'tag' => 22),
	"scoreValueMineralsKilledArmy" => array('type' => 76, 'tag' => 23),
	"scoreValueMineralsKilledEconomy" => array('type' => 76, 'tag' => 24),
	"scoreValueMineralsKilledTechnology" => array('type' => 76, 'tag' => 25),
	"scoreValueVespeneKilledArmy" => array('type' => 76, 'tag' => 26),
	"scoreValueVespeneKilledEconomy" => array('type' => 76, 'tag' => 27),
	"scoreValueVespeneKilledTechnology" => array('type' => 76, 'tag' => 28),
	"scoreValueFoodUsed" => array('type' => 76, 'tag' => 29),
	"scoreValueFoodMade" => array('type' => 76, 'tag' => 30),
	"scoreValueMineralsUsedActiveForces" => array('type' => 76, 'tag' => 31),
	"scoreValueVespeneUsedActiveForces" => array('type' => 76, 'tag' => 32),
	"scoreValueMineralsFriendlyFireArmy" => array('type' => 76, 'tag' => 33),
	"scoreValueMineralsFriendlyFireEconomy" => array('type' => 76, 'tag' => 34),
	"scoreValueMineralsFriendlyFireTechnology" => array('type' => 76, 'tag' => 35),
	"scoreValueVespeneFriendlyFireArmy" => array('type' => 76, 'tag' => 36),
	"scoreValueVespeneFriendlyFireEconomy" => array('type' => 76, 'tag' => 37),
	"scoreValueVespeneFriendlyFireTechnology" => array('type' => 76, 'tag' => 38),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStats'
),
167 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"stats" => array('type' => 166, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStatsEvent'
),
168 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 25, 'tag' => 2),
	"controlPlayerId" => array('type' => 1, 'tag' => 3),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 4),
	"x" => array('type' => 10, 'tag' => 5),
	"y" => array('type' => 10, 'tag' => 6),
],
	'Rogiel\StarReplay\Event\Tracker\UnitInitEvent'
),
169 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"killerPlayerId" => array('type' => 53, 'tag' => 2),
	"x" => array('type' => 10, 'tag' => 3),
	"y" => array('type' => 10, 'tag' => 4),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDiedEvent'
),
170 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"controlPlayerId" => array('type' => 1, 'tag' => 2),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\UnitOwnerChangeEvent'
),
171 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 25, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UnitTypeChangeEvent'
),
172 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"upgradeTypeName" => array('type' => 25, 'tag' => 1),
	"count" => array('type' => 76, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UpgradeEvent'
),
173 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDoneEvent'
),
174 => new ArrayNode(
	new IntegerNode(10, 0),
	76,
	'Rogiel\StarReplay\Event\Tracker\UnitPositions'

),
175 => new StructNode([
	"firstUnitIndex" => array('type' => 6, 'tag' => 0),
	"items" => array('type' => 174, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent'
),
]
);
Version26490::$GAME_EVENT_MAPPING = [
	5 => 71,
	7 => 70,
	9 => 63,
	10 => 65,
	11 => 66,
	12 => 67,
	13 => 69,
	14 => 74,
	21 => 75,
	22 => 71,
	23 => 71,
	26 => 79,
	27 => 87,
	28 => 95,
	29 => 96,
	30 => 98,
	31 => 100,
	32 => 101,
	33 => 104,
	34 => 105,
	35 => 106,
	36 => 107,
	37 => 108,
	38 => 109,
	39 => 110,
	40 => 111,
	41 => 112,
	43 => 117,
	44 => 71,
	45 => 122,
	46 => 126,
	47 => 127,
	48 => 128,
	49 => 131,
	50 => 71,
	51 => 118,
	52 => 71,
	53 => 119,
	54 => 71,
	55 => 121,
	56 => 125,
	57 => 132,
	58 => 135,
	59 => 136,
	60 => 137,
	62 => 138,
	63 => 71,
	64 => 139,
	65 => 140,
	66 => 141,
	67 => 152,
	68 => 71,
	69 => 71,
	70 => 142,
	71 => 143,
	72 => 144,
	73 => 71,
	74 => 71,
	75 => 145,
	77 => 71,
	78 => 71,
	79 => 146,
	80 => 71,
	81 => 71,
	82 => 147,
	83 => 148,
	84 => 148,
	85 => 119,
	86 => 71,
	87 => 71,
	88 => 150,
	89 => 151,
	90 => 153,
	91 => 154,
	92 => 155,
	93 => 118,
	94 => 156,
	95 => 157,
	96 => 71,
	97 => 158,
	98 => 159,
	99 => 160,
	100 => 161,
	101 => 71,
	102 => 162,
];
Version26490::$MESSAGE_EVENT_MAPPING = [
	0 => 163,
	1 => 164,
	2 => 165,
	3 => 71,
];
Version26490::$TRACKER_EVENT_MAPPING = [
	0 => 167,
	1 => 168,
	2 => 169,
	3 => 170,
	4 => 171,
	5 => 172,
	6 => 168,
	7 => 173,
	8 => 175,
];
