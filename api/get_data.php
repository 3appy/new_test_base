<?php
require_once('../data/class.member_message_list.php');

$message_list = new member_message_list();
$message_list->set_reader_id( (int)368 );
$message_list->set_author_id( (int)369 );
$message_list->load_all();
echo $message_list->getJSON();

?>
