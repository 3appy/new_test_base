<?php
/*
------------------
Language: German
------------------
*/

// Ü = &#220
// ü = &#252
// Ö = &#214
// ö = &#246
// Ä = &#196
// ä = &#228
// ß = &#223
// § = &#167
// € = &#128

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/C_left_menue.php');
require('menue_includes/C_top_menue.php');
require('menue_includes/C_right_menue.php');
require('general/send_receive_button.php');

$lang['info'] = "" .
"<p class=\"box info\">" .
"<img src=\"". $_SESSION['icons'] .  "warning.png\" " . "/>" .
' Das Hochladen von Videos ist auf mp4 Dateien begrenzt.' .
 "</p>";

$lang['C3_form_header']        = 'Lade ein neues Video in das Teamprofil';
$lang['C3_header']             = 'Video&#252berschrift';
$lang['C3_userfile']           = 'W&#228hle eine Datei aus';
$lang['C3_description']        = 'Videobeschreibung';
?>
