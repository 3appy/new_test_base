<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.standard_element.php');

// -------------------------------------------------------------

class text_element
    extends standard_element
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_element()
{
    return
    "<div class=\"form-group\">" .
    "<label for=\"" . $this->name . "\">myname:</label>" .
    "<input type=\"text\" class=\"form-control\" id=\"" . 
    $this->name  . "\">" . 
    "</div>";
}

}
?>
