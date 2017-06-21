<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.navigation_list.php');

// -------------------------------------------------------------

class external_top_navigation
    extends navigation_list
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function build_navigation()
{
    require_once('class.external_top_navigation_item.php');
    
    $nav_item = new external_top_navigation_item();
    $nav_item->set_text( "Features" );
    $nav_item->set_link( "#section2" );
    $this->add_item( $nav_item );
    
    $nav_item = new external_top_navigation_item();
    $nav_item->set_text( "Team" );
    $nav_item->set_link( "#section3" );
    $this->add_item( $nav_item );
    
    $nav_item = new external_top_navigation_item();
    $nav_item->set_text( "Aktionen" );
    $nav_item->set_link( "#section4" );
    $this->add_item( $nav_item );
    
    $nav_item = new external_top_navigation_item();
    $nav_item->set_text( "Contact" );
    $nav_item->set_link( "#section5" );
    $this->add_item( $nav_item );
    
    $nav_item = new external_top_navigation_item();
    $nav_item->set_text( "More" );
    $nav_item->set_link( "#section6" );
    $this->add_item( $nav_item );
}

// -------------------------------------------------------------
public function get_representation()
{
    $nav = 
    "<nav class=\"navbar navbar-trans navbar-fixed-top\"" .
    "role=\"navigation\"><div class=\"container\">";
        
    $nav .= $this->get_nav_header();
    $nav .= $this->get_nav_collapse();
        
    $nav .= "</div></nav>";
        
    return $nav;
}

// -------------------------------------------------------------
public function get_nav_header()
{
    return
    "<div class=\"navbar-header\">" .
    "<button type=\"button\"" . 
    "class=\"navbar-toggle\"" .
    "data-toggle=\"collapse\"" . 
    "data-target=\"#navbar-collapsible\">" .
    "<span class=\"sr-only\">Toggle navigation</span>" .
    "<span class=\"icon-bar\"></span>" .
    "<span class=\"icon-bar\"></span>" .
    "<span class=\"icon-bar\"></span>" .
    "</button>" .
    "<a class=\"navbar-brand\" href=\"#section1\">Launch</a>" .
    "</div>";
}

// -------------------------------------------------------------
public function get_nav_collapse()
{
    $nav = 
    "<div class=\"navbar-collapse collapse\" id=\"navbar-collapsible\">" .
    "<ul class=\"nav navbar-nav navbar-left\">";
        
    for( $i = 0; $i < $this->get_item_count(); $i++ )
    { $nav .= $this->get_item( $i )->get_representation(); }
        
    $nav .= "</ul>";
    $nav .= $this->get_nav_modal();
    $nav .= "</ul>";
        
    return $nav;
}

// -------------------------------------------------------------
public function get_nav_modal()
{
    return
    "<ul class=\"nav navbar-nav navbar-right\">" .
    "<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">" .
    "Login</a></li>" .
    "</ul>";
}

}
?>
