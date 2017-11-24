<?php
// this script is written by Bernd Schröder using AWK in Linux bash




// -------------------------------------------------------------

// return all datarecords of member_message
$app->get('/api/member_message', function()
{
require_once('../data/class.member_message_list.php');
$list = new member_message_list();
$list->load_all();
header('Content-Type: application/json');
echo json_encode($list);
});


// -------------------------------------------------------------

// return a single row of member_message
$app->get('/api/member_message/{id}', function()
{
require_once('../data/class.member_message.php');
$model = new member_message();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->load();
header('Content-Type: application/json');
echo json_encode($model);
});


// -------------------------------------------------------------

// post data and create a new record of  member_message
$app->post('/api/member_message', function($request)
{
require_once('../data/class.member_message.php');
$model = new member_message();
$model->set_author_id( $request->getParsedBody()['author_id'] );
$model->set_reader_id( $request->getParsedBody()['reader_id'] );
$model->set_read_stamp( $request->getParsedBody()['read_stamp'] );
$model->set_text( $request->getParsedBody()['text'] );
$model->set_media_id( $request->getParsedBody()['media_id'] );
$model->insert();
});


// -------------------------------------------------------------

// update the record with id = id in member_message
$app->put('/api/member_message/{id}', function($request)
{
require_once('../data/class.member_message.php');
$model = new member_message();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->load();
$model->set_author_id( $request->getParsedBody()['author_id'] );
$model->set_reader_id( $request->getParsedBody()['reader_id'] );
$model->set_read_stamp( $request->getParsedBody()['read_stamp'] );
$model->set_text( $request->getParsedBody()['text'] );
$model->set_media_id( $request->getParsedBody()['media_id'] );
$model->update();
});


// -------------------------------------------------------------

// delete the record with id = id from member_message
$app->delete('/api/member_message/{id}', function()
{
require_once('../data/class.member_message.php');
$model = new member_message();
$id = $request->getAttribute('id');
$model->set_id( $id );
$model->delete();
});


?>
