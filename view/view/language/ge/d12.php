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
' Das Hochladen von Dokumenten ist im folgenden Format g&#252ltig: pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp og txt' .
 "</p>";

$lang['C3_form_header']        = 'Lade ein neues Dokument in dein Event hoch';
$lang['C3_header']             = 'Dokument&#252berschrift';
$lang['C3_userfile']           = 'W&#228hle eine Datei aus';
$lang['C3_description']        = 'Dokumentbeschreibung';
?>
