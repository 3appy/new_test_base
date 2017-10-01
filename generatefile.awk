#!/bin/awk -f
# reports which file is being read
BEGIN {
    GEN_MODEL      # file name for the generated model
    GEN_LIST_MODEL # file name for the generated list_model    

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
    add_class($2);
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
    print "hallo rewrite File: " GEN_MODEL;
    write_generated_model();
    print "";
    print "huhu rewrite File: " GEN_LIST_MODEL;
    write_generated_list_model();    
}

#-----------------------------------------------------------------------------------
# define set and get function for all variables
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


#-----------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------



# define set and get function for all variables
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
     classname = substr(myclass,11);
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
function arraysize(a) {  # runtime error unless a is an array
    n=0;
    
    for (i in a) ++n
    return n
} 
