<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.top_task_list.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 22.12.2016, 12:28:54 with ArgoUML PHP module 
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
 * include top_task_item
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_task_item.php');

/* user defined includes */
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001477-includes begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001477-includes end

/* user defined constants */
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001477-constants begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001477-constants end

/**
 * Short description of class top_task_list
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class top_task_list
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
     $task_item = new top_task_item();
     $task_item->set_left_header( "Task X" );
     $task_item->set_right_text( "40% Complete" );
     $this->add_item( $task_item );
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
     "<i class=\"fa fa-tasks fa-fw\"></i>" .
     "<i class=\"fa fa-caret-down\"></i>" .
     "</a>" .
     "<ul class=\"dropdown-menu dropdown-tasks\">" .
     
     $this->get_task_list() .
     
     "<li>" .
     "<a class=\"text-center\" href=\"xxx\">" .
     "<strong>Read All Tasks</strong>" .
     "<i class=\"fa fa-angle-right\"></i>" .
     "</a>" .
     "</li>" .
     "</ul>" . // dropdown-tasks
     "</li>";   // dropdown
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_task_list()
    {
     $task_list = "";
     
     for ( $n=0; $n<$this->get_item_count(); $n++ )
     {
     $task_item = $this->get_item( $n );
     $task_item->get_representation();
     $task_list .= $task_item->get_representation();
     }
     
     return $task_list;
    }
}?>