<?php
########################################################################
# IE Imaging Upload System
# Copyright (C)2008 IE Imaging
# info@ieimaging.com
########################################################################



// Header.php
$l_head3 = "控制面板";
$l_head5 = "上传文件";
$l_head6 = "PHP 信息";
$l_head7 = "定制 php.ini";

// Options.php
$l_opt8 = "请根据您的爱好设置<b>Upload-Point</b> .";
$l_opt10 = "您可以在这个页面修改设置，不过记得在页面的底部保存设置.";
$l_opt11 = "上传系统的名字和页面标题.";
$l_opt18 = "密码保护";
$l_opt19 = "使用内置密码保护.";
$l_opt22 = "<b>控制面板 </b>的管理员密码(options.php)";
$l_opt24 = "<b>文件上传</b>的密码 (index.php).";
$l_opt25 = "文件上传";
$l_opt26 = "无论\"文件上传\"选项是否可用,如果\"文件上传\"文件夹不存在,它将会被创建.";
$l_opt26a = "创建文件上传目录索引文件。";
$l_opt26b = "选择建立一个索引文件中表示，将选择1 ）列出了档案在一种略微更令人高兴的方式比预设的服务器上市或2 ） ，使该目录的非可视范围和重定向浏览器域名。如果有一个现有的索引文件，脚本也不会改写。";
$l_opt26c = "非可视或可视索引文件。";
$l_opt26d = "	删除文件上传目录索引。";
$l_opt26e = "警告！这将删除任何现有的索引文件在fileupload目录。";
$l_opt26f = "档案数目列出每页。";
$l_opt26g = "选择隐藏文件，从上市登录的用户。";
$l_opt26h = "上传文件 :: 索引文件";
$l_opt26i = "上传文件 :: 用户限制";
$l_opt26j = "重命名文件的功能.";
$l_opt26k = "	删除文件的功能。";
$l_opt28 = "\"文件上传\"文件夹的域名. 系统将自动创建这个文件夹. 例如您的\"文件上传\"文件夹的域名为 \"http://YOURDOMAIN.com/testing/files/\", 那么\"文件上传\"文件夹的路径就是\"testing/files\".";
$l_opt28a = "这个目录会自动创建. 例如，如果你使用 \"http://YOURDOMAIN.com/testing/files/\", t档案上传目录将等同于: \"testing/files\".";
$l_opt29 = "\"文件上传\"文件夹忽略的文件(不被显示). 默认\".htaccess\" 文件被忽略.";
$l_opt33 = "定制文件上传的大小</b> (php.ini)";
$l_opt33a = "上传文件 :: PHP Upload Size";
$l_opt34 = "大多数服务器都允许用户自行定制一个 <b>php.ini</b> 文件去覆盖默认的 php.ini 设置. 如果您想限制文件上传的大小,这是非常有用的. 定制的 <b>php.ini</b> 文件包括以下几行:<br /><b>file_uploads</b> = On<br /><b>post_max_size</b> = *M<br /><b>upload_max_filesize</b> = *M<br /><b>register_globals</b> = On/Off<br /><b>error_log = error_log</b><br /><b>error_reporting</b> = 2039<br /><b>log_errors</b> = On<br />在这里我建议您可以将新的 <b>\"PHP 信息\"</b> 跟默认的 <b>\"PHP 信息\"</b> 做个对照,看看有没有什么需要添加的.$p2$p 注意!!! 不是每一个服务器都允许您这样做!!!";
$l_opt35 = "创建 \"php.ini\"";
$l_opt42 = "基本设置";
$l_opt43 = "重定向到 index.php 的时间. 1000 = 1 秒";
$l_opt44 = "重定向到 options.php 的时间. 1000 = 1 秒";
$l_opt104 = "不要随便改动下面的设置(除非你很清楚自己在做什么)";
$l_opt105 = "是否使用 header/footer.";
$l_opt106 = "<b>程序目录</b> 假如您把 Upload-Point 安装在 \"http://YOURDOMAIN.com/testing/upload\", 那么 <b>程序目录</b> 就是 \"testing/upload\".";
$l_opt109 = "<b>数据目录</b> 由程序自动创建,包含了密码文件. 不要更改这个设置,除非你手动更改了 \"data\" 目录的名字或路径.";
$l_opt110 = "<b>脚本路径</b> 从脚本目录到主页面的路径.";
$l_opt111 = "<b>Html 开始标签</b> 这些只对 Upload-Point 的脚本页面有用.";
$l_opt112 = "<b>Html 结束标签</b>";
$l_opt113 = "保存您的配置";
$l_opt114 = "您的配置已经 <b><i>成功</i></b> 保存.";
$l_opt116 = "Language/Sprache/Lengua/Γλώσσες/Taal/Dil/语言";
$l_opt117 = "English";
$l_opt118 = "Deutsch";
$l_opt119 = "Espa&ntilde;ol";
$l_opt119a = "Nederlands";
$l_opt119b = "简体中文";
$l_opt119c = "Türkçe";
$l_opt119d = "ελληνικα";
$l_opt121 ="已经成功创建,权限被设为";
$l_opt123 ="系统似乎遇到了问题, <b>$fileupload_dir_name</b> 不能被创建.";
$l_opt128 = "重设";
$l_opt133 = "可视范围";
$l_opt134 = "非可视范围";

// Setup.php
$l_set17 = "最大的上传大小. 例如: 55M";
$l_set18 = "Register Globals, on/off";
$l_set19 = "创建";
$l_set20 = "<b>PHP.INI</b> 成功创建!!!";
$l_set21 = "Automatically closing...";
$l_set22 = "<b>系统似乎遇到了问题!!!</b> php.ini 不能被创建!!!";

// Upload.php
$l_upload1 = "上传文件";
$l_upload2 = "我的文件";
$l_upload3 = "文件名";
$l_upload4 = "文件大小";
$l_upload5 = "更改时间";
$l_upload6 = "重命名";
$l_upload7 = "删除文件";
$l_upload8 = "文件位置";
$l_upload11 = "上传文件夹不存在,而且创建失败!!!";
$l_upload12 = "尝试设置权限为 755 失败!!!";
$l_upload13 = "上传成功";
$l_upload14 = "在上传的过程中似乎遇到了问题";
$l_upload15 = "系统将自动重定向到 <a href=\"index.php\">Upload-Page</a>";
$l_upload18 = "已经 <b>成功</b> 删除.";
$l_upload19 = "不能重命名文件";
$l_upload20 = "已经 <b>成功</b> 重命名为";
// EDIT
$l_upload21 = "Uploading, please wait...";

// Global
$l_global5 = "取消";
$l_global7 = "打开";
$l_global8 = "关闭";
$l_global10 = "成功登出";
$l_global11 = "重定向到...";
$l_global12 = "登出";
$l_global13 = "请输入密码";
$l_global14 = "登入";
$l_global17 = "是的";
$l_global18 = "无";
?>