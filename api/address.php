<?php
// this script is written by Bernd Schröder using AWK in Linux bash




// -------------------------------------------------------------

// return all datarecords of address
$app->get('/api/address', function()
{
require_once('../data/class.address_list.php');
$list = new address_list();
$list->load_all();
header('Content-Type: application/json');
echo json_encode($list);
});


// -------------------------------------------------------------

// return a single row of address
$app->get('/api/address/{id}', function()
{
require_once('../data/class.address.php');
$model = new address();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->load();
header('Content-Type: application/json');
echo json_encode($model);
});


// -------------------------------------------------------------

// post data and create a new record of  address
$app->post('/api/address', function($request)
{
require_once('../data/class.address.php');
$model = new address();
$model->set_country_id( $request->getParsedBody()['country_id'] );
$model->set_zip_code( $request->getParsedBody()['zip_code'] );
$model->set_city_name( $request->getParsedBody()['city_name'] );
$model->set_street_name( $request->getParsedBody()['street_name'] );
$model->set_house_number( $request->getParsedBody()['house_number'] );
$model->insert();
});


// -------------------------------------------------------------

// update the record with id = id in address
$app->put('/api/address/{id}', function($request)
{
require_once('../data/class.address.php');
$model = new address();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->load();
$model->set_country_id( $request->getParsedBody()['country_id'] );
$model->set_zip_code( $request->getParsedBody()['zip_code'] );
$model->set_city_name( $request->getParsedBody()['city_name'] );
$model->set_street_name( $request->getParsedBody()['street_name'] );
$model->set_house_number( $request->getParsedBody()['house_number'] );
$model->update();
});


// -------------------------------------------------------------

// delete the record with id = id from address
$app->delete('/api/address/{id}', function()
{
require_once('../data/class.address.php');
$model = new address();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->delete();
});


?>
