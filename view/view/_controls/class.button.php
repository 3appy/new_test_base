<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.standard_element.php');

// -------------------------------------------------------------

class button
    extends standard_element
{

// -------------------------------------------------------------

// -------------------------------------------------------------
private $class = null;

// -------------------------------------------------------------

// -------------------------------------------------------------
public function set_class($class)
{
    $this->class = $class;
}

// -------------------------------------------------------------
public function get_element()
{
    return
    "<button type=\"button\" " . 
    "class=\"" . $this->class . "\" " .
    "id=\"" . $this->get_id()  . "\" " . 
    ">Send</button>";
}

}
?>
