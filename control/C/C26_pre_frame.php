<?php
session_start();

// the search
include_once 'class.C_basic_frame.php';
include_once 'C26_pre_control.php';

$frame = new C_basic_frame();
$frame->set_control( new C26_pre_control() );
$frame->set_frame_switch( 'default' );
$frame->set_next_frame( 'C26_frame.php' );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>