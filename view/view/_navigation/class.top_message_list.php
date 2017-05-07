<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.top_message_list.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 22.12.2016, 12:21:44 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include navigation_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.navigation_list.php');

/**
 * include top_message_item
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_message_item.php');

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141F-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141F-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141F-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141F-constants end

/**
 * Short description of class top_message_list
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class top_message_list
    extends navigation_list
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     $num = (int)5;
     for ( $n=0; $n<$num; $n++ )
     {
     $message_item = new top_message_item();
     $message_item->set_left_header( "Bernd Schröder" );
     $message_item->set_right_text( "yesterday" );
     $message_item->set_body_text( "Lorem ipsum dolor sit amet..." );
     $this->add_item( $message_item );
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     "<li class=\"dropdown\">" .
     "<a class=\"dropdown-toggle\"" .
     "data-toggle=\"dropdown\" href=\"xxx\">" .
     "<i class=\"fa fa-envelope fa-fw\"></i>" .
     "<i class=\"fa fa-caret-down\"></i>" .
     "</a>" .
     "<ul class=\"dropdown-menu dropdown-messages\">" .
     
     $this->get_message_list() .
     
     "<li>" .
     "<a class=\"text-center\" href=\"xxx\">" .
     "<strong>Read All Messages</strong>" .
     "<i class=\"fa fa-angle-right\"></i>" .
     "</a>" .
     "</li>" .
     "</ul>" . // dropdown-messages
     "</li>";   // dropdown
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_message_list()
    {
     $message_list = "";
     
     for ( $n=0; $n<$this->get_item_count(); $n++ )
     {
     $message_item = $this->get_item( $n );
     $message_item->get_representation();
     $message_list .= $message_item->get_representation();
     }
     
     return $message_list;
    }
}?>