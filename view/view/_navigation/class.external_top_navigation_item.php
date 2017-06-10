<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.navigation_item.php');

// -------------------------------------------------------------

class external_top_navigation_item
    extends navigation_item
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_representation()
{
    return
    "<li>" .
    "<a href=\"" . $this->get_link() . "\">" .
    $this->get_text() .
    "</a>" .
    "</li>";
}

}
?>
