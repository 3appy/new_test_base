#!/bin/awk -f
# reports which file is being read
BEGIN {
API_MODEL                  # file name for the generated model
}

{
read_file_model();
}

END {
print "api model: " API_MODEL;
write_api_model();
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

function write_api_model() {
    print "<?php" >> API_MODEL;
    print "// this script is written by Bernd Schröder using AWK in Linux bash" >> API_MODEL;
    print "\n" >> API_MODEL;    
    write_get_all();
    write_get_row();
    write_post();
    write_put();
    write_delete();
    print "\n" >> API_MODEL;    
    print "?>" >> API_MODEL;   
}

#-----------------------------------------------------------------------------------
# define the get functions of the api model
function write_get_all() {
    print "\n" >> API_MODEL;    
    print "// -------------------------------------------------------------\n" >> API_MODEL;    
    print "// return all datarecords of "  classname >> API_MODEL;
    print "$app->get('/api/" classname "', function()" >> API_MODEL;
    print "{" >> API_MODEL;
    print "require_once('../data/class." classname "_list.php');" >> API_MODEL;
    print "$list = new " classname "_list();" >> API_MODEL;
    print "$list->load_all();" >> API_MODEL;
    print "header('Content-Type: application/json');" >> API_MODEL;
    print "echo json_encode($list);" >> API_MODEL;
    print "});" >> API_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the get functions of the api model
function write_get_row() {
    print "\n" >> API_MODEL;    
    print "// -------------------------------------------------------------\n" >> API_MODEL;    
    print "// return a single row of "  classname >> API_MODEL;
    print "$app->get('/api/" classname "/{id}', function()" >> API_MODEL;
    print "{" >> API_MODEL;
    print "require_once('../data/class." classname ".php');" >> API_MODEL;
    print "$model = new " classname "();" >> API_MODEL;
    print "$id = $request->getAttribute('id');" >> API_MODEL;	
    print "$model->set_id( $id );" >> API_MODEL;	
    print "$model->load();" >> API_MODEL;	
    print "header('Content-Type: application/json');" >> API_MODEL;
    print "echo json_encode($model);" >> API_MODEL;
    print "});" >> API_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the post functions of the api model
function write_post() {
    print "\n" >> API_MODEL;    
    print "// -------------------------------------------------------------\n" >> API_MODEL;    
    print "// post data and create a new record of  "  classname >> API_MODEL;
    print "$app->post('/api/" classname "', function($request)" >> API_MODEL;
    print "{" >> API_MODEL;
    print "require_once('../data/class." classname ".php');" >> API_MODEL;
    print "$model = new " classname "();" >> API_MODEL;
    
    for ( variable_index in variable_list )
    {
	if(( type_list[variable_index] != "time_stamp" ) && (variable_index > 0))
	{ 
	    variable = variable_list[variable_index];
	    print "$model->set_" variable "( $request->getParsedBody()['" variable "'] );" >> API_MODEL;
	}
    }
	
    print "$model->insert();" >> API_MODEL;
    print "});" >> API_MODEL;	
}


#--1---------------------------------------------------------------------------------
# define the update functions of the api model
function write_put() {
    print "\n" >> API_MODEL;    
    print "// -------------------------------------------------------------\n" >> API_MODEL;    
    print "// update the record with id = id in "  classname >> API_MODEL;
    print "$app->put('/api/" classname "/{id}', function($request)" >> API_MODEL;
    print "{" >> API_MODEL;
    print "require_once('../data/class." classname ".php');" >> API_MODEL;
    print "$model = new " classname "();" >> API_MODEL;
    print "$id = $request->getAttribute('id');" >> API_MODEL;
    print "$model->set_id( $id );" >> API_MODEL;
    print "$model->load();" >> API_MODEL;	

    for ( variable_index in variable_list )
    {
	if(( type_list[variable_index] != "time_stamp" ) && (variable_index > 0))
	{ 
	    variable = variable_list[variable_index];
	    print "$model->set_" variable "( $request->getParsedBody()['" variable "'] );" >> API_MODEL;
	}
    }
	
    print "$model->update();" >> API_MODEL;
    print "});" >> API_MODEL;	
}

#-----------------------------------------------------------------------------------
# define the delete functions of the api model
function write_delete() {
    print "\n" >> API_MODEL;    
    print "// -------------------------------------------------------------\n" >> API_MODEL;    
    print "// delete the record with id = id from "  classname >> API_MODEL;
    print "$app->delete('/api/" classname "/{id}', function()" >> API_MODEL;
    print "{" >> API_MODEL;
    print "require_once('../data/class." classname ".php');" >> API_MODEL;
    print "$model = new " classname "();" >> API_MODEL;
    print "$id = $request->getAttribute('id');" >> API_MODEL;	
    print "$model->set_id( $id );" >> API_MODEL;	
    print "$model->delete();" >> API_MODEL;	
    print "});" >> API_MODEL;	
}
