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
$logout = "options.php";
$page_name = "options";

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
		<script language=\"JavaScript\" type=\"text/javascript\" src=\"$datadir/crypt/sha256.js\"></script>
		<script language=\"JavaScript\" type=\"text/javascript\" src=\"$datadir/crypt/md5.js\"></script>
		<script language=\"JavaScript\" type=\"text/javascript\">
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
		<form action=\"info.php\" method=\"post\" name=\"form1\" onsubmit=\"return obfuscate()\">
		$p
		<input name=\"jscript\" type=\"hidden\" value=\"off\">
		<input name=\"pass_hash_admin\" type=\"hidden\" value=\"\">
		<input name=\"pass_hash2\" type=\"hidden\" value=\"\">
		<input name=\"string_hash\" type=\"hidden\" value=\"\">
		<input name=\"pass_string_hash\" type=\"hidden\" value=\"\">
		<input name=\"agenthash\" type=\"hidden\" value=\"\">
		<input name=\"string\" type=\"hidden\" value=\"$rand_string\">	
		<input name=\"agent\" type=\"hidden\" value=\"$agent\">
		<input type=\"password\" name=\"pass_admin\">
		<input type=\"submit\" value=\"$l_global14\">
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


phpinfo(); ?>