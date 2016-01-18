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

class Version{Version} extends AbstractVersion {{

    public static $TREE;
    public static $GAME_EVENT_MAPPING;
    public static $MESSAGE_EVENT_MAPPING;
    public static $TRACKER_EVENT_MAPPING;

    public function getVersion() {{
        return {Version};
    }}

	public function getTree() {{
		return self::$TREE;
	}}

    public function getGameEventMapping() {{
	    return self::$GAME_EVENT_MAPPING;
	}}

	public function getMessageEventMapping() {{
	    return self::$MESSAGE_EVENT_MAPPING;
	}}

	public function getTrackerEventMapping() {{
	    return self::$TRACKER_EVENT_MAPPING;
	}}

	public function getReplayHeaderNode() {{
	    return self::$TREE->getNode({HeaderNode});
	}}

    public function getReplayInitDataNode() {{
	    return self::$TREE->getNode({InitDataNode});
	}}

	public function getGameDetailsNode() {{
	    return self::$TREE->getNode({GameDetailsNode});
	}}

	public function getGameEventHeaderNode() {{
		return new StructNode(
		    [
                'timestamp' => ['type' => {TimestampNode}],
                'user' => ['type' => {UserNode}],
                'event' => ['type' => {GameEventNode}]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}}

	public function getMessageEventHeaderNode() {{
		return new StructNode(
            [
                'timestamp' => ['type' => {TimestampNode}],
                'user' => ['type' => {UserNode}],
                'event' => ['type' => {MessageEventNode}]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}}

	public function getTrackerEventHeaderNode() {{
		return new StructNode(
            [
                'timestamp' => ['type' => {TimestampNode}],
                'event' => ['type' => {TrackerEventNode}]
            ],
            'Rogiel\StarReplay\Metadata\Event\Header',
            true
		);
	}}

}}

Version{Version}::$TREE = new Tree({Tree});
Version{Version}::$GAME_EVENT_MAPPING = {GameEvents};
Version{Version}::$MESSAGE_EVENT_MAPPING = {MessageEvents};
Version{Version}::$TRACKER_EVENT_MAPPING = {TrackerEvents};
