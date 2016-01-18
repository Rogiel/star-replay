
def generate_integer(bounds, className):
    generated = "new IntegerNode({0}, {1}".format(bounds[0][1], bounds[0][0])
    if className:
        generated += ", '{0}'".format(className)
    return generated + ")"

def generate_choice(tagger, choices, className):
    generated = "new ChoiceNode(new IntegerNode({0}), [\n".format(tagger[1])
    for index, choice in choices.iteritems():
        generated += "\t{tag} => {index},\n".format(tag = index, index = choice[1])
    generated += "]"
    if className:
        generated += ", '{0}'".format(className)
    return generated + ")"

def generate_struct(members, className):
    generated = "new StructNode([\n"
    for member in members[0]:
        if member:
            member_name = member[0]
            if member_name.startswith('m_'):
                member_name = member[0][2:]
            generated += "\t\"{name}\" => array('type' => {index}, 'tag' => {tag}),\n".format(name = member_name, index = member[1], tag = member[2])

    generated += "]"
    if className:
        generated += ",\n\t'{0}'\n".format(className)
    generated += ")"
    return generated

def generate_optional(bounds, className):
    generated = "new OptionalNode({0}".format(bounds[0])
    if className:
        generated += ", '{0}'".format(className)
    return generated + ")"

def generate_blob(bounds, className):
    generated = "new BlobNode(new IntegerNode({0}, {1})".format(bounds[0][1], bounds[0][0])
    if className:
        generated += ", '{0}'".format(className)
    return generated + ")"

def generate_bool(className):
    generated = "new BooleanNode("
    if className:
        generated += ", '{0}'".format(className)
    return generated + ")"

def generate_array(bounds, className):
    generated = "new ArrayNode(\n"
    generated += "\tnew IntegerNode({size}, {constant}),\n".format(size=bounds[0][1], constant=bounds[0][0])
    generated += "\t{0}".format(bounds[1])

    if className:
        generated += ",\n\t'{0}'\n".format(className)

    generated += "\n)"
    return generated

def generate_bitarray(bounds, className):
    generated = "new BitArrayNode(\n"
    generated += "\tnew IntegerNode({size}, {constant})\n".format(size=bounds[0][1], constant=bounds[0][0])
    if className:
        generated += ",\n\t'{0}'".format(className)
    generated += ")"
    return generated

def generate_null(className):
    return "new NullNode()"

def generate_fourcc(className):
    generated = "new FourCCNode("
    if className:
        generated += ", '{0}'".format(className)
    generated += ")"
    return generated

def generate_tree(protocol, classes):
    nodes = []
    for index, typeinfo in enumerate(protocol.typeinfos):
        if typeinfo[0] == "_int":
            generated = generate_integer(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_choice":
            generated = generate_choice(typeinfo[1][0], typeinfo[1][1], classes.get(index))
        elif typeinfo[0] == "_struct":
            generated = generate_struct(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_optional":
            generated = generate_optional(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_blob":
            generated = generate_blob(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_bool":
            generated = generate_bool(classes.get(index))
        elif typeinfo[0] == "_array":
            generated = generate_array(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_bitarray":
            generated = generate_bitarray(typeinfo[1], classes.get(index))
        elif typeinfo[0] == "_fourcc":
            generated = generate_fourcc(classes.get(index))
        elif typeinfo[0] == "_null":
            generated = generate_null(classes.get(index))
        else:
            print "Node %s unknown!" % typeinfo[0]
            exit()
        nodes.append(generated)

    tree = "[\n"
    for index, node in enumerate(nodes):
        tree += "{index} => {code},\n".format(index=index, code = node)
    tree += "]\n"
    return tree
