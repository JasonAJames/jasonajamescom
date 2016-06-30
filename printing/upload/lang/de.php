<?php
########################################################################
# IE Imaging Upload System
# Copyright (C)2008 IE Imaging
# info@ieimaging.com
########################################################################

// Header.php
$l_head3 = "Optionen";
$l_head5 = "Dateien Hochladen";
$l_head6 = "PHP Info";
$l_head7 = "Standard php.ini";

// Options.php
$l_opt8 = "Sie k&ouml;nnen <b>Upload-Point</b> nachfolgend Ihren Anspr&auml;chen anpassen.";
$l_opt10 = "Sie knnen diese Seite jederzeit wieder aufrufen, Ihre Einstellungen werden gespeichert.";
$l_opt11 = "Website Name und Seitentitel.";
$l_opt18 = "Passwortschutz";
$l_opt19 = "Eingebauten Passwortschutz nutzen.";
$l_opt22 = "Passwort f&uuml;r <b>Optionen</b> (options.php)";
$l_opt24 = "Passwort f&uuml;r <b>Datei Upload</b> (index.php).";
$l_opt25 = "Datei Upload";
$l_opt26 = "\"Datei Upload\" zulassen/nicht zulassen.";
$l_opt26a = "Erstellen Datei-Upload-Verzeichnis-Index-Datei.";
$l_opt26b = "Die Option zur Erstellung einer Index-Datei, die entweder 1) enthält eine Liste der Dateien in einer ansprechenden Art und Weise etwas mehr als die Standard-Server-Liste oder 2) wird das Verzeichnis nicht sichtbar und leitet den Browser auf die Domain-Namen. Wenn es einen bestehenden Index-Datei, das Skript wird nicht überschreiben.";
$l_opt26c = "Nicht-sichtbare oder Index-Datei angezeigt.";
$l_opt26d = "Löschen Sie die Datei-Upload-Verzeichnis-Index.";
$l_opt26e = "ACHTUNG! Diese löscht alle bestehenden Index-Datei in das Verzeichnis Dateiupload.";
$l_opt26f = "Die Anzahl der Dateien zur Liste pro Seite.";
$l_opt26g = "Option, um sich zu verstecken Datei Auflistung von eingeloggten Benutzer.";
$l_opt26h = "Dateien Hochladen :: Index-Dateien";
$l_opt26i = "Dateien Hochladen :: User Restrictions";
$l_opt26j = "Dateien Umbenennen Funktion.";
$l_opt26k = "Dateien L&ouml;schen Funktion.";
$l_opt28 = "Dateiverzeichnis f&uuml;r Datei Upload. Dieses Verzeichnis wird automatisch erstellt. zB wenn in das Verzeichnis \"http://YOURDOMAIN.com/testing/files/\", zum Beispiel: \"testing/files\".";
$l_opt28a = "Dieses Verzeichnis wird automatisch erstellt. Zum Beispiel, wenn Sie \"http://YOURDOMAIN.com/testing/files/\", die Datei-Upload-Verzeichnis wird gleich: \"testing/files\".";
$l_opt29 = "Dateien welche  nicht angezeigt werden sollen (aus dem Upload-Verzeichnis). \".htaccess\" wird standardm&auml;ssig nicht angezeigt.";
$l_opt33 = "Standard Upload-Dateigr&ouml;sse Einstellungen</b> (php.ini)";
$l_opt33a = "Dateien Hochladen :: PHP Upload Size";
$l_opt34 = "Die mesiten Server erlauben dem Benutzer die <b>php.ini</b> mit einer angepassten php.ini zu &uuml;berschreiben. Dies ist ntzlich falls Sie die Upload Dateigrsse anpassen wollen. Die Standard <b>php.ini</b> Datei hat folgende Linien:<br /><b>file_uploads</b> = On<br /><b>post_max_size</b> = *M<br /><b>upload_max_filesize</b> = *M<br /><b>register_globals</b> = On/Off<br /><b>error_log = error_log</b><br /><b>error_reporting</b> = 2039<br /><b>log_errors</b> = On<br />Es ist empfohlen die neue <b>\"PHP Info\"</b> mit dem Original zu vergleichen<b>\"PHP Info\"</b> und eventuell Anpassungen an der Original php.ini.$p2$p vorzunehmen. Achtung!!! Diese Option steht nicht bei allen Servern zur Verf&uuml;gung!!!";
$l_opt35 = "Erstelle \"php.ini\"";
$l_opt42 = "Standard-Einstellungen";
$l_opt43 = "Umleitungszeit f&uuml;r index.php. 1000 = 1 second";
$l_opt44 = "Umleitungszeit f&uuml;r options.php. 1000 = 1 second";
$l_opt104 = "Bitte ab hier keine &Auml;nderungen vornehmen <br />(AUSSER SIE WISSEN WAS SIE TUN)";
$l_opt105 = "<b>Header</b> Ob header/footer genutzt werden sollen.";
$l_opt106 = "<b>Script Verzeichnis</b> Wenn sich die Upload-Point Installation im Verzeichnis \"http://YOURDOMAIN.com/testing/upload\", dann \"<b>Script Verzeichnis</b> = testing/upload\".";
$l_opt109 = "<b>Daten Verzeichnis </b> wo die passwortschutz files, welche vom Script generiert werden, abgelegt sind. Nicht &auml;ndern ausser das Verzeichnis \"data\" wird manuell angepasst.";
$l_opt110 = "<b>Script Pfad</b> Vom Script Verzeichnis zum Website Verzeichnis.";
$l_opt111 = "<b>Html start tag</b>Diese werden nur in Seiten mit einem Bearbeitungsbereich benutzt.";
$l_opt112 = "<b>Html end tag</b>";
$l_opt113 = "Einstellungen speichern";
$l_opt114 = "Einstellungen <b><i>erfolgreich</i></b> ge&auml;ndert.";
$l_opt116 = "Language/Sprache/Lengua/Γλώσσες/Taal/Dil/语言";
$l_opt117 = "English";
$l_opt118 = "Deutsch";
$l_opt119 = "Espa&ntilde;ol";
$l_opt119a = "Nederlands";
$l_opt119b = "简体中文";
$l_opt119c = "Türkçe";
$l_opt119d = "ελληνικα";
$l_opt121 ="wurde erstellt und die Rechte wurden gesetzt";
$l_opt123 ="Fehler <b>$fileupload_dir_name</b> wurde nicht erstellt.";
$l_opt128 = "zur&uuml;ck setzten";
$l_opt133 = "Sichtbare";
$l_opt134 = "Nicht-Sichtbare";

// Setup.php
$l_set17 = "Maximale Upload Dateigr&ouml;sse. zB.: 55M";
$l_set18 = "Register Globals, ein/aus";
$l_set19 = "Erstellen";
$l_set20 = "<b>PHP.INI</b> wurde erstellt!!!";
$l_set21 = "Automatisch beenden...";
$l_set22 = "<b>Es ist ein Problem aufgetreten!!!</b> php.ini wurde nicht erstellt!!!";

// Upload.php
$l_upload1 = "Datei hochladen";
$l_upload2 = "Meine Dateien";
$l_upload3 = "Name";
$l_upload4 = "Gr&ouml;sse";
$l_upload5 = "Ver&auml;ndert am";
$l_upload6 = "Umbenennen";
$l_upload7 = "L&ouml;schen";
$l_upload8 = "Speicherort";
$l_upload11 = "Das Upload-Verzeichnis ist nicht vorhanden und konnte auch nicht erstellt werden!!!";
$l_upload12 = "Die Rechte konnten nicht auf 755 gesetzt werden.!!!";
$l_upload13 = "erfolgreich hochgeladen";
$l_upload14 = "Beim Hocladen ist ein Fehler aufgetreten";
$l_upload15 = "Sie werden automatisch zu <a href=\"index.php\">Dateien hochladen</a> weitergeleitet";
$l_upload18 = "wurde <b>erfolgreich</b> gel&ouml;scht.";
$l_upload19 = "Datei konnte nicht umbenannt werden";
$l_upload20 = "wurde <b>erfolgreich</b> umbenannt zu";
// EDIT
$l_upload21 = "Uploading, please wait...";

// Global
$l_global5 = "Abbrechen";
$l_global7 = "Ein";
$l_global8 = "Aus";
$l_global10 = "Erfolgreich Abgemeldet";
$l_global11 = "Weiterleitung...";
$l_global12 = "Abmelden";
$l_global13 = "Passwort eingeben";
$l_global14 = "Anmleden";
$l_global17 = "Ja";
$l_global18 = "Nein";
?>
