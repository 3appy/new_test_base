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
require('menue_includes/A_left_menue.php');
require('general/send_receive_button.php');


$lang['C3_form_header'] = 'Melde deine Schule an:';

$lang['C3_annotation']  =
'Anmerkung:
<br>F&#252llen Sie bitte alle rot markierten Felder aus, bevor Sie die Anmeldung abschicken.
<br>Auf die Schule wird &#252ber Profile, mit entsprechenden Rechte, zugegriffen.
Das Profil des&#47;der Schulleiters&#47;in ist das wichtigste Profil mit den meisten Rechten.
Deligiert er&#47;sie Arbeitsaufgaben aus, so kann der&#47;die Schulleiter&#47;in einen Administrator&#47;in ernennen, der&#47;die die Schule im System aufbaut.';
 

$lang['C3_school_data']     = 'Schuldaten';
$lang['C3_school_name']     = 'Name der Schule';

$lang['C3_schoolsize']      = 'Schulgr&#246sse';
$lang['C3_select_schoolsize']  = 'W&#228hle die Schulgr&#246sse';
$lang['schoolsize_']           = 'Keine Schulgr&#246sse wurde gew&#228hlt';
$lang['schoolsize_0']          = 'Keine Schulgr&#246sse wurde gew&#228hlt';
$lang['schoolsize_1']          = '&le; 50 Sch&#252ler';
$lang['schoolsize_2']          = '51 - 100 Sch&#252ler';
$lang['schoolsize_3']          = '101 - 200 Sch&#252ler';
$lang['schoolsize_4']          = '201 - 400 Sch&#252ler';
$lang['schoolsize_5']          = '401 - 600 Sch&#252ler';
$lang['schoolsize_6']          = '601 - 800 Sch&#252ler';
$lang['schoolsize_7']          = '801 - 1000 Sch&#252ler';
$lang['schoolsize_8']          = '1001 - 1200 Sch&#252ler';
$lang['schoolsize_9']          = '1201 - 1400 Sch&#252ler';
$lang['schoolsize_10']         = '1401 - 1600 Sch&#252ler';
$lang['schoolsize_11']         = '1601 - 1800 Sch&#252ler';
$lang['schoolsize_12']         = '1801 - 2000 Sch&#252ler';
$lang['schoolsize_13']         = '> 2000 Sch&#252ler';

$lang['C3_street_name']     = 'Strasse';
$lang['C3_house_number']    = 'Hausnummer';
$lang['C3_select_zip']      = 'W&#228hle die Postleitzahl';
$lang['C3_zip_code']        = 'Postleitzahl';
$lang['C3_select_city']     = 'W&#228hle die Stadt';
$lang['C3_city_name']       = 'Stadt';

$lang['C3_country']         = 'Land';
$lang['C3_select_country']  = 'W&#228hle dein Land';
$lang['country_']           = 'Kein Land wurde gew&#228hlt';
$lang['country_0']          = 'Kein Land wurde gew&#228hlt';
$lang['country_1']          = 'Deutschland';
$lang['country_2']          = 'D&#228nemark';
$lang['country_3']          = 'England';

$lang['C3_rector_data']     = 'Schulleiter&#47;in';
$lang['C3_admin_data']      = 'Administrator&#47;in';
$lang['C3_legis_data']      = 'Rechtliches';

$lang['C3_salution']          = 'Anrede';
$lang['C3_select_salution']   = 'W&#228hle die Anrede';
$lang['salution_1']           = 'Herr';
$lang['salution_2']           = 'Frau';
$lang['salution_3']           = 'Herr Dr.';
$lang['salution_4']           = 'Frau Dr.';
$lang['salution_5']           = 'Herr Dr. Dr.';

$lang['C3_forname']         = 'Vorname';
$lang['C3_surname']         = 'Nachname';
$lang['C3_mail']            = 'E - Mail - Addresse';
$lang['C3_phone']           = 'Telefon';

$lang['C3_rec_adm']         = 'Der&#47;die Schulleiter&#47;in ist gleichzeitig der&#47;die Administrator&#47;in';

$AGB_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A6_frame.php' .
'" target="_blank"' . "\">" . 'Zeige mir die AGBs' . '</a>';

$lang['C3_accept_AGB']         =
'Ich akzeptiere die AGBs' . "</br>" . $AGB_link;


$Nutzungsbedingungen_link =
'<a href="' . 'http://www.' . $_SESSION['domain'] . '.com' .
$_SESSION['A_frame_base'] . 'A14_frame.php' .
'" target="_blank"' . "\">" . 'Zeige mir die Nutzungsbedingungen' . '</a>';

$lang['C3_accept_Nutzungsbedingungen'] =
'Ich akzeptiere die Nutzungsbedingungen' . "</br>" . $Nutzungsbedingungen_link;
?>
