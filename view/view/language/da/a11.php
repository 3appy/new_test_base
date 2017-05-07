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

$lang['C3_00']       = 'Dette job meddelelser er kun p&#229 tysk tilg&#230ngeligt';

$lang['C3_0_header'] = 'Aufgabenstellung f&#252r eine Bachelorarbeit';
$lang['C3_1_header'] = 'Im Bereich Mathematik, technische Informatik oder Medieninformatik';
$lang['C3_1']        = '3appy UG betreibt eine Kommunikationsplattform f&#252r Schulen. Diese dient
neben der Kommunikation auch f&#252r den Austausch von Daten und unterst&#252tzt
die internen Abl&#228ufe einer Schule. Der Stundenplan ist ein Teil dieser Plattform.
Diese Plattform l&#228uft bereits an einigen Schulen, so dass auch ein praktischer
Teil in die Arbeit eingebunden werden kann.';

$lang['C3_2_header'] = 'Aufgabenbeschreibung';
$lang['C3_2']        = 'Basierend auf der Hauptbedingung und den Randbedingungen ist ein Algorithmus
zu entwickeln, der es erm&#246glicht, L&#246sungen f&#252r einen Stundenplan vorzuschlagen,
die sich der Hauptbedingung und den Randbedingungen ann&#228hern.';

$lang['C3_3_header'] = 'Hauptbedingung';
$lang['C3_3']        = 'Definiert man die Klasse, die Lehrkraft sowie den Raum als Ressourcen, so
m&#252ssen zu einem bestimmten Zeitpunkt alle Ressourcen exklusiv zu einer Unterrichtsstunde
zur Verf&#252gung stehen.';

$lang['C3_4_header'] = 'Randbedingungen';
$lang['C3_4']        = 'Alle Randbedingungen sind in der Regel nicht zu erf&#252llen. Deshalb ist es
entscheidend, die Menge der L&#246sungen nach der Abh&#228ngigkeit der Priorit&#228t der
Randbedingungen zu sortieren.
<ul>
<li>Grundschulen d&#252rfen keine unbelegten Stunden im Unterrichtsplan haben</li>
<li>Hauptf&#228cher sollten am Anfang des Tages liegen, praktische F&#228cher am Ende des Tages</li>
<li>Es gibt Unterrichtseinheiten, die zu Doppelstunden gekoppelt sind</li>
<li>F&#252r einige Unterrichtsstunden steht nur ein exklusiver Raum zur Verf&#252gung</li>
<li>Der Stundenplan der Lehrer sollte keine Freistunden aufweisen</li>
</ul>
';

$lang['C3_5_header'] = 'Kontakt';
$lang['C3_5']        = '3appy UG (haftungsbeschr&#228nkt) <br/>
Bernd Schr&#246der <br/>
Email: <a href="mailto:bs@3appy.com?Subject=jobs" target="_top">bs@3appy.com</a><br/>
Tel. 0045 51513829';

$lang['C3_10_header'] = 'Lehramt Masterarbeit';
$lang['C3_11_header'] = 'Integration eines online tools in den Unterrichtsverlauf';
$lang['C3_11']        =
'3appy UG betreibt eine Kommunikationsplattform f&#252r Schulen. Diese dient
neben der Kommunikation auch f&#252r den Austausch von Daten und unterst&#252tzt
die internen Abl&#228ufe einer Schule. Ziel dieser Masterarbeit ist die p&#228dagogische Integration
in den Alltag der Schulablaufes.';

$lang['C3_12_header'] = 'Aufgabenbeschreibung';
$lang['C3_12']        =
'Die Arbeit teilt sich in einen praktischen und einen theoretischen Teil.';

$lang['C3_13_header'] = 'Praktische Teil';
$lang['C3_13']        =
'In dem praktischen Teil nehmen Sie an den Arbeitsabl&#228ufen einer Schule teil.
Sie schulen in Zusammenarbeit mit uns das Schulpersonal ';

$lang['C3_14_header'] = 'Theoretische Teil';
$lang['C3_14']        =
'In dem theoretischen Teil dokumentieren Sie den Prozess der Integration.
Sie analysieren m&ouml;gliche Hinderungsgr&#252de und zeigen die Vor- und Nachteile
eines online Tools auf. ';

$lang['C3_15_header'] = 'Kontakt';
$lang['C3_15']        = '3appy UG (haftungsbeschr&#228nkt) <br/>
Bernd Schr&#246der <br/>
mail. bs@3appy.com <br/>
Tel. 0045 51513829';
?>