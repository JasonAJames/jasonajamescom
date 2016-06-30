</td>
</tr>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/CSS/2col_leftNav.css" type="text/css" />
<tr>
<td class="bar" colspan="2">
<?php
########################################################################
# IE Imaging Upload System
# Copyright (c)2008 IE Imaging
# info@ieimaging.com
########################################################################
if ($page_name == "upload") {
	echo '<table class="upload" cellpadding="0" cellspacing="0" border="0">
<tr>
<td colspan="6" id="pager" class="pager">
<form action="">
<p>
<img src="/upload/jscripts/pager/icons/first.png" alt="first" class="first" />
<img src="/upload/jscripts/pager/icons/prev.png" alt="prev" class="prev" />
<input type="text" class="pagedisplay" />
<img src="/upload/jscripts/pager/icons/next.png" alt="next" class="next" />
<img src="/upload/jscripts/pager/icons/last.png" alt="last" class="last" />
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
</table>';
} else {
	echo '&nbsp;';
}
?>
</td>
</tr>
</table>

<br />
<div id="siteInfo" align="center"><br />
  <br />
  &copy;2012 IE Imaging </div>
</body>
</html>