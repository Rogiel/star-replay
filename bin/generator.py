import glob
import os
import sys
import logging

import tree as tree_generator
import template as template_generator
import class_mapping

sys.path.append('../s2protocol/')

current_path = os.path.dirname(os.path.realpath(__file__))
output_directory = current_path + "/../src/Version"

all_versions = []
protocols = glob.glob("../s2protocol/protocol*.py")
for protocolFile in protocols:
    protocolBaseName = os.path.basename(protocolFile)
    protocolName = protocolBaseName[:-3]
    version = protocolBaseName[8:-3]
    all_versions.append(version)

    protocol = __import__(protocolName)
    classes = class_mapping.detect_class_types(protocol)
    events = template_generator.generate_game_event_template(protocol)
    message_events = template_generator.generate_message_event_template(protocol)
    tracker_events = template_generator.generate_tracker_event_template(protocol)
    tree = tree_generator.generate_tree(protocol, classes)

    if hasattr(protocol, 'replay_userid_typeid'):
        useridNode = protocol.replay_userid_typeid
    else:
        useridNode = protocol.replay_playerid_typeid

    if hasattr(protocol, 'tracker_eventid_typeid'):
        tracker_eventid_typeid = protocol.tracker_eventid_typeid
    else:
        tracker_eventid_typeid = 'NULL'

    template_vars = {
        'Version': version,
        'Tree': tree,
        'TimestampNode': protocol.svaruint32_typeid,
        'UserNode': useridNode,
        'GameEventNode': protocol.game_eventid_typeid,
        'MessageEventNode': protocol.message_eventid_typeid,
        'TrackerEventNode': tracker_eventid_typeid,
        'GameEvents': events,
        'MessageEvents': message_events,
        'TrackerEvents': tracker_events,
        'HeaderNode': protocol.replay_header_typeid,
        'GameDetailsNode': protocol.game_details_typeid,
        'InitDataNode': protocol.replay_initdata_typeid
    }

    if not os.path.exists(output_directory):
        os.makedirs(output_directory)

    template_generator.parse_template(current_path + "/Template/Version.php",
                   "{0}/Version{1}.php".format(output_directory, version), template_vars)

all_versions_generated = "[\n"
for version in all_versions:
    all_versions_generated += "\t\t\t{0} => 'Rogiel\StarReplay\Version\Version{0}',\n".format(version)
all_versions_generated = all_versions_generated[:-2] + "\n\t\t]"
template_vars = {
    'Versions': all_versions_generated,
}
template_generator.parse_template(current_path + "/Template/Versions.php", "{0}/Versions.php".format(output_directory), template_vars)

def extract_field_type(field):
    field_type = classes.get(field)
    if field_type:
        field_type = "\\"+field_type
    else:
        field_type_struct = protocol.typeinfos[field]
        if(field_type_struct[0] == '_int'):
            field_type = "integer"
        elif(field_type_struct[0] == '_blob'):
            field_type = "string"
        elif(field_type_struct[0] == '_array'):
            field_type = "array"
        elif(field_type_struct[0] == '_null'):
            field_type = "null"
        elif(field_type_struct[0] == '_bool'):
            field_type = "boolean"
        elif(field_type_struct[0] == '_struct'):
            logging.warn("Non mapped struct: %s. Falling back to array.", field_type_struct)
            field_type = "struct"
        elif(field_type_struct[0] == '_choice'):
            field_type = ""
            for choice in protocol.typeinfos[field][1][1].iteritems():
                field_type += "{0}|".format(extract_field_type(choice[1][1]))
            field_type = field_type[:-1]
        elif(field_type_struct[0] == '_optional'):
            field_type = "null|{0}".format(extract_field_type(protocol.typeinfos[field][1][0]))
        elif(field_type_struct[0] == '_bitarray'):
            field_type = "integer"
        elif(field_type_struct[0] == '_fourcc'):
            field_type = "integer"
        else:
            logging.error("Unknown type for field: %s. Ignoring type mapping.", field_type_struct)
    return field_type


def parse_event_template(event, type, prefix, input, output_directory):
    event_name = event["event"][1][1][len(prefix):]
    full_name = event["event"][1][1]

    fields = ""
    to_string = ""
    getters = ""
    for field in event["type"][1][0]:
        field_name = field[0][2:]
        camel_field_name = template_generator.capital_first_letter(field_name)
        field_type = extract_field_type(field[1])

        if field_type:
            fields += "\t/** @var {0} */\n".format(field_type)
        fields += "\tpublic ${0};\n\n".format(field_name)

        # if protocol.typeinfos[field[1]][0] == '_array':
        #     exit()

        to_string += "{0} = $this->{0}, ".format(field_name)
        if field_type:
            getters += "\t/** @return {0} */\n".format(field_type)
        getters += "\tpublic function get{0}() {{ return $this->{1}; }}\n\n".format(camel_field_name, field_name)

    template_vars = {
        'Name': event_name,
        'FullName': full_name,
        'Type': type,
        'Fields': fields.rstrip('\n'),
        'ToString': to_string[:-2],
        'Getters': getters.rstrip('\n')
     }

    template_generator.parse_template(input, "{0}/{1}.php".format(output_directory, event_name), template_vars)

for name, event in template_generator.all_game_events.iteritems():
    current_path = os.path.dirname(os.path.realpath(__file__))
    output_directory = current_path + "/../src/Event/Game"

    if not os.path.exists(output_directory):
        os.makedirs(output_directory)

    parse_event_template(event, 'Game', 'NNet.Game.S', current_path + "/Template/Event.php", output_directory)

for name, event in template_generator.all_message_events.iteritems():
    current_path = os.path.dirname(os.path.realpath(__file__))
    output_directory = current_path + "/../src/Event/Message"

    if not os.path.exists(output_directory):
        os.makedirs(output_directory)

    parse_event_template(event, 'Message', 'NNet.Game.S', current_path + "/Template/Event.php", output_directory)

for name, event in template_generator.all_tracker_events.iteritems():
    current_path = os.path.dirname(os.path.realpath(__file__))
    output_directory = current_path + "/../src/Event/Tracker"

    if not os.path.exists(output_directory):
        os.makedirs(output_directory)

    parse_event_template(event, 'Tracker', 'NNet.Replay.Tracker.S', current_path + "/Template/Event.php", output_directory)

