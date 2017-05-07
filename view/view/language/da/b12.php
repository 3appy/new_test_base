<?php
/*
------------------
Language: Danish
------------------
*/

// Æ = &#198
// æ = &#230
// Å = &#197
// å = &#229
// Ø = &#216
// ø = &#248

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/B_left_menue.php');
require('menue_includes/B_top_menue.php');
require('menue_includes/B_right_menue.php');
require('general/send_receive_button.php');

$lang['info'] = "" .
"<p class=\"box info\">" .
"<img src=\"". $_SESSION['icons'] .  "warning.png\" " . "/>" .
' upload af dokumenter er i format pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp og txt muligt'.
 "</p>";

$lang['C3_form_header']        = 'upload et nyt dokument ind i din private profil';
$lang['C3_header']             = 'Dokument overskrift';
$lang['C3_userfile']           = 'Selekter en fil';
$lang['C3_description']        = 'Dokument beskrivelse';
?>
