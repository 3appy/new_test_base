<?php
require_once('../../data/class.member_message.php');

$text = $_POST['chat_line'];

$message = new member_message();
$message->set_reader_id( (int)368 );
$message->set_author_id( (int)369 );
$message->set_read_stamp( 0 );
$message->set_text( $text );
$message->insert();
?>