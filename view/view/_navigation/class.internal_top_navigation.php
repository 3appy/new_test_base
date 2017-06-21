<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.top_task_list.php');
require_once('class.navigation_list.php');
require_once('class.top_user_list.php');
require_once('class.top_alert_list.php');
require_once('class.top_file_list.php');
require_once('class.top_message_list.php');

// -------------------------------------------------------------

class internal_top_navigation
    extends navigation_list
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function build_navigation()
{
    $nav_list = new top_message_list();
    $nav_list->build_navigation();
    $this->add_item( $nav_list );
    
    $nav_list = new top_task_list();
    $nav_list->build_navigation();
    $this->add_item( $nav_list );
    
    $nav_list = new top_alert_list();
    $nav_list->build_navigation();
    $this->add_item( $nav_list );
    
    $nav_list = new top_file_list();
    $nav_list->build_navigation();
    $this->add_item( $nav_list );
    
    $nav_list = new top_user_list();
    $nav_list->build_navigation();
    $this->add_item( $nav_list );
}

// -------------------------------------------------------------
public function get_representation()
{
    $nav = "";
    for( $i = 0; $i < $this->get_item_count(); $i++ )
    { $nav .= $this->get_item( $i )->get_representation(); }
    
    return
    "<ul class=\"nav navbar-top-links navbar-right\">" .
    
    $nav .
    
    "</ul>";
}

}
?>
