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
<script>/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: wsabstract.com | http://www.wsabstract.com */
function checkrequired(which) {
  var pass=true;
  for (i=0;i<which.length;i++) {
    var tempobj=which.elements[i];
    if (tempobj.name.substring(0,8)=="required") {
      if (((tempobj.type=="text"||tempobj.type=="textarea")&&
          tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&
          tempobj.selectedIndex==0)) {
        pass=false;
        break;
      }
    }
  }
  if (!pass) {
    shortFieldName=tempobj.name.substring(8,30).toUpperCase();
    alert("The "+shortFieldName+" field is a required field.");
    return false;
  } else {
  return true;
  }
}</script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<center><img src="/images/header_logo.jpg" alt="Regional Pilots Virtual Union" /></center>
	</div>
	<div id="main-menu">
		<center><ul>
			<li class="first"><a href="/" id="main-menu1" accesskey="1" title="Home">Home</a></li>
			<li><a href="/operations/" id="main-menu2" accesskey="2" title="Pilot Operations">Pilot Operations Center</a></li>
			<li><a href="/forums/" id="main-menu3" accesskey="3" title="Forums">Forums</a></li>
			<li><a href="/join/" id="main-menu4" accesskey="4" title="Careers">Careers</a></li>
			<li><a href="/contact.php" id="main-menu5" accesskey="5" title="Contact Us">Contact Us</a></li><li><a href="/roster.php" id="main-menu6" accesskey="6" title="Roster">Roster</a></li></center>
		</ul>
	</div>
	<div id="content">
		<div id="left">
<h2 class="bigger">Join the Regional Pilots Virtual Union</h2>
<p>By applying, you agree to follow the rules and regulations set forth by the Regional Pilots
Virtual Union. You are required to fly on the VATSIM network at least once a month. You must
use our flight schedules, and depart no earlier than 5 minutes before the scheduled time and no
later than 15 minutes after the scheduled time. You must maintain a professional decorum at all
times. Please note now that we do not accept the transfer of hours. Your application is completely automated.</p>


<center><form action="send_app.php" onSubmit="return checkrequired(this)">
<table>
<tr><td>Full Name:<td/><td>&nbsp;&nbsp;&nbsp;<input type="text" size="20" name="requiredPilotName" />&nbsp;&nbsp;&nbsp;<td/><tr/>    <br/>
<tr><td>Email Address:<td/><td>&nbsp;&nbsp;&nbsp;<input type="text" size="20" name="requiredPilotEmail" /><td/><tr/>    <br />
<tr><td>What is your VATSIM ID&nbsp;&nbsp;&nbsp;<td/><td>&nbsp;&nbsp;&nbsp;<input type="text" name="requiredVATid" size="20" /><td/><tr/>    <br/>
<tr><td>Desired Password:<td/><td>&nbsp;&nbsp;&nbsp;<input type="password" size="20" name="requiredPassword1" maxlength="20" /><td/><tr/>    <br/><br/>
</table>

<br><textarea cols="60" name="text" rows="6">Terms Of Service

By applying, you agree to follow the rules and regulations set forth by the Regional Pilots Virtual Union.
You are required to fly on the VATSIM network at least once a month. You must use our flight schedules,
and depart no earlier than 5 minutes before the scheduled time and no later than 15 minutes after the
scheduled time. You must maintain a professional decorum at all times. Please note now that we do not
accept the transfer of hours. Your application is completely automated.</textarea>

<br><br>I am over the age of 13 and agree with the Terms of Service Above

<br><br><INPUT TYPE=CHECKBOX NAME="maillist">Agree&nbsp;
<INPUT TYPE=CHECKBOX NAME="maillist">Disagree





<br><br><tr><td><input type="submit" value="Apply Now!" /><td/><td></form><td/><tr/><br /><br /></center>
</p>
		</div>
	</div>

	<div class="hr1">
	<hr />
	</div>


	<div id="footer">
		<p>Copyright &copy; 2009. Regional Pilots Virtual Union (RPVU).<br />RPVU is not a real-world airline
		and does not offer any real-world product or service. RPVU is not associated, affiliated or endorsed
		by any real-world service, organization, or corporation of any kind. RPVU does not employ any employees
		nor does it provide monetary or any other imbursement to its members.<br /><br />
		<a href="http://www.getfirefox.com" target="_blank">Site Best Viewed With Firefox</a></p>
	</div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4380762-8");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
