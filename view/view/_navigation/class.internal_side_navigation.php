<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.internal_side_navigation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.04.2017, 19:42:19 with ArgoUML PHP module 
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

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141E-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141E-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141E-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141E-constants end

/**
 * Short description of class internal_side_navigation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class internal_side_navigation
    extends navigation_list
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     ;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     //<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     "<div class=\"collapse navbar-collapse navbar-ex1-collapse\">" .
     "<ul class=\"nav navbar-nav side-nav\">" .
     "<li>" .
     "<a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo\"><i class=\"fa fa-fw fa-arrows-v\"></i> Dropdown <i class=\"fa fa-fw fa-caret-down\"></i></a>" .
     "<ul id=\"demo\" class=\"collapse\">" .
     "<li>" .
     "<a href=\"#\">Dropdown Item</a>" .
     "</li>" . 
     "<li>" .
     "<a href=\"#\">Dropdown Item</a>" .
     "</li>" .
     "</ul>" .
     "</li>" .
     "<li class=\"active\">" .
     "<a href=\"blank-page.html\"><i class=\"fa fa-fw fa-file\"></i> Blank Page</a>" .
     "</li>" .
     "</ul>" .
     "</div>";
     //<!-- /.navbar-collapse -->
    }
}?>