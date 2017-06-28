<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('../../view/_basic_view/class.boot_view.php');
require_once('../../view/_basic_view/class.boot_view.php');

// -------------------------------------------------------------

class b_view
    extends boot_view
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    parent::__construct( null );
    $this->set_watch_relation( (int)0 );
}

// -------------------------------------------------------------
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

}
?>
