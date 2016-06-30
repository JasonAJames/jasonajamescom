<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################
//Login
require("login.php");
// Language file.
include("header.php");
?>
<html>
<link href="/upload/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body>
<table align="center" width="592" border="0" cellpadding="1">
  <tr>
    <td width="287" align="right" valign="middle">IE Imaging Upload Administration Directory:</td>
    <td width="295" align="left" valign="middle"><form name="form" id="form">
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option selected="selected">Upload Files</option>
		<option value="/upload/admin/admin_AnnouncementEnvelopes.php">Announcement Envelopes</option>
		<option value="/upload/admin/admin_Bookmarks.php">Bookmarks</option>
		<option value="/upload/admin/admin_Brochures.php">Brochures</option>
		<option value="/upload/admin/admin_Bulletins_Inserts.php">Bulletins & Inserts</option>
		<option value="/upload/admin/admin_BusinessCards.php">Business Cards</option>
		<option value="/upload/admin/admin_Catalogs.php">Catalogs</option>
		<option value="/upload/admin/admin_CD_DVD_Inserts.php">CD & DVD Inserts</option>
		<option value="/upload/admin/admin_DoorHangers.php">Door Hangers</option>
		<option value="/upload/admin/admin_Envelopes.php">Envelopes</option>
		<option value="/upload/admin/admin_Flyers.php">Flyers</option>
		<option value="/upload/admin/admin_Folders.php">Folders</option>
		<option value="/upload/admin/admin_GreetingCards.php">Greeting Cards</option>
		<option value="/upload/admin/admin_Letterhead.php">Letterhead</option>
		<option value="/upload/admin/admin_Metallics.php">Metallics</option>
		<option value="/upload/admin/admin_MiniCatalogs.php">Mini Catalogs</option>
		<option value="/upload/admin/admin_PostCards.php">Post Cards</option>
		<option value="/upload/admin/admin_Posters.php">Posters</option>
		<option value="/upload/admin/admin_Print_Mail_Packages.php">Print & Mail Packages</option>
		<option value="/upload/admin/admin_PromotionalCards.php">Promotional Cards</option>
		<option value="/upload/admin/admin_RackCards.php">Rack Cards</option>
		<option value="/upload/admin/admin_ScreenPrinting.php">Screen Printing</option>
		<option value="/upload/admin/admin_Stickers_Labels.php">Stickers & Labels</option>
		<option value="/upload/admin/admin_TableTents.php">Table Tents</option>
		
      </select>
            </form></td>
  </tr>
</table>

</body>
</html>