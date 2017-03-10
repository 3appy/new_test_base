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
require('menue_includes/D_left_menue.php');
require('menue_includes/D_top_menue.php');
require('menue_includes/D_right_menue.php');
require('list_includes/member_list.php');
require('general/send_receive_button.php');

$lang['C3_form_header']    = 'Invitationsliste';
$lang['C3_interview_time'] = 'Interview tid';
$lang['C3_choose_time']    = 'v&#230lge et tidspunkt';

$lang['C3_no_time_selected']   =
'Du har endnu ikke valgt en dato for samtalen.
Du har mulighed at v&#230lge en ledig termin fra boksen som passer 
til din tidsplan.';

$lang['C3_time_selected_1']    =
'Du har valgt f&#248lgende dato for samtalen: ';

$lang['C3_time_selected_2']    =
'Du kan v&#230lge en andet ledig termin fra boksen
som passer bedre til din tidsplan.';
?>
