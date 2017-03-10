<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.navigation_item.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 22.12.2016, 12:22:24 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001443-includes begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001443-includes end

/* user defined constants */
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001443-constants begin
// section 10-5-29--89--2b0abcec:15920f3dcd9:-8000:0000000000001443-constants end

/**
 * Short description of class navigation_item
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class navigation_item
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute left_header
     *
     * @access public
     * @var String
     */
    public $left_header = null;

    /**
     * Short description of attribute right_text
     *
     * @access public
     * @var String
     */
    public $right_text = null;

    /**
     * Short description of attribute body_text
     *
     * @access public
     * @var String
     */
    public $body_text = null;

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
    public function get_representation()
    {
     return
     "<li>" .
     "<a href=\"xx\">" .
     "<div>" .
     $this->get_left_header() .
     $this->get_right_text() .
     "</div>" .
     $this->get_body_text() .
     "</a>" .
     "</li>" .
     "<li class=\"divider\"></li>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  left_header
     */
    public function set_left_header($left_header)
    {
     $this->left_header = $left_header;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_left_header()
    {
     return 
     "<strong>" . $this->left_header . "</strong>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  right_text
     */
    public function set_right_text($right_text)
    {
     $this->right_text = $right_text;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_right_text()
    {
     return 
     "<span class=\"pull-right text-muted\">" .
     "<em>" . $this->right_text . "</em>" .
     "</span>";
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  body_text
     */
    public function set_body_text($body_text)
    {
     $this->body_text = $body_text;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_body_text()
    {
     return 
     "<div>" . $this->body_text . "</div>";
    }
}?>