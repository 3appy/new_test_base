<?php
session_start();

//38 task form
include_once 'class.B_basic_frame.php';
include_once 'B38_post_control.php';

$frame = new B_basic_frame();
$frame->set_control( new B38_post_control() );
$frame->set_frame_switch( 'to_control' );
$frame->set_next_frame( 'B_post_frame.php' );

$frame->get_param_list()->add_parameter( "&function=" . (int)29 );

$next_frame = $frame->return_next_frame();
header("Location:" . $next_frame );
exit;
?>