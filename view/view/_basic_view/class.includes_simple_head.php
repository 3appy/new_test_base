<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.includes.php');

// -------------------------------------------------------------

class includes_simple_head
    extends includes
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_representation()
{
    return
    "<link href=\"" . $this->get_root_vendor() .
    "bootstrap/css/bootstrap.min.css\" ".
    
    "rel=\"stylesheet\"/>" .
    "<link href=\"" . $this->get_root_vendor() .
    "3appy_intern.css\" " .
    "rel=\"stylesheet\"/>" .
    
    "<link href=\"" . $this->get_root_vendor() .
    "font-awesome/css/font-awesome.min.css\" " .
    "rel=\"stylesheet\" type=\"text/css\" />";
}

}
?>
