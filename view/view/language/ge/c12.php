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
' Das Hochladen von Dokumenten ist im folgenden Format g&#252ltig: pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp og txt' .
 "</p>";

$lang['C3_form_header']        = 'Lade ein neues Dokument in das Teamprofil';
$lang['C3_header']             = 'Dokument&#252berschrift';
$lang['C3_userfile']           = 'W&#228hle eine Datei aus';
$lang['C3_description']        = 'Dokumentbeschreibung';
?>
