<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.standard_element.php');

// -------------------------------------------------------------

class text_area_element
    extends standard_element
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_element()
{
    return
    "<div class=\"form-group\">" .
    "<label for=\"" . $this->get_id() . 
    "\">mytext:</label>" .
    "<textarea class=\"form-control\" " .
    "name=\"" . $this->get_id() . "\" " . 
    "id=\"" . $this->get_id()  . "\"></textarea>" . 
    "</div>";
}

}
?>
