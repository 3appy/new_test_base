<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.basic_list.php');

// -------------------------------------------------------------

class generated_member_message_list
     extends basic_list
{

// --- ATTRIBUTES ---

// @access: private
// @var: Integer
private $stmp = null;



// --- FUNCTIONS ---


// start of the list_load function

public function list_load( $where_statement )
{
   $prepare_statement =
   "SELECT
   id,
   author_id,
   written_stamp,
   reader_id,
   read_stamp,
   text,
   media_id
   FROM member_message " .
   $where_statement;
   return $this->basic_load( $prepare_statement );
}


// start of the basic_count function

public function basic_count( $prepare_statement )
{
   require "data_connect.php";
   $object_number = 0;
   if( $this->stmt = $mysqli->prepare( $prepare_statement ))
   {
   $this->set_binding();
   $this->stmt->execute();
   $this->stmt->store_result();
   $object_number = $this->stmt->num_rows;
   $this->stmt->close();
   }
   $mysqli->close();
   return $object_number;
}


// start of the basic_load function

public function basic_load( $prepare_statement )
{
   if( defined('__GEN_ROOT__') == FALSE )
   { define('__GEN_ROOT__', dirname(dirname(__FILE__))); }
   require_once(__GEN_ROOT__.'/class.member_message.php');
   
   require "data_connect.php";
   
   $object_number = 0;
   $max_row = $this->get_row_per_page();
   $page = $this->get_page();
   $start_row = $page*$max_row;
   if( $this->stmt = $mysqli->prepare( $prepare_statement ))
   {
   $this->set_binding();
   $this->stmt->execute();
   $this->stmt->bind_result
   (
   $id,
   $author_id,
   $written_stamp,
   $reader_id,
   $read_stamp,
   $text,
   $media_id
   );
   $this->stmt->store_result();
   $this->stmt->data_seek( (int)( $start_row ) );
   while( $this->stmt->fetch() 
   AND ( $object_number < $max_row ) )
   {
   $new_object = new member_message();
   $new_object->set_id( $id );
   $new_object->set_author_id( $author_id );
   $new_object->set_written_stamp( $written_stamp );
   $new_object->set_reader_id( $reader_id );
   $new_object->set_read_stamp( $read_stamp );
   $new_object->set_text( $text );
   $new_object->set_media_id( $media_id );
   $this->add_item( $new_object );
   $object_number++;
   }
   $this->stmt->close();
   }
   $mysqli->close();
   return $object_number;
}


// start of the get_prepare_list function

public function get_prepare_list()
{
   return
   "
   member_message.id,
   member_message.author_id,
   member_message.written_stamp,
   member_message.reader_id,
   member_message.read_stamp,
   member_message.text,
   member_message.media_id
   ";
}


// start of the set_binding function

public function set_binding()
{
   ;
}


// start of the getJSON function

public function getJSON()
{
   $JSON= "";
   for( $n=0; $n < $this->get_item_count(); $n++ )
   {
   $item = $this->get_item( $n );
   if( $n < ( $this->get_item_count() - (int)1 ))
   {
   $JSON .= "\"" .  "member_message_" . $n .  "\":" . "<br>" . $item->getJSON() . "," . "<br>"; 
   }
   else
   {
   $JSON .= "\"" .  "member_message_" . $n .  "\":" . "<br>" . $item->getJSON();
   }
   }
   return
   "{" . "<br>" . $JSON  . "}";
}

}
?>
