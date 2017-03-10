<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.navigation.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 21.12.2016, 15:49:03 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include side_navigation
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.side_navigation.php');

/**
 * include top_navigation
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.top_navigation.php');

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141C-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141C-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141C-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:000000000000141C-constants end

/**
 * Short description of class navigation
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class navigation
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute top_nav
     *
     * @access public
     * @var Integer
     */
    public $top_nav = null;

    /**
     * Short description of attribute side_nav
     *
     * @access public
     * @var Integer
     */
    public $side_nav = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->top_nav = new top_navigation();
     $this->side_nav = new side_navigation();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function build_navigation()
    {
     $this->top_nav->build_navigation();
     $this->side_nav->build_navigation();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     $this->top_nav->get_representation() .
     $this->side_nav->get_representation();
    }
}?>