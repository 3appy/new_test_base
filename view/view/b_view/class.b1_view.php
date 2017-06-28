<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('../../view/_basic_view/class.boot_view.php');
require_once('class.b_view.php');

// -------------------------------------------------------------

class b1_view
    extends b_view
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    parent::__construct();
    $this->load_language("b10");
}

// -------------------------------------------------------------
public function get_main()
{
    return
    parent::get_main() .
    $this->get_chat_section();
}

// -------------------------------------------------------------
public function get_chat_section()
{
    return
    "<div id=\"page-wrapper\">" .
    "<div class=\"container-fluid\">" .
    
    "<!-- Page Heading -->" .
    "<div class=\"row\">" .
    "<div class=\"col-lg-12\">" .
    "<h1 class=\"page-header\">" .
    "Communication page" .
    "</h1>" .
    
    $this->get_chat_form() .
    
    $this->get_chat_thread().
    
    "</div>" .
    "</div><!-- /.container-fluid -->" .
    "</div><!-- /#page-wrapper -->";
}

// -------------------------------------------------------------
public function get_chat_form()
{
    if( defined('__VIEW_ELEMENTS__') == FALSE )
    { define('__VIEW_ELEMENTS__', $this->get_root_view_controls() ); }
    require_once(__VIEW_ELEMENTS__ . 'class.text_area_element.php' );
    require_once(__VIEW_ELEMENTS__ . 'class.text_element.php' );
    require_once(__VIEW_ELEMENTS__ . 'class.button.php' );
    
    $chat_box = new text_area_element();
    $chat_box->set_id( "chat_box" );
    
    $chat_line = new text_element();
    $chat_line->set_id( "chat_line" );
    
    $chat_send = new button();
    $chat_send ->set_id( "chat_send" );
    $chat_send->set_class( "btn btn-success" );
    
    return 
    "<form action=\"send_data.php\" id=\"chat_form\">" .
    $chat_box->get_element() .
    $chat_line->get_element() .
    $chat_send->get_element() .
    "</form>";
}

// -------------------------------------------------------------
public function get_chat_thread()
{
    if( defined('__VIEW_ELEMENTS__') == FALSE )
    { define('__VIEW_ELEMENTS__', $this->get_root_view_controls() ); }
    require_once(__VIEW_ELEMENTS__ . 'class.empty_element.php' );
        
    $chat_thread = new empty_element();
    $chat_thread ->set_id( "chat_thread" );
    
    return 
    $chat_thread->get_element();
}

}
?>
