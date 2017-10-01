<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.basic_list.php');

// -------------------------------------------------------------

class generated_address_list
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
   country_id,
   zip_code,
   city_name,
   street_name,
   house_number
   FROM address " .
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
   require_once(__GEN_ROOT__.'/class.address.php');
   
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
   $country_id,
   $zip_code,
   $city_name,
   $street_name,
   $house_number
   );
   $this->stmt->store_result();
   $this->stmt->data_seek( (int)( $start_row ) );
   while( $this->stmt->fetch() 
   AND ( $object_number < $max_row ) )
   {
   $new_object = new address();
   $new_object->set_id( $id );
   $new_object->set_country_id( $country_id );
   $new_object->set_zip_code( $zip_code );
   $new_object->set_city_name( $city_name );
   $new_object->set_street_name( $street_name );
   $new_object->set_house_number( $house_number );
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
   address.id,
   address.country_id,
   address.zip_code,
   address.city_name,
   address.street_name,
   address.house_number
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
   $JSON .= "\"" .  "address_" . $n .  "\":" . "<br>" . $item->getJSON() . "," . "<br>"; 
   }
   else
   {
   $JSON .= "\"" .  "address_" . $n .  "\":" . "<br>" . $item->getJSON();
   }
   }
   return
   "{" . "<br>" . $JSON  . "}";
}

}
?>
