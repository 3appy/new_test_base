#!/bin/awk -f
# reports which file is being read
BEGIN {
# global variables
include_list               # holds the list of possible includes in the source
classname			       # holds the classname
extends                    # holds the name of the parent class
type_list                  # holds a list of datatype of the private variables of the class
variable_list		       # holds a list of variables.
}

{
read_file_model();
}

END {
}

#-----------------------------------------------------------------------------------
function read_file_model() {
if( $0~ /require_once/ )
{ add_includes($0); }     # add the includes

else if( $1~ /class/ )
{ add_class($2); }	      # add the classname

else if( $0~ /extends/ )
{ add_extends($0); }      # add the extends

else if( $0~ /@var/ )
{ add_datatype($3); }     # add the datatype

else if( $0~/null/ )
{ add_var($2); }          # add the private variable

else
{ ; }
}

#-----------------------------------------------------------------------------------
# add includes
# add only the substring from the require part in an array of several includes.
# the include list is an array the include index the index varibale.

function add_includes(myincludes) {
    if( $0~ /__/ )
    {;}
    else
    {
    include_list[include_index] = substr( myincludes, ( index( myincludes, "require") ) );
    include_index++;
    }
}

#-----------------------------------------------------------------------------------
# add class
# add the complete line from the origin file

function add_class(myclass) {
     classname = substr(myclass,11);
}

#-----------------------------------------------------------------------------------
# add extends only the substring is assigned to the extends variable.
function add_extends(myextends) {
    extends = substr( myextends, ( index( myextends, "extends") ) );
}

#-----------------------------------------------------------------------------------
# add datatype of private variable
function add_datatype(type) {
    type_list[ type_index++ ] = type;
}

#-----------------------------------------------------------------------------------
# add private variable
function add_var(var) {
    variable = substr( var, ( index( var, "$") + 1 ) );
    variable_list[ variable_index++ ] = variable;
}

#-----------------------------------------------------------------------------------
# help functions start

#-----------------------------------------------------------------------------------
# function to trim empy spaces in front of the line
function ltrim(s) { sub(/^[ \t\r\n]+/, "", s); return s }

#-----------------------------------------------------------------------------------
# get_datatype_character of datatype
function get_datatype_character(type) {
    return_value = "i";
    
    if( type == "Integer" )
    { return_value = "i"; }
    else if( type == "String" )
    { return_value = "s"; }
    else if( type == "time_stamp" )
    { return_value = "s"; }
    else
    { return_value = "s"; }

    return return_value;
}

#-----------------------------------------------------------------------------------
# return the size of an array
function arraysize(a) {  # runtime error unless a is an array
    n=0;
    
    for (i in a) ++n
    return n
} 

# help functions end
#-----------------------------------------------------------------------------------