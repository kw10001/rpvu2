<?php
$pid=$_GET['requiredPilotID']
?>
<?php
$name=$_GET['requiredPilotName']
?>
<?php
$email=$_GET['requiredPilotEmail']
?>
<?php
$vatid=$_GET['requiredVATid']
?>
<?php
$password=$_GET['requiredPassword1']
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Regional Pilots Virtual Union</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://www.kylanwalters.com/rpvu/default.css" rel="stylesheet" type="text/css" />
<link href="http://www.kylanwalters.com/rpvu/layout.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="http://www.kylanwalters.com/rpvu/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://www.kylanwalters.com/rpvu/favicon.ico" type="image/x-icon">
<style type="text/css">
<!--
	@import url("/layout.css");
-->
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<center><img src="http://www.kylanwalters.com/rpvu/images/header_logo.jpg" alt="Regional Pilots Virtual Union" /></center>
	</div>
	<div id="main-menu">
		<center><ul>
			<li class="first"><a href="http://www.kylanwalters.com/rpvu/" id="main-menu1" accesskey="1" title="Home">Home</a></li>
			<li><a href="http://www.kylanwalters.com/rpvu/operations/" id="main-menu2" accesskey="2" title="Pilot Operations">Pilot Operations Center</a></li>
			<li><a href="http://www.kylanwalters.com/rpvu/forums/" id="main-menu3" accesskey="3" title="Forums">Forums</a></li>
			<li><a href="http://www.kylanwalters.com/rpvu/join/" id="main-menu4" accesskey="4" title="Careers">Careers</a></li>
			<li><a href="http://www.kylanwalters.com/rpvu/contact.php" id="main-menu5" accesskey="5" title="Contact Us">Contact Us</a></li><li><a href="/roster.php" id="main-menu6" accesskey="6" title="Roster">Roster</a></li></center>
		</ul>
	</div>
	<div id="content">
		<div id="left">
<h2 class="bigger">You have applied to RPVU</h2>

<?php

include ("config_ex.php");

if (mysql_query("INSERT INTO `maaking_users` (username, password, fullname, vatid) VALUES ('$email', MD5( '$password' ), '$name', '$vatid')"))
{
	echo "<center><b>Thank you for applying!</b><br /><br />Your application has been sent! Do not navigate away from this page until it finishes loading. You may now login using your email and password.</center>";

$from = "From: RPVU Human Resources <kwalters@vregionalpilots.com>";
$to = "kylanwalters@gmail.com";
$subject = "RPVU Application : Pending";
$body = "A pilot has submitted an application.


";

if(mail($to,$subject,$body,$from)) echo "";
else echo "MAIL FAILED";

$from = "From: RPVU Human Resources <kwalters@vregionalpilots.com>";
$to = "kylanwalters@gmail.com";
$subject = "RPVU Application : Pending";
$body = "A pilot has submitted an application.


";

if(mail($to,$subject,$body,$from)) echo "";
else echo "MAIL FAILED";

$from = "From: RPVU Human Resources <kwalters@vregionalpilots.com>";
$to = "$email";
$subject = "Welcome to the Regional Pilots Virtual Union";
$body = "Welcome to the Regional Pilots Virtual Union! Below is your login information:

Pilot ID: $email
Password: $password

You may login on our website, http://www.vregionalpilots.com . As soon as you login, you must download the pilot handbook, available directly on the operations home page. Please also feel free to join us on the forums. WHEN YOU JOIN THE FORUMS, you must use your full name as used on your application in order to be approved.

Once again, welcome aboard. We look forward to seeing you in the virtual skies.

Regards,

Kylan Walters
President / CEO
Regional Pilots Virtual Union


";

if(mail($to,$subject,$body,$from)) echo "";
else echo "MAIL FAILED";

}
else{
	echo "<center><b>Your Application Failed to Send.</b><br /><br />It is possible this email already has an account with RPVU. If application continues to fail, contact <a href=\"mailto:hr@vregionalpilots.com\">Human Resources</a>."; }


?>
</div>
	</div>

	<div class="hr1">
	<hr />
	</div>


	<div id="footer">
		<p>Copyright &copy; 2009. Regional Pilots Virtual Union (RPVU).<br />RPVU is not a real-world airline and does not offer any real-world product or service. RPVU is not associated, affiliated or endorsed by any real-world service, organization, or corporation of any kind. RPVU does not employ any employees nor does it provide monetary or any other imbursement to its members.<br /><br /><a href="http://www.getfirefox.com" target="_blank">Site Best Viewed With Firefox</a></p>
	</div>
</div>
</body>
</html>
