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
require('menue_includes/B_left_menue.php');
require('menue_includes/B_top_menue.php');
require('menue_includes/B_right_menue.php');
require('list_includes/team_list.php');
require('list_includes/news_list.php');

$lang['C3_info']             = 'Du bist kein Mitglied einer Organisation. W&#228hle die Organisation, der du zugeh&#246rst';
$lang['C3_member_amount']    = 'Anzahl der Administratoren';
$lang['C3_form_header_team'] = 'Organisationen:';
?>