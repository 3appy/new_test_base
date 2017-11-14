#!/bin/awk -f
# reports which file is being read
BEGIN {
GEN_MODEL                  # file name for the generated model
}

{
read_file_model();
}

END {
print "generated model: " GEN_MODEL;
write_generated_model();
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

function write_generated_model() {
    print "<?php" >> GEN_MODEL;
    print "// this script is written by Bernd Schröder using AWK in Linux bash" >> GEN_MODEL;
    
    write_gen_model_includes();
    write_model_class();
    print "{" >> GEN_MODEL;
    print "" >> GEN_MODEL;
    print "// --- ATTRIBUTES ---" >> GEN_MODEL;
    print "" >> GEN_MODEL;
    write_model_variable_list();
    print "" >> GEN_MODEL;
    print "// --- FUNCTIONS ---" >> GEN_MODEL;
    print "" >> GEN_MODEL;
    write_set_and_get();
    write_insert();
    write_load();
    write_update();
    write_delete();
    write_getJSON();
    print "}" >> GEN_MODEL; 

    print "?>" >> GEN_MODEL;   
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_gen_model_includes() {
    print "\n// -------------------------------------------------------------\n" >> GEN_MODEL;
    
    for ( include_index in include_list )
    { print include_list[include_index] >> GEN_MODEL; }
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_model_class() {
    print "\n// -------------------------------------------------------------\n" >> GEN_MODEL;

    print "class generated_" classname >> GEN_MODEL;

    if (length(extends) != 0)
    { print "    " extends >> GEN_MODEL; }
}


#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_model_variable_list() {
    for ( variable_index in variable_list )
    {
	variable = variable_list[variable_index];
	datatype = type_list[variable_index];
	
	print "// @access: private"  >> GEN_MODEL;
	print "// @var: " datatype  >> GEN_MODEL;	
	print "private $" variable  " = null;" >> GEN_MODEL;
	print "" >> GEN_MODEL;
	print "" >> GEN_MODEL;	
    }
}


#-----------------------------------------------------------------------------------
# define set and get function for all variables
function write_set_and_get() {
    print "" >> GEN_MODEL;
    print "// start of the set and get functions" >> GEN_MODEL;
    print "" >> GEN_MODEL;
	
    for ( variable_index in variable_list )
    {
	variable = variable_list[variable_index];
	datatype = type_list[variable_index];
	
	print "// set function for " variable " expect variable of datatype: " datatype  >> GEN_MODEL;
	print "public function set_"  variable  "( $" variable " )" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   $this->" variable " = $" variable ";" >> GEN_MODEL;
	print "}" >> GEN_MODEL;
	print "" >> GEN_MODEL;		

	print "// get function for " variable " return values is of datatype: " datatype  >> GEN_MODEL;
	print "public function get_"  variable  "()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	if( datatype == "Integer" )
	{
	    print "   if( $this->" variable " == null )" >> GEN_MODEL;
	    print "   { return \"null\"; }" >> GEN_MODEL;	    
	    print "   else" >> GEN_MODEL;
	    print "   { return $this->" variable "; }"  >> GEN_MODEL;	
	}	    
	else
	{
	    print "   return $this->" variable ";"  >> GEN_MODEL;
	}

	print "}" >> GEN_MODEL;
	print "" >> GEN_MODEL;
	print "" >> GEN_MODEL;

	print "public function get_"  variable  "_type()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   return \"" get_datatype_character( datatype ) "\";"  >> GEN_MODEL;
	print "}" >> GEN_MODEL;
	print "" >> GEN_MODEL;
	print "" >> GEN_MODEL;		
    }
}

#-----------------------------------------------------------------------------------
# define the insert function of the model
function write_insert() {
	arraylength=arraysize(variable_list)
	
    print "// -------------------------------------------------------------\n" >> GEN_MODEL;    
	print "// define the insert function of the model"  >> GEN_MODEL;

#-----------------------------------------------------------------------------------
	
    # public function insert()
    # {
	# require "data_connect.php";
	# $insert_id = 0;
	
	print "public function insert()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   require \"data_connect.php\";" >> GEN_MODEL;
	print "   $insert_id = 0;" >> GEN_MODEL;

#-----------------------------------------------------------------------------------

    # $id = $this->get_id();
	# $author_id = $this->get_author_id();
	# $reader_id = $this->get_reader_id();
	# $read_stamp = $this->get_read_stamp();
	# $text = $this->get_text();

	for ( variable_index in variable_list )
	{
	    variable = variable_list[variable_index];
	    if( type_list[variable_index] != "time_stamp" )
	    { print "   $"variable " = $this->get_"variable "();" >> GEN_MODEL; }
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

	print "   if( $stmt = $mysqli->prepare(" >> GEN_MODEL;
	print "   \"INSERT INTO " classname  >> GEN_MODEL;
	print "   (" >> GEN_MODEL;
	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		if( variable_index < ( arraylength - 1 ) )
	        { print "   "  variable_list[variable_index]  "," >> GEN_MODEL; }
		else
		{ print "   "  variable_list[variable_index] >> GEN_MODEL; }
	    }
	}
	print "   )" >> GEN_MODEL;

#-----------------------------------------------------------------------------------		

	# VALUES (?,?,?,?,?)"))

	printf "   VALUES (" >> GEN_MODEL;
	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		if( variable_index < ( arraylength - 1 ) )
	        { printf "?," >> GEN_MODEL; }
		else
	        { printf "?" >> GEN_MODEL; }
	    }
	}
	print ")\"))" >> GEN_MODEL;	

#-----------------------------------------------------------------------------------	

	# {
	# $stmt->bind_param
	# (
	# "iiiss",
      
	print "   {" >> GEN_MODEL;
	print "   $stmt->bind_param" >> GEN_MODEL;
	print "   (" >> GEN_MODEL;
	printf "   \"" >> GEN_MODEL;
	
	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    { printf get_datatype_character( type_list[variable_index] ) >> GEN_MODEL; }
	}
	print "\"," >> GEN_MODEL;
	
#-----------------------------------------------------------------------------------	

	# $id,
	# $author_id,
	# $reader_id,
	# $read_stamp,
	# $text
	# );

	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		if( variable_index < ( arraylength - 1 ) )
	        { print "   $"  variable_list[variable_index]  "," >> GEN_MODEL; }
		else
		{ print "   $"  variable_list[variable_index] >> GEN_MODEL; }
	    }
	}
	print "   );" >> GEN_MODEL;

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

	print "   $stmt->execute();" >> GEN_MODEL;
	print "   $stmt->close();" >> GEN_MODEL;
	print "   $insert_id = $mysqli->insert_id;" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   else" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $this->db_error->insert_error();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   $mysqli->close();" >> GEN_MODEL;
	print "   $this->db_error->serialize();" >> GEN_MODEL;
	print "   return $insert_id;" >> GEN_MODEL;

#-----------------------------------------------------------------------------------
	
	print "}" >> GEN_MODEL;
 	print "" >> GEN_MODEL;
}

#-----------------------------------------------------------------------------------
# define the load function of the model
function write_load() {
    arraylength=arraysize(variable_list)    
	
	print "// -------------------------------------------------------------\n" >> GEN_MODEL;    
    print "// define the load function of the model"  >> GEN_MODEL;

#-----------------------------------------------------------------------------------
	
    # public function load()
    # {
	# require "data_connect.php";
	# $id = $this->get_id();
	# if( $stmt = $mysqli->prepare(
	
	print "public function load()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   require \"data_connect.php\";" >> GEN_MODEL;
	print "   $id = $this->get_id();" >> GEN_MODEL;	
	print "   if( $stmt = $mysqli->prepare(" >> GEN_MODEL;

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

	print "   \"SELECT" >> GEN_MODEL;
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   " variable_list[variable_index]  "," >> GEN_MODEL; }
	    else
		{ print "   " variable_list[variable_index] >> GEN_MODEL; }
	}
	print "   FROM " classname " WHERE id=?\"))" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;	

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

	print "   $stmt->bind_param('i', $id );" >> GEN_MODEL;
	print "   $stmt->execute();" >> GEN_MODEL;
	print "   $stmt->bind_result" >> GEN_MODEL;
	print "   (" >> GEN_MODEL;	
	for ( variable_index in variable_list )
	{
	    if( variable_index < ( arraylength - 1 ) )
	        { print "   $" variable_list[variable_index]  "," >> GEN_MODEL; }
	    else
		{ print "   $" variable_list[variable_index] >> GEN_MODEL; }
	}
	print "   );" >> GEN_MODEL;	

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

	print "   if( $stmt->fetch() == TRUE )" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	for ( variable_index in variable_list )
	{
	    variable = variable_list[variable_index];
	    print "   $this->set_"  variable  "( $" variable " );" >> GEN_MODEL;
	}
	print "   $stmt->close();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   else" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $this->db_warning->not_found();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   $mysqli->close();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   else" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $this->db_error->load_error();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   $this->db_error->serialize();" >> GEN_MODEL;
	print "   $this->db_warning->serialize();" >> GEN_MODEL;		
	
	#-----------------------------------------------------------------------------------
	
	print "}" >> GEN_MODEL;
 	print "" >> GEN_MODEL;
}

#-----------------------------------------------------------------------------------
# define the update function of the model
function write_update() {
    print "// -------------------------------------------------------------\n" >> GEN_MODEL;    
    print "// define the update function of the model"  >> GEN_MODEL;

#-----------------------------------------------------------------------------------
	
    # public function update()
    # {
	# require "data_connect.php";
	# $id = $this->get_id();
	# $author_id = $this->get_author_id();
	# $reader_id = $this->get_reader_id();
	# $read_stamp = $this->get_read_stamp();
	# $text = $this->get_text();
	
	print "public function update()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   require \"data_connect.php\";" >> GEN_MODEL;

	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		variable = variable_list[variable_index];
		print "   $"  variable  " =  $this->get_" variable "();" >> GEN_MODEL;
	    }
	}

#-----------------------------------------------------------------------------------	

	# if( $stmt = $mysqli->prepare(
	# "UPDATE member_message SET
	# id=?,
	# author_id=?,
	# reader_id=?,
	# read_stamp=?,
	# text=?
	# WHERE id=?"))
	#{
	# $stmt->bind_param

	print "   if( $stmt = $mysqli->prepare(" >> GEN_MODEL;
	print "   \"UPDATE " classname " SET" >> GEN_MODEL;	
	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		if( variable_index < ( arraylength - 1 ) )
	        { print "   " variable_list[variable_index] "=?," >> GEN_MODEL; }
		else
		{ print "   " variable_list[variable_index] "=?" >> GEN_MODEL; }
	    }
	}
	print "   WHERE id=?\"))" >> GEN_MODEL;	
	print "   {" >> GEN_MODEL;
	print "   $stmt->bind_param" >> GEN_MODEL;
	
#-----------------------------------------------------------------------------------	      

	# (
	# "iiissi",
	# $id,
	# $author_id,
	# $reader_id,
	# $read_stamp,
	# $text,
	# $id
	# );

	print "   (" >> GEN_MODEL;
	printf "   \"" >> GEN_MODEL;
	
	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    { printf get_datatype_character( type_list[variable_index] ) >> GEN_MODEL; }
	}
	print "\"," >> GEN_MODEL;

	for ( variable_index in variable_list )
	{
	    if( type_list[variable_index] != "time_stamp" )
	    {
		if( variable_index < ( arraylength - 1 ) )
	        { print "   $" variable_list[variable_index] "," >> GEN_MODEL; }
		else
		{ print "   $" variable_list[variable_index] >> GEN_MODEL; }
	    }
	}
	print "   );" >> GEN_MODEL;	

#-----------------------------------------------------------------------------------
      
	# $stmt->execute();
	# $stmt->close();
        # }
	# else
	# {
	# $this->db_error->update_error();
        # }
	# $mysqli->close();
	# $this->db_error->serialize();

	print "   $stmt->execute();" >> GEN_MODEL;
	print "   $stmt->close();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   else" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $this->db_error->update_error();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   $mysqli->close();" >> GEN_MODEL;
	print "   $this->db_error->serialize();" >> GEN_MODEL;	      		

#-----------------------------------------------------------------------------------
      
	print "}" >> GEN_MODEL;
 	print "" >> GEN_MODEL;
}

#-----------------------------------------------------------------------------------
# define the delete function of the model
function write_delete() {
    print "// -------------------------------------------------------------\n" >> GEN_MODEL;    
    print "// define the delete function of the model"  >> GEN_MODEL;

    # public function delete()
    # {
    # require "data_connect.php";
	# $id = $this->get_id();
	# if( $stmt = $mysqli->prepare(
	# "DELETE FROM member_message
	# WHERE id=?"))
	# {
	# $stmt->bind_param("i",  $id);
	# $stmt->execute();
	# $stmt->close();
        # }
	# else
	# {
	# $this->db_error->delete_error();
        # }
	# $mysqli->close();
	# $this->db_error->serialize();
        # }	
      
	print "public function delete()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   require \"data_connect.php\";" >> GEN_MODEL;
	print "   $id = $this->get_id();" >> GEN_MODEL;
	print "   if( $stmt = $mysqli->prepare(" >> GEN_MODEL;
	print "   \"DELETE FROM " classname >> GEN_MODEL;
	print "   WHERE id=?\"))" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $stmt->bind_param(\"i\",  $id);" >> GEN_MODEL;
	print "   $stmt->execute();" >> GEN_MODEL;
	print "   $stmt->close();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   else" >> GEN_MODEL;
	print "   {" >> GEN_MODEL;
	print "   $this->db_error->delete_error();" >> GEN_MODEL;
	print "   }" >> GEN_MODEL;
	print "   $mysqli->close();" >> GEN_MODEL;
	print "   $this->db_error->serialize();" >> GEN_MODEL;
	print "}" >> GEN_MODEL;
 	print "" >> GEN_MODEL;
      }

#-----------------------------------------------------------------------------------
# define the getJSON function of the model
function write_getJSON() {
    print "// -------------------------------------------------------------\n" >> GEN_MODEL;    
    print "// define the getJSON function of the model"  >> GEN_MODEL;

	
	# return
	# "{" . 
	# "\"id\":" . $this->get_id() . "," .
	# "\"author_id\":" . $this->get_author_id() . "," .
	# "\"reader_id\":" . $this->get_reader_id() . "," .
	# "\"read_stamp\":\"" . $this->get_read_stamp() . "\"," .
	# "\"text\":\"" . $this->get_text() . "\"" .
	# "}";
	    
	print "public function getJSON()" >> GEN_MODEL;
	print "{" >> GEN_MODEL;
	print "   return" >> GEN_MODEL;
	print "   \"{\" . \"<br>\" . "  >> GEN_MODEL;	

	for ( variable_index in variable_list )
	{
	    var = variable_list[variable_index];
	    type = type_list[variable_index];

	    if( variable_index < ( arraylength - 1 ) )
	    {
 		if( type == "Integer" )
  	        { print "   \"\\\"" var "\\\":\" . $this->get_" var "() . \",\" . \"<br>\" . " >> GEN_MODEL; }
		else
	        { print "   \"\\\"" var "\\\":\\\"\" . $this->get_" var "() . \"\\\"\" . \",\" . \"<br>\" . " >> GEN_MODEL; }
	    }
	    else
	    {
		if( type == "Integer" )
  	        { print "   \"\\\"" var "\\\":\" .  $this->get_" var "() . \"<br>\" . " >> GEN_MODEL; }		    
		else
	        { print "   \"\\\"" var "\\\":\\\"\" . $this->get_" var "() .  \"\\\"\" . \"<br>\" . " >> GEN_MODEL; }		    
	    }	
	}
	print "   \"}\"; " >> GEN_MODEL;
	print "}" >> GEN_MODEL;
 	print "" >> GEN_MODEL;
}
