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
require('list_includes/member_list.php');
require('list_includes/team_list.php');
require('list_includes/event_list.php');

$lang['C3_info_1']             = 'du er medlem af 1 organisation';
$lang['C3_info_x_1']           = 'du er medlem af';
$lang['C3_info_x_2']           = 'organisationer';
$lang['C3_info_3']             = 'her er de resultater fra organisationen: ';

$lang['C3_form_header_member'] = 'medlem';
$lang['C3_form_header_team']   = 'gruppe';
$lang['C3_form_header_event']  = 'aktivitet';
?>
