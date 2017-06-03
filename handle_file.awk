#!/bin/awk -f
# reports which file is being read
BEGIN {

}

{

if( $0~/#/ )
{
    # add the code to the array
    add_code($0);
}

else if( $0~ /require_once/ )
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

else if( $1~/private/ )
{
    # add the private variable
    add_var($0);
}

else if( $1~/public/ )
{
    # add the function
    add_func($0);
}

else
{
    ;
}
}

END {
    print "rewrite File: " FILENAME;
    print "<?php" > FILENAME;
    print "// this script is written by Bernd Schröder using AWK in Linux bash" > FILENAME;
    
    print "\n// -------------------------------------------------------------\n" >> FILENAME;
    
    for ( include_index in include_list )
    {
	print include_list[include_index] >> FILENAME; 
    }

    print "\n// -------------------------------------------------------------\n" >> FILENAME;

    print classname >> FILENAME;

    if (length(extends) != 0)
    { print "    " extends >> FILENAME; }

    print "{" >> FILENAME;
    
    print "\n// -------------------------------------------------------------\n" >> FILENAME;
    
    for ( variable_index in variable_list )
    {
	print variable_list[variable_index] >> FILENAME; 
    }

    print "\n// -------------------------------------------------------------\n" >> FILENAME;

    for ( function_index in function_list )
    {
	print function_list[function_index] >> FILENAME;
    }

    print "}" >> FILENAME; 
    print "?>" >> FILENAME;
}

#-----------------------------------------------------------------------------------
# function to trim empy spaces in front of the line
function ltrim(s) { sub(/^[ \t\r\n]+/, "", s); return s }

#-----------------------------------------------------------------------------------
# add includes
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
function add_class(myclass) {
     classname = myclass;

     # add the codelist to the include list and emty the codelist
     for ( source_code_index in source_code_list )
     { 
	 include_list[include_index] = source_code_list[source_code_index];
	 include_index++;
     }
     delete source_code_list;
     source_code_index = 0;
}

#-----------------------------------------------------------------------------------
# add extends
function add_extends(myextends) {
    extends = substr( myextends, ( index( myextends, "extends") ) );
}

#-----------------------------------------------------------------------------------
# add private variable
function add_var(var) {
    class_variable = "// -------------------------------------------------------------\n";
    class_variable = class_variable ltrim( var );
    variable_list[ variable_index++ ] = class_variable;
}

#-----------------------------------------------------------------------------------
# add code
function add_code(code) {
    source_code_list[source_code_index] = substr( code, ( index( code, "#")+1) );
    source_code_index++;
}

#-----------------------------------------------------------------------------------
# add the function
function add_func(myfunc) {
    class_function = "// -------------------------------------------------------------\n";
    class_function = class_function ltrim(myfunc) "\n{\n";

    for ( source_code_index in source_code_list )
    {
	class_function = class_function "    " source_code_list[source_code_index] "\n";
    }

    class_function = class_function "}\n";
    
    function_list[ function_index++ ] = class_function;
    delete source_code_list;
    source_code_index = 0;
}

#-----------------------------------------------------------------------------------
