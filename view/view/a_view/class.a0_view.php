<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.a0_view.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 09.04.2017, 15:58:20 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * require_once('../../view/_basic_view/class.boot_view.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.a_view.php');

/* user defined includes */
// section 10-30--8-108--20db5dc0:158fd3b776d:-8000:0000000000001439-includes begin
// section 10-30--8-108--20db5dc0:158fd3b776d:-8000:0000000000001439-includes end

/* user defined constants */
// section 10-30--8-108--20db5dc0:158fd3b776d:-8000:0000000000001439-constants begin
// section 10-30--8-108--20db5dc0:158fd3b776d:-8000:0000000000001439-constants end

/**
 * Short description of class a0_view
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class a0_view
    extends a_view
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     parent::__construct();
     $this->load_language("a0");
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_main()
    {
     return
     parent::get_main() .
     
     "<div id=\"page-wrapper\">" .
     "<div class=\"container-fluid\">" .
     //<!-- Page Heading -->
     "<div class=\"row\">" .
     "<div class=\"col-lg-12\">" .
     "<h1 class=\"page-header\">" .
     "Blank Page" .
     "<small>Subheading</small>" .
     "</h1>" .
     "<ol class=\"breadcrumb\">" .
     "<li>" .
     "<i class=\"fa fa-dashboard\"></i>  <a href=\"index.html\">Dashboard</a>" .
     "</li>" .
     "<li class=\"active\">" .
     "<i class=\"fa fa-file\"></i> Blank Page" .
     "</li>" .
     "</ol>" .
     "</div>" .
     "</div>" .
     //<!-- /.row -->

     "</div>" .
     //<!-- /.container-fluid -->

     "</div>";
     //<!-- /#page-wrapper -->
    }
}?>