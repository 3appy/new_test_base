<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.includes_ext_head.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 11.04.2017, 09:27:55 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include includes
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.includes.php');

/* user defined includes */
// section 10-5-22--66-7e62f166:15b3e728aa1:-8000:00000000000086A9-includes begin
// section 10-5-22--66-7e62f166:15b3e728aa1:-8000:00000000000086A9-includes end

/* user defined constants */
// section 10-5-22--66-7e62f166:15b3e728aa1:-8000:00000000000086A9-constants begin
// section 10-5-22--66-7e62f166:15b3e728aa1:-8000:00000000000086A9-constants end

/**
 * Short description of class includes_ext_head
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class includes_ext_head
    extends includes
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_representation()
    {
     return
     "<link href=\"" . $this->get_root_vendor() .
     "bootstrap/css/bootstrap.min.css\" ".
     
     "rel=\"stylesheet\"/>" .
     "<link href=\"" . $this->get_root_vendor() .
     "3appy_extern.css\" " .
     "rel=\"stylesheet\"/>" .
     
     "<link href=\"" . $this->get_root_vendor() .
     "font-awesome/css/font-awesome.min.css\" " .
     "rel=\"stylesheet\" type=\"text/css\" />";
    }
}?>