<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001ADE-includes begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001ADE-includes end

/* user defined constants */
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001ADE-constants begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001ADE-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C26_pre_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["search"]))
     { $completed = FALSE; }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     $success = TRUE;
     
     $search_string = htmlspecialchars( $_POST["search"] );
     $_SESSION['search_string'] = $search_string;
     
     return $success;
    }
}?>