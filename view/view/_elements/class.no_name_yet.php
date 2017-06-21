<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------


// -------------------------------------------------------------

class no_name_yet
{

// -------------------------------------------------------------

// -------------------------------------------------------------
private $link = null;
// -------------------------------------------------------------
private $panel_type = null;
// -------------------------------------------------------------
private $fa_symbol = null;
// -------------------------------------------------------------
private $amount = null;
// -------------------------------------------------------------
private $text = null;

// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    $this->link = "#";
    $this->panel_type = "panel-primary";
    $this->fa_symbol = "fa-tasks";
    $this->text = "test";
    $this->amount = (int)6;
}

// -------------------------------------------------------------
public function get_representation()
{
    return
    "<a href=\"" . $this->link . "\">" .
    "<div class=\"panel " . $this->panel_type . "\">" .        
    "<div class=\"panel-heading\">"        . 
    "<div class=\"row\">" .
    "<div class=\"col-xs-12\">" .
    "<i class=\"fa " . $this->fa_symbol . " fa-5x\"></i>" .
    "</div>" .
    "<div class=\"col-xs-12 text-left\">" .
    "<div class=\"huge\">" . $this->amount . "</div>" .
    "<div>" . $this->text . "</div>" .
    "</div>" .
    "</div>" .   
    "</div><!--/heading-->" .
    "</div><!--/panel-->" .
    "</a>";
}

// -------------------------------------------------------------
public function set_link($link)
{
    $this->link = $link;
}

// -------------------------------------------------------------
public function set_panel_type($panel_type)
{
    $this->panel_type = $panel_type;
}

// -------------------------------------------------------------
public function set_fa_symbol($fa_symbol)
{
    $this->fa_symbol = $fa_symbol;
}

// -------------------------------------------------------------
public function set_text($text)
{
    $this->text = $text;
}

// -------------------------------------------------------------
public function set_amount($amount)
{
    $this->amount = $amount;
}

}
?>
