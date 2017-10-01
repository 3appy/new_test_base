<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.general_group.php');

// -------------------------------------------------------------

class generated_member_message
    extends general_group
{

// --- ATTRIBUTES ---

// @access: private
// @var: Integer
private $id = null;


// @access: private
// @var: Integer
private $author_id = null;


// @access: private
// @var: time_stamp
private $written_stamp = null;


// @access: private
// @var: Integer
private $reader_id = null;


// @access: private
// @var: String
private $read_stamp = null;


// @access: private
// @var: String
private $text = null;


// @access: private
// @var: Integer
private $media_id = null;



// --- FUNCTIONS ---


// start of the set and get functions

// set function for id expect variable of datatype: Integer
public function set_id( $id )
{
   $this->id = $id;
}

// get function for id return values is of datatype: Integer
public function get_id()
{
   if( $this->id == null )
   { return "null"; }
   else
   { return $this->id; }
}


public function get_id_type()
{
   return "i";
}


// set function for author_id expect variable of datatype: Integer
public function set_author_id( $author_id )
{
   $this->author_id = $author_id;
}

// get function for author_id return values is of datatype: Integer
public function get_author_id()
{
   if( $this->author_id == null )
   { return "null"; }
   else
   { return $this->author_id; }
}


public function get_author_id_type()
{
   return "i";
}


// set function for written_stamp expect variable of datatype: time_stamp
public function set_written_stamp( $written_stamp )
{
   $this->written_stamp = $written_stamp;
}

// get function for written_stamp return values is of datatype: time_stamp
public function get_written_stamp()
{
   return $this->written_stamp;
}


public function get_written_stamp_type()
{
   return "s";
}


// set function for reader_id expect variable of datatype: Integer
public function set_reader_id( $reader_id )
{
   $this->reader_id = $reader_id;
}

// get function for reader_id return values is of datatype: Integer
public function get_reader_id()
{
   if( $this->reader_id == null )
   { return "null"; }
   else
   { return $this->reader_id; }
}


public function get_reader_id_type()
{
   return "i";
}


// set function for read_stamp expect variable of datatype: String
public function set_read_stamp( $read_stamp )
{
   $this->read_stamp = $read_stamp;
}

// get function for read_stamp return values is of datatype: String
public function get_read_stamp()
{
   return $this->read_stamp;
}


public function get_read_stamp_type()
{
   return "s";
}


// set function for text expect variable of datatype: String
public function set_text( $text )
{
   $this->text = $text;
}

// get function for text return values is of datatype: String
public function get_text()
{
   return $this->text;
}


public function get_text_type()
{
   return "s";
}


// set function for media_id expect variable of datatype: Integer
public function set_media_id( $media_id )
{
   $this->media_id = $media_id;
}

// get function for media_id return values is of datatype: Integer
public function get_media_id()
{
   if( $this->media_id == null )
   { return "null"; }
   else
   { return $this->media_id; }
}


public function get_media_id_type()
{
   return "i";
}


// -------------------------------------------------------------

// define the insert function of the model
public function insert()
{
   require "data_connect.php";
   $insert_id = 0;
   $id = $this->get_id();
   $author_id = $this->get_author_id();
   $reader_id = $this->get_reader_id();
   $read_stamp = $this->get_read_stamp();
   $text = $this->get_text();
   $media_id = $this->get_media_id();
   if( $stmt = $mysqli->prepare(
   "INSERT INTO member_message
   (
   id,
   author_id,
   reader_id,
   read_stamp,
   text,
   media_id
   )
   VALUES (?,?,?,?,?,?)"))
   {
   $stmt->bind_param
   (
   "iiissi",
   $id,
   $author_id,
   $reader_id,
   $read_stamp,
   $text,
   $media_id
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

// -------------------------------------------------------------

// define the load function of the model
public function load()
{
   require "data_connect.php";
   $id = $this->get_id();
   if( $stmt = $mysqli->prepare(
   "SELECT
   id,
   author_id,
   written_stamp,
   reader_id,
   read_stamp,
   text,
   media_id
   FROM member_message WHERE id=?"))
   {
   $stmt->bind_param('i', $id );
   $stmt->execute();
   $stmt->bind_result
   (
   $id,
   $author_id,
   $written_stamp,
   $reader_id,
   $read_stamp,
   $text,
   $media_id
   );
   if( $stmt->fetch() == TRUE )
   {
   $this->set_id( $id );
   $this->set_author_id( $author_id );
   $this->set_written_stamp( $written_stamp );
   $this->set_reader_id( $reader_id );
   $this->set_read_stamp( $read_stamp );
   $this->set_text( $text );
   $this->set_media_id( $media_id );
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

// -------------------------------------------------------------

// define the update function of the model
public function update()
{
   require "data_connect.php";
   $id =  $this->get_id();
   $author_id =  $this->get_author_id();
   $reader_id =  $this->get_reader_id();
   $read_stamp =  $this->get_read_stamp();
   $text =  $this->get_text();
   $media_id =  $this->get_media_id();
   if( $stmt = $mysqli->prepare(
   "UPDATE member_message SET
   id=?,
   author_id=?,
   reader_id=?,
   read_stamp=?,
   text=?,
   media_id=?
   WHERE id=?"))
   {
   $stmt->bind_param
   (
   "iiissi",
   $id,
   $author_id,
   $reader_id,
   $read_stamp,
   $text,
   $media_id
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

// -------------------------------------------------------------

// define the delete function of the model
public function delete()
{
   require "data_connect.php";
   $id = $this->get_id();
   if( $stmt = $mysqli->prepare(
   "DELETE FROM member_message
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

// -------------------------------------------------------------

// define the getJSON function of the model
public function getJSON()
{
   return
   "{" . "<br>" . 
   "\"id\":" . $this->get_id() . "," . "<br>" . 
   "\"author_id\":" . $this->get_author_id() . "," . "<br>" . 
   "\"written_stamp\":\"" . $this->get_written_stamp() . "\"" . "," . "<br>" . 
   "\"reader_id\":" . $this->get_reader_id() . "," . "<br>" . 
   "\"read_stamp\":\"" . $this->get_read_stamp() . "\"" . "," . "<br>" . 
   "\"text\":\"" . $this->get_text() . "\"" . "," . "<br>" . 
   "\"media_id\":" .  $this->get_media_id() . "<br>" . 
   "}"; 
}

}
?>
