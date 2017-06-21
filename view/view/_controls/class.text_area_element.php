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
    "<label for=\"" . $this->name . "\">mycomment:</label>" .
    "<textarea class=\"form-control\" rows=\"5\" id=\"" . $this->name .
    "</div>";
}

}
?>
