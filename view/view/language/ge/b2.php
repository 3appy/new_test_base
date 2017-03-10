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
require('general/month_selection.php');
require('general/address.php');
require('general/save_reject_button.php');

$lang['C3_form_header']     = 'Private Informationen';
$lang['C3_forname']         = 'Vorname';
$lang['C3_name']            = 'Nachname';
$lang['C3_mail']            = 'Mail - addresse';
$lang['C3_birthday_header'] = 'Geburtstag';
$lang['C3_select_day']      = 'W&#228hle einen Tag';
$lang['C3_day']             = 'Geburts - Tag';
$lang['C3_select_month']    = 'W&#228hle einen Monat';
$lang['C3_month']           = 'Geburts - Monat';
$lang['C3_select_year']     = 'W&#228hle ein Jahr';
$lang['C3_year']            = 'Geburts - Jahr';

$lang['C3_gender']          = 'Geschlecht';
$lang['C3_select_sex']      = 'W&#228hle dein Geschlecht';
$lang['sex_1']              = 'm&#228nnlich';
$lang['sex_2']              = 'weiblich';
$lang['sex_3']              = 'Will ich nicht sagen';

$lang['C3_contact']         = 'Kontakt Informationen';
$lang['C3_mobile_phone']    = 'Mobile';
$lang['C3_home_phone']      = 'Festnetz';
$lang['C3_work_phone']      = 'Arbeit';

$lang['C3_button_header']   = 'weitere private Einstellungen';
$lang['C3_change_password'] = '&#228nder Passwort';
$lang['C3_change_language'] = '&#228nder Sprache';
$lang['C3_change_picture']  = '&#228nder Bild';
?>
