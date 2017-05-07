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

$lang['C3_form_header']       = 'timeplan';

$lang['C3_start_header']      = 'definere start';
$lang['C3_start_week']        = 'v&#230lge start uge';
$lang['C3_select_week']       = 'v&#230lge en uge';
$lang['week']                 = 'uge';
$lang['C3_start_year']        = 'v&#230lge start &#229r';
$lang['C3_select_year']       = 'v&#230lge et &#229r';
$lang['year']                 = '&#229r';

$lang['C3_end_header']        = 'definere slutning';
$lang['C3_end_week']          = 'v&#230lge sidste uge';
$lang['week']                 = 'uge';
$lang['C3_end_year']          = 'v&#230lge sidste &#229r';

$lang['C3_selection_header']  = 'definere timeplan';
$lang['C3_day_number']        = 'definere ugens dag';
$lang['C3_select_day']        = 'v&#230lge en dag';
$lang['day_1']                = 'Mandag';
$lang['day_2']                = 'Tirsdag';
$lang['day_3']                = 'Onsdag';
$lang['day_4']                = 'Torsdag';
$lang['day_5']                = 'Fredag';
$lang['day_6']                = 'L&#248rdag';
$lang['day_7']                = 'S&#248ndag';

$lang['C3_time_number']       = 'definere timenumre';
$lang['C3_select_time']       = 'v&#230lge en time';
$lang['hour']                 = 'time';

$lang['start_week']           = 'start uge';
$lang['start_year']           = 'start &#229r';
$lang['end_week']             = 'slut uge';
$lang['end_year']             = 'slut &#229r';
$lang['day_number']           = 'dag';
$lang['time_number']          = 'time';
$lang['edit']                 = 'rediger';
$lang['delete']               = 'slet';
$lang['confirm_delete']       = 'er du sikkert p&#229 at slette?';
$lang['generate']             = 'generere';
?>
