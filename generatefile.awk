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
	arraylength=length(variable_list)
	
	print "// -------------------------------------------------------------\n" >> FILENAME;    
	print "// define the insert function of the model"  >> FILENAME;

#-----------------------------------------------------------------------------------
	
        # public function insert()
        # {
	# require "data_connect.php";
	# $insert_id = 0;
	
	print "public function insert()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "   $insert_id = 0;" >> FILENAME;

#-----------------------------------------------------------------------------------

        # $id = $this->get_id();
	# $author_id = $this->get_author_id();
	# $reader_id = $this->get_reader_id();
	# $read_stamp = $this->get_read_stamp();
	# $text = $this->get_text();

	for ( variable_index in variable_list )
	{
	    variable = variable_list[variable_index];
	    print "   $"variable " = $this->get_"variable "();" >> FILENAME;
	}

#-----------------------------------------------------------------------------------
	
        # if( $stmt = $mysqli->prepare(
	# "INSERT INTO member_message
	# (
	# id,
	# author_id,
	# reader_id,
	# read_stamp,
	# text
	# )

	print "   if( $stmt = $mysqli->prepare(" >> FILENAME;
	print "   \"INSERT INTO " classname  >> FILENAME;
	print "   (" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   "  variable_list[variable_index]  "," >> FILENAME; }
	    else
		{ print "   "  variable_list[variable_index] >> FILENAME; }
	}
	print "   )" >> FILENAME;

#-----------------------------------------------------------------------------------		

	# VALUES (?,?,?,?,?)"))

	printf "   VALUES (" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { printf "?," >> FILENAME; }
	    else
	        { printf "?" >> FILENAME; }
	}
	print ")\"))" >> FILENAME;	

#-----------------------------------------------------------------------------------	

	# {
	# $stmt->bind_param
	# (
	# "iiiss",
      
	print "   {" >> FILENAME;
	print "   $stmt->bind_param" >> FILENAME;
	print "   (" >> FILENAME;
	printf "   \"" >> FILENAME;
	
	for ( variable_index in variable_list )
	{ printf get_datatype_character( type_list[variable_index] ) >> FILENAME; }
	print "\"," >> FILENAME;
	
#-----------------------------------------------------------------------------------	

	# $id,
	# $author_id,
	# $reader_id,
	# $read_stamp,
	# $text
	# );

	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   $"  variable_list[variable_index]  "," >> FILENAME; }
	    else
		{ print "   $"  variable_list[variable_index] >> FILENAME; }
	}
	print "   );" >> FILENAME;

#-----------------------------------------------------------------------------------	

	# $stmt->execute();
	# $stmt->close();
	# $insert_id = $mysqli->insert_id;
        # }
	# else
	# {
	# $this->db_error->insert_error();
        # }
	# $mysqli->close();
	# $this->db_error->serialize();
	# return $insert_id;

	print "   $stmt->execute();" >> FILENAME;
	print "   $stmt->close();" >> FILENAME;
	print "   $insert_id = $mysqli->insert_id;" >> FILENAME;
	print "   }" >> FILENAME;
	print "   else" >> FILENAME;
	print "   {" >> FILENAME;
	print "   $this->db_error->insert_error();" >> FILENAME;
	print "   }" >> FILENAME;
	print "   $mysqli->close();" >> FILENAME;
	print "   $this->db_error->serialize();" >> FILENAME;
	print "   return $insert_id;" >> FILENAME;

#-----------------------------------------------------------------------------------
	
	print "}" >> FILENAME;
 	print "" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# define the load function of the model
function write_load() {
	arraylength=length(variable_list)
	
	print "// -------------------------------------------------------------\n" >> FILENAME;    
    	print "// define the load function of the model"  >> FILENAME;

#-----------------------------------------------------------------------------------
	
        # public function load()
        # {
	# require "data_connect.php";
	# $id = $this->get_id();
	# if( $stmt = $mysqli->prepare(
	
	print "public function load()" >> FILENAME;
	print "{" >> FILENAME;
	print "   require \"data_connect.php\";" >> FILENAME;
	print "   $id = $this->get_id();" >> FILENAME;	
	print "   if( $stmt = $mysqli->prepare(" >> FILENAME;

#-----------------------------------------------------------------------------------
	
	# "SELECT
	# id,
	# author_id,
	# written_stamp,
	# reader_id,
	# read_stamp,
	# text
	# FROM member_message WHERE id=?"))
	# {

	print "   \"SELECT" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   " variable_list[variable_index]  "," >> FILENAME; }
	    else
		{ print "   " variable_list[variable_index] >> FILENAME; }
	}
	print "   FROM " classname " WHERE id=?\"))" >> FILENAME;
	print "   {" >> FILENAME;	

#-----------------------------------------------------------------------------------
	
	# $stmt->bind_param('i', $id );
	# $stmt->execute();
	# $stmt->bind_result
	# (
	# $id,
	# $author_id,
	# $written_stamp,
	# $reader_id,
	# $read_stamp,
	# $text
	# );

	print "   $stmt->bind_param('i', $id );" >> FILENAME;
	print "   $stmt->execute();" >> FILENAME;
	print "   $stmt->bind_result" >> FILENAME;
	print "   (" >> FILENAME;	
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   $" variable_list[variable_index]  "," >> FILENAME; }
	    else
		{ print "   $" variable_list[variable_index] >> FILENAME; }
	}
	print "   );" >> FILENAME;	

#-----------------------------------------------------------------------------------
	
	# if( $stmt->fetch() == TRUE )
	# {
	# $this->set_id( $id );
	# $this->set_author_id( $author_id );
	# $this->set_written_stamp( $written_stamp );
	# $this->set_reader_id( $reader_id );
	# $this->set_read_stamp( $read_stamp );
	# $this->set_text( $text );
	# $stmt->close();
        # }
	# else
	# {
	# $this->db_warning->not_found();
        # }
	# $mysqli->close();
        # }
	# else
	# {
	# $this->db_error->load_error();
        # }
	# $this->db_error->serialize();
	# $this->db_warning->serialize();

	print "   if( $stmt->fetch() == TRUE )" >> FILENAME;
	print "   (" >> FILENAME;
	for ( variable_index in variable_list )
	{
	    variable = variable_list[variable_index];
	    print "   $this->set_"  variable  "( $" variable " );" >> FILENAME;
	}
	print "   $stmt->close();" >> FILENAME;
	print "   }" >> FILENAME;
	print "   else" >> FILENAME;
	print "   {" >> FILENAME;
	print "   $this->db_warning->not_found();" >> FILENAME;
	print "   }" >> FILENAME;
	print "   $mysqli->close();" >> FILENAME;
	print "   }" >> FILENAME;
	print "   else" >> FILENAME;
	print "   {" >> FILENAME;
	print "   $this->db_error->load_error();" >> FILENAME;
	print "   }" >> FILENAME;
	print "   $this->db_error->serialize();" >> FILENAME;
	print "   $this->db_warning->serialize();" >> FILENAME;		
	
	#-----------------------------------------------------------------------------------
	
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
