<?php
########################################################################
# IE Imaging Upload System
# Copyright (C)2008 IE Imaging
# info@ieimaging.com
########################################################################

$l_head3 = "Opties";
$l_head5 = "Upload Bestand";
$l_head6 = "PHP Info";
$l_head7 = "Aangepaste php.ini";

// Options.php
$l_opt8 = "Pas uw <b>Edit-Point</b> installtie hier onder gerust aan.";
$l_opt10 = "U kunt altijd terugkomen naar deze pagina om de instellingen aan te passen. Je instellingen zullen bewaard blijven.";
$l_opt11 = "Naam van de internet pagina en titel van de pagina.";
$l_opt18 = "Wachtwoord beveiliging";
$l_opt19 = "Optie om de ingebouwde wachtwoord beveiliging te gebruiken.";
$l_opt22 = "Het administratie wachtwoord voor <b>Administratie</b> (admin.php) en <b>Opties</b> (options.php).";
$l_opt24 = "Het gebruikers wachtwoord voor de <b>Upload Bestand</b> pagina (upload.php).";
$l_opt25 = "Upload Bestand";
$l_opt26 = "Of de optie \"Upload Bestand\" beschikbaar moet zijn. De \"Upload Bestand\" map zal worden aangemaakt indien die niet bestaat.";
$l_opt26a = "Maak Bestand uploaden directory indexbestand.";
$l_opt26b = "	De optie voor het maken van een index-bestand dat zal ofwel 1) een lijst van de bestanden in een iets meer verheugend wijze dan de standaard server listing of 2) maakt de directory niet-zichtbare en omleidingen de browser naar de domeinnaam. Als er sprake is van een bestaande index bestand, zal het script niet overschrijven.";
$l_opt26c = "Niet zichtbaar of zichtbaar indexbestand.";
$l_opt26d = "Verwijder het bestand uploaden directory index.";
$l_opt26e = "WAARSCHUWING! Dit verwijdert alle bestaande index-bestand in de directory fileupload.";
$l_opt26f = "Het aantal bestanden naar de lijst per pagina.";
$l_opt26g = "Optie om verberg bestand vermelding uit ingelogd gebruiker.";
$l_opt26h = "Upload Bestand :: Index Bestanden";
$l_opt26i = "Upload Bestand :: Gebruiker Beperkingen";
$l_opt26j = "Bestand hernoemen functie.";
$l_opt26k = "Verwijderen Bestand functie.";
$l_opt28 = "De map waar geuploade bestanden in terrecht komen gezien vanaf de domein naam. Deze map zal automatisch worden aangemaakt. Bijvoorbeeld, indien u \"http://www.uw-domein.nl/tests/bestanden/\" gebruikt, zal de upload map zijn: \"tests/bestanden\".";
$l_opt28a = " Deze map wordt automatisch aangemaakt. Bijvoorbeeld, als u gebruik \"http://YOURDOMAIN.com/testing/files/\", het bestand uploaden directory zal gelijk: \"testing/files\".";
$l_opt29 = "Bestanden die verborgen moeten bijven in de upload map. \".htaccess\" wordt standaard genegeerd.";
$l_opt33 = "<b>Aangepaste bestandsgrootte bij uploaden</b> (php.ini).";
$l_opt33a = "Upload Bestand :: PHP Upload Size";
$l_opt34 = "De meeste server laten het toe dat de gerbuiker een aangepaste php.ini</b> de standaard php.ini instellingen overschrijft. Dit is handig indien u de bestandsgrootte wilt aanpassen bij het uploaden. De aangepaste <b>php.ini</b> bevat de volgende code:<br /><b>file_uploads</b> = On<br /><b>post_max_size</b> = *M<br /><b>upload_max_filesize</b> = *M<br /><b>register_globals</b> = On/Off<br /><b>error_log = error_log</b><br /><b>error_reporting</b> = 2039<br /><b>log_errors</b> = On<br />Het is aangeraden de nieuwe <b>\"PHP Info\"</b> te vergelijken met de originele <b>\"PHP Info\"</b> en toevoegingen te doen om de zelfde resultaten te krijgen als de originele php.ini.<br /><br />LET OP!!! Dit zal niet op alle servers werken!!!";
$l_opt35 = "Maak php.ini";
$l_opt42 = "Basis Opties";
$l_opt43 = "De doorverwijs snelheid na het bewerken van een point (index.php). 1000 = 1 seconde";
$l_opt44 = "De doorverwijs snelheid na het cre&euml;eren van een point (admin.php). 1000 = 1 seconde";
$l_opt104 = "Maak Hier Onder Geen Aanpassingen!(tenzij u weet wat u doet)";
$l_opt105 = "<b>Header</b> Of de header/footer gebruikt moeten worden.  LET OP: \"Aan\" is een voorwaarde voor de grafische tekstverwerker. Niet veranderen tenzij u TinyMCE, de grafische tekstverwerker, niet wilt gebruiken.";
$l_opt106 = "<b>Script Map</b> Niet aanpassen tenzij u manueel bewerkt ";
$l_opt109 = "<b>Data Map</b> Waar de .txt bestanden, aangemaakt door het script, worden opgeslagen. Niet aanpassen tenzij u manueel de \"data\" map aanpast of locatie wijzigd.";
$l_opt110 = "<b>Script Locatie</b> Vanaf de script map naar de webpagina map.";
$l_opt111 = "<b>Html start tag</b> Deze worden alleen gebruikt voor de Edit-Point script pagina's.";
$l_opt112 = "<b>Html end tag</b>";
$l_opt113 = "Bewerk uw configuratie";
$l_opt114 = "Uw configuratie is <b><i>succesvol</i></b> opgeslagen.";
$l_opt116 = "Language/Sprache/Lengua/Γλώσσες/Taal/Dil/语言";
$l_opt117 = "English";
$l_opt118 = "Deutsch";
$l_opt119 = "Espa&ntilde;ol";
$l_opt119a = "Nederlands";
$l_opt119b = "简体中文";
$l_opt119c = "Türkçe";
$l_opt119d = "ελληνικα";
$l_opt121 ="is aangemaakt en de permissies zijn gezet op";
$l_opt123 ="Er heeft zich een probleem voorgedaan hierdoor is <b>$fileupload_dir_name</b> niet aangemaakt.";
$l_opt128 = "aleen reset";
$l_opt133 = "Afspeelbaar";
$l_opt134 = "Niet-Afspeelbaar";

// Setup.php
$l_set17 = "Maximale upload bestands grootte. Bijvoorbeeld 55M";
$l_set18 = "Register Globals, aan/uit";
$l_set19 = "Maak aan";
$l_set20 = "<b>PHP.INI</b> aangemaakt!!!";
$l_set21 = "Autmatisch aan het afsluiten...";
$l_set22 = "<b>ER HEEFT ZICH EEN PROBLEEM VOORGEDAAN!!!</b> php.ini is niet aangemaakt!!!";

// Upload.php
$l_upload1 = "Upload Bestand";
$l_upload2 = "Mijn bestanden";
$l_upload3 = "Naam";
$l_upload4 = "Grootte";
$l_upload5 = "Aangepast";
$l_upload6 = "Hernoemen";
$l_upload7 = "Verwijderen";
$l_upload8 = "Locatie";
$l_upload11 = "Bestanden Upload map bestaat niet en het aanmaken is niet gelukt!!!";
$l_upload12 = "veranderen van permissies naar 755 is mislukt!!!";
$l_upload13 = "Succesvol geupload";
$l_upload14 = "Er heeft zich een probleem voorgedaan tijdens het uploaden";
$l_upload15 = "U wordt automatisch doorgestuurd naar de <a href=\"upload.php\">Upload Bestand</a> pagina";
$l_upload18 = "is <b>succesvol</b> verwijderd.";
$l_upload19 = "Kon bestand niet hernoemen";
$l_upload20 = "is <b>succesvol</b> hernoemd naar";
// EDIT
$l_upload21 = "Uploading, please wait...";

// Global
$l_global5 = "Annuleer";
$l_global7 = "Aan";
$l_global8 = "Uit";
$l_global10 = "Succesvol uitgelogd";
$l_global11 = "Doorsturen...";
$l_global12 = "Uitloggen";
$l_global13 = "Voer wachtwoord in";
$l_global14 = "Inloggen";
$l_global17 = "Ja";
$l_global18 = "Nee";
?>