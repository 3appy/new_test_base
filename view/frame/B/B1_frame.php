<?php
session_start();

require_once('../../view/b_view/class.b1_view.php');
$B_view = new B1_view();
$B_view->set_includes( (int)1 );
echo $B_view->get_representation();
?>
