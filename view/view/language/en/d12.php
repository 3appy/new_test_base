<?php
/*
------------------
Language: English
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
' The upload of documents is valid in the following formats: pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp og txt' .
 "</p>";

$lang['C3_form_header']        = 'upload a new document to this event';
$lang['C3_header']             = 'Define a header for your document';
$lang['C3_userfile']           = 'Select a file';
$lang['C3_description']        = 'Describe your document';
?>
