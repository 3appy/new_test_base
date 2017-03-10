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
require('menue_includes/D_left_menue.php');
require('menue_includes/D_top_menue.php');
require('menue_includes/D_right_menue.php');
require('general/send_receive_button.php');

$lang['info'] = "" .
"<p class=\"box info\">" .
"<img src=\"". $_SESSION['icons'] .  "warning.png\" " . "/>" .
' upload af videos er kun i format mp4 muligt' .
 "</p>";

$lang['C3_form_header']        = 'upload et nyt video ind i din aktivitet';
$lang['C3_header']             = 'Video overskrift';
$lang['C3_userfile']           = 'Selekter en fil';
$lang['C3_description']        = 'Video beskrivelse';
?>
