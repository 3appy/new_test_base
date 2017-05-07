<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.c_view.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 27.04.2017, 13:16:19 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include boot_view
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.boot_view.php');

/* user defined includes */
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FA6-includes begin
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FA6-includes end

/* user defined constants */
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FA6-constants begin
// section 10-30-49-58--57ece7da:15baed1e42f:-8000:0000000000001FA6-constants end

/**
 * Short description of class c_view
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class c_view
    extends boot_view
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
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member.php');
     
     parent::__construct( new member() );
     //$this->watch_relation =
     //$this->watched_entity->perform_relation( $this->get_watch_entity());
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_nav()
    {
     if( defined('__ROOT_VIEW__') == FALSE )
     { define('__ROOT_VIEW__', $this->get_root_view() ); }
     require_once(__ROOT_VIEW__.
     'view/_navigation/class.internal_navigation.php' );
     
     $navigation = new internal_navigation();
     $navigation->build_navigation();
     return $navigation->get_representation();
    }
}?>