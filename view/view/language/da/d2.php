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
require('general/month_selection.php');
require('general/address.php');
require('general/send_receive_button.php');

$lang['C3_form_header']     = 'Aktivitetsinformationer';
$lang['C3_name']            = 'Aktivitetsnavn';
$lang['C3_mail']            = 'mail - adresse';

$lang['C3_birthday_header'] = 'aktivitetsdag';
$lang['C3_select_day']      = 'v&#230lge en dag';
$lang['C3_day']             = 'aktivitetsdag';
$lang['C3_select_month']    = 'v&#230lge en m&#229ned';
$lang['C3_month']           = 'aktivitetsm&#229ned';
$lang['C3_select_year']     = 'v&#230lge et &#229r';
$lang['C3_year']            = 'aktivitets&#229r';

$lang['C3_time_header']     = 'aktivitetstid';
$lang['C3_select_hour']     = 'v&#230lge en time';
$lang['C3_event_hour']      = 'aktivitetstime';
$lang['C3_select_minute']   = 'v&#230lge et minute';
$lang['C3_event_minute']    = 'aktivitetsminute';

$lang['C3_contact']         = 'kontaktoplysninger';
$lang['C3_mobile_phone']    = 'mobile';
$lang['C3_home_phone']      = 'hjemme';
$lang['C3_work_phone']      = 'arbejde';

$lang['C3_button_header']   = 'yderlige private instillinger';
$lang['C3_change_picture']  = 'skifte billede';

$lang['C3_start_time_date'] = 'definere starttidspunkt af aktivitet';
$lang['C3_end_time_date']   = 'definere sluttidspunkt af aktivitet';
$lang['C3_date']            = 'definere datum: jjjj-mm-dd';
$lang['C3_time']            = 'definere tidspunkt: hh:mm';

$lang['C3_delete_team']     = 'Slette aktivitet';
$lang['C3_ask_delete_team'] = 'ville du virkelig slette denne aktivitet?';
?>