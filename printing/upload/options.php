<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################
// Config.php is the main configuration file.
include('config.php');
// Password file.
if (is_file("$datadir/admin_pass.php")) {
include ("$datadir/admin_pass.php");
}
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
//$logout = "options.php";
//$page_name = "options";

// Password protection.
// Random string generator.
function randomstring($length){
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$string  = $chars{ rand(0,62) };
	for($i=1;$i<$length;$i++){
		$string .= $chars{ rand(0,62) };
	}
	return $string;
}
if ($password_protect == "on") {
	session_start();
	if(!empty($_POST['pass_hash_admin'])) {
		// Crypt, hash, and store password in session.
		$_SESSION['pass_hash_admin'] = crypt(md5($_POST['pass_hash_admin']), md5($_POST['pass_hash_admin']));
		// Crypt random string with random string seed for agent response.
		$string_agent = crypt($_SESSION['random'], $_SESSION['random']);
		// Hash crypted random string for random string response.
		$string_string = md5($string_agent);
		// Hash and concatenate md5/crypted random string and password hash posts.
		$string_response = md5($string_string . $_POST['pass_hash2']);
		// Concatenate agent and language.
		$agent_lang = getenv('HTTP_USER_AGENT') . getenv('HTTP_ACCEPT_LANGUAGE');
		// Hash crypted agent/language concatenate with random string seed for check against post.
		$agent_response = md5(crypt(md5($agent_lang), $string_agent));
	// Check crypted pass against stored pass. Check random string and pass hashed concatenate against post. Check hashed and crypted agent/language concatenate against post.
	} if (($_SESSION['pass_hash_admin'] != $admin_password) || ($_POST['pass_string_hash'] != $string_response) || ($_POST['agenthash'] != $agent_response)) {
		// Otherwise, give login.
		if ($head == "on") {
			include("header.php");
		}
		// Set random string session.
		$_SESSION['random'] = randomstring(40);
		// Crypt random string with random string seed.
		$rand_string = crypt($_SESSION['random'], $_SESSION['random']);
		// Concatenate agent and language.
		$agent_lang = getenv('HTTP_USER_AGENT').getenv('HTTP_ACCEPT_LANGUAGE');
		// Crypt agent and language with random string seed for form submission.
		$agent = crypt(md5($agent_lang), $rand_string);
		// Form md5 and encrypt javascript.
		echo "$p
		<b>$l_global13</b>
		$p2
		<script type=\"text/javascript\" src=\"$datadir/crypt/sha256.js\"></script>
		<script type=\"text/javascript\" src=\"$datadir/crypt/md5.js\"></script>
		<script type=\"text/javascript\">
		function obfuscate() {
			document.form1.pass_hash_admin.value = hex_sha256(document.form1.pass_admin.value);
			document.form1.pass_hash2.value = hex_md5(document.form1.pass_admin.value);
			document.form1.string_hash.value = hex_md5(document.form1.string.value);
			document.form1.pass_string_hash.value =  hex_md5(document.form1.string_hash.value  + document.form1.pass_hash2.value);
			document.form1.agenthash.value = hex_md5(document.form1.agent.value);
			document.form1.pass_admin.value = \"\";
			document.form1.string.value = \"\";
			document.form1.agent.value = \"\";
			document.form1.jscript.value = \"on\";
			return true;
		}
		</script>
		<form action=\"options.php\" method=\"post\" name=\"form1\" onsubmit=\"return obfuscate()\">
		$p
		<input name=\"jscript\" type=\"hidden\" value=\"off\" />
		<input name=\"pass_hash_admin\" type=\"hidden\" value=\"\" />
		<input name=\"pass_hash2\" type=\"hidden\" value=\"\" />
		<input name=\"string_hash\" type=\"hidden\" value=\"\" />
		<input name=\"pass_string_hash\" type=\"hidden\" value=\"\" />
		<input name=\"agenthash\" type=\"hidden\" value=\"\" />
		<input name=\"string\" type=\"hidden\" value=\"$rand_string\" />
		<input name=\"agent\" type=\"hidden\" value=\"$agent\" />
		<input type=\"password\" name=\"pass_admin\" />
		<input type=\"submit\" value=\"$l_global14\" />
		$p2
		</form>";
		if ($head == "on") {
			include("footer.php");
		}
		exit();
	}
} else {
}
// End password protection.

// Web-based editor for config.php.
function options () {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "options.php";
$page_name = "options";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}
// Select box code.
if ($language == "en.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\" selected=\"selected\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "de.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\" selected=\"selected\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "es.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\" selected=\"selected\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "gr.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\" selected=\"selected\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "nl.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\" selected=\"selected\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "tr.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\" selected=\"selected\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\">$l_opt119b</option>
</select>";
} elseif ($language == "zh-cn-utf8.php") {
	$language2 = "<select name=\"opt_language\">
<option value=\"en.php\">$l_opt117</option>
<option value=\"de.php\">$l_opt118</option>
<option value=\"es.php\">$l_opt119</option>
<option value=\"gr.php\">$l_opt119d</option>
<option value=\"nl.php\">$l_opt119a</option>
<option value=\"tr.php\">$l_opt119c</option>
<option value=\"zh-cn-utf8.php\" selected=\"selected\">$l_opt119b</option>
</select>";
}
if ($password_protect == "on") {
	$password_protect2 = "<select name=\"opt_password_protect\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($password_protect == "off") {
	$password_protect2 = "<select name=\"opt_password_protect\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}
if ($fileupload == "on") {
	$fileupload2 = "<select name=\"opt_fileupload\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($fileupload == "off") {
	$fileupload2 = "<select name=\"opt_fileupload\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}
if ($hide == "on") {
	$hide2 = "<select name=\"opt_hide\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($hide == "off") {
	$hide2 = "<select name=\"opt_hide\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}
if ($rename_file == "on") {
	$rename_file2 = "<select name=\"opt_rename_file\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($rename_file == "off") {
	$rename_file2 = "<select name=\"opt_rename_file\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}
if ($delete_file == "on") {
	$delete_file2 = "<select name=\"opt_delete_file\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($delete_file == "off") {
	$delete_file2 = "<select name=\"opt_delete_file\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}
if ($head == "on") {
	$head2 = "<select name=\"opt_head\">
<option value=\"on\" selected=\"selected\">$l_global7</option>
<option value=\"off\">$l_global8</option>
</select>";
} elseif ($head == "off") {
	$head2 = "<select name=\"opt_head\">
<option value=\"on\">$l_global7</option>
<option value=\"off\" selected=\"selected\">$l_global8</option>
</select>";
}

// Password on/off check and reset or use existing password.
if (empty($admin_password)) {
	$admin_empty_pass = "false";
} else {
	$admin_empty_pass = "true";
}
if (empty($upload_password)) {
	$upload_empty_pass = "false";
} else {
	$upload_empty_pass = "true";
}
if (($password_protect == "on") && ($admin_empty_pass == "false")) {
	$admin_pass_reset = "<input type=\"password\" name=\"opt_empty_admin_password\" value=\"\" /> <i>($l_opt128)</i>";
} else {
	$admin_pass_reset = "<input type=\"password\" name=\"opt_empty_admin_password\" value=\"\" />";
}
if (($password_protect == "on") && ($upload_empty_pass == "false")) {
	$upload_pass_reset = "<input type=\"password\" name=\"opt_empty_upload_password\" value=\"\" /> <i>($l_opt128)</i>";
} else {
	$upload_pass_reset = "<input type=\"password\" name=\"opt_empty_upload_password\" value=\"\" />";
}
if ($password_protect = "on") {
	$pass_jscript = "<script language=\"JavaScript\" type=\"text/javascript\" src=\"$datadir/crypt/sha256.js\"></script>
	<script language=\"JavaScript\" type=\"text/javascript\">
	function passcreate() {
		document.form2.pwdhashadmin.value = hex_sha256(document.form2.opt_empty_admin_password.value);
		document.form2.pwdhashupload.value = hex_sha256(document.form2.opt_empty_upload_password.value);
		document.form2.opt_empty_admin_password.value = \"\";
		document.form2.opt_empty_upload_password.value = \"\";
		document.form2.jscript2.value = \"on\";
		return true;
	}
	</script>
	<form action=\"options.php\" method=\"post\" name=\"form2\" onsubmit=\"return passcreate()\">
	$p
	<input name=\"jscript2\" type=\"hidden\" value=\"off\" />
	<input name=\"pwdhashadmin\" type=\"hidden\" value=\"\" />
	<input name=\"pwdhashupload\" type=\"hidden\" value=\"\" />
	<input type=\"hidden\" name=\"cmd\" value=\"options2\" />";
} else {
	$pass_jscript = $p;
}
// Options page text/html.
echo "
$pass_jscript
$l_opt8
$p2
$p
$l_opt10
$p2
$p
$l_opt116
<br />
$language2
$p2
$p
$l_opt11
<br />
<input type=\"text\" name=\"opt_page_title\" value=\"$page_title\" />
$p2
<hr />
<h1>$l_opt18</h1>
$p
$l_opt19
<br /><br />
$password_protect2
$p2
$p
$l_opt22
<br />
$admin_pass_reset
$p2
$p
$l_opt24
<br />
$upload_pass_reset
$p2
<hr />
<h1>$l_opt25</h1>
$p
$l_opt26
<br />
$fileupload2
$p2
<div id =\"option_popup\">
$l_opt28 <a href=\"#option_popup\">?<span>$p$l_opt28a$p2</span></a>
<br />
<input type=\"text\" name=\"opt_fileupload_dir_name\" value=\"$fileupload_dir_name\" />
</div>
$p
$l_opt29
<br />
<input type=\"text\" name=\"opt_up_ignore1\" value=\"$up_ignore1\" />
<input type=\"text\" name=\"opt_up_ignore2\" value=\"$up_ignore2\" />
<input type=\"text\" name=\"opt_up_ignore3\" value=\"$up_ignore3\" />
<input type=\"text\" name=\"opt_up_ignore4\" value=\"$up_ignore4\" />
<input type=\"text\" name=\"opt_up_ignore5\" value=\"$up_ignore5\" />
$p2
<hr />
<h2>$l_opt26i</h2>
$p
$l_opt26j
<br />
$rename_file2
$p2
$p
$l_opt26k
<br />
$delete_file2
$p2
$p
$l_opt26g
<br />
$hide2
$p2
<hr />
<h2>$l_opt26h</h2>
<div id =\"option_popup\">
$l_opt26a <a href=\"#option_popup\">?<span>$p$l_opt26b$p2</span></a>
<br />
<select name=\"fileindex\">
<option value=\"yes\">$l_global17</option>
<option value=\"no\" selected=\"selected\">$l_global18</option>
</select>
</div>
$p
$l_opt26c
<br />
<select name=\"fileindexview\">
<option value=\"viewable\" selected=\"selected\">$l_opt133</option>
<option value=\"nonviewable\">$l_opt134</option>
</select>
$p2
<div id =\"option_popup\">
$l_opt26d <a href=\"#option_popup\">?<span>$p$l_opt26e$p2</span></a>
<br />
<select name=\"fileindexdelete\">
<option value=\"yes\">$l_global17</option>
<option value=\"no\" selected=\"selected\">$l_global18</option>
</select>
</div>
<hr />
<h2>$l_opt33a</h2>
<div id =\"option_popup\">
<b>$l_opt33 <a href=\"#option_popup\">?<span>$p$l_opt34$p2</span></a>
</div>
$p
<a href=\"options.php?cmd=setup1\" onclick=\"javascript:window.open(this.href, &#39;php_ini&#39;, &#39;scrollbars=1, location=1, status=1, width=600, height=400, left=175, top=100&#39;); return false;\" title=\"Create php.ini\">$l_opt35</a>
$p2
<hr />
<h1>$l_opt42</h1>
$p
$l_opt43
<br />
<input type=\"text\" name=\"opt_edit_redirect\" value=\"$edit_redirect\" />
$p2
$p
$l_opt44
<br />
<input type=\"text\" name=\"opt_admin_redirect\" value=\"$admin_redirect\" />
$p2
<hr />
<h1>$l_opt104</h1>
$p
$head2 $l_opt105
<br />
<input type=\"text\" name=\"opt_textdir\" value=\"$textdir\" /> $l_opt106
<br />
<input type=\"text\" name=\"opt_datadir\" value=\"$datadir\" /> $l_opt109
<br />
<input type=\"text\" name=\"opt_pagepath\" value=\"$pagepath\" /> $l_opt110
<br />
<input type=\"text\" name=\"opt_p\" value=\"$p\" /> $l_opt111
<br />
<input type=\"text\" name=\"opt_p2\" value=\"$p2\" /> $l_opt112
$p2
$p
<input name=\"submit\" type=\"submit\" value=\"Edit\" /> : $l_opt113
$p2
</form>";
// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

// Write changes to config.php.
function options2($jscript2, $pwdhashadmin, $pwdhashupload, $opt_language, $opt_page_title, $opt_password_protect, $opt_admin_password, $opt_upload_password, $opt_empty_admin_password, $opt_empty_upload_password, $opt_fileupload, $opt_fileupload_dir_name, $opt_up_ignore1, $opt_up_ignore2, $opt_up_ignore3, $opt_up_ignore4, $opt_up_ignore5, $opt_hide, $opt_rename_file, $opt_delete_file, $fileindex, $fileindexview, $fileindexdelete, $opt_edit_redirect, $opt_admin_redirect, $opt_head, $opt_textdir, $opt_datadir, $opt_pagepath, $opt_p, $opt_p2) {

$page_name = "opt_redirect";
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
//include ("$datadir/admin_pass.php");
// Name of page for links, title, and logout.
$logout = "options.php";
// Include header if "on" in config.php.
if ($opt_head == "on") {
	include("header.php");
}

// "Nasty" workarounds for html output.
$language = '$language';
$page_title = '$page_title';
$password_protect = '$password_protect';
$admin_password = '$admin_password';
$upload_password = '$upload_password';
$fileupload = '$fileupload';
$upload_process = '$upload_process';
$fileupload_dir_name = '$fileupload_dir_name';
$up_ignore1 = '$up_ignore1';
$up_ignore2 = '$up_ignore2';
$up_ignore3 = '$up_ignore3';
$up_ignore4 = '$up_ignore4';
$up_ignore5 = '$up_ignore5';
$hide = '$hide';
$rename_file = '$rename_file';
$delete_file = '$delete_file';
$edit_redirect = '$edit_redirect';
$admin_redirect = '$admin_redirect';
$head = '$head';
$textdir = '$textdir';
$datadir = '$datadir';
$pagepath = '$pagepath';
$p = '$p';
$p2 = '$p2';

// Password storage manipulation.
$admin_emptypass_test = crypt(md5($pwdhashadmin), md5($pwdhashadmin));
if ($admin_emptypass_test == "faPhwPDI5p8Ho") {
	$admin_pass_exist = "false";
} else {
	$admin_pass_exist = "true";
}
if (($opt_password_protect == "on") && ($admin_pass_exist == "true")) {
$store_admin_password = crypt(md5($pwdhashadmin), md5($pwdhashadmin));
$admin_comments = "<?php $admin_password = '$store_admin_password'; ?>";
$open = fopen("$opt_datadir/admin_pass.php", 'wb');
fwrite($open, $admin_comments);
fclose($open);
} else {
}
$upload_emptypass_test = crypt(md5($pwdhashupload), md5($pwdhashupload));
if ($upload_emptypass_test == "faPhwPDI5p8Ho") {
	$upload_pass_exist = "false";
} else {
	$upload_pass_exist = "true";
}
if (($opt_password_protect == "on") && ($upload_pass_exist == "true")) {
$store_upload_password = crypt(md5($pwdhashupload), md5($pwdhashupload));
$upload_comments = "<?php $upload_password = '$store_upload_password'; ?>";
$open = fopen("$opt_datadir/upload_pass.php", 'wb');
fwrite($open, $upload_comments);
fclose($open);
} else {
}

// Html created for config.php editing.
$edit_config = "<?php
########################################################################
# Upload-Point 1.6 Beta - Simple Upload System
# Copyright (c)2005-2008 Todd Strattman
# strattman@gmail.com
# http://covertheweb.com/upload-point/
# License: LGPL
########################################################################

// INITIAL SETTINGS //

// Language to use. (English=en.php .:. Deutsch=de.php .:. Espanol=es.php .:. Greek=gr.php .:. Nederlands=nl.php .:. Turkish=tr.php .:. 简体中文=zh-cn-utf8.php).
$language = \"$opt_language\";

// Site name and page title.
$page_title = \"$opt_page_title\";

// PASSWORD PROTECTION SETTINGS //

// I STRONGLY recommend using the built in password protection, unless you are using SSL. I believe it is much more secure than .htaccess or most other password protection scripts. Options.php must be used for the password protection. The passwords cannot be set using the config.php file. Cookies must be enabled.
$password_protect = \"$opt_password_protect\";

// FILE UPLOAD //
// Option to use basic file upload/delete.

// Whether or not the fileupload option is available. on or off.
$fileupload = \"$opt_fileupload\";

// The file upload directory from the domain name. This directory will be automatically created. For instance, if you use \"http://YOURDOMAIN.com/testing/files/\", the file upload directory will equal: \"testing/files\"
$fileupload_dir_name = \"$opt_fileupload_dir_name\";

// Files to ignore(not list) in the upload directory. \".htaccess\" is ignored by default.
$up_ignore1 = \"$opt_up_ignore1\";
$up_ignore2 = \"$opt_up_ignore2\";
$up_ignore3 = \"$opt_up_ignore3\";
$up_ignore4 = \"$opt_up_ignore4\";
$up_ignore5 = \"$opt_up_ignore5\";

// Hide file listing from logged in users. on or off.
$hide = \"$opt_hide\";

// Rename File function. on or off.
$rename_file = \"$opt_rename_file\";

// Delete File function. on or off.
$delete_file = \"$opt_delete_file\";

// BASIC SETTINGS //

// Redirect speed for index.php. 5000 = 5 second
$edit_redirect = \"$opt_edit_redirect\";

// Redirect speed for options.php. 5000 = 5 second
$admin_redirect = \"$opt_admin_redirect\";

//---------------------------------------------------------------//
// You do not need to make changes below, unless you are changing the default directory names or structure.
//---------------------------------------------------------------//

// Whether or not to use the header/footer.
$head = \"$opt_head\";

// Script directory. For instance, if your Upload-Point installation is at \"http://YOURDOMAIN.com/testing/upload\", then \"textdir = testing/upload\".
$textdir = \"$opt_textdir\";

// Data directory name (where the password files, created by the script, are stored). Do not change unless you manually change the \"data\" directory name.
$datadir = \"$opt_datadir\";

// Path from script directory to webpage directory. Do not change unless you have moved the script directory from the default (http://YOURDOMAIN.COM/upload).
$pagepath = \"$opt_pagepath\";

// Html start tag. The following are only used for Upload-Point script pages.
$p = \"$opt_p\";
// Html end tag
$p2 = \"$opt_p2\";

?>";

// Save config.php settings.
$edit_config = stripslashes($edit_config);
$openlink = fopen('config.php', 'w');
fwrite($openlink, $edit_config);
fclose($openlink);

// Start file directory creation.
if ($opt_fileupload == "on") {
	// File directory path.
	$file_path_dir = ($_SERVER['DOCUMENT_ROOT'] . "/$opt_fileupload_dir_name");
	// File directory check/create.
	if (is_dir ($_SERVER['DOCUMENT_ROOT'] . "/$opt_fileupload_dir_name")) {
		$filedir_exist = "true";
	} else {
		$filedir_exist = "false";
	}
	// Create file directory if it doesn't exist.
	if ($filedir_exist == "false") {
		mkdir ($file_path_dir, 0755);
		if (is_dir ($_SERVER['DOCUMENT_ROOT'] . "/$opt_fileupload_dir_name")) {
		echo "$opt_p<b>$opt_fileupload_dir_name</b> $l_opt121 755.$opt_p2";
		} else {
		echo "$p $l_opt123$p2";
		}
	} else {
	}
}

// Path for index file.
$indexpath = ("http://" . $_SERVER["HTTP_HOST"] . "/$opt_textdir/");
$indextitle = $_SERVER["HTTP_HOST"];
// Create index file in file or image upload directory.
$fileupload_index_viewable = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type = "text/css">
body {
	background: #fff;
	color: #333;
	margin: 10px;
	padding: 0;
	font-family: verdana, arial, helvetica, sans-serif;
	font-size: 10px;
}
.main {
	margin-left: auto;
	margin-right: auto;
	width: 75%;
	border: 1px solid #ccc;
	text-align: center;
}
.uploadlistname {
	border: 1px solid #ccc;
	width: 100px;
	text-align: center;
}
.uploadlistsize {
	border: 1px solid #ccc;
	width: 100px;
	text-align: center;
}
.uploadlistmod {
	border: 1px solid #ccc;
	width: 175px;
	text-align: center;
}
a:link, a:visited, a:active {
	text-decoration: underline;
	color: #0000cc;
	background: none;
	font-size: 10px;
}
a:hover {
	text-decoration: none;
	color: #333;
	background: none;
	font-size: 10px;
}
table.tablesorter {
	margin-left: auto;
	margin-right: auto;
	width: 75%;
	border: 1px solid #ccc;
	text-align: center;
}
table.tablesorter thead tr th, table.tablesorter tfoot tr th {
	background-color: #eee;
	padding: 0px;
}
table.tablesorter thead tr .header {
	background-image: url('.$indexpath.'jscripts/bg.gif);
	background-repeat: no-repeat;
	background-position: center right;
	cursor: pointer;
}
table.tablesorter tbody td {
	padding: 0px;
}
table.tablesorter tbody tr.odd td {
	background-color:#bbb;
}
table.tablesorter thead tr .headerSortUp {
	background-image: url('.$indexpath.'jscripts/asc.gif);
}
table.tablesorter thead tr .headerSortDown {
	background-image: url('.$indexpath.'jscripts/desc.gif);
}
table.tablesorter thead tr .headerSortDown, table.tablesorter thead tr .headerSortUp {
	background-color: #bbb;
}
</style>
<script type="text/javascript" src="'.$indexpath.'jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="'.$indexpath.'jscripts/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="'.$indexpath.'jscripts/pager/jquery.tablesorter.pager.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $("#upload-point")
	.tablesorter()
	.tablesorterPager({container: $("#pager"), positionFixed: false});
});
</script>
<title>'.$indextitle.'</title>
</head>
<body>
<?php
function is_empty_dir($dir) {
if (is_dir($dir)) {
	$dl = opendir($dir);
	if ($dl) {
		while ($name = readdir($dl)) {
			if (!is_dir("$dir/$name")) {
				return false;
				break;
			}
		}
		closedir($dl);
	} return true;
} else return true;
}
// Show readable file size function.
function upload_file_size($file) {
$file_size = 0;
if (file_exists($file)) {
	$size = filesize($file);
	if ($size < 1024) {
		$file_size = $size." Bytes";
	} elseif (($size >= 1024) && ($size < 1024000)) {
		$file_size = round($size/1024,2)." KB";
	} elseif ($size >= 1024000) {
		$file_size = round(($size/1024)/1024,2)." MB";
	}
}
return $file_size;
}

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" id=\"upload-point\" class=\"tablesorter\">
<thead>
<tr >
<th class=\"uploadlistname\"><b>Name</b></th>
<th class=\"uploadlistsize\"><b>Size</b></th>
<th class=\"uploadlistmod\"><b>Modified</b></th>
</tr>
</thead>
<tbody>";

$upload_dir = dirname ("./");
if (is_empty_dir($upload_dir) == true) {
	echo "</table>";
} elseif (is_empty_dir($upload_dir) == false) {
// List files in the upload directory.
$dir_handle = opendir($upload_dir);
if ($dir_handle) {
	while (false !==($file = readdir($dir_handle))) {
		$upload_files = "$upload_dir/$file";
		if ((is_file($upload_files)) && ($file!=".htaccess" && $file!="index.php" && $file!=$up_ignore2 && $file!=$up_ignore3 && $file!=$up_ignore4 && $file!=$up_ignore5)) {
			$upload_name_sort [] = $file;
		}
	}
sort($upload_name_sort);
foreach ($upload_name_sort as $file) echo "
<tr>
<td class=\"uploadlistname\"><a href=\"$uri$file\">$file</a></td>
<td class=\"uploadlistsize\">".upload_file_size("$upload_dir/$file")."</td>
<td class=\"uploadlistmod\">".date("m(M) d Y - H:i:s", filemtime("$upload_dir/$file"))."</td>
</tr>";
}
closedir($dir_handle);
echo "</tbody>
</table>
";
}
?>
<table cellpadding="0" cellspacing="0" border="0" class="main">
<tr>
<td colspan="3" id="pager" class="pager">
<form action="">
<p>
<img src="'.$indexpath.'jscripts/pager/icons/first.png" alt="first" class="first" />
<img src="'.$indexpath.'jscripts/pager/icons/prev.png" alt="prev" class="prev" />
<input type="text" class="pagedisplay" />
<img src="'.$indexpath.'jscripts/pager/icons/next.png" alt="next" class="next" />
<img src="'.$indexpath.'jscripts/pager/icons/last.png" alt="last" class="last" />
<select class="pagesize">
<option value="5">5</option>
<option selected="selected" value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
</select>
</p>
</form>
</td>
</tr>
</table>
</body>
</html>';

$fileupload_index_non_viewable = '<?php
header("Location: http://" . $_SERVER["HTTP_HOST"]);
exit;
?>';

// Delete index.* file.
function deletewild($del) {
	foreach (glob($del) as $wild) {
        	unlink($wild);
	}
}
// Fileupload index file create/delete start. //
// Check for existing fileupload index file.
if (is_file("$file_path_dir/index.*")) {
	$fileupload_index_exist = true;
} else {
	$fileupload_index_exist = false;
}
// If create fileupload index file is on and no existing index file exists, then go ahead.
if (($fileindex == "yes")  && ($fileupload_index_exist = "false")) {
	$create_file_index = true;
}
if ($fileindexview == "viewable") {
	$fileupload_index_output = $fileupload_index_viewable;
} else {
	$fileupload_index_output = $fileupload_index_non_viewable;
}
if ($create_file_index == "true") {
	$write_fileupload_index = stripslashes($fileupload_index_output);
	$open_fileupload_index = fopen("$file_path_dir/index.php", 'wb');
	fwrite($open_fileupload_index, $fileupload_index_output);
	fclose($open_fileupload_index);
} else {
}
if ($fileindexdelete == "yes") {
	deletewild("$file_path_dir/index*");
}
// Fileupload index file create/delete stop. //

echo "<script type=\"text/javascript\">
<!--
var URL   = \"index.php\"
var speed = $opt_admin_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>
<p>
$l_opt114
</p>
<p>
$l_admin12
</p>";

// Include footer if "on" in config.php.
if ($opt_head == "on") {
	include("footer.php");
}
}

// Create php.ini function, part 1.
function setup1() {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "options.php";
// Name of page for links and title.
$page_name = "ini";
// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

echo "<form action=\"options.php\" method=\"post\">
$p
$l_set17
<br />
<input type=\"text\" name=\"php_upload_size\" value=\"15M\" />
$p2
$p
$l_set18
<br />
<input type=\"radio\" name=\"php_globals\" value=\"On\" checked=\"checked\" />On <input type=\"radio\" name=\"php_globals\" value=\"Off\" />Off
<input type=\"hidden\" name=\"cmd\" value=\"setup2\" />
$p2
$p
<input name=\"submit\" type=\"submit\" value=\"$l_set19\" />
<input type=\"button\" onClick=\"javascript:self.close();\" value=\"$l_global5\">
$p2
</form>";

// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

// Create php.ini function, part 2.
function setup2($php_upload_size, $php_globals) {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "options.php";
$page_name = "options";
// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

$ini = "file_uploads = On
post_max_size = $php_upload_size
upload_max_filesize = $php_upload_size
register_globals = $php_globals
error_log = error_log
error_reporting = 2039
log_errors = On";

$open = fopen("php.ini", 'wb');
fwrite($open, $ini);
fclose($open);

echo "<script type=\"text/javascript\">
<!--
var speed = $admin_redirect
function reload() {
}
setTimeout(\"self.close()\", speed);
//-->
</script>";

if (is_file("php.ini")) {
	echo "$p
	$l_set20
	$p2
	$p
	$l_set21
	$p2";
} else {
	echo "$p
	$l_set22
	$p2
	$p
	$l_set21
	$p2";
}

// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

function logout (){
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "options.php";
$page_name = "options";
// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}
session_destroy ();
session_unset ($_SESSION['pass_hash_admin']);
echo "<script type=\"text/javascript\">
<!--
var URL   = \"options.php\"
var speed = $edit_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>
$p
$l_global10
$p2
$p
$l_global11
$p2";
// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

switch(@$_REQUEST['cmd']) {
	default:
	options();
	break;

case "options2";
	options2($_POST['jscript2'], $_POST['pwdhashadmin'], $_POST['pwdhashupload'], $_POST['opt_language'], $_POST['opt_page_title'], $_POST['opt_password_protect'], $_POST['opt_admin_password'], $_POST['opt_upload_password'], $_POST['opt_empty_admin_password'],  $_POST['opt_empty_upload_password'], $_POST['opt_fileupload'], $_POST['opt_fileupload_dir_name'], $_POST['opt_up_ignore1'], $_POST['opt_up_ignore2'], $_POST['opt_up_ignore3'], $_POST['opt_up_ignore4'], $_POST['opt_up_ignore5'],  $_POST['opt_hide'], $_POST['opt_rename_file'], $_POST['opt_delete_file'], $_POST['fileindex'], $_POST['fileindexview'], $_POST['fileindexdelete'], $_POST['opt_edit_redirect'],  $_POST['opt_admin_redirect'], $_POST['opt_head'], $_POST['opt_textdir'], $_POST['opt_datadir'], $_POST['opt_pagepath'], $_POST['opt_p'], $_POST['opt_p2']);
	break;

case "setup1";
	setup1();
	break;

case "setup2";
	setup2($_POST['php_upload_size'], $_POST['php_globals']);
	break;

case "logout";
	logout();
	break;
}

?>