<blockquote><blockquote><blockquote><blockquote><blockquote><blockquote><blockquote><h3 style="font-size: 13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: #135cae;"><u>Step 1:</u></h3></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>
<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################
// Config.php is the main configuration file.
include('config.php');
// Password file.
if (is_file("$datadir/upload_pass.php")) {
include ("$datadir/upload_pass.php");
}
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
//$logout = "index.php";
//$page_name = "upload";

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
if ($password_protect == "off") {
	session_start();
	if(!empty($_POST['pass_hash_upload'])) {
		// Crypt, hash, and store password in session.
		$_SESSION['pass_hash_upload'] = crypt(md5($_POST['pass_hash_upload']), md5($_POST['pass_hash_upload']));
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
	} if (($_SESSION['pass_hash_upload'] != $upload_password) || ($_POST['pass_string_hash'] != $string_response) || ($_POST['agenthash'] != $agent_response)) {
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
			document.form1.pass_hash_upload.value = hex_sha256(document.form1.pass_upload.value);
			document.form1.pass_hash2.value = hex_md5(document.form1.pass_upload.value);
			document.form1.string_hash.value = hex_md5(document.form1.string.value);
			document.form1.pass_string_hash.value =  hex_md5(document.form1.string_hash.value  + document.form1.pass_hash2.value);
			document.form1.agenthash.value = hex_md5(document.form1.agent.value);
			document.form1.pass_upload.value = \"\";
			document.form1.string.value = \"\";
			document.form1.agent.value = \"\";
			document.form1.jscript.value = \"on\";
			return true;
		}
		</script>
		<form action=\"BusinessCards.php\" method=\"post\" name=\"form1\" onsubmit=\"return obfuscate()\">
		$p
		<input name=\"jscript\" type=\"hidden\" value=\"off\" />
		<input name=\"pass_hash_upload\" type=\"hidden\" value=\"\" />
		<input name=\"pass_hash2\" type=\"hidden\" value=\"\" />
		<input name=\"string_hash\" type=\"hidden\" value=\"\" />
		<input name=\"pass_string_hash\" type=\"hidden\" value=\"\" />
		<input name=\"agenthash\" type=\"hidden\" value=\"\" />
		<input name=\"string\" type=\"hidden\" value=\"$rand_string\" />
		<input name=\"agent\" type=\"hidden\" value=\"$agent\" />
		<input type=\"password\" name=\"pass_upload\" />
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

function upload1() {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "BusinessCards.php";
$page_name = "upload";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

// Upload file form.
echo "<script type=\"text/javascript\">
function showIcon() {
window.setTimeout('showProgress()', 0);
}
function showProgress() {
document.getElementById('progressImg').style.display = 'inline';
}
</script>
$p
$UploadBusinessCardsPageTitle
$p2
<table class=\"upload\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
<tr>
<td colspan=\"6\">
<form action=\"BusinessCards.php\" method=\"post\" enctype=\"multipart/form-data\">
<div id =\"upload_popup\">
<input type=\"hidden\" name=\"cmd\" value=\"upload2\" /> <input type=\"file\" name=\"ftp_file\" />
<br /><br />
<input type=\"submit\" name=\"submit\" onclick=\"showIcon();\" value=\"$l_upload1\" />
</div>
<div class=\"progress\" id=\"progressImg\">&nbsp;
<img src=\"$datadir/progress.gif\" alt=\"$l_upload21\" />
</div>
</form>
</td>
</tr>";

// Hide file listing from logged in users.
if ($hide == "on") {
	echo "</table>";
} else {
	echo "<tr>";
// <td> colspan for rename/delete on/off.
if (($rename_file == "off") && ($delete_file == "off")) {
	echo "<td colspan=\"4\">";
} elseif ($rename_file == "off") {
	echo "<td colspan=\"5\">";
} elseif ($delete_file == "off") {
	echo "<td colspan=\"5\">";
} else {
	echo "<td colspan=\"6\">";
}
echo "
<hr />
$p
$Footer
$p2
<hr />
</td>
</tr>
</table>
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" id=\"upload-point\" class=\"tablesorter\">
<tbody>";
}
// Create upload directory if it doesn't exist.
if (!is_dir($upload_dir)) {
}
// File listing code.
if ($hide == "on") {
} else {
if (is_empty_dir($upload_dir) == true) {
	echo "</table>";
} elseif (is_empty_dir($upload_dir) == false) {

// Delete file on/off.
if ($delete_file == "on") {
	echo "
<td class=\"uploadlistdelete\">
<form action=\"BusinessCards.php\" method=\"post\">
$p
<input type=\"hidden\" name=\"file\" value=\"$file\" />
<input type=\"hidden\" name=\"pg\" value=\"$pg\" />
<input type=\"hidden\" name=\"cmd\" value=\"upload_delete\" />
<input name=\"submit\" type=\"submit\" value=\"$l_upload7\" />
$p2
</form>
</td>";
} else {
}
echo "
<td class=\"uploadlistloc\"><a href=\"http://".$_SERVER['HTTP_HOST']."/$fileupload_BusinessCards_dir_name/$file\"><i>http://".$_SERVER['HTTP_HOST']."/$fileupload_BusinessCards_dir_name/$file</i></a></td>
</tr>";
}
}
"
</tbody>
</table>
";
}

// Upload file function.
function upload2($ftp_file, $upload_type) {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "BusinessCards.php";
$page_name = "upload";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

// Upload process.
// Path from domain name to upload directory
$upload_dir = ($_SERVER['DOCUMENT_ROOT'] . "/$fileupload_BusinessCards_dir_name/");
$target_path = $upload_dir . basename( $_FILES['ftp_file']['name']);
if (move_uploaded_file($_FILES['ftp_file']['tmp_name'], $target_path)) {
	chmod($upload_dir . basename( $_FILES['ftp_file']['name']), 0644);
	echo $p."$l_upload13 ".  basename( $_FILES['ftp_file']['name']). "$p2";
} else {
	echo $p."$l_upload14 ".  basename( $_FILES['ftp_file']['name']). "$p2";
}
// Redirect to upload page.
if ($su == "on") {
	$upload_redirect = $admin_redirect;
} else {
	$upload_redirect = $edit_redirect;
}
echo "<script type=\"text/javascript\">
<!--
var URL   = \"BusinessCards.php\"
var speed = $upload_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>
$p
$l_upload15
$p2";

// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

// Function to delete files.
function upload_delete($file, $pg) {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "BusinessCards.php";
$page_name = "upload";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

// Path to file.
$upload_file_path = ($_SERVER['DOCUMENT_ROOT'] . "/$fileupload_BusinessCards_dir_name/$file");
// Delete file
unlink($upload_file_path);
echo "$p<b>$file</b> $l_upload18$p2";

// Redirect to upload page.
if ($su == "on") {
	$upload_redirect = $admin_redirect;
} else {
	$upload_redirect = $edit_redirect;
}
echo "<script type=\"text/javascript\">
<!--
var URL   = \"BusinessCards.php?pg=$pg\"
var speed = $upload_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>
$p
$l_upload15
$p2";

// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

// Function to rename file.
function upload_rename($file, $upload_newname, $pg) {
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "BusinessCards.php";
$page_name = "upload";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}

// Path to file.
$upload_file_path = ($_SERVER['DOCUMENT_ROOT'] . "/$fileupload_BusinessCards_dir_name/$file");
// Check is file exists and rename it.
if (file_exists($upload_file_path)) {
	rename ($upload_file_path, $_SERVER['DOCUMENT_ROOT'] . "/$fileupload_BusinessCards_dir_name/$upload_newname") or die ("$l_upload19");
	echo "$p<b>$file</b> $l_upload20: <b>$upload_newname</b>.$p2";
}

// Redirect to upload page.
if ($su == "on") {
	$upload_redirect = $admin_redirect;
} else {
	$upload_redirect = $edit_redirect;
}
echo "<script type=\"text/javascript\">
<!--
var URL   = \"BusinessCards.php?pg=$pg\"
var speed = $upload_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>
$p
$l_upload15
$p2";

// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
}

// Errorless check if directory is empty.
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
		$file_size = $size.' Bytes';
	} elseif (($size >= 1024) && ($size < 1024000)) {
		$file_size = round($size/1024,2).' KB';
	} elseif ($size >= 1024000) {
		$file_size = round(($size/1024)/1024,2).' MB';
	}
}
return $file_size;
}

function logout (){
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Name of page for links, title, and logout.
$logout = "BusinessCards.php";
$page_name = "upload";

// Include header if "on" in config.php.
if ($head == "on") {
	include("header.php");
}
session_destroy ();
session_unset ($_SESSION['pass_hash_upload']);
echo "<script type=\"text/javascript\">
<!--
var URL   = \"BusinessCards.php\"
var speed = $edit_redirect
function reload() {
location = URL
}
setTimeout(\"reload()\", speed);
//-->
</script>";
echo "$p
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
	upload1();
	break;
	
case "upload2";
	upload2(@$_POST['ftp_file'], @$_POST['upload_type'], $_POST['submit']);
	break;

case "upload_delete";
	upload_delete($_POST['file'], $_POST['pg']);
	break;

case "upload_rename";
	upload_rename($_POST['file'], $_POST['upload_newname'], $_POST['pg']);
	break;

case "logout";
	logout();
	break;
}

?>
<br /> <form id="CustomPrintQuote" action="/gdform.php" method="post"> <fieldset id="PrintOptions"> <span class="HEADER3"><span style="text-decoration: underline;"><span style="-webkit-text-decorations-in-effect: none;">
<h3 style="font-size: 13px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: #135cae;">Step 2:</h3>
Print Options <br /> <input name="subject" type="hidden" value="Business Card Printing Form Submission" /> <input name="redirect" type="hidden" value="/IE/Imaging/Pages/Printing/SubmissionGuideline_Pages/PrintingSubmission_ThankyouPage.html" /> <br /> 
<table id="PrintOptionsTable" border="0" cellspacing="1" cellpadding="1" width="420">
<tbody>
<tr>
<td width="185" align="right" valign="bottom"><label for="ProductStock"> Product Stock:</label></td>
<td width="228" align="left" valign="bottom"><select id="001productStock" name="001productStock"> <option selected="selected" value="14pt. Matte Recycled Premium Sheet">14pt. Matte Recycled Premium Sheet</option> <option value="14pt. Linen Uncoated">14pt. Linen Uncoated</option> <option value="14pt. Premium Uncoated">14pt. Premium Uncoated</option> <option value="14pt. C1S">14pt. C1S (Coated 1 Side)</option><option value="14pt. C2S">14pt. C2S (Coated Both Sides)</option><option value="16pt. C2S">16pt. C2S (Coated Both Sides)</option></select></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="ProductSize">Product Size:</label></td>
<td align="left" valign="bottom"><select id="002productSize" name="002productSize"> <option selected="selected" value="3.5 x 2">3.5" x 2"</option> <option value="3.5 x 4">3.5" x 4"</option> <option value="4 x 3.5">4" x 3.5"</option> </select></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="select">Product Specs:</label></td>
<td align="left" valign="bottom"><select id="003productSpecs" name="003productSpecs"> <option selected="selected" value="4/0 - Full Color Front / Blank Back">4/0 - Full Color Front / Blank Back</option> <option value="4/1 - Full Color Front / Black Back">4/1 - Full Color Front / Black Back</option> <option value="4/4 - Full Color Front and Back">4/4 - Full Color Front and Back</option> </select></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="ProductQuantity">Product Quantity:</label></td>
<td align="left" valign="bottom"><select id="004productQuantity" name="004productQuantity"> <option value="500">500</option> <option value="1000">1000</option> <option value="2000">2000</option> <option value="2500">2500</option> <option value="5000">5000</option> <option value="7500">7500</option> <option value="10000">10000</option> <option value="15000">15000</option> <option value="20000">20000</option> <option value="25000">25000</option> </select></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="ProductQuantity">Turnaround Time:</label></td>
<td align="left" valign="bottom"><select id="005turnaroundTime" name="005turnaroundTime"> <option selected="selected" value="Standard 3-5 Days">Standard 3-5 Days</option> <option value="Wait and Save 5-7 Days">Wait and Save 5-7 Days</option> <option value="Wait and Save 7-10 Days">Wait and Save 7-10 Days</option> </select></td>
</tr>
<tr>
<td colspan="2" align="left" valign="bottom"></td>
</tr>
<tr>
<td class="HEADER3" colspan="2" align="left" valign="bottom"><span style="text-decoration: underline;">Delivery Options</span></td>
</tr>
<tr>
<td colspan="2" align="left" valign="bottom"><label for="SandHmethod">Preffered Shipping and Handling Method:</label></td>
</tr>
<tr>
<td align="left" valign="bottom"></td>
<td align="left" valign="bottom"><select id="006productS_Hmethod" name="006productS_Hmethod"> <option selected="selected" value="UPS Ground">UPS Ground</option> <option value="UPS 2nd Day Air">UPS 2nd Day Air</option> <option value="UPS Next Day Air">UPS Next Day Air</option> <option value="UPS 3 Day Select">UPS 3 Day Select</option> </select></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="productZip">Delivery Zip Code:</label></td>
<td align="left" valign="bottom"><input id="007productDeliveryZip" maxlength="12" name="007productDeliveryZip" size="12" type="text" /></td>
</tr>
</tbody>
</table>
</span></span></span></fieldset> <br /> <fieldset id="CustomerContactInformation"> <span class="HEADER3"><span style="text-decoration: underline;">Customer Contact / Shipping Information</span></span><br /> <br /> 
<table id="ContactInformationTable" border="0" cellspacing="1" cellpadding="1" width="565">
<tbody>
<tr>
<td width="210" align="right" valign="bottom"><label for="ProjectName">Project Name Listed in Step 1:</label></td>
<td width="203" align="left" valign="bottom"><input name="_000ProjectName" type="text" id="_000ProjectName" size="50" /></td>
</tr>
<tr>
<td width="210" align="right" valign="bottom"><label for="FirstName">First Name:</label></td>
<td width="203" align="left" valign="bottom"><input name="_001custFirstName" type="text" id="_001custFirstName" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="LastName">Last Name:</label></td>
<td align="left" valign="bottom"><input name="_002custLastName" type="text" id="_002custLastName" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Email">Email:</label></td>
<td align="left" valign="bottom"><input name="_003custEmail" type="text" id="_003custEmail" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Address1">Address 1:</label></td>
<td align="left" valign="bottom"><input name="_004custAddress1" type="text" id="_004custAddress1" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Address2">Address 2:</label></td>
<td align="left" valign="bottom"><input name="_005custAddress2" type="text" id="_005custAddress2" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="City">City:</label></td>
<td align="left" valign="bottom"><input name="_006custCity" type="text" id="_006custCity" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="State">State:</label></td>
<td align="left" valign="bottom"><input name="_007custState" type="text" id="_007custState" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Zip">Zip:</label></td>
<td align="left" valign="bottom"><input name="_008custZip" type="text" id="_008custZip" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="textfield">Phone:</label></td>
<td align="left" valign="bottom"><input name="_009custPhone" type="text" id="_009custPhone" size="50" /></td>
</tr>
</tbody>
</table>
<br /> 
</fieldset> <br />
<fieldset id="CustomerContactInformation"> <span class="HEADER3"><span style="text-decoration: underline;">Customer Contact / Shipping Information</span></span><br /> <br /> 
<table id="ContactInformationTable" border="0" cellspacing="1" cellpadding="1" width="565">
<tbody>
<tr>
<td width="210" align="right" valign="bottom"><label for="ProjectName">Project Name Listed in Step 1:</label></td>
<td width="203" align="left" valign="bottom"><input name="_000ProjectName" type="text" id="_000ProjectName" size="50" /></td>
</tr>
<tr>
<td width="210" align="right" valign="bottom"><label for="FirstName">First Name:</label></td>
<td width="203" align="left" valign="bottom"><input name="_001custFirstName" type="text" id="_001custFirstName" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="LastName">Last Name:</label></td>
<td align="left" valign="bottom"><input name="_002custLastName" type="text" id="_002custLastName" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Email">Email:</label></td>
<td align="left" valign="bottom"><input name="_003custEmail" type="text" id="_003custEmail" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Address1">Address 1:</label></td>
<td align="left" valign="bottom"><input name="_004custAddress1" type="text" id="_004custAddress1" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Address2">Address 2:</label></td>
<td align="left" valign="bottom"><input name="_005custAddress2" type="text" id="_005custAddress2" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="City">City:</label></td>
<td align="left" valign="bottom"><input name="_006custCity" type="text" id="_006custCity" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="State">State:</label></td>
<td align="left" valign="bottom"><input name="_007custState" type="text" id="_007custState" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="Zip">Zip:</label></td>
<td align="left" valign="bottom"><input name="_008custZip" type="text" id="_008custZip" size="50" /></td>
</tr>
<tr>
<td align="right" valign="bottom"><label for="textfield">Phone:</label></td>
<td align="left" valign="bottom"><input name="_009custPhone" type="text" id="_009custPhone" size="50" /></td>
</tr>
</tbody>
</table>
<br /> 
</fieldset> <input id="Reset" name="Reset" type="reset" value="Reset" /> <input name="CustomerInformation" type="submit" value="Submit Order" /> </form>
<?php
// Include footer if "on" in config.php.
if ($head == "on") {
	include("footer.php");
}
?>