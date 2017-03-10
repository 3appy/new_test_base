<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.code_generation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 31.07.2014, 18:04:09 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.basic_list.php');

/**
 * include command_attribute
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.command_attribute.php');

/* user defined includes */
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:000000000000087B-includes begin
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:000000000000087B-includes end

/* user defined constants */
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:000000000000087B-constants begin
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:000000000000087B-constants end

/**
 * Short description of class code_generation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class code_generation
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute filename
     *
     * @access public
     * @var String
     */
    public $filename = null;

    /**
     * Short description of attribute read_handle
     *
     * @access public
     * @var Integer
     */
    public $read_handle = null;

    /**
     * Short description of attribute write_handle
     *
     * @access public
     * @var Integer
     */
    public $write_handle = null;

    /**
     * Short description of attribute class_name
     *
     * @access public
     * @var String
     */
    public $class_name = null;
    
    public $extends = null;

    /**
     * Short description of attribute file_array
     *
     * @access public
     * @var Integer
     */
    public $file_array = null;

    /**
     * Short description of attribute command_attribute_list
     *
     * @access public
     * @var Integer
     */
    public $command_attribute_list = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function open_read_file()
    {
     $this->read_handle = 
     fopen($this->filename, 'r') or die("can't open file");
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function generate()
    {
     $after_attributes = FALSE;
     $before_operaton = TRUE;
     $command = "";
     $attribute = "";
     
     $this->command_attribute_list =  new basic_list();
     
     $count = $this->file_array->get_item_count();
     for( $n=0; $n < $count; $n++ )
     {
     $item = $this->file_array->get_item( $n );
     
     if ( strpos($item, 'ATTRIBUTES') !== false )
     { $after_attributes = TRUE; }
     
     if ( strpos($item, 'OPERATIONS') !== false )
     { $before_operaton = FALSE; }
     
     if ( $after_attributes == FALSE )
     {

     if (( strpos($item, 'class ') !== FALSE ) AND
     ( strpos($item, '/*') == FALSE ))
     {
     $this->class_name = substr( $item, 16 );
     $pos = strpos( $this->class_name, "\n");
     $this->class_name = substr( $this->class_name, 0, $pos - 1 );
     }
     }
     
     if (( strpos($item, 'extends ') !== FALSE ))
     {
     $this->extends = substr( $item, 12 );
     $pos = strpos( $this->extends, "\n");
     $this->extends = substr( $this->extends, 0, $pos - 1 );          
     } 
     
     if ( $after_attributes AND $before_operaton )
     {
     if ( strpos($item, '*') == 5 )
     { $command .= $item; }
     
     if ( strpos($item, '$') !== false )
     {
     $command_attribute = new command_attribute();
     $attribute_line = $item;
     
     $pos = strpos($item, '$');
     $attribute = substr( $item, $pos + 1 );
     $pos = strpos($attribute, '=');
     $attribute = substr( $attribute, 0, $pos - 1 );
     
     $command_attribute->set_command( $command );
     $command_attribute->set_attribute_type( $this->get_type($command) );
     $command_attribute->set_attribute_type_long( $this->get_type_long($command) );
     $command_attribute->set_attribute_line( $attribute_line );
     $command_attribute->set_attribute( $attribute );
     $this->command_attribute_list->add_item($command_attribute);
     
     $command = "";
     $attribute = "";
     }
     }
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  command
     */
    public function get_type($command)
    {
     $type = "i";
     
     if ( strpos($command, 'String') !== false )
     { $type = "s"; }
     
     return $type;
    }
    
    public function get_type_long($command)
    {
     $type = "Integer";

     if ( strpos($command, 'String') !== false )
     { $type = "String"; }
     elseif ( strpos($command, 'time_stamp') !== false )
     { $type = "time_stamp"; }

     return $type;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function close_read_file()
    {
     fclose($this->read_handle);
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  filename
     */
    public function set_filename($filename)
    {
     $this->filename = $filename;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function set_attribute($attribute)
    {
     $this->attribute = $attribute;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_command()
    {
     return $this->command;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function read_file()
    {
     $this->file_array = new basic_list();
     // read the complete file into a buffer named file_array
     while (($buffer = fgets($this->read_handle, 4096)) !== false)
     {  $this->file_array->add_item( $buffer );  }
     echo "read file: " . $this->filename . "...............";
    }
}?>