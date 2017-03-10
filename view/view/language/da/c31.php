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
require('menue_includes/C_left_menue.php');
require('menue_includes/C_top_menue.php');
require('menue_includes/C_right_menue.php');
require('general/send_receive_button.php');

$lang['C3_form_header']  = 'Grupperegistrering';
$lang['C3_name']         = 'Gruppenavn';

$lang['C3_team_type']    = 'Hvilken slags gruppe, du vil registrere';
$lang['C3_select_type']  = 'v&#230lg den type';
$lang['type_1']          = 'organisatorisk gruppe (f.eks klasse)';
$lang['type_2']          = 'p&#230dagogisk gruppe (f.eks emne)';
?>
