#!/bin/awk -f
# reports which file is being read
BEGIN {

#include_list               # holds the list of possible includes in the source
#classname			       # holds the classname
#extends                    # holds the name of the parent class
#type_list                  # holds a list of datatype of the private variables of the class
#variable_list		       # holds a list of variables.

GEN_LIST_MODEL             # file name for the generated list_model   
}

{
read_file_model();
}

END {
print "generated model list: " GEN_LIST_MODEL;
write_generated_list_model();
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

function write_generated_list_model() {
    print "<?php" >> GEN_LIST_MODEL;
    print "// this script is written by Bernd Schröder using AWK in Linux bash" >> GEN_LIST_MODEL;

    write_gen_model_list_includes();
    write_model_list_class();
    print "{" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
    print "// --- ATTRIBUTES ---" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
    write_model_list_variable_list();
    print "" >> GEN_LIST_MODEL;
    print "// --- FUNCTIONS ---" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
    write_list_load();
    write_basic_count();
    write_basic_load();
    write_get_prepare_list();
    write_set_binding();
    write_list_getJSON();
    print "}" >> GEN_LIST_MODEL; 
    print "?>" >> GEN_LIST_MODEL;   
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_gen_model_list_includes() {
    print "\n// -------------------------------------------------------------\n" >> GEN_LIST_MODEL;   
    print "require_once('class.basic_list.php');" >> GEN_LIST_MODEL;
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_model_list_class() {
    print "\n// -------------------------------------------------------------\n" >> GEN_LIST_MODEL;

    print "class generated_" classname "_list" >> GEN_LIST_MODEL;
    print "     extends basic_list" >> GEN_LIST_MODEL;
}

#-----------------------------------------------------------------------------------
# define the attributes
function write_model_list_variable_list() {
    print "// @access: private" >> GEN_LIST_MODEL;
    print "// @var: Integer"    >> GEN_LIST_MODEL;	
    print "private $stmp = null;" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the list_load function
function write_list_load() {
    # $prepare_statement = 
    # "SELECT
    # id,
    # author_id,
    # written_stamp,
    # reader_id,
    # read_stamp,
    # text
    # FROM member_message " .
    # $where_statement;
    # return $this->basic_load( $prepare_statement );
      
    print "" >> GEN_LIST_MODEL;
    print "// start of the list_load function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function list_load( $where_statement )" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   $prepare_statement =" >> GEN_LIST_MODEL;
    print "   \"SELECT" >> GEN_LIST_MODEL;

    for ( variable_index in variable_list )
    {
	if( variable_index < ( arraylength - 1 ) )
	{ print "   " variable_list[variable_index] "," >> GEN_LIST_MODEL; }
	else
	{ print "   " variable_list[variable_index] >> GEN_LIST_MODEL; }
    }

    print "   FROM " classname " \" ." >> GEN_LIST_MODEL;
    print "   $where_statement;" >> GEN_LIST_MODEL;
    print "   return $this->basic_load( $prepare_statement );" >> GEN_LIST_MODEL;
   
    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the basic_count function
function write_basic_count() {
    # require "data_connect.php";
    # $object_number = 0;
    # if( $this->stmt = $mysqli->prepare( $prepare_statement ))
    # {
    # $this->set_binding();
    # $this->stmt->execute();
    # $this->stmt->store_result();
    # $object_number = $this->stmt->num_rows;
    # $this->stmt->close();
    # }
    # $mysqli->close();
    # return $object_number;
      
    print "" >> GEN_LIST_MODEL;
    print "// start of the basic_count function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function basic_count( $prepare_statement )" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   require \"data_connect.php\";" >> GEN_LIST_MODEL;
    print "   $object_number = 0;" >> GEN_LIST_MODEL;
    print "   if( $this->stmt = $mysqli->prepare( $prepare_statement ))" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $this->set_binding();" >> GEN_LIST_MODEL;
    print "   $this->stmt->execute();" >> GEN_LIST_MODEL;
    print "   $this->stmt->store_result();" >> GEN_LIST_MODEL;
    print "   $object_number = $this->stmt->num_rows;" >> GEN_LIST_MODEL;
    print "   $this->stmt->close();" >> GEN_LIST_MODEL;
    print "   }" >> GEN_LIST_MODEL;
    print "   $mysqli->close();" >> GEN_LIST_MODEL;
    print "   return $object_number;" >> GEN_LIST_MODEL;            
    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the basic_load function
function write_basic_load() {
    # if( defined('__GEN_ROOT__') == FALSE )
    # { define('__GEN_ROOT__', dirname(dirname(__FILE__))); }
    # require_once(__GEN_ROOT__.'/class.member_message.php');
    #
    # require "data_connect.php";
    #
    # $object_number = 0;
    # $max_row = $this->get_row_per_page();
    # $page = $this->get_page();
    # $start_row = $page*$max_row;
    # if( $this->stmt = $mysqli->prepare( $prepare_statement ))
    # {
    # $this->set_binding();
    # $this->stmt->execute();
    # $this->stmt->bind_result
    # (
    # $id,
    # $author_id,
    # $written_stamp,
    # $reader_id,
    # $read_stamp,
    # $text
    # );
    # $this->stmt->store_result();
    # $this->stmt->data_seek( (int)( $start_row ) );
    # while( $this->stmt->fetch()  
    # AND ( $object_number < $max_row ) )
    # {
    # $new_object = new member_message();
    # $new_object->set_id( $id );
    # $new_object->set_author_id( $author_id );
    # $new_object->set_written_stamp( $written_stamp );
    # $new_object->set_reader_id( $reader_id );
    # $new_object->set_read_stamp( $read_stamp );
    # $new_object->set_text( $text );
    # $this->add_item( $new_object );
    # $object_number++;
    # }
    # $this->stmt->close();
    # }
    # $mysqli->close();
    # return $object_number;
    
    print "" >> GEN_LIST_MODEL;
    print "// start of the basic_load function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function basic_load( $prepare_statement )" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   if( defined('__GEN_ROOT__') == FALSE )" >> GEN_LIST_MODEL;
    print "   { define('__GEN_ROOT__', dirname(dirname(__FILE__))); }" >> GEN_LIST_MODEL;
    print "   require_once(__GEN_ROOT__.'/class." classname ".php');" >> GEN_LIST_MODEL;
    print "   " >> GEN_LIST_MODEL;
    print "   require \"data_connect.php\";" >> GEN_LIST_MODEL;
    print "   " >> GEN_LIST_MODEL;
    print "   $object_number = 0;" >> GEN_LIST_MODEL;
    print "   $max_row = $this->get_row_per_page();" >> GEN_LIST_MODEL;
    print "   $page = $this->get_page();" >> GEN_LIST_MODEL;
    print "   $start_row = $page*$max_row;" >> GEN_LIST_MODEL;
    print "   if( $this->stmt = $mysqli->prepare( $prepare_statement ))" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $this->set_binding();" >> GEN_LIST_MODEL;
    print "   $this->stmt->execute();" >> GEN_LIST_MODEL;
    print "   $this->stmt->bind_result" >> GEN_LIST_MODEL;
    print "   (" >> GEN_LIST_MODEL;

    for ( variable_index in variable_list )
    {
	if( variable_index < ( arraylength - 1 ) )
	{ print "   $" variable_list[variable_index] "," >> GEN_LIST_MODEL; }
	else
	{ print "   $" variable_list[variable_index] >> GEN_LIST_MODEL; }
    }

    print "   );" >> GEN_LIST_MODEL;
    print "   $this->stmt->store_result();" >> GEN_LIST_MODEL;
    print "   $this->stmt->data_seek( (int)( $start_row ) );" >> GEN_LIST_MODEL;
    print "   while( $this->stmt->fetch() " >> GEN_LIST_MODEL;
    print "   AND ( $object_number < $max_row ) )" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $new_object = new " classname "();" >> GEN_LIST_MODEL;

    for ( variable_index in variable_list )
    {
	var = variable_list[variable_index];
	print "   $new_object->set_" var "( $" var " );" >> GEN_LIST_MODEL;
    }

    print "   $this->add_item( $new_object );" >> GEN_LIST_MODEL;
    print "   $object_number++;" >> GEN_LIST_MODEL;
    print "   }" >> GEN_LIST_MODEL;
    print "   $this->stmt->close();" >> GEN_LIST_MODEL;    
    print "   }" >> GEN_LIST_MODEL;
    print "   $mysqli->close();" >> GEN_LIST_MODEL;
    print "   return $object_number;" >> GEN_LIST_MODEL;
    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the  get_prepare_list function
function  write_get_prepare_list() {
    print "" >> GEN_LIST_MODEL;
    print "// start of the get_prepare_list function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function get_prepare_list()" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   return" >> GEN_LIST_MODEL;
    print "   \"" >> GEN_LIST_MODEL;

    for ( variable_index in variable_list )
    {
	if( variable_index < ( arraylength - 1 ) )
	{ print "   " classname "." variable_list[variable_index] "," >> GEN_LIST_MODEL; }
	else
	{ print "   " classname "." variable_list[variable_index]  >> GEN_LIST_MODEL; }	    
    }

    print "   \";" >> GEN_LIST_MODEL;
    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the set_binding function
function  write_set_binding() {
    print "" >> GEN_LIST_MODEL;
    print "// start of the set_binding function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function set_binding()" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   ;" >> GEN_LIST_MODEL;
    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the list_getJSON function
function  write_list_getJSON() {
    print "" >> GEN_LIST_MODEL;
    print "// start of the getJSON function" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;
	
    print "public function getJSON()" >> GEN_LIST_MODEL;
    print "{" >> GEN_LIST_MODEL;
    print "   $JSON= \"\";" >> GEN_LIST_MODEL;
    print "   for( $n=0; $n < $this->get_item_count(); $n++ )" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $item = $this->get_item( $n );" >> GEN_LIST_MODEL;     
    print "   if( $n < ( $this->get_item_count() - (int)1 ))" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $JSON .= \"\\\"\" .  \""  classname "_\" . $n .  \"\\\":\" . \"<br>\" . $item->getJSON() . \",\" . \"<br>\"; " >> GEN_LIST_MODEL;
    print "   }" >> GEN_LIST_MODEL; 
    print "   else" >> GEN_LIST_MODEL;
    print "   {" >> GEN_LIST_MODEL;
    print "   $JSON .= \"\\\"\" .  \""  classname "_\" . $n .  \"\\\":\" . \"<br>\" . $item->getJSON();" >> GEN_LIST_MODEL;
    print "   }" >> GEN_LIST_MODEL; 
    print "   }" >> GEN_LIST_MODEL;
    
    print "   return" >> GEN_LIST_MODEL;
    print "   \"{\" . \"<br>\" . $JSON  . \"}\";" >> GEN_LIST_MODEL;

    print "}" >> GEN_LIST_MODEL;
    print "" >> GEN_LIST_MODEL;	
}
