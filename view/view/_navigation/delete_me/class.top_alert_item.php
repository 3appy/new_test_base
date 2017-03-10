<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.top_alert_item.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 22.12.2016, 12:47:16 with ArgoUML PHP module 
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
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001495-includes begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001495-includes end

/* user defined constants */
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001495-constants begin
// section 10-5-29--89--28c3d29:1592151f385:-8000:0000000000001495-constants end

/**
 * Short description of class top_alert_item
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class top_alert_item
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
    public function get_left_header()
    {
     return 
     "<i class=\"fa fa-comment fa-fw\"></i>" .
     "$this->left_header";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_body_text()
    {
     return "";
    }
}?>