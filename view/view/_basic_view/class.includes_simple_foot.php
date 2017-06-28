<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.includes.php');

// -------------------------------------------------------------

class includes_simple_foot
    extends includes
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_representation()
{
    return
    "<script src=\"https://ajax.googleapis.com/".
    "ajax/libs/jquery/1.12.4/jquery.min.js\"></script>" .
    
    "<script src=\"". $this->get_root_vendor() .
    "bootstrap/js/bootstrap.min.js\"></script>" .
    
    "<script src=\"". $this->get_root_vendor() .
    "3appy/test.js\"></script>";
}

}
?>
