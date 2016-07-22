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

class Version27950 extends AbstractVersion {

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {
        return 27950;
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
	    return self::$TREE->getNode(63);
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

Version27950::$TREE = new Tree([
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
38 => new OptionalNode(31),
39 => new OptionalNode(6),
40 => new StructNode([
	"race" => array('type' => 21, 'tag' => -1),
]),
41 => new StructNode([
	"team" => array('type' => 21, 'tag' => -1),
]),
42 => new StructNode([
	"name" => array('type' => 9, 'tag' => -13),
	"clanTag" => array('type' => 37, 'tag' => -12),
	"clanLogo" => array('type' => 38, 'tag' => -11),
	"highestLeague" => array('type' => 21, 'tag' => -10),
	"combinedRaceLevels" => array('type' => 39, 'tag' => -9),
	"randomSeed" => array('type' => 6, 'tag' => -8),
	"racePreference" => array('type' => 40, 'tag' => -7),
	"teamPreference" => array('type' => 41, 'tag' => -6),
	"testMap" => array('type' => 13, 'tag' => -5),
	"testAuto" => array('type' => 13, 'tag' => -4),
	"examine" => array('type' => 13, 'tag' => -3),
	"customInterface" => array('type' => 13, 'tag' => -2),
	"observe" => array('type' => 20, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\UserInitialData'
),
43 => new ArrayNode(
	new IntegerNode(5, 0),
	42,
	'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'

),
44 => new StructNode([
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
45 => new IntegerNode(4, 1),
46 => new IntegerNode(8, 1),
47 => new BitArrayNode(
	new IntegerNode(6, 0)
),
48 => new BitArrayNode(
	new IntegerNode(8, 0)
),
49 => new BitArrayNode(
	new IntegerNode(2, 0)
),
50 => new BitArrayNode(
	new IntegerNode(7, 0)
),
51 => new StructNode([
	"allowedColors" => array('type' => 47, 'tag' => -6),
	"allowedRaces" => array('type' => 48, 'tag' => -5),
	"allowedDifficulty" => array('type' => 47, 'tag' => -4),
	"allowedControls" => array('type' => 48, 'tag' => -3),
	"allowedObserveTypes" => array('type' => 49, 'tag' => -2),
	"allowedAIBuilds" => array('type' => 50, 'tag' => -1),
]),
52 => new ArrayNode(
	new IntegerNode(5, 0),
	51
),
53 => new StructNode([
	"randomValue" => array('type' => 6, 'tag' => -26),
	"gameCacheName" => array('type' => 25, 'tag' => -25),
	"gameOptions" => array('type' => 44, 'tag' => -24),
	"gameSpeed" => array('type' => 12, 'tag' => -23),
	"gameType" => array('type' => 12, 'tag' => -22),
	"maxUsers" => array('type' => 2, 'tag' => -21),
	"maxObservers" => array('type' => 2, 'tag' => -20),
	"maxPlayers" => array('type' => 2, 'tag' => -19),
	"maxTeams" => array('type' => 45, 'tag' => -18),
	"maxColors" => array('type' => 3, 'tag' => -17),
	"maxRaces" => array('type' => 46, 'tag' => -16),
	"maxControls" => array('type' => 10, 'tag' => -15),
	"mapSizeX" => array('type' => 10, 'tag' => -14),
	"mapSizeY" => array('type' => 10, 'tag' => -13),
	"mapFileSyncChecksum" => array('type' => 6, 'tag' => -12),
	"mapFileName" => array('type' => 26, 'tag' => -11),
	"mapAuthorName" => array('type' => 9, 'tag' => -10),
	"modFileSyncChecksum" => array('type' => 6, 'tag' => -9),
	"slotDescriptions" => array('type' => 52, 'tag' => -8),
	"defaultDifficulty" => array('type' => 3, 'tag' => -7),
	"defaultAIBuild" => array('type' => 0, 'tag' => -6),
	"cacheHandles" => array('type' => 32, 'tag' => -5),
	"hasExtensionMod" => array('type' => 13, 'tag' => -4),
	"isBlizzardMap" => array('type' => 13, 'tag' => -3),
	"isPremadeFFA" => array('type' => 13, 'tag' => -2),
	"isCoopMode" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\GameDescription'
),
54 => new OptionalNode(1),
55 => new OptionalNode(2),
56 => new StructNode([
	"color" => array('type' => 55, 'tag' => -1),
]),
57 => new ArrayNode(
	new IntegerNode(6, 0),
	6
),
58 => new ArrayNode(
	new IntegerNode(9, 0),
	6
),
59 => new StructNode([
	"control" => array('type' => 10, 'tag' => -13),
	"userId" => array('type' => 54, 'tag' => -12),
	"teamId" => array('type' => 1, 'tag' => -11),
	"colorPref" => array('type' => 56, 'tag' => -10),
	"racePref" => array('type' => 40, 'tag' => -9),
	"difficulty" => array('type' => 3, 'tag' => -8),
	"aiBuild" => array('type' => 0, 'tag' => -7),
	"handicap" => array('type' => 0, 'tag' => -6),
	"observe" => array('type' => 20, 'tag' => -5),
	"workingSetSlotId" => array('type' => 21, 'tag' => -4),
	"rewards" => array('type' => 57, 'tag' => -3),
	"toonHandle" => array('type' => 16, 'tag' => -2),
	"licenses" => array('type' => 58, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbySlot'
),
60 => new ArrayNode(
	new IntegerNode(5, 0),
	59
),
61 => new StructNode([
	"phase" => array('type' => 12, 'tag' => -10),
	"maxUsers" => array('type' => 2, 'tag' => -9),
	"maxObservers" => array('type' => 2, 'tag' => -8),
	"slots" => array('type' => 60, 'tag' => -7),
	"randomSeed" => array('type' => 6, 'tag' => -6),
	"hostUserId" => array('type' => 54, 'tag' => -5),
	"isSinglePlayer" => array('type' => 13, 'tag' => -4),
	"gameDuration" => array('type' => 6, 'tag' => -3),
	"defaultDifficulty" => array('type' => 3, 'tag' => -2),
	"defaultAIBuild" => array('type' => 0, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\LobbyState'
),
62 => new StructNode([
	"userInitialData" => array('type' => 43, 'tag' => -3),
	"gameDescription" => array('type' => 53, 'tag' => -2),
	"lobbyState" => array('type' => 61, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
),
63 => new StructNode([
	"syncLobbyState" => array('type' => 62, 'tag' => -1),
],
	'Rogiel\StarReplay\Metadata\Init\InitData'
),
64 => new StructNode([
	"name" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankFileEvent'
),
65 => new BlobNode(new IntegerNode(6, 0)),
66 => new StructNode([
	"name" => array('type' => 65, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSectionEvent'
),
67 => new StructNode([
	"name" => array('type' => 65, 'tag' => -3),
	"type" => array('type' => 6, 'tag' => -2),
	"data" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankKeyEvent'
),
68 => new StructNode([
	"type" => array('type' => 6, 'tag' => -3),
	"name" => array('type' => 65, 'tag' => -2),
	"data" => array('type' => 30, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankValueEvent'
),
69 => new ArrayNode(
	new IntegerNode(5, 0),
	10,
	'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

),
70 => new StructNode([
	"signature" => array('type' => 69, 'tag' => -2),
	"toonHandle" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BankSignatureEvent'
),
71 => new StructNode([
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
72 => new StructNode([
],
	'Rogiel\StarReplay\Event\Message\ServerPingMessage'
),
73 => new IntegerNode(16, 0),
74 => new StructNode([
	"x" => array('type' => 73, 'tag' => -2),
	"y" => array('type' => 73, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
75 => new StructNode([
	"which" => array('type' => 12, 'tag' => -2),
	"target" => array('type' => 74, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraSaveEvent'
),
76 => new StructNode([
	"fileName" => array('type' => 26, 'tag' => -5),
	"automatic" => array('type' => 13, 'tag' => -4),
	"overwrite" => array('type' => 13, 'tag' => -3),
	"name" => array('type' => 9, 'tag' => -2),
	"description" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SaveGameEvent'
),
77 => new IntegerNode(32, -2147483648),
78 => new StructNode([
	"x" => array('type' => 77, 'tag' => -2),
	"y" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
79 => new StructNode([
	"point" => array('type' => 78, 'tag' => -4),
	"time" => array('type' => 77, 'tag' => -3),
	"verb" => array('type' => 25, 'tag' => -2),
	"arguments" => array('type' => 25, 'tag' => -1),
]),
80 => new StructNode([
	"data" => array('type' => 79, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameCheatEvent'
),
81 => new IntegerNode(20, 0),
82 => new StructNode([
	"abilLink" => array('type' => 73, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"abilCmdData" => array('type' => 21, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\Ability'
),
83 => new OptionalNode(82),
84 => new NullNode(),
85 => new StructNode([
	"x" => array('type' => 81, 'tag' => -3),
	"y" => array('type' => 81, 'tag' => -2),
	"z" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
86 => new StructNode([
	"targetUnitFlags" => array('type' => 10, 'tag' => -7),
	"timer" => array('type' => 10, 'tag' => -6),
	"tag" => array('type' => 6, 'tag' => -5),
	"snapshotUnitLink" => array('type' => 73, 'tag' => -4),
	"snapshotControlPlayerId" => array('type' => 54, 'tag' => -3),
	"snapshotUpkeepPlayerId" => array('type' => 54, 'tag' => -2),
	"snapshotPoint" => array('type' => 85, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'
),
87 => new ChoiceNode(new IntegerNode(2), [
	0 => 84,
	1 => 85,
	2 => 86,
	3 => 6,
]),
88 => new StructNode([
	"cmdFlags" => array('type' => 81, 'tag' => -4),
	"abil" => array('type' => 83, 'tag' => -3),
	"data" => array('type' => 87, 'tag' => -2),
	"otherUnit" => array('type' => 39, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CmdEvent'
),
89 => new IntegerNode(9, 0),
90 => new BitArrayNode(
	new IntegerNode(9, 0)
,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'),
91 => new ArrayNode(
	new IntegerNode(9, 0),
	89,
	'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

),
92 => new ChoiceNode(new IntegerNode(2), [
	0 => 84,
	1 => 90,
	2 => 91,
	3 => 91,
]),
93 => new StructNode([
	"unitLink" => array('type' => 73, 'tag' => -4),
	"subgroupPriority" => array('type' => 10, 'tag' => -3),
	"intraSubgroupPriority" => array('type' => 10, 'tag' => -2),
	"count" => array('type' => 89, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'
),
94 => new ArrayNode(
	new IntegerNode(9, 0),
	93
),
95 => new StructNode([
	"subgroupIndex" => array('type' => 89, 'tag' => -4),
	"removeMask" => array('type' => 92, 'tag' => -3),
	"addSubgroups" => array('type' => 94, 'tag' => -2),
	"addUnitTags" => array('type' => 58, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'
),
96 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"delta" => array('type' => 95, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionDeltaEvent'
),
97 => new StructNode([
	"controlGroupIndex" => array('type' => 1, 'tag' => -3),
	"controlGroupUpdate" => array('type' => 20, 'tag' => -2),
	"mask" => array('type' => 92, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ControlGroupUpdateEvent'
),
98 => new StructNode([
	"count" => array('type' => 89, 'tag' => -6),
	"subgroupCount" => array('type' => 89, 'tag' => -5),
	"activeSubgroupIndex" => array('type' => 89, 'tag' => -4),
	"unitTagsChecksum" => array('type' => 6, 'tag' => -3),
	"subgroupIndicesChecksum" => array('type' => 6, 'tag' => -2),
	"subgroupsChecksum" => array('type' => 6, 'tag' => -1),
]),
99 => new StructNode([
	"controlGroupId" => array('type' => 1, 'tag' => -2),
	"selectionSyncData" => array('type' => 98, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SelectionSyncCheckEvent'
),
100 => new ArrayNode(
	new IntegerNode(3, 0),
	77,
	'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

),
101 => new StructNode([
	"recipientId" => array('type' => 1, 'tag' => -2),
	"resources" => array('type' => 100, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceTradeEvent'
),
102 => new StructNode([
	"chatMessage" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerChatMessageEvent'
),
103 => new IntegerNode(8, -128),
104 => new StructNode([
	"x" => array('type' => 77, 'tag' => -3),
	"y" => array('type' => 77, 'tag' => -2),
	"z" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
105 => new StructNode([
	"beacon" => array('type' => 103, 'tag' => -9),
	"ally" => array('type' => 103, 'tag' => -8),
	"flags" => array('type' => 103, 'tag' => -7),
	"build" => array('type' => 103, 'tag' => -6),
	"targetUnitTag" => array('type' => 6, 'tag' => -5),
	"targetUnitSnapshotUnitLink" => array('type' => 73, 'tag' => -4),
	"targetUnitSnapshotUpkeepPlayerId" => array('type' => 103, 'tag' => -3),
	"targetUnitSnapshotControlPlayerId" => array('type' => 103, 'tag' => -2),
	"targetPoint" => array('type' => 104, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AICommunicateEvent'
),
106 => new StructNode([
	"speed" => array('type' => 12, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\SetAbsoluteGameSpeedEvent'
),
107 => new StructNode([
	"delta" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AddAbsoluteGameSpeedEvent'
),
108 => new StructNode([
	"point" => array('type' => 78, 'tag' => -3),
	"unit" => array('type' => 6, 'tag' => -2),
	"pingedMinimap" => array('type' => 13, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPingEvent'
),
109 => new StructNode([
	"verb" => array('type' => 25, 'tag' => -2),
	"arguments" => array('type' => 25, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\BroadcastCheatEvent'
),
110 => new StructNode([
	"alliance" => array('type' => 6, 'tag' => -2),
	"control" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AllianceEvent'
),
111 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitClickEvent'
),
112 => new StructNode([
	"unitTag" => array('type' => 6, 'tag' => -2),
	"flags" => array('type' => 10, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\UnitHighlightEvent'
),
113 => new StructNode([
	"conversationId" => array('type' => 77, 'tag' => -2),
	"replyId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerReplySelectedEvent'
),
114 => new OptionalNode(16),
115 => new StructNode([
	"gameUserId" => array('type' => 1, 'tag' => -6),
	"observe" => array('type' => 20, 'tag' => -5),
	"name" => array('type' => 9, 'tag' => -4),
	"toonHandle" => array('type' => 114, 'tag' => -3),
	"clanTag" => array('type' => 37, 'tag' => -2),
	"clanLogo" => array('type' => 38, 'tag' => -1),
]),
116 => new ArrayNode(
	new IntegerNode(5, 0),
	115
),
117 => new IntegerNode(1, 0),
118 => new StructNode([
	"userInfos" => array('type' => 116, 'tag' => -2),
	"method" => array('type' => 117, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\HijackReplayGameEvent'
),
119 => new StructNode([
	"purchaseItemId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseItemChangedEvent'
),
120 => new StructNode([
	"difficultyLevel" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerVictoryPanelPlayMissionAgainEvent'
),
121 => new ChoiceNode(new IntegerNode(3), [
	0 => 84,
	1 => 13,
	2 => 6,
	3 => 77,
	4 => 26,
	5 => 6,
]),
122 => new StructNode([
	"controlId" => array('type' => 77, 'tag' => -3),
	"eventType" => array('type' => 77, 'tag' => -2),
	"eventData" => array('type' => 121, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerDialogControlEvent'
),
123 => new StructNode([
	"soundHash" => array('type' => 6, 'tag' => -2),
	"length" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthQueryEvent'
),
124 => new ArrayNode(
	new IntegerNode(7, 0),
	6
),
125 => new StructNode([
	"soundHash" => array('type' => 124, 'tag' => -2),
	"length" => array('type' => 124, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'
),
126 => new StructNode([
	"syncInfo" => array('type' => 125, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundLengthSyncEvent'
),
127 => new StructNode([
	"sound" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundOffsetEvent'
),
128 => new StructNode([
	"transmissionId" => array('type' => 77, 'tag' => -2),
	"thread" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionOffsetEvent'
),
129 => new StructNode([
	"transmissionId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTransmissionCompleteEvent'
),
130 => new OptionalNode(74),
131 => new OptionalNode(73),
132 => new OptionalNode(103),
133 => new StructNode([
	"target" => array('type' => 130, 'tag' => -5),
	"distance" => array('type' => 131, 'tag' => -4),
	"pitch" => array('type' => 131, 'tag' => -3),
	"yaw" => array('type' => 131, 'tag' => -2),
	"reason" => array('type' => 132, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\CameraUpdateEvent'
),
134 => new StructNode([
	"skipType" => array('type' => 117, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerConversationSkippedEvent'
),
135 => new IntegerNode(11, 0),
136 => new StructNode([
	"x" => array('type' => 135, 'tag' => -2),
	"y" => array('type' => 135, 'tag' => -1),
],
	'Rogiel\StarReplay\Entity\Point'
),
137 => new StructNode([
	"button" => array('type' => 6, 'tag' => -5),
	"down" => array('type' => 13, 'tag' => -4),
	"posUI" => array('type' => 136, 'tag' => -3),
	"posWorld" => array('type' => 85, 'tag' => -2),
	"flags" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseClickedEvent'
),
138 => new StructNode([
	"posUI" => array('type' => 136, 'tag' => -3),
	"posWorld" => array('type' => 85, 'tag' => -2),
	"flags" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMouseMovedEvent'
),
139 => new StructNode([
	"achievementLink" => array('type' => 73, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\AchievementAwardedEvent'
),
140 => new StructNode([
	"abilLink" => array('type' => 73, 'tag' => -3),
	"abilCmdIndex" => array('type' => 2, 'tag' => -2),
	"state" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerTargetModeUpdateEvent'
),
141 => new StructNode([
	"soundtrack" => array('type' => 6, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerSoundtrackDoneEvent'
),
142 => new StructNode([
	"planetId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPlanetMissionSelectedEvent'
),
143 => new StructNode([
	"key" => array('type' => 103, 'tag' => -2),
	"flags" => array('type' => 103, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerKeyPressedEvent'
),
144 => new StructNode([
	"resources" => array('type' => 100, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestEvent'
),
145 => new StructNode([
	"fulfillRequestId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestFulfillEvent'
),
146 => new StructNode([
	"cancelRequestId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\ResourceRequestCancelEvent'
),
147 => new StructNode([
	"researchItemId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerResearchPanelSelectionChangedEvent'
),
148 => new StructNode([
	"mercenaryId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMercenaryPanelSelectionChangedEvent'
),
149 => new StructNode([
	"battleReportId" => array('type' => 77, 'tag' => -2),
	"difficultyLevel" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelPlayMissionEvent'
),
150 => new StructNode([
	"battleReportId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerBattleReportPanelSelectionChangedEvent'
),
151 => new IntegerNode(19, 0),
152 => new StructNode([
	"decrementMs" => array('type' => 151, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\DecrementGameTimeRemainingEvent'
),
153 => new StructNode([
	"portraitId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPortraitLoadedEvent'
),
154 => new StructNode([
	"functionName" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerMovieFunctionEvent'
),
155 => new StructNode([
	"result" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCustomDialogDismissedEvent'
),
156 => new StructNode([
	"gameMenuItemIndex" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerGameMenuItemSelectedEvent'
),
157 => new StructNode([
	"purchaseCategoryId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerPurchasePanelSelectedPurchaseCategoryChangedEvent'
),
158 => new StructNode([
	"button" => array('type' => 73, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerButtonPressedEvent'
),
159 => new StructNode([
	"cutsceneId" => array('type' => 77, 'tag' => -2),
	"bookmarkName" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneBookmarkFiredEvent'
),
160 => new StructNode([
	"cutsceneId" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneEndSceneFiredEvent'
),
161 => new StructNode([
	"cutsceneId" => array('type' => 77, 'tag' => -3),
	"conversationLine" => array('type' => 16, 'tag' => -2),
	"altConversationLine" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineEvent'
),
162 => new StructNode([
	"cutsceneId" => array('type' => 77, 'tag' => -2),
	"conversationLine" => array('type' => 16, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\TriggerCutsceneConversationLineMissingEvent'
),
163 => new StructNode([
	"observe" => array('type' => 20, 'tag' => -5),
	"name" => array('type' => 9, 'tag' => -4),
	"toonHandle" => array('type' => 114, 'tag' => -3),
	"clanTag" => array('type' => 37, 'tag' => -2),
	"clanLogo" => array('type' => 38, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Game\GameUserJoinEvent'
),
164 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"string" => array('type' => 26, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\ChatMessage'
),
165 => new StructNode([
	"recipient" => array('type' => 12, 'tag' => -2),
	"point" => array('type' => 78, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\PingMessage'
),
166 => new StructNode([
	"progress" => array('type' => 77, 'tag' => -1),
],
	'Rogiel\StarReplay\Event\Message\LoadingProgressMessage'
),
167 => new StructNode([
	"scoreValueMineralsCurrent" => array('type' => 77, 'tag' => 0),
	"scoreValueVespeneCurrent" => array('type' => 77, 'tag' => 1),
	"scoreValueMineralsCollectionRate" => array('type' => 77, 'tag' => 2),
	"scoreValueVespeneCollectionRate" => array('type' => 77, 'tag' => 3),
	"scoreValueWorkersActiveCount" => array('type' => 77, 'tag' => 4),
	"scoreValueMineralsUsedInProgressArmy" => array('type' => 77, 'tag' => 5),
	"scoreValueMineralsUsedInProgressEconomy" => array('type' => 77, 'tag' => 6),
	"scoreValueMineralsUsedInProgressTechnology" => array('type' => 77, 'tag' => 7),
	"scoreValueVespeneUsedInProgressArmy" => array('type' => 77, 'tag' => 8),
	"scoreValueVespeneUsedInProgressEconomy" => array('type' => 77, 'tag' => 9),
	"scoreValueVespeneUsedInProgressTechnology" => array('type' => 77, 'tag' => 10),
	"scoreValueMineralsUsedCurrentArmy" => array('type' => 77, 'tag' => 11),
	"scoreValueMineralsUsedCurrentEconomy" => array('type' => 77, 'tag' => 12),
	"scoreValueMineralsUsedCurrentTechnology" => array('type' => 77, 'tag' => 13),
	"scoreValueVespeneUsedCurrentArmy" => array('type' => 77, 'tag' => 14),
	"scoreValueVespeneUsedCurrentEconomy" => array('type' => 77, 'tag' => 15),
	"scoreValueVespeneUsedCurrentTechnology" => array('type' => 77, 'tag' => 16),
	"scoreValueMineralsLostArmy" => array('type' => 77, 'tag' => 17),
	"scoreValueMineralsLostEconomy" => array('type' => 77, 'tag' => 18),
	"scoreValueMineralsLostTechnology" => array('type' => 77, 'tag' => 19),
	"scoreValueVespeneLostArmy" => array('type' => 77, 'tag' => 20),
	"scoreValueVespeneLostEconomy" => array('type' => 77, 'tag' => 21),
	"scoreValueVespeneLostTechnology" => array('type' => 77, 'tag' => 22),
	"scoreValueMineralsKilledArmy" => array('type' => 77, 'tag' => 23),
	"scoreValueMineralsKilledEconomy" => array('type' => 77, 'tag' => 24),
	"scoreValueMineralsKilledTechnology" => array('type' => 77, 'tag' => 25),
	"scoreValueVespeneKilledArmy" => array('type' => 77, 'tag' => 26),
	"scoreValueVespeneKilledEconomy" => array('type' => 77, 'tag' => 27),
	"scoreValueVespeneKilledTechnology" => array('type' => 77, 'tag' => 28),
	"scoreValueFoodUsed" => array('type' => 77, 'tag' => 29),
	"scoreValueFoodMade" => array('type' => 77, 'tag' => 30),
	"scoreValueMineralsUsedActiveForces" => array('type' => 77, 'tag' => 31),
	"scoreValueVespeneUsedActiveForces" => array('type' => 77, 'tag' => 32),
	"scoreValueMineralsFriendlyFireArmy" => array('type' => 77, 'tag' => 33),
	"scoreValueMineralsFriendlyFireEconomy" => array('type' => 77, 'tag' => 34),
	"scoreValueMineralsFriendlyFireTechnology" => array('type' => 77, 'tag' => 35),
	"scoreValueVespeneFriendlyFireArmy" => array('type' => 77, 'tag' => 36),
	"scoreValueVespeneFriendlyFireEconomy" => array('type' => 77, 'tag' => 37),
	"scoreValueVespeneFriendlyFireTechnology" => array('type' => 77, 'tag' => 38),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStats'
),
168 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"stats" => array('type' => 167, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerStatsEvent'
),
169 => new StructNode([
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
170 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"killerPlayerId" => array('type' => 54, 'tag' => 2),
	"x" => array('type' => 10, 'tag' => 3),
	"y" => array('type' => 10, 'tag' => 4),
	"killerUnitTagIndex" => array('type' => 39, 'tag' => 5),
	"killerUnitTagRecycle" => array('type' => 39, 'tag' => 6),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDiedEvent'
),
171 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"controlPlayerId" => array('type' => 1, 'tag' => 2),
	"upkeepPlayerId" => array('type' => 1, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\UnitOwnerChangeEvent'
),
172 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
	"unitTypeName" => array('type' => 25, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UnitTypeChangeEvent'
),
173 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"upgradeTypeName" => array('type' => 25, 'tag' => 1),
	"count" => array('type' => 77, 'tag' => 2),
],
	'Rogiel\StarReplay\Event\Tracker\UpgradeEvent'
),
174 => new StructNode([
	"unitTagIndex" => array('type' => 6, 'tag' => 0),
	"unitTagRecycle" => array('type' => 6, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitDoneEvent'
),
175 => new ArrayNode(
	new IntegerNode(10, 0),
	77,
	'Rogiel\StarReplay\Event\Tracker\UnitPositions'

),
176 => new StructNode([
	"firstUnitIndex" => array('type' => 6, 'tag' => 0),
	"items" => array('type' => 175, 'tag' => 1),
],
	'Rogiel\StarReplay\Event\Tracker\UnitPositionsEvent'
),
177 => new StructNode([
	"playerId" => array('type' => 1, 'tag' => 0),
	"type" => array('type' => 6, 'tag' => 1),
	"userId" => array('type' => 39, 'tag' => 2),
	"slotId" => array('type' => 39, 'tag' => 3),
],
	'Rogiel\StarReplay\Event\Tracker\PlayerSetupEvent'
),
]
);
Version27950::$GAME_EVENT_MAPPING = [
	5 => 72,
	7 => 71,
	9 => 64,
	10 => 66,
	11 => 67,
	12 => 68,
	13 => 70,
	14 => 75,
	21 => 76,
	22 => 72,
	23 => 72,
	26 => 80,
	27 => 88,
	28 => 96,
	29 => 97,
	30 => 99,
	31 => 101,
	32 => 102,
	33 => 105,
	34 => 106,
	35 => 107,
	36 => 108,
	37 => 109,
	38 => 110,
	39 => 111,
	40 => 112,
	41 => 113,
	43 => 118,
	44 => 72,
	45 => 123,
	46 => 127,
	47 => 128,
	48 => 129,
	49 => 133,
	50 => 72,
	51 => 119,
	52 => 72,
	53 => 120,
	54 => 72,
	55 => 122,
	56 => 126,
	57 => 134,
	58 => 137,
	59 => 138,
	60 => 139,
	62 => 140,
	63 => 72,
	64 => 141,
	65 => 142,
	66 => 143,
	67 => 154,
	68 => 72,
	69 => 72,
	70 => 144,
	71 => 145,
	72 => 146,
	73 => 72,
	74 => 72,
	75 => 147,
	77 => 72,
	78 => 72,
	79 => 148,
	80 => 72,
	81 => 72,
	82 => 149,
	83 => 150,
	84 => 150,
	85 => 120,
	86 => 72,
	87 => 72,
	88 => 152,
	89 => 153,
	90 => 155,
	91 => 156,
	93 => 119,
	94 => 157,
	95 => 158,
	96 => 72,
	97 => 159,
	98 => 160,
	99 => 161,
	100 => 162,
	101 => 72,
	102 => 163,
];
Version27950::$MESSAGE_EVENT_MAPPING = [
	0 => 164,
	1 => 165,
	2 => 166,
	3 => 72,
];
Version27950::$TRACKER_EVENT_MAPPING = [
	0 => 168,
	1 => 169,
	2 => 170,
	3 => 171,
	4 => 172,
	5 => 173,
	6 => 169,
	7 => 174,
	8 => 176,
	9 => 177,
];
