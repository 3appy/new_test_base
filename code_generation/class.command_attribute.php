<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.command_attribute.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 31.10.2014, 09:09:56 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:0000000000000885-includes begin
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:0000000000000885-includes end

/* user defined constants */
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:0000000000000885-constants begin
// section 10-30-49-103--7d74c9de:143e74103d5:-8000:0000000000000885-constants end

/**
 * Short description of class command_attribute
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class command_attribute
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute attribute
     *
     * @access public
     * @var String
     */
    public $attribute = null;

    /**
     * Short description of attribute command
     *
     * @access public
     * @var String
     */
    public $command = null;

    /**
     * Short description of attribute attribute_line
     *
     * @access public
     * @var String
     */
    public $attribute_line = null;

    /**
     * Short description of attribute attribute_type
     *
     * @access public
     * @var String
     */
    public $attribute_type = null;

    /**
     * Short description of attribute attribute_type_long
     *
     * @access public
     * @var String
     */
    public $attribute_type_long = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_attribute()
    {
     return $this->attribute;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  attribute
     */
    public function set_attribute($attribute)
    {
     $this->attribute = $attribute;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_command()
    {
     return $this->command;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  command
     */
    public function set_command($command)
    {
     $this->command = $command;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_attribute_line()
    {
     return $this->attribute_line;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  attribute_line
     */
    public function set_attribute_line($attribute_line)
    {
     $this->attribute_line = $attribute_line;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_attribute_type()
    {
     return $this->attribute_type;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  attribute_type
     */
    public function set_attribute_type($attribute_type)
    {
     $this->attribute_type = $attribute_type;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_attribute_type_long()
    {
     return $this->attribute_type_long;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  attribute_type_long
     */
    public function set_attribute_type_long($attribute_type_long)
    {
     $this->attribute_type_long = $attribute_type_long;
    }
}?>