<?php
/*
------------------
Language: German
------------------
*/

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/D_left_menue.php');
require('menue_includes/D_top_menue.php');
require('menue_includes/D_right_menue.php');
require('general/send_receive_button.php');

$lang['info'] = "" .
"<p class=\"box info\">" .
"<img src=\"". $_SESSION['icons'] .  "warning.png\" " . "/>" .
' Das Hochladen von Videos ist auf mp4 Dateien begrenzt.' .
 "</p>";

$lang['C3_form_header']        = 'Lade ein neues Video in dein Event hoch';
$lang['C3_header']             = 'Video&#252berschrift';
$lang['C3_userfile']           = 'W&#228hle eine Datei aus';
$lang['C3_description']        = 'Videobeschreibung';
?>
