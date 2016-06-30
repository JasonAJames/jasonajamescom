<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<link rel="stylesheet" href="/CSS/2col_leftNav.css" type="text/css" />
<?php
if ($language == "tr.php") {
	$char = "iso-8859-9";
} else {
	$char ="utf-8";
}
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=$char\" />";
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title><?php echo @$page_title; ?></title>
<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################
// Config.php is the main configuration file.
include('config.php');
// Language file.
include("lang/$language");
// Add the appropriate links to pages.
if ($page_name == "options") {
	$edit_page = ": $l_head3";
	$page_links = "<a href=\"options.php\">$l_head3</a> :: <a href=\"index.php\">$l_head5</a> :: <a href=\"info.php\">$l_head6</a>";
} elseif ($page_name == "opt_redirect") {
	$edit_page = "";
	$page_links = "&nbsp;";
} elseif ($page_name == "ini") {
	$edit_page = ": $l_head7";
	$page_links = "&nbsp;";
} else {
	$page_links = "&nbsp;";
}
?>
<script type="text/javascript" src="jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="jscripts/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="jscripts/pager/jquery.tablesorter.pager.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $("#upload-point")
	.tablesorter({headers: { 3: { sorter: false}, 4: {sorter: false}, 5: {sorter: false} }})
	.tablesorterPager({container: $("#pager"), positionFixed: false});
});
</script>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>

<table class="main" cellpadding="0" cellspacing="0" border="0">
<tr>
<td colspan="2" align="left" valign="middle"><h1><?php echo "$page_title $edit_page"; ?><br />
  <br />
Upload your Front File, then Back File(optional) to be printed.<br />
<br />
How to Name your File?<br />
***Name your file, your order # then underscore front or back.<br />
(Ex: 7869042_front.pdf)
</h1>
</td>
</tr>
<tr>
<td class="bar" colspan="2">
<?php echo $page_links;
if (($password_protect == "on") && ($logout == "index.php")) {
	echo "<a href=\"$logout?cmd=logout\">$l_global12</a>";
} elseif (($password_protect == "on") && ($logout == "options.php")){
	echo " :: <a href=\"$logout?cmd=logout\">$l_global12</a>";
} else {
}
?>
</td>
</tr>
<tr>
<td colspan="2">
