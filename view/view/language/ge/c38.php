<?php
/*
------------------
Language: German
------------------
ASCII code &#252 = ü ( letter u with umlaut or diaeresis , u-umlaut )
ASCII code &#228 = ä ( letter a with umlaut or diaeresis , a-umlaut )
ASCII code &#196 = Ä ( letter A with umlaut or diaeresis ; A-umlaut )
ASCII code &#246 = ö ( letter o with umlaut or diaeresis ; o-umlaut )
ASCII code &#214 = Ö ( Letter O with umlaut or diaeresis ; O-umlaut )
ASCII code &#220 = Ü ( Letter U with umlaut or diaeresis ; U-umlaut )
*/

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/C_left_menue.php');
require('menue_includes/C_top_menue.php');
require('menue_includes/C_right_menue.php');
require('general/send_receive_button.php');

$lang['C3_header_1']            = 'Die Aufgabe wurde von';
$lang['C3_header_2']            = 'am';
$lang['C3_header_3']            = 'gestellt und muss bis zum';
$lang['C3_header_4']            = 'sp&#228testens fertig gestellt werden.';

$lang['C3_form_header']         = 'Aufgabenbeschreibung';
$lang['selected_pupils']        = 'w&#228hle einzelne Sch&#252ler';
$lang['all_pupils']             = 'w&#228hle alle Sch&#252ler';
$lang['C3_est_duration']        = 'ungef&#228hrer Arbeitsaufwand';
$lang['C3_real_duration']       = 'realer Arbeitsaufwand';
$lang['C3_select_duration']     = 'w&#228hle den Arbeitsaufwand';

$lang['duration_0']             = '< 15 min.';
$lang['duration_1']             = '15 min.';
$lang['duration_2']             = '30 min.';
$lang['duration_3']             = '45 min.';
$lang['duration_4']             = '60 min.';
$lang['duration_5']             = '90 min.';
$lang['duration_6']             = '2 Std.';
$lang['duration_7']             = '3 Std.';
$lang['duration_8']             = '5 Std.';
$lang['duration_9']             = '10 Std.';
$lang['duration_10']             = '15 Std.';
$lang['duration_11']             = '20 Std.';
$lang['duration_12']             = '> 20 Std.';

$lang['hour']                   = 'Stunde';
$lang['day_1']                  = 'Montag';
$lang['day_2']                  = 'Dienstag';
$lang['day_3']                  = 'Mittwoch';
$lang['day_4']                  = 'Donnerstag';
$lang['day_5']                  = 'Freitag';
$lang['day_6']                  = 'Sonnabend';
$lang['day_7']                  = 'Sontag';

$lang['C3_status']              = 'Aufgabenstatus';
$lang['C3_select_status']       = 'w&#228hle den Status';
$lang['selectstatus_1']         = 'erledigt';
$lang['selectstatus_2']         = 'teilweise erledigt';
$lang['selectstatus_3']         = 'nicht erledigt';

$lang['C3_task_description']    = 'Aufgabenbeschreibung';
$lang['C3_no_task_description'] = 'kein Aufgabenbeschreibung verf&#252gbar';

$lang['C3_author_comment']      = 'Lehrer Kommentar';
$lang['C3_no_author_comment']   = 'kein Lehrer Kommentar verf&#252gbar';

$lang['C3_receiver_comment']    = 'Sch&#252ler Kommentar';
$lang['C3_no_receiver_comment'] = 'kein Sch&#252ler Kommentar verf&#252gbar';

$lang['C3_start_time']          = 'Start';
$lang['C3_end_time']            = 'Ende';
$lang['C3_select_time']         = 'w&#228hle eine Stunde';
?>
