<?php

/**
 * This php file is automatically generated by Skolenet
 * Model - Class: team_article
 */

if (0 > version_compare(PHP_VERSION, '5'))
{ die('This file was generated for PHP 5'); }


require_once('class.general_group.php');


class generated_team_article
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
     * Short description of attribute deleted
     *
     * @access private
     * @var Boolean
     */
    private $deleted = null;

    /**
     * Short description of attribute owner_id
     *
     * @access private
     * @var Integer
     */
    private $owner_id = null;

    /**
     * Short description of attribute author_id
     *
     * @access private
     * @var Integer
     */
    private $author_id = null;

    /**
     * Short description of attribute written_stamp
     *
     * @access private
     * @var time_stamp
     */
    private $written_stamp = null;

    /**
     * Short description of attribute modified_stamp
     *
     * @access public
     * @var String
     */
    public $modified_stamp = null;

    /**
     * Short description of attribute header
     *
     * @access private
     * @var String
     */
    private $header = null;

    /**
     * Short description of attribute text
     *
     * @access private
     * @var String
     */
    private $text = null;

    /**
     * Short description of attribute image_id
     *
     * @access private
     * @var Integer
     */
    private $image_id = null;

    /**
     * Short description of attribute ref_link
     *
     * @access private
     * @var String
     */
    private $ref_link = null;

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
     * Short description of attribute deleted
     *
     * @access private
     * @var Boolean
     */
    public function set_deleted($deleted)
    {
      $this->deleted = $deleted;
    }

    /**
     * Short description of attribute deleted
     *
     * @access private
     * @var Boolean
     */
    public function get_deleted()
    {
      return $this->deleted;
    }

    /**
     * Short description of attribute owner_id
     *
     * @access private
     * @var Integer
     */
    public function set_owner_id($owner_id)
    {
      $this->owner_id = $owner_id;
    }

    /**
     * Short description of attribute owner_id
     *
     * @access private
     * @var Integer
     */
    public function get_owner_id()
    {
      return $this->owner_id;
    }

    /**
     * Short description of attribute author_id
     *
     * @access private
     * @var Integer
     */
    public function set_author_id($author_id)
    {
      $this->author_id = $author_id;
    }

    /**
     * Short description of attribute author_id
     *
     * @access private
     * @var Integer
     */
    public function get_author_id()
    {
      return $this->author_id;
    }

    /**
     * Short description of attribute written_stamp
     *
     * @access private
     * @var time_stamp
     */
    public function set_written_stamp($written_stamp)
    {
      $this->written_stamp = $written_stamp;
    }

    /**
     * Short description of attribute written_stamp
     *
     * @access private
     * @var time_stamp
     */
    public function get_written_stamp()
    {
      return $this->written_stamp;
    }

    /**
     * Short description of attribute modified_stamp
     *
     * @access public
     * @var String
     */
    public function set_modified_stamp($modified_stamp)
    {
      $this->modified_stamp = $modified_stamp;
    }

    /**
     * Short description of attribute modified_stamp
     *
     * @access public
     * @var String
     */
    public function get_modified_stamp()
    {
      return $this->modified_stamp;
    }

    /**
     * Short description of attribute header
     *
     * @access private
     * @var String
     */
    public function set_header($header)
    {
      $this->header = $header;
    }

    /**
     * Short description of attribute header
     *
     * @access private
     * @var String
     */
    public function get_header()
    {
      return $this->header;
    }

    /**
     * Short description of attribute text
     *
     * @access private
     * @var String
     */
    public function set_text($text)
    {
      $this->text = $text;
    }

    /**
     * Short description of attribute text
     *
     * @access private
     * @var String
     */
    public function get_text()
    {
      return $this->text;
    }

    /**
     * Short description of attribute image_id
     *
     * @access private
     * @var Integer
     */
    public function set_image_id($image_id)
    {
      $this->image_id = $image_id;
    }

    /**
     * Short description of attribute image_id
     *
     * @access private
     * @var Integer
     */
    public function get_image_id()
    {
      return $this->image_id;
    }

    /**
     * Short description of attribute ref_link
     *
     * @access private
     * @var String
     */
    public function set_ref_link($ref_link)
    {
      $this->ref_link = $ref_link;
    }

    /**
     * Short description of attribute ref_link
     *
     * @access private
     * @var String
     */
    public function get_ref_link()
    {
      return $this->ref_link;
    }

    /**
     *
     * This is the insert function of the class team_article
     * @author Bernd Schr�der
     *
     */
    public function insert()
    {
      require "data_connect.php";
      $insert_id = 0;
      $id = $this->get_id();
      $deleted = $this->get_deleted();
      $owner_id = $this->get_owner_id();
      $author_id = $this->get_author_id();
      $modified_stamp = $this->get_modified_stamp();
      $header = $this->get_header();
      $text = $this->get_text();
      $image_id = $this->get_image_id();
      $ref_link = $this->get_ref_link();
      if( $stmt = $mysqli->prepare(
      "INSERT INTO team_article
      (
      id,
      deleted,
      owner_id,
      author_id,
      modified_stamp,
      header,
      text,
      image_id,
      ref_link
      )
      VALUES (?,?,?,?,?,?,?,?,?)"))
      {
      $stmt->bind_param
      (
      "iiiisssis",
      $id,
      $deleted,
      $owner_id,
      $author_id,
      $modified_stamp,
      $header,
      $text,
      $image_id,
      $ref_link
      );
      $stmt->execute();
      $stmt->close();
      $insert_id = $mysqli->insert_id;
      }
      else
      {
      $this->db_error->insert_error();
      }
      $mysqli->close();
      $this->db_error->serialize();
      return $insert_id;
    }

    /**
     *
     * This is the load function of the class team_article
     * @author Bernd Schr�der
     *
     */
    public function load()
    {
      require "data_connect.php";
      $id = $this->get_id();
      if( $stmt = $mysqli->prepare(
      "SELECT
      id,
      deleted,
      owner_id,
      author_id,
      written_stamp,
      modified_stamp,
      header,
      text,
      image_id,
      ref_link
      FROM team_article WHERE id=?"))
      {
      $stmt->bind_param('i', $id );
      $stmt->execute();
      $stmt->bind_result
      (
      $id,
      $deleted,
      $owner_id,
      $author_id,
      $written_stamp,
      $modified_stamp,
      $header,
      $text,
      $image_id,
      $ref_link
      );
      if( $stmt->fetch() == TRUE )
      {
      $this->set_id( $id );
      $this->set_deleted( $deleted );
      $this->set_owner_id( $owner_id );
      $this->set_author_id( $author_id );
      $this->set_written_stamp( $written_stamp );
      $this->set_modified_stamp( $modified_stamp );
      $this->set_header( $header );
      $this->set_text( $text );
      $this->set_image_id( $image_id );
      $this->set_ref_link( $ref_link );
      $stmt->close();
      }
      else
      {
      $this->db_warning->not_found();
      }
      $mysqli->close();
      }
      else
      {
      $this->db_error->load_error();
      }
      $this->db_error->serialize();
      $this->db_warning->serialize();
    }

    /**
     *
     * This is the update function of the class team_article
     * @author Bernd Schr�der
     *
     */
    public function update()
    {
      require "data_connect.php";
      $id = $this->get_id();
      $deleted = $this->get_deleted();
      $owner_id = $this->get_owner_id();
      $author_id = $this->get_author_id();
      $modified_stamp = $this->get_modified_stamp();
      $header = $this->get_header();
      $text = $this->get_text();
      $image_id = $this->get_image_id();
      $ref_link = $this->get_ref_link();
      $id = $this->get_id();
      if( $stmt = $mysqli->prepare(
      "UPDATE team_article SET
      id=?,
      deleted=?,
      owner_id=?,
      author_id=?,
      modified_stamp=?,
      header=?,
      text=?,
      image_id=?,
      ref_link=?
      WHERE id=?"))
      {
      $stmt->bind_param
      (
      "iiiisssisi",
      $id,
      $deleted,
      $owner_id,
      $author_id,
      $modified_stamp,
      $header,
      $text,
      $image_id,
      $ref_link,
      $id
      );
      $stmt->execute();
      $stmt->close();
      }
      else
      {
      $this->db_error->update_error();
      }
      $mysqli->close();
      $this->db_error->serialize();
    }

    /**
     *
     * This is the delete function of the class team_article
     * @author Bernd Schr�der
     *
     */
    public function delete()
    {
      require "data_connect.php";
      $id = $this->get_id();
      if( $stmt = $mysqli->prepare(
      "DELETE FROM team_article
      WHERE id=?"))
      {
      $stmt->bind_param("i",  $id);
      $stmt->execute();
      $stmt->close();
      }
      else
      {
      $this->db_error->delete_error();
      }
      $mysqli->close();
      $this->db_error->serialize();
    }

} /* end of class team_article */
?>