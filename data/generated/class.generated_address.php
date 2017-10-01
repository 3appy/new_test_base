<?php
// this script is written by Bernd Schröder using AWK in Linux bash

// -------------------------------------------------------------

require_once('class.general_group.php');

// -------------------------------------------------------------

class generated_address
    extends general_group
{

// --- ATTRIBUTES ---

// @access: private
// @var: Integer
private $id = null;


// @access: private
// @var: Integer
private $country_id = null;


// @access: private
// @var: String
private $zip_code = null;


// @access: private
// @var: String
private $city_name = null;


// @access: private
// @var: String
private $street_name = null;


// @access: private
// @var: String
private $house_number = null;



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


// set function for country_id expect variable of datatype: Integer
public function set_country_id( $country_id )
{
   $this->country_id = $country_id;
}

// get function for country_id return values is of datatype: Integer
public function get_country_id()
{
   if( $this->country_id == null )
   { return "null"; }
   else
   { return $this->country_id; }
}


public function get_country_id_type()
{
   return "i";
}


// set function for zip_code expect variable of datatype: String
public function set_zip_code( $zip_code )
{
   $this->zip_code = $zip_code;
}

// get function for zip_code return values is of datatype: String
public function get_zip_code()
{
   return $this->zip_code;
}


public function get_zip_code_type()
{
   return "s";
}


// set function for city_name expect variable of datatype: String
public function set_city_name( $city_name )
{
   $this->city_name = $city_name;
}

// get function for city_name return values is of datatype: String
public function get_city_name()
{
   return $this->city_name;
}


public function get_city_name_type()
{
   return "s";
}


// set function for street_name expect variable of datatype: String
public function set_street_name( $street_name )
{
   $this->street_name = $street_name;
}

// get function for street_name return values is of datatype: String
public function get_street_name()
{
   return $this->street_name;
}


public function get_street_name_type()
{
   return "s";
}


// set function for house_number expect variable of datatype: String
public function set_house_number( $house_number )
{
   $this->house_number = $house_number;
}

// get function for house_number return values is of datatype: String
public function get_house_number()
{
   return $this->house_number;
}


public function get_house_number_type()
{
   return "s";
}


// -------------------------------------------------------------

// define the insert function of the model
public function insert()
{
   require "data_connect.php";
   $insert_id = 0;
   $id = $this->get_id();
   $country_id = $this->get_country_id();
   $zip_code = $this->get_zip_code();
   $city_name = $this->get_city_name();
   $street_name = $this->get_street_name();
   $house_number = $this->get_house_number();
   if( $stmt = $mysqli->prepare(
   "INSERT INTO address
   (
   id,
   country_id,
   zip_code,
   city_name,
   street_name,
   house_number
   )
   VALUES (?,?,?,?,?,?)"))
   {
   $stmt->bind_param
   (
   "iissss",
   $id,
   $country_id,
   $zip_code,
   $city_name,
   $street_name,
   $house_number
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
   country_id,
   zip_code,
   city_name,
   street_name,
   house_number
   FROM address WHERE id=?"))
   {
   $stmt->bind_param('i', $id );
   $stmt->execute();
   $stmt->bind_result
   (
   $id,
   $country_id,
   $zip_code,
   $city_name,
   $street_name,
   $house_number
   );
   if( $stmt->fetch() == TRUE )
   {
   $this->set_id( $id );
   $this->set_country_id( $country_id );
   $this->set_zip_code( $zip_code );
   $this->set_city_name( $city_name );
   $this->set_street_name( $street_name );
   $this->set_house_number( $house_number );
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
   $country_id =  $this->get_country_id();
   $zip_code =  $this->get_zip_code();
   $city_name =  $this->get_city_name();
   $street_name =  $this->get_street_name();
   $house_number =  $this->get_house_number();
   if( $stmt = $mysqli->prepare(
   "UPDATE address SET
   id=?,
   country_id=?,
   zip_code=?,
   city_name=?,
   street_name=?,
   house_number=?
   WHERE id=?"))
   {
   $stmt->bind_param
   (
   "iissss",
   $id,
   $country_id,
   $zip_code,
   $city_name,
   $street_name,
   $house_number
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
   "DELETE FROM address
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
   "\"country_id\":" . $this->get_country_id() . "," . "<br>" . 
   "\"zip_code\":\"" . $this->get_zip_code() . "\"" . "," . "<br>" . 
   "\"city_name\":\"" . $this->get_city_name() . "\"" . "," . "<br>" . 
   "\"street_name\":\"" . $this->get_street_name() . "\"" . "," . "<br>" . 
   "\"house_number\":\"" . $this->get_house_number() .  "\"" . "<br>" . 
   "}"; 
}

}
?>
