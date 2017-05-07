<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.navigation_list.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 21.12.2016, 13:10:35 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001430-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001430-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001430-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001430-constants end

/**
 * Short description of class navigation_list
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class navigation_list
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute data_array
     *
     * @access public
     * @var Integer
     */
    public $data_array = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->data_array = array();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  item
     */
    public function add_item($item)
    {
     $this->data_array[] = $item;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  n
     */
    public function get_item($n)
    {
     return $this->data_array[ $n ];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_item_count()
    {
     return count( $this->data_array );
    }
}?>