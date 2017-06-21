<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.basic_view.php');

// -------------------------------------------------------------

class boot_view
    extends basic_view
{

// -------------------------------------------------------------


// -------------------------------------------------------------

// -------------------------------------------------------------
public function get_control_error_info($control_error)
{
    echo "huhu";
    //require('language/'. $language . '/general/control_error.php');
    //$result  .= "<p class=\"box error\"><img src=\"".
    //$_SESSION['icons'] . "error.png\"/>" .
    //"<b>" . $control_lang['control_error_'. 0] . ":</b>" . "<br />" .
    //$control_lang['control_error_'. $control_error] . "</p>";
}

// -------------------------------------------------------------
public function get_control_warning_info($warning_info)
{
    echo "huhu";
    //require('language/'. $language . '/general/control_warning.php');
    //$result  .= "<p class=\"box warning\"><img src=\"".
    //$_SESSION['icons'] . "warning.png\"/>" .
    //"<b>" . $control_lang['control_warning_'. 0] . ":</b>" . "<br />" .
    //$control_lang['control_warning_'. $control_warning] . "</p>";
}

// -------------------------------------------------------------
public function get_control_info_info($control_info)
{
    echo "huhu";
    //require('language/'. $language . '/general/control_info.php');
    //$result  .= "<p class=\"box info\"><img src=\"".
    //$_SESSION['icons'] . "info.png\"/>" .
    //"<b>" . $control_lang['control_info_'. 0] . ":</b>" . "<br />" .
    //$control_lang['control_info_'. $control_info] . "</p>";
}

// -------------------------------------------------------------
public function get_database_error_info($database_error)
{
    echo "huhu";
    //require('language/'. $language . '/general/database_error.php');
    //$result  .= "<p class=\"box error\"><img src=\"".
    //$_SESSION['icons'] . "error.png\"/>" .
    //"<b>" . $database_lang['database_error_'. 0] . ":</b>" . "<br />" .
    //$database_lang['database_error_'. $database_error] . "</p>";
}

// -------------------------------------------------------------
public function get_database_warning_info($database_warning)
{
    echo "huhu";
    //require('language/' . $language . '/general/database_warning.php');
    //$result  .= "<p class=\"box warning\"><img src=\"".
    //$_SESSION['icons'] . "warning.png\"/>" .
    //"<b>" . $database_lang['database_warning_'. 0] . ":</b>" . "<br />" .
    //$database_lang['database_warning_'. $database_warning] . "</p>";
}

// -------------------------------------------------------------
public function get_representation()
{
    return
    $this->get_html_head() .
    "<div class=\"container\">" .
    //"<div id=\"wrapper\">" .
    //$this->get_nav() .
    $this->get_main() .
    //$this->get_footer() .
    //"</div><!-- /#wrapper -->" .
    "</div> <!-- /container -->" .
    $this->get_html_foot();
}

// -------------------------------------------------------------
public function get_html_head()
{
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__. 'view/_basic_view/class.html_head.php' );
         
    $head = new html_head();
    return $head->get_representation( $this->get_head_includes() );
}

// -------------------------------------------------------------
public function get_head_includes()
{
    $includes = $this->get_includes();
    
    switch($includes)
    {
    case ( 0 ):
    // simple external includes
    {
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__.
    'view/_basic_view/class.includes_ext_head.php' );
    
    $head = new includes_ext_head();
    return $head->get_representation();
    }
    break;
    
    case ( 1 ):
    // simple internal includes
    {
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__.
    'view/_basic_view/class.includes_simple_head.php' );
    
    $head = new includes_simple_head();
    return $head->get_representation();
    }
    break;
    
    default:
    // simple boot includes
    {
    ;
    }
    break;
    }
}

// -------------------------------------------------------------
public function get_main()
{
    return "";
}

// -------------------------------------------------------------
public function get_footer()
{
    return "";
    "<footer>" .
    "<div class=\container\">" .
    "<hr>";
    "<p><small>" .
    "<a href=\"http://facebook.com\">Like me</a>" .
    "on facebook</small></p>";
    "</div>" .
    "</footer>";
}

// -------------------------------------------------------------
public function get_html_foot()
{
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__. 'view/_basic_view/class.html_foot.php' );
         
    $foot = new html_foot();
    return $foot->get_representation( $this->get_foot_includes() );
}

// -------------------------------------------------------------
public function get_foot_includes()
{
    if( defined('__ROOT_VIEW__') == FALSE )
    { define('__ROOT_VIEW__', $this->get_root_view() ); }
    require_once(__ROOT_VIEW__.
    'view/_basic_view/class.includes_simple_foot.php' );
    
    $foot = new includes_simple_foot();
    return $foot->get_representation();
}

}
?>
