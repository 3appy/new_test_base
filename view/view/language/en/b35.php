<?php
/*
------------------
Language: English
------------------
*/

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/B_left_menue.php');
require('menue_includes/B_top_menue.php');
require('menue_includes/B_right_menue.php');

$lang['info'] = "" .
"<p class=\"box info\">" .
"<img src=\"". $_SESSION['icons'] .  "info.png\" " . "/>" .
' Click a picture to include this in your article' .
 "</p>";
?>