<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('../../view/_basic_view/class.boot_view.php');
require_once('class.a_view.php');

// -------------------------------------------------------------

class a0_view
    extends a_view
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    parent::__construct();
    $this->load_language("a0");
}

// -------------------------------------------------------------
public function get_main()
{
    return
    parent::get_main() .
    "<div class=\"row\">" .
    $this->get_not_name_yet() .
    "</div>";
        
    //$this->get_not_name_yet() .
    //$this->get_highlight_section();
}

// -------------------------------------------------------------
public function get_highlight_section()
{
    return
    "<section class=\"container-fluid\" id=\"section6\">" .
    "<div class=\"row\">" .
    "<div class=\"col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4\">" .
    "<h2 class=\"text-center lato\">" .
    "Section with Marketing Highlights.</h2>" .
        
    "<hr>" .
        
    "<div class=\"media\">" .
    "<h3>Boom</h3>" .
    "<div class=\"media-left\">" .
    "<img src=\"//placehold.it/100\">" .
    "</div>" .
    "<div class=\"media-body media-middle\">" .
    "<p>Some brand-tacular designs even.</p>" .
    "</div>" .
    "</div>" .
        
    "<hr>" .
        
    "<div class=\"media\">" .
    "<h3>Boom</h3>" .
    "<div class=\"media-body media-middle\">" .
    "<p>Offset right home page content.</p>" .
    "</div>" .
    "<div class=\"media-right\">" .
    "<img src=\"//placehold.it/100\">" .
    "</div>" .
    "</div>" .
       
    "<hr>" .
      
    "<div class=\"media\">" .
    "<h3>Boom</h3>" .
    "<div class=\"media-left\">" .
    "<img src=\"//placehold.it/100\">" .
    "</div>" .
    "<div class=\"media-body media-middle\">" .
    "<p>Some brand-tacular designs even.</p>" .
    "</div>" .
    "</div>" .
        
    "<hr>" .
        
    "<div class=\"media\">" .
    "<h3>Boom</h3>" .
    "<div class=\"media-body media-middle\">" .
    "<p>Offset right home page content.</p>" .
    "</div>" .
    "<div class=\"media-right\">" .
    "<img src=\"//placehold.it/100\">" .
    "</div>" .
    "</div>" .
        
    "</div>" .
    "</div>" .
    "</section>";
}

// -------------------------------------------------------------
public function get_not_name_yet()
{
    if( defined('__VIEW_ELEMENTS__') == FALSE )
    { define('__VIEW_ELEMENTS__', $this->get_root_view_elements() ); }
    require_once(__VIEW_ELEMENTS__ . 'class.no_name_yet.php' );
        
    $feed = new no_name_yet();
    $feed->set_link( "#" );
    $feed->set_panel_type( "panel-default" );
    $feed->set_fa_symbol( "fa-list-ul" );
    $feed->set_text( "feed" );
    $feed->set_amount( (int)1 );
        
    $mail = new no_name_yet();
    $mail->set_link( "#" );
    $mail->set_panel_type( "panel-primary" );
    $mail->set_fa_symbol( "fa-envelope-o" );
    $mail->set_text( "message" );
    $mail->set_amount( (int)1 );
        
    $tasks = new no_name_yet();
    $tasks->set_link( "#" );
    $tasks->set_panel_type( "panel-success" );
    $tasks->set_fa_symbol( "fa-tasks" );
    $tasks->set_text( "tasks" );
    $tasks->set_amount( (int)4 );
        
    $schedule = new no_name_yet();
    $schedule->set_link( "#" );
    $schedule->set_panel_type( "panel-info" );
    $schedule->set_fa_symbol( "fa-calendar" );
    $schedule->set_text( "schedule" );
    $schedule->set_amount( (int)4 );
      
    $chat = new no_name_yet();
    $chat->set_link( "#" );
    $chat->set_panel_type( "panel-warning" );
    $chat->set_fa_symbol( "fa-weixin" );
    $chat->set_text( "chat" );
    $chat->set_amount( (int)16 );
      
    $files = new no_name_yet();
    $files->set_link( "#" );
    $files->set_panel_type( "panel-danger" );
    $files->set_fa_symbol( "fa-files-o" );
    $files->set_text( "files" );
    $files->set_amount( (int)23 );
     
    return
    "<div class=\"row\">" .
    "<div class=\"col-xs-6\">" .
    $feed->get_representation() .
    "</div>" .
    "<div class=\"col-xs-6\">" .
    $mail->get_representation() .
    "</div>" .
    "<div class=\"col-xs-6\">" .
    $tasks->get_representation() .
    "</div>" .
    "<div class=\"col-xs-6\">" .
    $schedule->get_representation() .
    "</div>" .
    "<div class=\"col-xs-6\">" .        
    $chat->get_representation() .
    "</div>" .       
    "<div class=\"col-xs-6\">" .        
    $files->get_representation() .
    "</div>" .
    "</div>";
}

// -------------------------------------------------------------
public function get_section_1()
{
    return
    "<section class=\"container-fluid\" id=\"section1\">" .
    "<div class=\"v-center\">" .
    "<h1 class=\"text-center\">3appy UG</h1>" .
    "<h2 class=\"text-center lato animate slideInDown\">" .
    "Das Schulintranet</h2>" .
    "</div>" .
    "<a href=\"#section2\">" .
    "<div class=\"scroll-down bounceInDown animated\">" .
    "<span>" .
    "<i class=\"fa fa-angle-down fa-2x\"></i>" .
    "</span>" .
    "</div>" .
    "</a>" .
    "</section>";
}

}
?>
