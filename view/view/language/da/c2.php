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
require('general/month_selection.php');
require('general/address.php');
require('general/send_receive_button.php');

$lang['C3_form_header']     = 'Gruppeinformationer';
$lang['C3_name']            = 'Gruppenavn';
$lang['C3_mail']            = 'mail - adresse';
$lang['C3_birthday_header'] = 'grundlaget';
$lang['C3_select_day']      = 'v&#230lge en dag';
$lang['C3_day']             = 'grundlag - dag';
$lang['C3_select_month']    = 'v&#230lge en m&#230ned';
$lang['C3_month']           = 'grundlag - m&#229ned';
$lang['C3_select_year']     = 'v&#230lge et &#230r';
$lang['C3_year']            = 'grundlag - &#229r';

$lang['C3_contact']         = 'kontaktoplysninger';
$lang['C3_mobile_phone']    = 'mobile';
$lang['C3_home_phone']      = 'hjemme';
$lang['C3_work_phone']      = 'arbejde';

$lang['C3_button_header']   = 'yderlige private instillinger';
$lang['C3_change_picture']  = 'skifte billede';

$lang['C3_delete_team']     = 'Slette gruppe';
$lang['C3_ask_delete_team'] = 'ville du virkelig slette gruppe?';
?>
