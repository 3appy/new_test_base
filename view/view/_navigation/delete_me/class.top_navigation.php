<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.top_navigation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 21.12.2016, 17:11:06 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include top_alert_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_alert_list.php');

/**
 * include top_file_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.top_file_list.php');

/**
 * include top_message_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_message_list.php');

/**
 * include top_task_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_task_list.php');

/**
 * include top_user_list
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.top_user_list.php');

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141D-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141D-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141D-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141D-constants end

/**
 * Short description of class top_navigation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class top_navigation
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute message_list
     *
     * @access public
     * @var Integer
     */
    public $message_list = null;

    /**
     * Short description of attribute task_list
     *
     * @access public
     * @var Integer
     */
    public $task_list = null;

    /**
     * Short description of attribute alert_list
     *
     * @access public
     * @var Integer
     */
    public $alert_list = null;

    /**
     * Short description of attribute file_list
     *
     * @access public
     * @var Integer
     */
    public $file_list = null;

    /**
     * Short description of attribute user_list
     *
     * @access public
     * @var Integer
     */
    public $user_list = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->message_list = new top_message_list();
     $this->task_list = new top_task_list();
     $this->alert_list = new top_alert_list();
     //$this->file_list = new top_file_list()
     //$this->user_list = new top_user_list()
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     $this->message_list->build_navigation();
     $this->task_list->build_navigation();
     $this->alert_list->build_navigation();
     //$this->file_list->build_navigation();
     //$this->user_list->build_navigation();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     "<ul class=\"nav navbar-top-links navbar-right\">" .
             <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

     
     $this->message_list->get_representation() .
     $this->task_list->get_representation() .
     $this->alert_list->get_representation() .
     //$this->file_list->get_representation();
     //$this->user_list->get_representation();
     
     "</ul>";
    }
}?>