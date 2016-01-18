

all_game_events = {}
def generate_game_event_template(protocol):
    generated = "[\n"
    for event in protocol.game_event_types.iteritems():
        name = event[1][1][11:]
        all_game_events[name] = {}
        all_game_events[name]["event"] = event
        all_game_events[name]["type"] = protocol.typeinfos[event[1][0]]
        template_vars = {
            'ID': event[0],
            'Name': name,
            'Node': event[1][0],
        }
        generated += "\t{ID} => {Node},\n".format(**template_vars)
    generated += "]"
    return generated

all_message_events = {}
def generate_message_event_template(protocol):
    generated = "[\n"
    for event in protocol.message_event_types.iteritems():
        name = event[1][1][11:]
        all_message_events[name] = {}
        all_message_events[name]["event"] = event
        all_message_events[name]["type"] = protocol.typeinfos[event[1][0]]
        template_vars = {
            'ID': event[0],
            'Name': name,
            'Node': event[1][0],
        }
        generated += "\t{ID} => {Node},\n".format(**template_vars)
    generated += "]"
    return generated

all_tracker_events = {}
def generate_tracker_event_template(protocol):
    if hasattr(protocol, 'tracker_event_types'):
        generated = "[\n"
        for event in protocol.tracker_event_types.iteritems():
            name = event[1][1][11:]
            all_tracker_events[name] = {}
            all_tracker_events[name]["event"] = event
            all_tracker_events[name]["type"] = protocol.typeinfos[event[1][0]]
            template_vars = {
                'ID': event[0],
                'Name': name,
                'Node': event[1][0],
            }
            generated += "\t{ID} => {Node},\n".format(**template_vars)
        generated += "]"
        return generated
    else:
        return "NULL"



def parse_template(input_file, output_file, vars):
    print(output_file)
    with open(input_file, 'r') as ftemp:
        templateString = ftemp.read()
    with open(output_file, 'w') as f:
        f.write(templateString.format(**vars))

def capital_first_letter(s):
    return s[0].upper() + s[1:]
