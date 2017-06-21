<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------


// -------------------------------------------------------------

class basic_view
{

// -------------------------------------------------------------

// -------------------------------------------------------------
private $language_array = null;
// -------------------------------------------------------------
private $includes = null;
// -------------------------------------------------------------
private $database_error = null;
// -------------------------------------------------------------
private $database_warning = null;
// -------------------------------------------------------------
private $control_error = null;
// -------------------------------------------------------------
private $control_warning = null;
// -------------------------------------------------------------
private $control_info = null;
// -------------------------------------------------------------
private $watch_entity = null;
// -------------------------------------------------------------
private $watched_entity = null;
// -------------------------------------------------------------
private $watch_relation = null;

// -------------------------------------------------------------

// -------------------------------------------------------------
public function __construct($watched_entity)
{
    // initialize the basic view class.
    // if there is no memeber available the class will be
    // initialized with an empty member
    // 
    if( defined('__ROOT_DATA__') == FALSE )
    { define('__ROOT_DATA__', $this->get_root_data() ); }
    require_once(__ROOT_DATA__.'class.member.php');
    
    $this->watch_entity = new member();
    if ( $this->watch_entity->is_online() )
    {
    $this->watch_entity->set_id($_SESSION['watch_id']);
    $this->watch_entity->load();
    }
    else if(isSet($_COOKIE["lang"]))
    { $this->watch_entity->set_language($_COOKIE["lang"]); }
    else
    {
    $language = $this->watch_entity->get_remote_language();
    $this->watch_entity->set_language($language);
    }
    $this->watched_entity = $watched_entity;
    
    if (( $this->watched_entity != null ) AND
    (isset($_SESSION['watched_id'])))
    {
    $this->watched_entity->set_id($_SESSION['watched_id']);
    $this->watched_entity->load();
    }
    $this->includes = (int)0;
}

// -------------------------------------------------------------
public function get_includes()
{
    return $this->includes;
}

// -------------------------------------------------------------
public function set_includes($includes)
{
    $this->includes = $includes;
    // includes defines the bootstrap and java includes in header and footer
    // 0 - simple bootstrap packes
}

// -------------------------------------------------------------
public function load_language($language_prefix)
{
    $lang_path = $this->watch_entity->get_language() . '/' . 
    $language_prefix . '.php';
    
    if( defined('__ROOT_VIEW_LANG__') == FALSE )
    { define('__ROOT_VIEW_LANG__', $this->get_root_view_language() ); }
    require_once(__ROOT_VIEW_LANG__. $lang_path );
    
    $this->set_language_array( $lang );
}

// -------------------------------------------------------------
public function set_language_array($language_array)
{
    $this->language_array = $language_array;
}

// -------------------------------------------------------------
public function get_language_array()
{
    return $this->language_array;
}

// -------------------------------------------------------------
public function load_database_error()
{
    if( defined('__ROOT_DATA__') == FALSE )
    { define('__ROOT_DATA__', $this->get_root_data() ); }
    require_once(__ROOT_DATA__.'generated/class.db_error.php');
    
    $this->database_error = new db_error();
    $this->database_error->load();
}

// -------------------------------------------------------------
public function get_database_error()
{
    return $this->database_error;
}

// -------------------------------------------------------------
public function load_database_warning()
{
    if( defined('__ROOT_DATA__') == FALSE )
    { define('__ROOT_DATA__', $this->get_root_data() ); }
    require_once(__ROOT_DATA__.'generated/class.db_warning.php');
    
    $this->database_warning = new db_warning();
    $this->database_warning->load();
}

// -------------------------------------------------------------
public function get_database_warning()
{
    return $this->database_warning;
}

// -------------------------------------------------------------
public function load_control_error()
{
    if( defined('__ROOT_CONTROL__') == FALSE )
    { define('__ROOT_CONTROL__', $this->get_root_control() ); }
    require_once(__ROOT_CONTROL__.'basic/class.control_error.php');
    
    $this->control_error = new control_error();
    $this->control_error->load();
}

// -------------------------------------------------------------
public function get_control_error()
{
    return $this->control_error;
}

// -------------------------------------------------------------
public function load_control_warning()
{
    if( defined('__ROOT_CONTROL__') == FALSE )
    { define('__ROOT_CONTROL__', $this->get_root_control() ); }
    require_once(__ROOT_CONTROL__.'basic/class.control_warning.php');
    
    $this->control_warning = new control_warning();
    $this->control_warning->load();
}

// -------------------------------------------------------------
public function get_control_warning()
{
    return $this->control_warning;
}

// -------------------------------------------------------------
public function load_control_info()
{
    if( defined('__ROOT_CONTROL__') == FALSE )
    { define('__ROOT_CONTROL__', $this->get_root_control() ); }
    require_once(__ROOT_CONTROL__.'basic/class.control_info.php');
    
    $this->control_info = new control_info();
    $this->control_info->load();
}

// -------------------------------------------------------------
public function get_control_info()
{
    return $this->control_info;
}

// -------------------------------------------------------------
public function get_watch_entity()
{
    return $this->watch_entity;
}

// -------------------------------------------------------------
public function get_watched_entity()
{
    return $this->watched_entity;
}

// -------------------------------------------------------------
public function set_watch_relation($watch_relation)
{
    $this->watch_relation = $watch_relation;
}

// -------------------------------------------------------------
public function get_watch_relation()
{
    return $this->watch_relation;
}

// -------------------------------------------------------------
public function get_top_nav()
{
    ;
}

// -------------------------------------------------------------
public function get_left_nav()
{
    ;
}

// -------------------------------------------------------------
public function get_right_nav()
{
    ;
}

// -------------------------------------------------------------
public function get_session_information()
{
    $this->load_database_error();
    $database_error   = $this->database_error->get_error_code();
    
    $this->load_database_warning();
    $database_warning = $this->database_warning->get_error_code();
    
    $this->load_control_error();
    $control_error    = $this->control_error->get_error_code();
    
    $this->load_control_warning();
    $control_warning  = $this->control_warning->get_error_code();
    
    $this->load_control_info();
    $control_info     = $this->control_info->get_error_code();
    
    $result  = "";
    $language = $this->watch_entity->get_language();
    
    if ( $control_error > 0 )
    { return $this->get_control_error_info( $control_error ); }
    elseif ( $control_warning > 0 )
    { return $this->get_control_warning_info( $control_warning ); }
    elseif ( $control_info > 0 )
    { return $this->get_control_info_info( $control_info ); }
    
    if ( $database_error > 0 )
    { return $this->get_database_error_info( $database_error ); }
    elseif ( $database_warning > 0 )
    { return $this->get_database_warning_info( $database_warning ); }
}

// -------------------------------------------------------------
public function get_root()
{
    return dirname(dirname(dirname(dirname(__FILE__)))) . '/';
}

// -------------------------------------------------------------
public function get_root_data()
{
    return $this->get_root() . 'data/';
}

// -------------------------------------------------------------
public function get_root_control()
{
    return $this->get_root() . 'control/';
}

// -------------------------------------------------------------
public function get_root_view()
{
    return $this->get_root() . 'view/';
}

// -------------------------------------------------------------
public function get_root_view_language()
{
    return $this->get_root() . 'view/view/language/';
}

// -------------------------------------------------------------
public function get_root_view_elements()
{
    return $this->get_root() . 'view/view/_elements/';
}

}
?>
