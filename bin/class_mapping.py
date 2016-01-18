
def find_struct_field(protocol, struct, field_name):
    for field in struct[1][0]:
        if field[0] == field_name:
            return field
    return None

def set_class(mapping, protocol, field, class_name):
    if field == None:
        return

    if protocol.typeinfos[field[1]][0] == '_optional':
        mapping[protocol.typeinfos[field[1]][0][1]] = class_name
    mapping[field[1]] = class_name

def detect_class_types(protocol):
    mapping = {}

    mapping[protocol.replay_header_typeid] = 'Rogiel\StarReplay\Metadata\Header\Header'
    replay_header = protocol.typeinfos[protocol.replay_header_typeid]
    for f in replay_header[1][0]:
        if f[0] == "m_version":
            mapping[f[1]] = 'Rogiel\StarReplay\Metadata\Header\Version'
        if f[0] == "m_ngdpRootKey":
            mapping[f[1]] = 'Rogiel\StarReplay\Metadata\Header\Hash'

    mapping[protocol.game_details_typeid] = 'Rogiel\StarReplay\Metadata\Match\MatchInformation'
    game_info = protocol.typeinfos[protocol.game_details_typeid]
    for f in game_info[1][0]:
        if f[0] == "m_playerList":
            playerList = f[1]
            playerList = protocol.typeinfos[playerList][1][0]
            mapping[playerList] = 'Rogiel\StarReplay\Metadata\Match\PlayerList'

            playerList = protocol.typeinfos[playerList][1][1]
            mapping[playerList] = 'Rogiel\StarReplay\Entity\Player'

            for t in protocol.typeinfos[playerList][1][0]:
                if t[0] == "m_toon":
                    mapping[t[1]] = 'Rogiel\StarReplay\Entity\Toon'
                if t[0] == "m_color":
                    mapping[t[1]] = 'Rogiel\StarReplay\Entity\Color'

        if f[0] == "m_thumbnail":
            mapping[f[1]] = 'Rogiel\StarReplay\Entity\Thumbnail'

    mapping[protocol.replay_initdata_typeid] = 'Rogiel\StarReplay\Metadata\Init\InitData'
    game_info = protocol.typeinfos[protocol.replay_initdata_typeid]
    for f in game_info[1][0]:
        if f[0] == "m_syncLobbyState":
            mapping[f[1]] = 'Rogiel\StarReplay\Metadata\Init\SyncLobbyState'
            for t in protocol.typeinfos[f[1]][1][0]:
                if t[0] == "m_userInitialData":
                    mapping[t[1]] = 'Rogiel\StarReplay\Metadata\Init\UserInitialDataCollection'
                    mapping[protocol.typeinfos[t[1]][1][1]] = 'Rogiel\StarReplay\Metadata\Init\UserInitialData'
                if t[0] == "m_gameDescription":
                    mapping[t[1]] = 'Rogiel\StarReplay\Metadata\Init\GameDescription'
                    for r in protocol.typeinfos[t[1]][1][0]:
                        if r[0] == "m_gameOptions":
                            mapping[r[1]] = 'Rogiel\StarReplay\Metadata\Init\GameOptions'

                if t[0] == "m_lobbyState":
                    mapping[t[1]] = 'Rogiel\StarReplay\Metadata\Init\LobbyState'

    for index, type in enumerate(protocol.typeinfos):
        if type[0] == '_struct':
            for field in type[1][0]:
                if field[0] == 'x':
                    mapping[index] = 'Rogiel\StarReplay\Entity\Point'


    for event in protocol.game_event_types.iteritems():
        event_name = event[1][1][11:]
        mapping[event[1][0]] = 'Rogiel\StarReplay\Event\Game\{0}'.format(event_name)
        if event_name == 'TriggerSoundLengthSyncEvent':
            sync_info = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_syncInfo')
            mapping[sync_info[1]] = 'Rogiel\StarReplay\Event\Game\Entity\SoundLengthSync'

        if event_name == 'BankSignatureEvent':
            signature = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_signature')
            mapping[signature[1]] = 'Rogiel\StarReplay\Event\Game\Entity\BankSignature'

        if event_name == 'ResourceRequestEvent':
            resources = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_resources')
            mapping[resources[1]] = 'Rogiel\StarReplay\Event\Game\Entity\ResourceRequest'

        if event_name == 'SelectionDeltaEvent':
            delta = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_delta')
            struct = protocol.typeinfos[delta[1]]
            mapping[delta[1]] = 'Rogiel\StarReplay\Event\Game\Entity\SelectionDelta'

            m_addSubgroups = find_struct_field(protocol, struct, 'm_addSubgroups')
            if m_addSubgroups:
                list = protocol.typeinfos[m_addSubgroups[1]]
                mapping[list[1][1]] = 'Rogiel\StarReplay\Event\Game\Entity\SubgroupUnit'

        if event_name == 'ControlGroupUpdateEvent':
            mask = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_mask')
            mask = protocol.typeinfos[mask[1]]
            if mask[0] == '_choice':
                for choice in mask[1][1].iteritems():
                    if choice[1][0] == 'Mask':
                        mapping[choice[1][1]] = 'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateMask'
                    if choice[1][0] == 'OneIndices':
                        mapping[choice[1][1]] = 'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateOneIndices'
                    if choice[1][0] == 'ZeroIndices':
                        mapping[choice[1][1]] = 'Rogiel\StarReplay\Event\Game\Entity\ControlGroupUpdateZeroIndices'

            # print protocol.typeinfos[mask[1]][1][0]
            # mask = protocol.typeinfos[protocol.typeinfos[mask[1]][1][0]]
            # if mask[0] == '_optional':
            #     print mask
            #     exit()
            # for key, option in protocol.typeinfos[mask[1]][2].iteritems():
            #     print option
            #     exit()

        if event_name == 'CmdEvent':
            abil = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_abil')
            if abil:
                mapping[protocol.typeinfos[abil[1]][1][0]] = 'Rogiel\StarReplay\Event\Game\Entity\Ability'
            data = find_struct_field(protocol, protocol.typeinfos[event[1][0]], 'm_data')
            if data:
                for i, opt in protocol.typeinfos[data[1]][1][1].iteritems():
                    if opt[0] == 'TargetUnit':
                        mapping[opt[1]] = 'Rogiel\StarReplay\Event\Game\Entity\TargetUnit'

    for event in protocol.message_event_types.iteritems():
        event_name = event[1][1][11:]
        mapping[event[1][0]] = 'Rogiel\StarReplay\Event\Message\{0}'.format(event_name)

    if hasattr(protocol, 'tracker_event_types'):
        for event in protocol.tracker_event_types.iteritems():
            if event[1][1] == "NNet.Replay.Tracker.SPlayerStatsEvent":
                for type in protocol.typeinfos[event[1][0]][1][0]:
                    if type[0] == "m_stats":
                        mapping[type[1]] = 'Rogiel\StarReplay\Event\Tracker\PlayerStats'

            if event[1][1] == "NNet.Replay.Tracker.SUnitPositionsEvent":
                for type in protocol.typeinfos[event[1][0]][1][0]:
                    if type[0] == "m_items":
                        mapping[type[1]] = 'Rogiel\StarReplay\Event\Tracker\UnitPositions'

            event_name = event[1][1][21:]
            mapping[event[1][0]] = 'Rogiel\StarReplay\Event\Tracker\{0}'.format(event_name)


    return mapping