<?php
session_start();

//18  select Avatar
require_once('../../frame/path.php');
$path = new path();

if(
(isset($_GET["ni:be!:lu:jo!mem"]) && is_numeric($_GET["ni:be!:lu:jo!mem"])) AND
( isset($_SESSION['watch_id'])) AND
( isset($_SESSION['online']) && ( $_SESSION['online'] == TRUE ))
)
{
$_SESSION['watched_id'] = htmlspecialchars( $_GET["ni:be!:lu:jo!mem"] );
//$_SESSION['last_frame']    = $path->get_frame();
require_once('../../view/B18_view.php');
$member_view = new B18_view();
echo $member_view->get_representation();
}
else
{
header("Location:" . $path->get_start_frame());
exit;
}
?>
