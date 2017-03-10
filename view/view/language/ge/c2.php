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
require('general/month_selection.php');
require('general/address.php');
require('general/send_receive_button.php');

$lang['C3_form_header']     = 'Team Informationen';
$lang['C3_name']            = 'Teamname';
$lang['C3_mail']            = 'Mail - addresse';
$lang['C3_birthday_header'] = 'Gr&#252ndungstag';
$lang['C3_select_day']      = 'W&#228hle einen Tag';
$lang['C3_day']             = 'Gr&#252ndungs - Tag';
$lang['C3_select_month']    = 'W&#228hle einen Monat';
$lang['C3_month']           = 'Gr&#252ndungs - Monat';
$lang['C3_select_year']     = 'W&#228hle ein Jahr';
$lang['C3_year']            = 'Gr&#252ndungs - Jahr';

$lang['C3_contact']         = 'Kontakt Informationen';
$lang['C3_mobile_phone']    = 'Mobile';
$lang['C3_home_phone']      = 'Festnetz';
$lang['C3_work_phone']      = 'Arbeit';

$lang['C3_button_header']   = 'weitere private Einstellungen';
$lang['C3_change_picture']  = '&#228nder Bild';

$lang['C3_delete_team']     = 'Team l&#246schen';
$lang['C3_ask_delete_team'] = 'Willst du wirklich das Team l&#246schen?';
?>
