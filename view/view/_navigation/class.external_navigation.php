<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.external_navigation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.04.2017, 19:44:57 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include external_top_navigation
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.external_top_navigation.php');

/* user defined includes */
// section 10-5-24--17-e85be9e:1597f9b2b9a:-8000:00000000000014D5-includes begin
// section 10-5-24--17-e85be9e:1597f9b2b9a:-8000:00000000000014D5-includes end

/* user defined constants */
// section 10-5-24--17-e85be9e:1597f9b2b9a:-8000:00000000000014D5-constants begin
// section 10-5-24--17-e85be9e:1597f9b2b9a:-8000:00000000000014D5-constants end

/**
 * Short description of class external_navigation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class external_navigation
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute top_nav
     *
     * @access public
     * @var Integer
     */
    public $top_nav = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->top_nav = new external_top_navigation();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     $this->top_nav->build_navigation();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     $this->top_nav->get_representation();
    }
}?>