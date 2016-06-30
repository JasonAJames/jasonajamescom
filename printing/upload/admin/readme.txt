##################### Login Session 2.0 #######################

Login Session is a simple login script.  It supports multiple users, and
can be used to protect web pages from unwanted visitors.  Users, email 
addresses, and passwords are stored in a flat file.  Email addresses are
base64_encoded, and passwords are MD5 encoded.  To get started, 
simply upload one file to your web server and add one line of code to 
your page.  100% Valid XHTML 1.0 Strict coding.

__________________________________________________________________

Licensing:

This script is released under IE Imaging Licensing terms.  

Support is available at http://www.ieimaging.com

###############################################################

// Installation Requirements //

- PHP 4+

// Installation Instructions //

1. Edit the variables in the login.php file.

2. Upload the login.php file to your webserver.

3. Paste the following code on the first line of the web page you would like
   to protect:  <?php require("login.php"); ?>

4. If the extension on your webpage is not .php, change the extension to .php.
   Example: Rename homepage.htm to homepage.php

5. Visit the webpage and create your first login.

That should be it.  You now have a password protected webpage.

Options:

To add a logout option to your page use the following code:
<a href="<?php $_SERVER['PHP_SELF']; ?>?ls_logout" rel="">Logout</a>

To display the user's name use the following code:
<?php echo $_SESSION['ls_user']; ?>

To display the user's email address use the following code:
<?php echo $_SESSION['ls_email']; ?>

###############################################################

// Updates & Bugfixes //

02/20/2008 - Version 4.20 Released