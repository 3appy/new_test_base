<?php

/**
 * This php file is automatically generated by Skolenet
 * Model - Class: country
 */

if (0 > version_compare(PHP_VERSION, '5'))
{ die('This file was generated for PHP 5'); }


require_once('class.general_group.php');


class generated_country
     extends general_group
{
    // --- ATTRIBUTES ---

    /**
     * Short description of attribute id
     *
     * @access private
     * @var Integer
     */
    private $id = null;

    /**
     * The string representation of the name of the country
     *
     * @access private
     * @var String
     */
    private $name_en = null;

    /**
     * Short description of attribute name_dk
     *
     * @access public
     * @var String
     */
    public $name_dk = null;

    /**
     * Short description of attribute name_ge
     *
     * @access public
     * @var String
     */
    public $name_ge = null;

     // --- OPERATIONS ---

    /**
     * Short description of attribute id
     *
     * @access private
     * @var Integer
     */
    public function set_id($id)
    {
      $this->id = $id;
    }

    /**
     * Short description of attribute id
     *
     * @access private
     * @var Integer
     */
    public function get_id()
    {
      return $this->id;
    }

    /**
     * The string representation of the name of the country
     *
     * @access private
     * @var String
     */
    public function set_name_en($name_en)
    {
      $this->name_en = $name_en;
    }

    /**
     * The string representation of the name of the country
     *
     * @access private
     * @var String
     */
    public function get_name_en()
    {
      return $this->name_en;
    }

    /**
     * Short description of attribute name_dk
     *
     * @access public
     * @var String
     */
    public function set_name_dk($name_dk)
    {
      $this->name_dk = $name_dk;
    }

    /**
     * Short description of attribute name_dk
     *
     * @access public
     * @var String
     */
    public function get_name_dk()
    {
      return $this->name_dk;
    }

    /**
     * Short description of attribute name_ge
     *
     * @access public
     * @var String
     */
    public function set_name_ge($name_ge)
    {
      $this->name_ge = $name_ge;
    }

    /**
     * Short description of attribute name_ge
     *
     * @access public
     * @var String
     */
    public function get_name_ge()
    {
      return $this->name_ge;
    }

    /**
     *
     * This is the insert function of the class country
     * @author Bernd Schr�der
     *
     */
    public function insert()
    {
      require "data_connect.php";
      $insert_id = 0;
      $id = $this->get_id();
      $name_en = $this->get_name_en();
      $name_dk = $this->get_name_dk();
      $name_ge = $this->get_name_ge();
      if( $stmp = $mysql->prepare(
      "INSERT INTO country
      (
      id,
      name_en,
      name_dk,
      name_ge
      )
      VALUES (?,?,?,?)"))
      {
      $stmt->bind_param
      (
      "isss",
      $id,
      $name_en,
      $name_dk,
      $name_ge
      );
      $stmt->execute();
      $stmt->close();
      $insert_id = $mysqli->insert_id;
      }
      else
      {
      $this->database_error->insert_error();
      }
      $mysqli->close();
      $this->database_error->serialize();
      return $insert_id;
    }

    /**
     *
     * This is the load function of the class country
     * @author Bernd Schr�der
     *
     */
    public function load()
    {
      require "data_connect.php";
      $id = $this->get_id();
      if( $stmp = $mysql->prepare(
      "SELECT
      id,
      name_en,
      name_dk,
      name_ge
      FROM country WHERE id=?"))
      {
      $stmt->bind_param('i', $id );
      $stmt->execute();
      $stmt->bind_result
      (
      $id,
      $name_en,
      $name_dk,
      $name_ge
      );
      if( $stmt->fetch() == TRUE )
      {
      $this->set_id( $id );
      $this->set_name_en( $name_en );
      $this->set_name_dk( $name_dk );
      $this->set_name_ge( $name_ge );
      $stmt->close();
      }
      else
      {
      $this->database_warning->not_found();
      }
      $mysqli->close();
      }
      else
      {
      $this->database_error->load_error();
      }
      $this->database_error->serialize();
      $this->database_warning->serialize();
    }

    /**
     *
     * This is the update function of the class country
     * @author Bernd Schr�der
     *
     */
    public function update()
    {
      require "data_connect.php";
      $id = $this->get_id();
      $name_en = $this->get_name_en();
      $name_dk = $this->get_name_dk();
      $name_ge = $this->get_name_ge();
      $id = $this->get_id();
      if( $stmp = $mysql->prepare(
      "UPDATE country SET
      id=?,
      name_en=?,
      name_dk=?,
      name_ge=?
      WHERE id=?"))
      {
      $stmt->bind_param
      (
      "isssii",
      $id,
      $name_en,
      $name_dk,
      $name_ge,
      $id
      );
      $stmt->execute();
      $stmt->close();
      }
      else
      {
      $this->database_error->update_error();
      }
      $mysqli->close();
      $this->database_error->serialize();
    }

    /**
     *
     * This is the delete function of the class country
     * @author Bernd Schr�der
     *
     */
    public function delete()
    {
      require "data_connect.php";
      $id = $this->get_id();
      if( $stmp = $mysql->prepare(
      "DELETE FROM country
      WHERE id=?"))
      {
      $stmt->bind_param("i",  $id);
      $stmt->execute();
      $stmt->close();
      }
      else
      {
      $this->database_error->delete_error();
      }
      $stmt->close();
      $this->database_error->serialize();
    }

} /* end of class country */
?>