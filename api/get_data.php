<?php
require_once('../../data/class.member_message_list.php');
require_once('../../data/class.member.php');

$message_list = new member_message_list();
$message_list->set_reader_id( (int)368 );
$message_list->set_author_id( (int)369 );
$message_list->set_row_per_page( (int)10 );
$message_list->load_all();



for( $n=0; $n<$message_list->get_item_count(); $n++ )
{
    $message = $message_list->get_item( $n );

    $author = new member();
    $author->set_id( $message->get_author_id() );
    $author->load();

    $reader = new member();
    $reader->set_id( $message->get_reader_id() );
    $reader->load();
    

    echo "from: " . $author->get_name() . " to: " . $reader->get_name() . "<br>" . $message->get_text() . "<br>" . "<br>";
}
?>