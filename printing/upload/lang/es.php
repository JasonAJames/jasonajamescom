<?php
########################################################################
# IE Imaging Upload System
# Copyright (C)2008 IE Imaging
# info@ieimaging.com
########################################################################

// Header.php
$l_head3 = "Opciones";
$l_head5 = "Archivo Upload";
$l_head6 = "PHP Info";
$l_head7 = "Custom php.ini";

// Options.php
$l_opt8 = "Se puede cambiar la <b>Edit-Point</b> instalacion siguiente.";
$l_opt10 = "Puedes volver a esta pagina en cualquie momento para hacer cambios y tus ajustes seran recordados.";
$l_opt11 = "Nombre del site y titulo de la pagina.";
$l_opt18 = "Proteccion del Password";
$l_opt19 = "Opcion para usar la proteccion de password incorporado.";
$l_opt22 = "El password del administrador <b>Options</b> (options.php)";
$l_opt24 = " El password del usuario para el <b>File Upload</b> (index.php).";
$l_opt25 = "Archivo Upload";
$l_opt26 = "Aunque la opcion del  \"File upload\" sea disponible. El directorio del \"File Upload\" sera creado si no existe.";
$l_opt26a = "Crear Archivo Subir directorio de archivo de índice.";
$l_opt26b = "La opción de crear un índice de archivos de esta manera a 1) las listas de archivos de una manera un poco más agradable que el servidor por defecto o la lista 2) hace que el directorio no visibles y redirecciona el navegador para que el nombre de dominio. Si existe un archivo de índice, el guión no sobrescribirlo.";
$l_opt26c = "No ver o ver archivo de índice.";
$l_opt26d = "Eliminar el directorio índice de la subida de archivos.";
$l_opt26e = "ADVERTENCIA! Esto eliminará cualquier archivo existente en el índice fileupload directorio.";
$l_opt26f = "El número de archivos a la lista por página.";
$l_opt26g = "Opción para ocultar archivo de lista de usuario conectado.";
$l_opt26h = "Archivo Subir:: Índice de Archivos";
$l_opt26i = "Archivo Subir:: Restricciones de usuario";
$l_opt26j = "Cambiar nombre de la función de archivo.";
$l_opt26k = "Eliminar la función de archivo.";
$l_opt28 = "El directorio de subir ficheros del nombre domain. Este directorio sera automaticamente creado. Por ejemplo, si usa \"http://YOURDOMAIN.com/testing/files/\", El directorio de subir ficheros sera igual a : \"testing/files\".";
$l_opt28a = " Este directorio se creará automáticamente. Por ejemplo, si usa el \"http://YOURDOMAIN.com/testing/files/\", la subida de archivos de directorio será igual a: \"testing/files\".";
$l_opt29 = "Ficheros a ignorer (que no sea una lista) en el directorio de subir fichas. \".htaccess\" se ignora.";
$l_opt33 = "Ajustes de tamano de Ficha se a subir</b> (php.ini)";
$l_opt33a = "Archivo Subir:: PHP tamaño de subida";
$l_opt34 = "la majoria de los servidores dejan al usuario crear <b>php.ini</b> una ficha para invalidar  los ajustes php.ini por defecto. Esto puede ser conveniente si quieres incrementar el tamano de subida a subir size upload limits. The custom <b>php.ini</b> file tiene las siguientes lineas:<br /><b>file_uploads</b> = On<br /><b>post_max_size</b> = *M<br /><b>upload_max_filesize</b> = *M<br /><b>register_globals</b> = On/Off<br /><b>error_log = error_log</b><br /><b>error_reporting</b> = 2039<br /><b>log_errors</b> = On<br />Es recomendado comparer los resultados<b>\"PHP Info\"</b> con los resultados  originales <b>\"PHP Info\"</b> y anadir lo necesario para que coincide con el original php.ini.<br /><br />Note!!! Esto puede que no funcione en todos los servidores!!!";
$l_opt35 = "Crear \"php.ini\"";
$l_opt42 = "Ajustes basicos";
$l_opt43 = "La velocidad de redireccion despues de editar un punto (index.php). 1000 = 1 second";
$l_opt44 = " La velocidad de redireccion despues de crear un punto (admin.php). 1000 = 1 second";
$l_opt104 = "No cambiar debajo (a menos que sabes lo que est&aacute;s haciendo)";
$l_opt105 = "<b>Header/Footer.</b> Si o no utilizar el jefe/el pie.  NOTA: \"EN\" se requiere para la opci&oacute;n del WYSIWYG. No cambiar a menos que no desees utilizar TinyMCE, el redactor del WYSIWYG.";
$l_opt106 = "<b>Directorio de la escritura</b> Por ejemplo, si tu instalaci&oacute;n de Upload-Point est&aacute; en el \"http://YOURDOMAIN.com/testing/upload\", entonces \"<b>Directorio de la escritura</b> = testing/upload\".";
$l_opt109 = "<b>Directorio de datos</b> Donde password archiva, creado por la escritura, se almacenan. No cambiar a menos que cambies manualmente el nombre o la localizaci&oacute;n de directorio de los \"datos\".";
$l_opt110 = "<b>Trayectoria de la escritura</b> De directorio de la escritura al directorio del Webpage.";
$l_opt111 = "<b>Html start tag</b> &Eacute;stos se utilizan solamente para las p&aacute;ginas de la escritura del Upload-Point.";
$l_opt112 = "<b>Html end tag</b>";
$l_opt113 = "Corregir tu configuraci&oacute;n";
$l_opt114 = "Tu configuraci&oacute;n <b><i>succesfully</i></b> fue ahorrada.";
$l_opt116 = "Language/Sprache/Lengua/Γλώσσες/Taal/Dil/语言";
$l_opt117 = "English";
$l_opt118 = "Deutsch";
$l_opt119 = "Espa&ntilde;ol";
$l_opt119a = "Nederlands";
$l_opt119b = "简体中文";
$l_opt119c = "Türkçe";
$l_opt119d = "ελληνικα";
$l_opt121 ="se ha creado y los permisos se han fijado a";
$l_opt123 ="Hab&iacute;a un problema y <b>$fileupload_dir_name</b> no fue creado.";
$l_opt128 = "reajuste solamente";
$l_opt133 = "Visible";
$l_opt134 = "No Visible";

// Setup.php
$l_set17 = "Tama&ntilde;o m&aacute;ximo del upload del archivo. Por ejemplo: los 55M";
$l_set18 = "Register Globals, con./desc.";
$l_set19 = "Crear";
$l_set20 = "<b>PHP.INI</b> cre&oacute;!!!";
$l_set21 = "Autom&aacute;ticamente cerr&aacute;ndose...";
$l_set22 = "<b>¡HAB&Iacute;A UN PROBLEMA!!!</b> php.ini no fue creado!!!";

// Upload.php
$l_upload1 = "Archivo del Upload";
$l_upload2 = "Mis Archivos";
$l_upload3 = "Nombre";
$l_upload4 = "Tama&ntilde;o";
$l_upload5 = "Modificado";
$l_upload6 = "Retitular";
$l_upload7 = "Cancelaci&oacute;n";
$l_upload8 = "Localizaci&oacute;n";
$l_upload11 = "los archivos del upload que no existe el directorio y creaci&oacute;n fallaron!!!";
$l_upload12 = "cambiar el permiso a 755 fallados!!!";
$l_upload13 = "Uploaded con &eacute;xito";
$l_upload14 = "Hab&iacute;a un problema uploading";
$l_upload15 = "Autom&aacute;ticamente volviendo a dirigir a la <a href=\"upload.php\">Upload-Page</a>";
$l_upload18 = "<b>succesfully</b> fue suprimido.";
$l_upload19 = "No pod&iacute;a retitular el archivo";
$l_upload20 = "<b>succesfully</b> fue retitulado a";
// EDIT
$l_upload21 = "Uploading, please wait...";

// Global
$l_global5 = "Cancelaci&oacute;n";
$l_global7 = "En";
$l_global8 = "De";
$l_global10 = "Registrado con &eacute;xito hacia fuera";
$l_global11 = "El volver a dirigir...";
$l_global12 = "Logout";
$l_global13 = "Incorpore La Contrase&ntilde;a";
$l_global14 = "Conexi&oacute;n";
$l_global17 = "S&iacute;";
$l_global18 = "No";
?>