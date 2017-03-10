<?php
/*
------------------
Language: English
------------------
*/

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/A_left_menue.php');
require('general/send_receive_button.php');


$lang['C3_form_header'] = 'Register your school:';

$lang['C3_annotation']  =
'note:
<br>Please fill out all the fields marked in red before submitting the application.
<br>The school will be accessed via profiles, with appropriate permissions.
The headmaster is the main profile with the most rights.
He may appoint an administrator who sets up the school system.';


$lang['C3_school_data']        = 'school data';
$lang['C3_school_name']        = 'Name of the school';

$lang['C3_schoolsize']         = 'school size';
$lang['C3_select_schoolsize']  = 'choose the size of the school';
$lang['schoolsize_']           = 'no school size has been selected';
$lang['schoolsize_0']          = 'no school size has been selected';
$lang['schoolsize_1']          = '&le; 50 student';
$lang['schoolsize_2']          = '51 - 100 student';
$lang['schoolsize_3']          = '101 - 200 student';
$lang['schoolsize_4']          = '201 - 400 student';
$lang['schoolsize_5']          = '401 - 600 student';
$lang['schoolsize_6']          = '601 - 800 student';
$lang['schoolsize_7']          = '801 - 1000 student';
$lang['schoolsize_8']          = '1001 - 1200 student';
$lang['schoolsize_9']          = '1201 - 1400 student';
$lang['schoolsize_10']         = '1401 - 1600 student';
$lang['schoolsize_11']         = '1601 - 1800 student';
$lang['schoolsize_12']         = '1801 - 2000 student';
$lang['schoolsize_13']         = '> 2000 student';

$lang['C3_street_name']     = 'street';
$lang['C3_house_number']    = 'house number';
$lang['C3_select_zip']      = 'select the zip code';
$lang['C3_zip_code']        = 'zip code';
$lang['C3_select_city']     = 'choose your town';
$lang['C3_city_name']       = 'town';

$lang['C3_country']         = 'country';
$lang['C3_select_country']  = 'choose your Country';
$lang['country_']           = 'No country was selected';
$lang['country_0']          = 'No country was selected';
$lang['country_1']          = 'Germany';
$lang['country_2']          = 'Denmark';
$lang['country_3']          = 'England';

$lang['C3_rector_data']     = 'headmaster';
$lang['C3_admin_data']      = 'administrator';
$lang['C3_legis_data']      = 'terms';

$lang['C3_salution']          = 'salutation';
$lang['C3_select_salution']   = 'select the salutation';
$lang['salution_1']           = 'Mr.';
$lang['salution_2']           = 'Ms.';
$lang['salution_3']           = '';
$lang['salution_4']           = '';
$lang['salution_5']           = '';

$lang['C3_forname']         = 'forename';
$lang['C3_surname']         = 'surname';
$lang['C3_mail']            = 'E - mail address';
$lang['C3_phone']           = 'phone';

$lang['C3_rec_adm']         = 'The headmaster is also the Admin';

$AGB_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A6_frame.php' .
'" target="_blank"' . "\">" . 'show me the terms and conditions' . '</a>';

$lang['C3_accept_AGB']         =
'I accept the AGBs' . "</br>" . $AGB_link;


$Nutzungsbedingungen_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A14_frame.php' .
'" target="_blank"' . "\">" . 'Show me the terms of use' . '</a>';

$lang['C3_accept_Nutzungsbedingungen'] =
'I accept the terms of use' . "</br>" . $Nutzungsbedingungen_link;
?>
