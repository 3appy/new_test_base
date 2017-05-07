<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.top_task_item.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 22.12.2016, 12:29:10 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include navigation_item
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.navigation_item.php');

/* user defined includes */
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001481-includes begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001481-includes end

/* user defined constants */
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001481-constants begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001481-constants end

/**
 * Short description of class top_task_item
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class top_task_item
    extends navigation_item
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_body_text()
    {
     return
     "<div class=\"progress progress-striped active\">" .
     "<div class=\"progress-bar progress-bar-success\"" . 
     "role=\"progressbar\" aria-valuenow=\"40\"" . 
     "aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">" .
     "<span class=\"sr-only\">40% Complete (success)</span>" .
     "</div>" .
     "</div>";
    }
}?>