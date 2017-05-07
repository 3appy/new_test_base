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
require('list_includes/member_list.php');
require('list_includes/team_list.php');
require('list_includes/event_list.php');

$lang['C3_info_1']             = 'Du bist Mitglied von 1 Organisation';
$lang['C3_info_x_1']           = 'Du bist Mitglied von';
$lang['C3_info_x_2']           = 'Organisationen';
$lang['C3_info_3']             = 'Hier sind die Ergebnisse der aus der Organisation: ';

$lang['C3_form_header_member'] = 'Mitglied';
$lang['C3_form_header_team']   = 'Gruppe';
$lang['C3_form_header_event']  = 'Ereignis';
?>
