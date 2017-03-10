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
require('general/send_receive_button.php');

$lang['C3_header_1']            = 'opgave er defineret af';
$lang['C3_header_2']            = 'den';
$lang['C3_header_3']            = 'og skal afleveres senest den';
$lang['C3_header_4']            = '';

$lang['C3_form_header']         = 'lektie beskrivelse';

$lang['C3_task_description']    = 'opgave definition';
$lang['C3_no_task_description'] = 'ingen opgave definition tilg&#230ngeligt';

$lang['C3_author_comment']      = 'l&#230rer kommentar';
$lang['C3_no_author_comment']   = 'ingen l&#230rer kommentar tilg&#230ngelig';

$lang['C3_receiver_comment']    = 'elev kommentar';
$lang['C3_no_receiver_comment'] = 'ingen elev kommentar tilg&#230ngelig';

$lang['C3_est_duration']        = 'forventede varighed';
$lang['C3_real_duration']       = 'virkelige varighed';

$lang['duration_0']             = '< 15 min.';
$lang['duration_1']             = '15 min.';
$lang['duration_2']             = '30 min.';
$lang['duration_3']             = '45 min.';
$lang['duration_4']             = '60 min.';
$lang['duration_5']             = '90 min.';
$lang['duration_6']             = '2 timer';
$lang['duration_7']             = '3 timer';
$lang['duration_8']             = '5 timer';
$lang['duration_9']             = '10 timer';
$lang['duration_10']             = '15 timer';
$lang['duration_11']             = '20 timer';
$lang['duration_12']             = '> 20 timer';

$lang['C3_status']              = 'lektie status';
$lang['selectstatus_1']         = 'lavet';
$lang['selectstatus_2']         = 'delvis lavet';
$lang['selectstatus_3']         = 'ikke lavet';

$lang['C3_start_time']          = 'start';
$lang['C3_end_time']            = 'slut';
?>
