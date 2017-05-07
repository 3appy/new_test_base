<?php
/*
------------------
Language: English
------------------
*/

$lang = array();

require('menue_includes/top_menue.php');
require('menue_includes/C_left_menue.php');
require('menue_includes/C_top_menue.php');
require('menue_includes/C_right_menue.php');
require('general/send_receive_button.php');

$lang['C3_userfile_disk'] = 'Datei vom Computer';

$lang['C3_form_header']   = 'Importiere CSV-Datei';
$lang['C3_0_1']           =
'<br />Eine CSV ( comma seperated values ) ist eine einfache Textdatei, bei dem die Werte einfach durch Semikolons getrennt sind. Du kannst einen einfachen Editor
nehmen, oder du benutzt ein Tabellenkalkulations Programm und speichert die Datei als CSV ab. Wichtig ist, das der Aufbau der jeweiligen Beispieldatei identisch ist';



$lang['C3_1_0']           = 'Importier Schulstruktur';
$lang['C3_1_1']           = 'Alle Klassen, F&#228cher, Eltern- und Lehrergruppen k&#246nnen hier importiert werden.';
$lang['C3_1_2']           =
'<b>[Elterngruppe; Gruppe; Gruppentyp]</b> <br />
Jede einzelne Gruppe muss einzelnd eingegeben werden. Im Beispiel besitzt die Gruppe Schule 2 Untergruppen mit dem
Namen Klasse1 und Klasse2, Klasse1 besitzt wiederum 2 Untergruppen mit dem Namen Mathe und Englisch. Wir unterscheiden
zwischen einer organisatorischen Gruppe [2], und einer p&#228dagogischen Gruppe [3].<br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';

$lang['C3_1_3']           = 'Beispiel einer Schulstruktur csv - Datei';
$lang['C3_1_4']           =
'Schule;Klasse1;2
Schule;Klasse2;2
Klasse1;Mathe;3
Klasse1;Englisch;3
';
$lang['C3_1_5_0']         = 'Probleme in der Linie: ';
$lang['C3_1_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_1_5_2']         = '<br /><br /> Durch erneutes aktivieren des "senden" buttons werden die Objekte erzeugt und du wirst als Admin eingetragen';
$lang['C3_1_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_2_0']           = 'Importier R&#228ume';
$lang['C3_2_1']           = 'Alle R&#228ume der Schule k&#246nnen hier importiert werden.';
$lang['C3_2_2']           =
'<b>[Raum;Beschreibung]</b><br />
Jeder Raum wird durch eine Kurzbezeichnung definiert werden. Diese Kurzbezeichnung wird sp&#228ter im
Stundenplan mit angezeigt. <br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_2_3']           = 'Beispiel einer Stundenplan csv - Datei';
$lang['C3_2_4']           =
'K1;Klassenraum der 1. Klasse
K2;Klassenraum der 2. Klasse
K3;Klassenraum der 3. Klasse
';
$lang['C3_2_5_0']         = 'Probleme in der Linie: ';
$lang['C3_2_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_2_5_2']         = '';
$lang['C3_2_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_3_0']           = 'Importier Stundenplan';
$lang['C3_3_1']           = 'Alle Schulstunden der einzelnen F&#228chern k&#246nnen hier importiert werden.';
$lang['C3_3_2']           =
'<b>[Klasse;Fach;Startwoche;Raum;Startjahr;Endwoche;Endjahr;Tag;Stunde]</b><br />
Jede einzelne Stunde muss einzelnd eingegeben werden. Im Beispiel besitzt das Fach Mathe 5 Wochenstunden. <br /><br />
In der organisatorische Gruppe von Klasse1 existiert die p&#228dagogische Gruppe Mathe.
Die erste Schulstunde ist von Woche 35 im Jahr 2016 bis Woche 29 im Jahr 2017 definiert, den ersten Tag der Woche ( Montag )
in der 4. Stunde. Alle weitern Mathestunden sind analog zu definieren. <br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_3_3']           = 'Beispiel einer Stundenplan csv - Datei';
$lang['C3_3_4']           =
'Klasse1;Mathe;K1;35;2016;29;2017;1;4
Klasse1;Mathe;K1;35;2016;29;2017;1;5
Klasse1;Mathe;K1;35;2016;29;2017;2;2
Klasse1;Mathe;K1;35;2016;29;2017;3;4
Klasse1;Mathe;K1;35;2016;29;2017;4;1
';
$lang['C3_3_5_0']         = 'Probleme in der Linie: ';
$lang['C3_3_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_3_5_2']         = '';
$lang['C3_3_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_4_0']           = 'Importier Mitglieder';
$lang['C3_4_1']           = 'Alle Mitglieder k&#246nnen hier importiert werden.';
$lang['C3_4_2']           =
'<b>[Vorname;Nachname;Email;Passwort]</b> <br />
Das System ben&#246gt eigentlich nur den Vornamen, den Nachnamen und die Email - Adresse.
Das vom System generierte Password wird dann zur angegebenen Email - Adresse verschickt.
Ist die Email - Adresse keine reale Adresse, so braucht das Profil ein tempor&#228res Passwort.<br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_4_3']           = 'Beispiel einer Administratoren csv - Datei';
$lang['C3_4_4']           =
'Vorname;Nachname;Vorname_Nachname@3appy.com;Vorname_Nachname@3appy.com
Vorname;Nachname;Vorname_Nachname@3appy.com;Vorname_Nachname@3appy.com
Vorname;Nachname;Vorname_Nachname@3appy.com;Vorname_Nachname@3appy.com
Vorname;Nachname;Vorname_Nachname@3appy.com;Vorname_Nachname@3appy.com
';
$lang['C3_4_5_0']         = 'Probleme in der Linie: ';
$lang['C3_4_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_4_5_2']         = '<br /><br /> Durch erneutes aktivieren des "senden" buttons werden die Objekte erzeugt und du wirst als Admin eingetragen';
$lang['C3_4_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_5_0']           = 'Verbinde Administratoren';
$lang['C3_5_1']           = 'Alle Administratoren (Schulpersonal) k&#246nnen hier mit den ensprechenden Gruppen verbunden werden.';
$lang['C3_5_2']           =
'<b>[Schule; Klasse / Gruppe; Admin]</b> |  <b>[Klasse; Fach; Admin]</b> <br />
Der Administrator einer Schule sollte eine bevollm&#228chtigte Person wie Schulleiter oder IT-Person sein.
Der Administrator einer Klasse ist in der Regel der Klassenlehrer, der Administrator eines Faches ist der
entsprechende Fachlehrer. Dabei k&#246nnen auch mehrere Lehrer ( Administratoren ) einer Gruppe zugewiesen werden
Als eindeutige Identifikation wird hier die Email Adresse des Administrators eingegeben. <br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_5_3']           = 'Beispiel einer Administratoren csv - Datei';
$lang['C3_5_4']           =
'Schule;Klasse1;email@Lehrer
Schule;Klasse2;email@Lehrer2
Klasse1;Mathe;email@Lehrer1
Klasse1;Englisch;email@Lehrer2
';
$lang['C3_5_5_0']         = 'Probleme in der Linie: ';
$lang['C3_5_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_5_5_2']         = '<br /><br /> Durch erneutes aktivieren des "senden" buttons werden die Objekte erzeugt und du wirst als Admin eingetragen';
$lang['C3_5_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_6_0']           = 'Verbinde Mitglieder';
$lang['C3_6_1']           = 'Alle Mitglieder (Eltern, Sch&#252ler) k&#246nnen hier mit den ensprechenden Gruppen verbunden werden.';
$lang['C3_6_2']           =
'<b>[Schule; Klasse / Gruppe; Mitglied]</b> | <b>[Klasse; Fach; Mitglied]</b> <br />
Die Miglieder einer Gruppe werden unter der Schule einer Klasse oder Gruppe zugewiesen, dieses k&#246nnten z. Bsp. Sch&#252ler,
Eltern oder Projektbeteiligte sein. Diese Zuweisung kann man auch f&#252r F&#228cher oder andere Untergruppen vornehmen. Der Schule
und den Gruppen oder F&#228chern kann man n Mitglieder zuweisen, diese m&#252ssen jedoch einzelnd aufgef&#252hrt werden.
Als eindeutige Identifikation wird hier die Email Adresse des Mitgliedes eingegeben.<br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_6_3']           = 'Beispiel einer Mitglieder csv - Datei';
$lang['C3_6_4']           =
'Schule;Klasse1;email@Mitglied1
Schule;Klasse2;email@Mitglied2
Klasse1;Mathe;email@Mitglied1
Klasse1;Englisch;email@Mitglied1
';
$lang['C3_6_5_0']         = 'Probleme in der Linie: ';
$lang['C3_6_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_6_5_2']         = '<br /><br /> Durch erneutes aktivieren des "senden" buttons werden die Objekte erzeugt und du wirst als Admin eingetragen';
$lang['C3_6_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/

$lang['C3_7_0']           = 'Importier Verbindungen';
$lang['C3_7_1']           = 'Alle Verbindungen von Eltern zu Sch&#252lern k&#246nnen hier importiert werden.';
$lang['C3_7_2']           =
'<b>[Email Elternteil;Email Sch&#252ler]</b> <br />
Die Verbindung zwischen einem Elternprofil und einem Sch&#252lerprofil kann hier vorgenommen werden.
Dabei reicht es aus die Email des Elternprofils mit der Email des Sch&#252lerprofils in einer Reihe
zu definieren.<br /><br />
Die Datei, die du jetzt hochl&#228dst wird zus&#228tzlich in deinem Profil gespeichert.';
$lang['C3_7_3']           = 'Beispiel einer Verbindungen csv - Datei';
$lang['C3_7_4']           =
'Email@Elternteil1;Email@Sch&#252ler1
Email@Elternteil2;Email@Sch&#252ler2
Email@Elternteil3;Email@Sch&#252ler3
';
$lang['C3_7_5_0']         = 'Probleme in der Linie: ';
$lang['C3_7_5_1']         = 'Deine Datei ergibt folgenden Inhalt: <b> Anzahl der erzeugten Objekte:</b> ';
$lang['C3_7_5_2']         = '<br /><br /> Durch erneutes aktivieren des "senden" buttons werden die Objekte erzeugt und du wirst als Admin eingetragen';
$lang['C3_7_6']           = 'Deine hochgeladene csv - Datei';

/***********************************************************************/


?>
