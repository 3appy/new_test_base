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

$lang['C3_form_header']  = 'Team Registrierung';
$lang['C3_name']         = 'Teamname';

$lang['C3_team_type']    = 'Welche Art Team m&#246chtest du registrieren';
$lang['C3_select_type']  = 'W&#228hle die Art';
$lang['type_1']          = 'Organisatorisches Team (z.B. Klasse)';
$lang['type_2']          = 'P&#228dagogisches Team (z.B. Fach)';
?>
