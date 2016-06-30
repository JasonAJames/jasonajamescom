<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################

// INITIAL SETTINGS //

// Language to use. (English=en.php .:. Deutsch=de.php .:. Espanol=es.php .:. Greek=gr.php .:. Nederlands=nl.php .:. Turkish=tr.php .:. 简体中文=zh-cn-utf8.php).
$language = "en.php";

// Site name and page title.
$page_title = "Jason James - Printing File Upload";

// PASSWORD PROTECTION SETTINGS //

// I STRONGLY recommend using the built in password protection, unless you are using SSL. I believe it is much more secure than .htaccess or most other password protection scripts. Options.php must be used for the password protection. The passwords cannot be set using the config.php file. Cookies must be enabled.
$password_protect = "on";

// FILE UPLOAD //
// Option to use basic file upload/delete.

// Whether or not the fileupload option is available. on or off.
$fileupload = "on";

// The file upload directory from the domain name. This directory will be automatically created. For instance, if you use "http://YOURDOMAIN.com/testing/files/", the file upload directory will equal: "testing/files"
$fileupload_dir_name = "IEimaging_UploadedFiles/Misc";
$fileupload_AnnouncementEnvelopes_dir_name = "IEimaging_UploadedFiles/AnnouncementEnvelopes";
$fileupload_Bookmarks_dir_name = "IEimaging_UploadedFiles/Bookmarks";
$fileupload_Brochures_dir_name = "IEimaging_UploadedFiles/Brochures";
$fileupload_Bulletins_Inserts_dir_name = "IEimaging_UploadedFiles/Bulletins_Inserts";
$fileupload_BusinessCards_dir_name = "IEimaging_UploadedFiles/BusinessCards";
$fileupload_Catalogs_dir_name = "IEimaging_UploadedFiles/Catalogs";
$fileupload_CD_DVD_Inserts_dir_name = "IEimaging_UploadedFiles/CD_DVD_Inserts";
$fileupload_DoorHangers_dir_name = "IEimaging_UploadedFiles/DoorHangers";
$fileupload_Envelopes_dir_name = "IEimaging_UploadedFiles/Envelopes";
$fileupload_Folders_dir_name = "IEimaging_UploadedFiles/Folders";
$fileupload_Flyers_dir_name = "IEimaging_UploadedFiles/Flyers";
$fileupload_GreetingCards_dir_name = "IEimaging_UploadedFiles/GreetingCards";
$fileupload_Letterhead_dir_name = "IEimaging_UploadedFiles/Letterhead";
$fileupload_Metallics_dir_name = "IEimaging_UploadedFiles/Metallics";
$fileupload_MiniCatalogs_dir_name = "IEimaging_UploadedFiles/MiniCatalogs";
$fileupload_PostCards_dir_name = "IEimaging_UploadedFiles/PostCards";
$fileupload_Posters_dir_name = "IEimaging_UploadedFiles/Posters";
$fileupload_Print_MailPackages_dir_name = "IEimaging_UploadedFiles/Print_Mail_Packages";
$fileupload_PromotionalCards_dir_name = "IEimaging_UploadedFiles/PromotionalCards";
$fileupload_RackCards_dir_name = "IEimaging_UploadedFiles/RackCards";
$fileupload_Stickers_Labels_dir_name = "IEimaging_UploadedFiles/Stickers_Labels";
$fileupload_TableTents_dir_name = "IEimaging_UploadedFiles/TableTents";

// Files to ignore(not list) in the upload directory. ".htaccess" is ignored by default.
$up_ignore1 = "";
$up_ignore2 = "";
$up_ignore3 = "";
$up_ignore4 = "";
$up_ignore5 = "";

// Hide file listing from logged in users. on or off.
$hide = "off";

// Rename File function. on or off.
$rename_file = "on";

// Delete File function. on or off.
$delete_file = "off";

// BASIC SETTINGS //

// Redirect speed for index.php. 1000 = 1 second
$edit_redirect = "5000";

// Redirect speed for options.php. 1000 = 1 second
$admin_redirect = "5000";

//---------------------------------------------------------------//
// You do not need to make changes below, unless you are changing the default directory names or structure.
//---------------------------------------------------------------//

// Whether or not to use the header/footer.
$head = "on";

// Script directory. For instance, if your Upload-Point installation is at "http://YOURDOMAIN.com/testing/upload", then "$textdir = testing/upload".
$textdir = "upload";

// Data directory name (where the password files, created by the script, are stored). Do not change unless you manually change the "data" directory name.
$datadir = "data";

// Path from script directory to webpage directory. Do not change unless you have moved the script directory from the default (http://YOURDOMAIN.COM/upload).
$pagepath = "../";

// Html start tag. The following are only used for Upload-Point script pages.
$p = "<p>";
// Html end tag
$p2 = "</p>";

?>