<?php

/**
 * This php file is automatically generated by Skolenet
 * Model - Class: private_information
 */

if (0 > version_compare(PHP_VERSION, '5'))
{ die('This file was generated for PHP 5'); }


require_once('generated/class.generated_private_information_list.php');


class private_information_list
     extends generated_private_information_list
{

    /**
     *
     * This is the load function of the class private_information
     * @author Bernd Schr�der
     *
     */
    public function load()
    {
      $where_statement = 
//      WHERE XXX=?;
      "";
      return $this->list_load( $where_statement );
    }

} /* end of class private_information */
?>