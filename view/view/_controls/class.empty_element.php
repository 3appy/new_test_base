<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.standard_element.php');

// -------------------------------------------------------------

class empty_element
    extends standard_element
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_element()
{
    return
    "<div id=\"" . $this->get_id()  . "\">" . 
    "</div>";
}

}
?>
