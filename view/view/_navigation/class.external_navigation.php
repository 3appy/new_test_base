<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.external_top_navigation.php');

// -------------------------------------------------------------

class external_navigation
{

// -------------------------------------------------------------

// -------------------------------------------------------------
private $top_nav = null;

// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    $this->top_nav = new external_top_navigation();
}

// -------------------------------------------------------------
public function build_navigation()
{
    $this->top_nav->build_navigation();
}

// -------------------------------------------------------------
public function get_representation()
{
    return
    $this->top_nav->get_representation();
}

}
?>
