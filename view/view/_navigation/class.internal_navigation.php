<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.internal_side_navigation.php');
require_once('class.internal_top_navigation.php');

// -------------------------------------------------------------

class internal_navigation
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public $top_nav = null;
{
}

// -------------------------------------------------------------
public $side_nav = null;
{
}

// -------------------------------------------------------------
public function __construct()
{
    $this->top_nav = new internal_top_navigation();
    $this->side_nav = new internal_side_navigation();
}

// -------------------------------------------------------------
public function build_navigation()
{
    $this->top_nav->build_navigation();
    $this->side_nav->build_navigation();
}

// -------------------------------------------------------------
public function get_representation()
{
    return
    $this->top_nav->get_representation() .
    $this->side_nav->get_representation();
}

}
?>
