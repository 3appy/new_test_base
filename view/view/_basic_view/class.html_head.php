<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------


// -------------------------------------------------------------

class html_head
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_representation($includes)
{
    return
    "<!DOCTYPE html>" .
    "<html lang=\"en\">" .
    "<head>" .
    "<meta charset=\"utf-8\">" .
    "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">" .
    "<meta name=\"viewport\" " .
    "content=\"width=device-width, initial-scale=1\">" .
    "<title>3appy</title>" .
    
    $includes .
    
    "<!--[if lt IE 9]>" .
    "<script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/" .
    "html5shiv.min.js\"></script>" .
    "<script src=\"https://oss.maxcdn.com/respond/1.4.2/" .
    "respond.min.js\"></script>" .
    "<![endif]-->" .
    
    "</head>" .
    "<body>";
}

}
?>
