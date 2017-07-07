#!/bin/awk -f
# reports which file is being read
BEGIN {

}

{

if( $0~ /require_once/ )
{
    # add the includes
    add_includes($0);
}

else if( $1~ /class/ )
{
    # add the classname
    add_class($0);
}

else if( $0~ /extends/ )
{
    # add the extends
   add_extends($0);
}

else if( $0~ /@var/ )
{
    # add the datatype
   add_datatype($3);
}

else if( $0~/null/ )
{
    # add the private variable
    add_var($2);
}

else
{
    ;
}
}

END {
    print "rewrite File: " FILENAME;
    print "<?php" > FILENAME;
    print "// this script is written by Bernd Schröder using AWK in Linux bash" >> FILENAME;
    
    write_includes();
    write_class();
    print "{" >> FILENAME;
    write_set_and_get();
    write_insert();
    write_load();
    write_update();
    write_delete();
    write_getJSON();
    print "}" >> FILENAME; 

    print "?>" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_includes() {
    print "\n// -------------------------------------------------------------\n" >> FILENAME;
    
    for ( include_index in include_list )
    { print include_list[include_index] >> FILENAME; }
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_class() {
    print "\n// -------------------------------------------------------------\n" >> FILENAME;

    print classname >> FILENAME;

    if (length(extends) != 0)
    { print "    " extends >> FILENAME; }
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_set_and_get() {
    print "" >> FILENAME;
    print "// start of the set and get functions" >> FILENAME;
    print "" >> FILENAME;
	
    for ( variable_index in variable_list )
    {
	variable = variable_list[variable_index];
	datatype = type_list[variable_index];
	
	print "// set function for " variable " expect variable of datatype: " datatype  >> FILENAME;
	print "public function set_"  variable  "( $" variable " )" >> FILENAME;
	print "{" >> FILENAME;
	print "   $this->" variable " = $" variable ";" >> FILENAME;
	print "}" >> FILENAME;
	print "" >> FILENAME;		
	print "// get function for " variable " return values is of datatype: " datatype  >> FILENAME;
	print "public function get_"  variable  "()" >> FILENAME;
	print "{" >> FILENAME;
	print "   return $this->" variable ";"  >> FILENAME;
	print "}" >> FILENAME;
	print "" >> FILENAME;
	print "" >> FILENAME;	
    }

}

#-----------------------------------------------------------------------------------
# define the insert function of the model
function write_insert() {
        print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the insert function of the model"  >> FILENAME;
	print "public function insert()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "   $insert_id = 0;" >> FILENAME;

	arraylength=length(variable_list)

	for ( variable_index in variable_list )
	{
	    variable = variable_list[variable_index];
	    print "   $"variable " = $this->get_"variable "();" >> FILENAME;
	}

	print "   if( $stmt = $mysqli->prepare(" >> FILENAME;
	print "   \"INSERT INTO " classname  >> FILENAME;
	print "   (" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   $"  variable_list[variable_index]  "," >> FILENAME; }
	    else
		{ print "   $"  variable_list[variable_index] >> FILENAME; }
	}
	print "   )" >> FILENAME;

	printf "   VALUES (" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { printf "?," >> FILENAME; }
	    else
	        { printf "?" >> FILENAME; }
	}
	print ")\"))" >> FILENAME;	
	

	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define the load function of the model
function write_load() {
        print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the load function of the model"  >> FILENAME;
	print "public function load()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define the update function of the model
function write_update() {
        print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the update function of the model"  >> FILENAME;
	print "public function update()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define the delete function of the model
function write_delete() {
        print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the delete function of the model"  >> FILENAME;
	print "public function delete()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define the getJSON function of the model
function write_getJSON() {
        print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the getJSON function of the model"  >> FILENAME;
	print "public function getJSON()" >> FILENAME;
	print "{" >> FILENAME;
	print "   return \"{}\";" >> FILENAME;
	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# function to trim empy spaces in front of the line
function ltrim(s) { sub(/^[ \t\r\n]+/, "", s); return s }

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
     classname = myclass;
}

#-----------------------------------------------------------------------------------
# add extends only the substring is assigned to the extends variable.
function add_extends(myextends) {
    extends = substr( myextends, ( index( myextends, "extends") ) );
}

#-----------------------------------------------------------------------------------
# add private variable
function add_var(var) {
    variable = substr( var, ( index( var, "$") + 1 ) );
    variable_list[ variable_index++ ] = variable;
}

#-----------------------------------------------------------------------------------
# add datatype of private variable
function add_datatype(type) {
    type_list[ type_index++ ] = type;
}

#-----------------------------------------------------------------------------------
# get_datatype_character of datatype
function get_datatype_character(type) {
    return_value = "i";
    
    if( type == "integer" )
    { return_value = "i"; }
    else if( type == "string" )
    { return_value = "s"; }
    else
    { return_value = "i"; }

    return return_value;
}
#-----------------------------------------------------------------------------------
