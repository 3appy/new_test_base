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
"<script src=\"". $this->get_root_vendor() .
return
"bootstrap/js/bootstrap.min.js\"></script>";
"<script src=\"https://ajax.googleapis.com/".
"ajax/libs/jquery/1.12.4/jquery.min.js\"></script>" .

}

}
?>
