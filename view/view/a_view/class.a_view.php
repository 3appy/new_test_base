<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('../../view/_basic_view/class.boot_view.php');
require_once('../../view/_basic_view/class.boot_view.php');

// -------------------------------------------------------------

class a_view
    extends boot_view
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct()
{
    parent::__construct( null );
    $this->set_watch_relation( (int)0 );
}

// -------------------------------------------------------------
public function get_nav()
{
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__. 
    'view/_navigation/class.external_navigation.php' );
    
    $navigation = new external_navigation();
    $navigation->build_navigation();
    return $navigation->get_representation();
}

// -------------------------------------------------------------
public function get_footer()
{
    return "";
        
    return
    "<footer id=\"footer\">" .
    "<div class=\"container\">" .
    "<div class=\"row\">" .
    "<div class=\"col-xs-6 col-sm-6 col-md-3 column\">" .
    "<h4>Information</h4>" .
    "<ul class=\"nav\">" .
    "<li><a href=\"about-us.html\">Products</a></li>" .
    "<li><a href=\"about-us.html\">Services</a></li>" .
    "<li><a href=\"about-us.html\">Benefits</a></li>" .
    "<li><a href=\"elements.html\">Developers</a></li>" .
    "</ul>" .
    "</div>" .
    "<div class=\"col-xs-6 col-md-3 column\">" .
    "<h4>Follow Us</h4>" .
    "<ul class=\"nav\">" .
    "<li><a href=\"#\">Twitter</a></li>" .
    "<li><a href=\"#\">Facebook</a></li>" .
    "<li><a href=\"#\">Google+</a></li>" .
    "<li><a href=\"#\">Pinterest</a></li>" .
    "</ul>" .
    "</div>" .
    "<div class=\"col-xs-6 col-md-3 column\">" .
    "<h4>Contact Us</h4>" .
    "<ul class=\"nav\">" .
    "<li><a href=\"#\">Email</a></li>" .
    "<li><a href=\"#\">Headquarters</a></li>" .
    "<li><a href=\"#\">Management</a></li>" .
    "<li><a href=\"#\">Support</a></li>" .
    "</ul>" .
    "</div>" .
    "<div class=\"col-xs-6 col-md-3 column\">" .
    "<h4>Customer Service</h4>" .
    "<ul class=\"nav\">" .
    "<li><a href=\"#\">About Us</a></li>" .
    "<li><a href=\"#\">Delivery Information</a></li>" .
    "<li><a href=\"#\">Privacy Policy</a></li>" .
    "<li><a href=\"#\">Terms &amp; Conditions</a></li>" .
    "</ul>" .
    "</div>" .
    "</div>" .
    //<!--/row-->
    "<p class=\"text-right\">©2017</p>" .
    "</div>" .
    "</footer>";
}

}
?>
