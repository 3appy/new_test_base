<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.internal_top_navigation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.04.2017, 19:40:12 with ArgoUML PHP module 
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
//require_once('class.navigation_list.php');

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
 * Short description of class internal_top_navigation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class internal_top_navigation
    extends navigation_list
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     $nav_list = new top_message_list();
     $nav_list->build_navigation();
     $this->add_item( $nav_list );
     
     //$nav_list = new top_task_list();
     //$nav_list->build_navigation();
     //$this->add_item( $nav_list );
     
     //$nav_list = new top_alert_list();
     //$nav_list->build_navigation();
     //$this->add_item( $nav_list );
     
     //$nav_list = new top_file_list();
     //$nav_list->build_navigation();
     //$this->add_item( $nav_list );
     
     //$nav_list = new top_user_list();
     //$nav_list->build_navigation();
     //$this->add_item( $nav_list );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
       return
       //<!-- Top Menu Items -->
       "<ul class=\"nav navbar-right top-nav\">" .
       "<li class=\"dropdown\">" .
       "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-envelope\"></i> <b class=\"caret\"></b></a>" .
       "<ul class=\"dropdown-menu message-dropdown\">" .

       "<li class=\"message-preview\">" .
       "<a href=\"#\">" .
       "<div class=\"media\">" .
       "<span class=\"pull-left\">" .
       "<img class=\"media-object\" src=\"http://placehold.it/50x50\" alt=\"\">" .
       "</span>" .
       "<div class=\"media-body\">" .
       "<h5 class=\"media-heading\">" .
       "<strong>John Smith</strong>" .
       "</h5>" .
       "<p class=\"small text-muted\"><i class=\"fa fa-clock-o\"></i> Yesterday at 4:32 PM</p>" .
       "<p>Lorem ipsum dolor sit amet, consectetur...</p>" .
       "</div>" .
       "</div>" .
       "</a>" .
       "</li>" .
       
       "<li class=\"message-footer\">" .
       "<a href=\"#\">Read All New Messages</a>" .
       "</li>" .

       "</ul>" .
       "</li>" .
       "</ul>";
    
    
     //$nav = "";
     //for( $i = 0; $i < $this->get_item_count(); $i++ )
     //{ $nav .= $this->get_item( $i )->get_representation(); }
     
     //return
     //"<ul class=\"nav navbar-top-links navbar-right\">" .
     
     //$nav .
     
     //"</ul>";
    }
}?>