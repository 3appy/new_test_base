<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.csv_document.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 02.03.2017, 11:21:29 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include document
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.document.php');

/* user defined includes */
// section 10-5-31--48-57a32a3b:156085264da:-8000:0000000000001733-includes begin
// section 10-5-31--48-57a32a3b:156085264da:-8000:0000000000001733-includes end

/* user defined constants */
// section 10-5-31--48-57a32a3b:156085264da:-8000:0000000000001733-constants begin
// section 10-5-31--48-57a32a3b:156085264da:-8000:0000000000001733-constants end

/**
 * Short description of class csv_document
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class csv_document
    extends document
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute csv_list
     *
     * @access private
     * @var Integer
     */
    private $csv_list = null;

    /**
     * Short description of attribute seperator
     *
     * @access private
     * @var String
     */
    private $seperator = null;

    /**
     * Short description of attribute width
     *
     * @access private
     * @var Integer
     */
    private $width = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function set_allowed_types()
    {
     $this->allowed_types = ["csv"];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  seperator
     */
    public function set_seperator($seperator)
    {
     $this->seperator = $seperator;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  width
     */
    public function set_width($width)
    {
     $this->width =$width;
    }
    /**
     *
     * @access public
     */
    public function load_csv_list_from_file()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.csv_list.php');
     
     if( defined('__ROOT__') == FALSE )
     { define('__ROOT__', $this->get_root() ); }
     
     $this->load();
     $csv_array;
     $row = 1;
     $file_path = __ROOT__  . $this->get_file_path();
     
     
     $this->csv_list = new csv_list();
     
     if ( $handle = fopen( $file_path, "r" ) )
     {
     // Datei zeilenweise auslesen, fgetcsv() anwenden,
     while (($csv_array = fgetcsv($handle, 1000, ";")) !== FALSE )
     // Ausgeben des arrays $csv_array
     { 
     $csv_line_array = new csv_list();
     $csv_line_array->set_array( $csv_array );
     $this->csv_list->add_item( $csv_line_array );
     }
     }
     fclose($handle);
     
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  text
     */
    public function load_csv_list_from_text($text)
    {
     require_once('class.csv_list.php');
         
     $this->csv_list = new csv_list();
     $this->csv_list->load_csv_list_from_text( $text );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  csv_list
     */
    public function set_csv_list($csv_list)
    {
     $this->csv_list =$csv_list;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_csv_list()
    {
     return $this->csv_list;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_csv_text()
    {
     return $this->csv_list->get_csv_text();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function analyze_csv_list()
    {
     return $this->csv_list->analyze_csv_list( $this->width );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function save_csv_document()
    {
     $document_id = (int)0;
     $success     = TRUE;
     
     $this->set_name( $this->get_owner_group() . "_tmp"  );
     $document_id = $this->insert();
     
     $this->set_name( $this->get_owner_group() . $document_id  );
     $this->set_id( $document_id );
     
     $this->update();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_file_path()
    {
    return  
    "/user_data/document/" .
    $this->get_owner_group() . "_" .
    $this->get_owner_id() . "/" .
    $this->get_file_name();   
    }
    
    public function write_csv_list_to_file()
    {
     if( defined('__ROOT__') == FALSE )
     { define('__ROOT__', $this->get_root() ); }
     $file_path = __ROOT__  . $this->get_file_path();
     
     $myfile = fopen($file_path, "w") or die("Unable to open file!");
     $count = $this->csv_list->get_item_count();
     for ( $n=0; $n<$count; $n++ )
     {
     fwrite($myfile, $this->csv_list->get_item($n)->implode() );
     fwrite($myfile, "\n" );
     }
     fclose($myfile);
    }
}?>