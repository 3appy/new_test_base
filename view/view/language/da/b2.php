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
require('menue_includes/B_left_menue.php');
require('menue_includes/B_top_menue.php');
require('menue_includes/B_right_menue.php');
require('general/month_selection.php');
require('general/address.php');
require('general/save_reject_button.php');


$lang['C3_form_header']     = 'private informationer';
$lang['C3_forname']         = 'fornavn';
$lang['C3_name']            = 'efternavn';
$lang['C3_mail']            = 'mail - adresse';
$lang['C3_birthday_header'] = 'f&#248dselsdag';
$lang['C3_select_day']      = 'v&#230lge en dag';
$lang['C3_day']             = 'f&#248dsels  - dag';
$lang['C3_select_month']    = 'v&#230lge en m&#229ned';
$lang['C3_month']           = 'f&#248dsels - m&#229ned';
$lang['C3_select_year']     = 'v&#230lge et &#229r';
$lang['C3_year']            = 'f&#248dsels - &#229r';

$lang['C3_gender']          = 'K&#248n';
$lang['C3_select_sex']      = 'v&#230g dit k&#248n';
$lang['sex_1']              = 'mand';
$lang['sex_2']              = 'kvinde';
$lang['sex_3']              = 'Jeg &#248nsker ikke at sige';

$lang['C3_contact']         = 'kontaktoplysninger';
$lang['C3_mobile_phone']    = 'mobile';
$lang['C3_home_phone']      = 'hjemme';
$lang['C3_work_phone']      = 'arbejde';

$lang['C3_button_header']   = 'yderlige private instillinger';
$lang['C3_change_password'] = 'skifte password';
$lang['C3_change_language'] = 'skifte sprog';
$lang['C3_change_picture']  = 'skifte billede';
?>
