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
require('menue_includes/A_left_menue.php');
require('general/send_receive_button.php');


$lang['C3_form_header'] = 'tilmeld din skole:';

$lang['C3_annotation']  =
'Bem&#230rk:
<br>Udfyld venligst alle felter som er markeret r&#248dt, f&#248r du sender ans&#248gningen.
<br>Adgang p&#229 skolen sker igennem profiler med rette tilladelser.
Skolelederen er den vigtigste profil med flest rettigheder.
Skolelederen kunne udpege en administrator, der ops&#230tter skolesystemet.';


$lang['C3_school_data']        = 'skoledata';
$lang['C3_school_name']        = 'Skolenavn';

$lang['C3_schoolsize']         = 'Skolens st&#248rrelse';
$lang['C3_select_schoolsize']  = 'v&#230lg st&#248rrelsen af skolen';
$lang['schoolsize_']           = 'ingen skole st&#248rrelse er blevet valgt';
$lang['schoolsize_0']          = 'ingen skole st&#248rrelse er blevet valgt';
$lang['schoolsize_1']          = '&le; 50 elever';
$lang['schoolsize_2']          = '51 - 100 elever';
$lang['schoolsize_3']          = '101 - 200 elever';
$lang['schoolsize_4']          = '201 - 400 elever';
$lang['schoolsize_5']          = '401 - 600 elever';
$lang['schoolsize_6']          = '601 - 800 elever';
$lang['schoolsize_7']          = '801 - 1000 elever';
$lang['schoolsize_8']          = '1001 - 1200 elever';
$lang['schoolsize_9']          = '1201 - 1400 elever';
$lang['schoolsize_10']         = '1401 - 1600 elever';
$lang['schoolsize_11']         = '1601 - 1800 elever';
$lang['schoolsize_12']         = '1801 - 2000 elever';
$lang['schoolsize_13']         = '> 2000 elever';

$lang['C3_street_name']     = 'gade';
$lang['C3_house_number']    = 'husnummer';
$lang['C3_select_zip']      = 'V&#230lg postnummer';
$lang['C3_zip_code']        = 'postnummer';
$lang['C3_select_city']     = 'V&#230lg din by';
$lang['C3_city_name']       = 'by';

$lang['C3_country']         = 'land';
$lang['C3_select_country']  = 'v&#230lg dit land';
$lang['country_']           = 'intet land blev valgt';
$lang['country_0']          = 'intet land blev valgt';
$lang['country_1']          = 'Tyskland';
$lang['country_2']          = 'Danmark';
$lang['country_3']          = 'England';

$lang['C3_rector_data']     = 'skoleleder';
$lang['C3_admin_data']      = 'administrator';
$lang['C3_legis_data']      = 'betingelser';

$lang['C3_salution']          = 'salutation';
$lang['C3_select_salution']   = 'v&#230lg salutation';
$lang['salution_1']           = 'Mr.';
$lang['salution_2']           = 'Ms.';
$lang['salution_3']           = '';
$lang['salution_4']           = '';
$lang['salution_5']           = '';

$lang['C3_forname']         = 'fornavn';
$lang['C3_surname']         = 'efternavn';
$lang['C3_mail']            = 'E - mail adresse';
$lang['C3_phone']           = 'telefon';

$lang['C3_rec_adm']         = 'Skolelederen er ogs&#229 admin';

$AGB_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A6_frame.php' .
'" target="_blank"' . "\">" . 'vis mig vilk&#229rene og betingelserne' . '</a>';

$lang['C3_accept_AGB']         =
'Jeg accepterer vilk&#229rene og betingelserne' . "</br>" . $AGB_link;


$Nutzungsbedingungen_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A14_frame.php' .
'" target="_blank"' . "\">" . 'vis mig vilk&#229rene til brug' . '</a>';

$lang['C3_accept_Nutzungsbedingungen'] =
'Jeg accepterer vilk&#229rene til brug' . "</br>" . $Nutzungsbedingungen_link;
?>
