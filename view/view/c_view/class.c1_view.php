<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.c1_view.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 27.04.2017, 13:17:06 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include c_view
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.c_view.php');

/* user defined includes */
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FAE-includes begin
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FAE-includes end

/* user defined constants */
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FAE-constants begin
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FAE-constants end

/**
 * Short description of class c1_view
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class c1_view
    extends c_view
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     parent::__construct();
     $this->load_language("c1");
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_main()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.time_table_list.php');
     
     /*
     parent::get_main();
     
     $list = new time_table_list();
     $list->my_init();
     $success = TRUE;
     $my_print = "(start)" . $list->get_print();
     
     for ( $n=1;  ( $n < 1000000 AND ($success) ); $n++ )
     {
     $success = $list->permutate();
     $my_print .= "(" . $n . ")" . $list->get_print();
     }
     return $my_print;
     */
     
     
     return
     parent::get_main() .
     
     "<div class=\"container\">" .
     "<dir class=\"row\">" .
     "<dir class=\"col-md-4\">" .
     "<h3>Theme 1</h3>" .
     "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>"
     "<a href=\"#\" class=\"btn btn-danger\">Learn more</a>" .
     "</dir>" .
     
     "<dir class=\"col-md-4\">" .
     "<h3>Theme 1</h3>" .
     "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>"
     "<a href=\"#\" class=\"btn btn-danger\">Learn more</a>" .
     "</dir>" .
     
     "<dir class=\"col-md-4\">" .
     "<h3>Theme 1</h3>" .
     "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>"
     "<a href=\"#\" class=\"btn btn-danger\">Learn more</a>" .
     "</dir>" .
     "</dir>" .
     "</div>" .
     
     "<div class=\"modal fade\" id=\"contact\" role=\"dialog\">" .
     "<div class=\"modal-dialog\">" .
     "<div class=\"modal-content\">" .
     "<div class=\"modal-header\">" .
     "<h4>contact</h4>" .
     "</div>" .
     "<div class=\"modal-body\">" .
     "<p>Wer ist die geilste Organisation im Land 3appy .....</p>" .
     "</div>" .
     "<div class=\"modal-footer\">" .
     "<a class=\"btn btn-primary\" data-dismiss=\"modal\">close</a>" .
     "</div>" .
     "</div>" .
     "</div>" .
     "</div>";
    }
}?>