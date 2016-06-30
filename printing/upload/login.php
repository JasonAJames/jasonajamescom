<?php session_start();
//================================================
// IE Imaging Login is copyright (c)2008 IE Imaging
//
// Support available at http://www.ieimaging.com
//================================================

// Data file
$data = "users.txt";

// Absolute path to the data file
$path = "/home/content/i/e/i/ieimaging/html/upload/admin/";

// Enable / Disable user registration: 1 = enabled, 0 = disabled
$registration = 0;

// Main cascading stylesheets
$style = '
		html, body {
			height: 99%;
			font-family: Arial, Verdana;
			font-size: 12px;
		}
		#titlebar {
			position: relative;
			height: 20px;
			width: 260px;
			border-top: 1px solid #000000;
			border-left: 1px solid #000000;
			border-right: 1px solid #000000;
			background-color: #336699;
			color: #000000;
			text-align: center;
			font-size: 16px;
		}
		#foot {
			position: relative;
			height: 20px;
			width: 260px;
			color: #000000;
			text-align: center;
			font-size: 10px;
		}
		input.text {
			width: 220px;
			height: 20px;
			border: 1px solid #000000;
			background-color: #CCCCCC;
		}
		input.btn {
			width: 60px;
			height: 20px;
			border: 1px solid #000000;
			background-color: #CCCCCC;
			color: #000000;
		}
		input.btn:hover {
			cursor: pointer;
		}
		a {
			color: #003399;
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
';
$log_style = '
		#wrapper {
			position: absolute;
			height: 185px;
			width: 260px;
			text-align: center;
			color: #000000;
			left: 50%;
			top: 50%;
			margin-left: -130px; 
			margin-top: -85px; 
		}
		#form {
			position: relative;
			height: 165px;
			width: 260px;
			border: 1px solid #000000;
			background-color: #fff9eb;
			color: #000000;
			text-align: left;
		}
';
$reg_style = '
		#wrapper {
			position: absolute;
			height: 270px;
			width: 260px;
			text-align: center;
			color: #000000;
			left: 50%;
			top: 50%;
			margin-left: -130px; 
			margin-top: -135px; 
		}
		#form {
			position: relative;
			height: 250px;
			width: 260px;
			border: 1px solid #000000;
			background-color: #fff9eb;
			color: #000000;
			text-align: left;
		}
';

// Do not edit below this line

$users = $path . $data;

if (file_exists($users)) {
	$records = count(file($users));
}
else {
	fopen($users, 'w') or die("Can't open user database.");
}
if (isset($_GET['ls_logout'])) {
	unset($_SESSION['ls_id']);
	unset($_SESSION['ls_user']);
	unset($_SESSION['ls_email']);
}
if (isset($_POST)) {
	$login = FALSE; 
	$register = FALSE;
	$errors = '';
	foreach ($_POST as $key => $value) {
		if ($key == "ls_reg") { $login = FALSE; $register = TRUE; }
		else if ($key == "ls_log") { $login = TRUE; $register = FALSE; }
		else if ($key == "ls_user") { 
			if (!eregi('^[[:alnum:]\.\'\-]{3,15}$', $value)) { $u_invalid = 1; }
			$user = $value; 
		}
		else if ($key == "ls_email") { 
			if (!eregi('^[a-zA-Z]+[a-zA-Z0-9_-]*@([a-zA-Z0-9_-]+){1}(\.[a-zA-Z0-9]+){1,2}', $value)) { $e_invalid = 1; }
			$email = $value; 
		}
		else if ($key == "ls_pass") { 
			if (!eregi("^[[:alnum:]\.\'\-]{3,15}$", $value)) { $p_invalid = 1; }
			$pass = md5($value); 
		}
		else if ($key == "ls_repeat") { $repeat = md5($value); }
	}
}
if ($login == TRUE) {
	if (file_exists($users)) {
		$lines = file($users);
		foreach ($lines as $line_num => $line) {
			$array = explode("||",str_replace("\n","",$line));
			$c_id = $array[0];
			$c_user = $array[1];
			$c_email = $array[2];
			$c_pass = $array[3];
			if ($c_user == $user && $c_pass == $pass) {
				$_SESSION['ls_id'] = $c_id;
				$_SESSION['ls_user'] = $c_user;
				$_SESSION['ls_email'] = base64_decode($c_email);
			}
		}
		if (!isset($_SESSION['ls_id']) || !isset($_SESSION['ls_user']) || !isset($_SESSION['ls_email'])) {
			$errors[] = "Invalid Login.";
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Login Error</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
		<?php echo $style; ?>
		<?php echo $log_style; ?>
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="titlebar">Errors</div>
			<div id="form">
				<div style="padding:10px;">
					<ul style="padding:0px;margin:15px;">
					<?php
			                foreach ($errors as $msg) {
			                  echo "<li style=\"padding:0px;margin:0px;\">$msg</li>";
			                }
					$errors = '';
					?>
					</ul>
					<div style="text-align:center;padding:20px;">
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" rel="">Click Here</a> to go back.
					</div>
				</div>
			</div>
			<div id="foot"><a href="http://www.myphpscripts.net" rel="">myPHPscripts</a> Login Session 2.0</div>
		</div>
	</body>
</html>
		<?php
		exit();
		}
	}
}
else if ($register == TRUE) {
	if (file_exists($users)) {
		$lines = file($users);
		foreach ($lines as $line_num => $line) {
			$array = explode("||",str_replace("\n","",$line));
			$c_id = $array[0];
			$c_user = $array[1];
			$c_email = $array[2];
			$c_pass = $array[3];
			if ($user == $c_user) { $u_taken = 1; }
			if (base64_encode($email) == $c_email) { $e_taken = 1; }
		}
		if ($user == NULL) { $errors[] = "User cannot be blank."; }
		if ($u_invalid == 1) { $errors[] = "User <strong>$user</strong> is invalid. 3-15 alphanumeric characters required."; }
		if ($u_taken == 1) { $errors[] = "Username <strong>$user</strong> is already taken."; }
		if ($email == NULL) { $errors[] = "Email cannot be blank."; }
		if ($e_invalid == 1) { $errors[] = "Email address <strong>$email</strong> is invalid."; }
		if ($e_taken == 1) { $errors[] = "Email address <strong>$email</strong> is already taken."; }
		if ($pass == md5(NULL)) { $errors[] = "Password cannot be blank."; }
		if ($p_invalid == 1) { $errors[] = "Password is invalid. 3-15 alphanumeric characters required."; }
		if ($repeat == md5(NULL)) { $errors[] = "Password verification cannot be blank."; }
		if ($pass != $repeat) { $errors[] = "Password and verification do not match."; }
	}
	if (empty($errors)) {
		$newline = $records++;
		$e_email = base64_encode($email);
		$data = "$newline||$user||$e_email||$pass\n";
		$fh = fopen($users, 'a') or die("Can't open user database.");
		fwrite($fh, $data);
		fclose($fh);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Registration Success</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
		<?php echo $style; ?>
		<?php echo $log_style; ?>
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="titlebar">Success</div>
			<div id="form">
				<div style="text-align:center;padding:20px;">
					You are now registered.<br />
					<a href="<?php echo $_SERVER['REQUEST_URI']; ?>" rel="">Click Here</a> to log in.
				</div>
			</div>
			<div id="foot"><a href="http://www.myphpscripts.net" rel="">myPHPscripts</a> Login Session 2.0</div>
		</div>
	</body>
</html>
<?php
	exit();
	}
	else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Registration Error</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
		<?php echo $style; ?>
		<?php echo $reg_style; ?>
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="titlebar">Errors</div>
			<div id="form">
				<div style="padding:10px;">
					<ul style="padding:0px;margin:15px;">
					<?php
			                foreach ($errors as $msg) {
			                  echo "<li style=\"padding:0px;margin:0px;\">$msg</li>";
			                }
					$errors = '';
					?>
					</ul>
					<div style="text-align:center;padding:20px;">
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" rel="">Click Here</a> to go back.
					</div>
				</div>
			</div>
			<div id="foot"><a href="http://www.myphpscripts.net" rel="">myPHPscripts</a> Login Session 2.0</div>
		</div>
	</body>
</html>
<?php
	exit();
	}
}
else if (isset($_GET['ls_register'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>New IE Imaging Admin User Registration</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
		<?php echo $style; ?>
		<?php echo $reg_style; ?>
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="titlebar">Register Administrator</div>
			<div id="form">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<div style="text-align:left;padding:20px;width:220px;">			
						<label>User:<br />
						<input type="text" name="ls_user" value="" class="text" /></label><br />
						<label>Email Address:<br />
						<input type="text" name="ls_email" value="" class="text" /></label><br />
						<label>Password:
						<input type="password" name="ls_pass" value="" class="text" /></label><br />
						<label>Password Repeat:
						<input type="password" name="ls_repeat" value="" class="text" /></label><br />
						<div style="text-align:center;margin:20px 0px 20px 0px;">
							<input type="submit" name="ls_reg" value="Register" class="btn" />
						</div>
					</div>
				</form>
			</div>
			<div id="foot"><a href="http://www.ieimaging.com" rel="">&copy;2008 IE Imaging</a> Login </div>
		</div>
	</body>
</html>
<?php
exit();
}
else if (!isset($_SESSION['ls_id']) && !isset($_SESSION['ls_user']) && !isset($_SESSION['ls_email'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Log In Required</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
		<?php echo $style; ?>
		<?php echo $log_style; ?>
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="titlebar">IE Imaging Admin Log In Required</div>
			<div id="form">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<div style="text-align:left;padding:20px;width:220px;">			
						<label>User:<br />
						<input type="text" name="ls_user" value="" class="text" /></label><br />
						<label>Password:
						<input type="password" name="ls_pass" value="" class="text" /></label><br />
						<div style="text-align:center;margin:20px 0px 0px 0px;">
							<input type="submit" name="ls_log" value="Log In" class="btn" />
						</div>
						<?php
						if ($registration == 1) {
						?>
						<div style="text-align:right;"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?ls_register" rel="">Register</a></div>
						<?php
						}
						?>
					</div>
				</form>
			</div>
			<div id="foot"><a href="http://www.ieimaging.com" rel="">&copy;2008 IE Imaging</a> Login </div>
		</div>
	</body>
</html>
<?php
exit();
}
?>