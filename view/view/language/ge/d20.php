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
require('menue_includes/D_left_menue.php');
require('menue_includes/D_top_menue.php');
require('menue_includes/D_right_menue.php');
require('general/send_receive_button.php');

$lang['C3_form_header']        = 'G&#228steliste';
$lang['C3_interview_time']     = 'Interview Zeit';
$lang['C3_choose_time']        = 'w&#228hle einen Zeitpunkt';

$lang['C3_no_time_selected']   = 
'Du hast noch keinen Zeitpunkt f&#252r das Gespr&#228ch gew&#228hlt. 
Du kannst aus der Auswahlbox einen freien Termin w&#228hlen der zu
deinem Terminkalender passt.';

$lang['C3_time_selected_1']    = 
'Du hast folgenden Zeitpunkt f&#252r das Gesp&#228ch gew&#228hlt: ';

$lang['C3_time_selected_2']    =
'Du kannst aus der Auswahlbox einen anderen freien Termin w&#228hlen
der besser zu deinem Terminkalender passt.';
?>
