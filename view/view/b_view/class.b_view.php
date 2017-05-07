<?php

error_reporting(E_ALL);

/**
 * require_once('../../view/_basic_view/class.boot_view.php');
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
require_once('../../view/_basic_view/class.boot_view.php');

/* user defined includes */
// section 10-5-24--17--d4910b2:1597e5fa31f:-8000:00000000000013D2-includes begin
// section 10-5-24--17--d4910b2:1597e5fa31f:-8000:00000000000013D2-includes end

/* user defined constants */
// section 10-5-24--17--d4910b2:1597e5fa31f:-8000:00000000000013D2-constants begin
// section 10-5-24--17--d4910b2:1597e5fa31f:-8000:00000000000013D2-constants end

/**
 * require_once('../../view/_basic_view/class.boot_view.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class b_view
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
     'view/_navigation/class.navigation.php' );
     
     $navigation = new navigation();
     $navigation->build_navigation();
     return $navigation->get_representation();
    }
}?>