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
			<li><a href="/contact.php" id="main-menu5" accesskey="5" title="Contact Us">Contact Us</a></li><li><a href="/roster.php" id="main-menu6" accesskey="6" title="Roster">Roster</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="left">
<center><table class="login"><tr align="center"><td align="center"><a href="pilots.php"><img src="/images/pilots.jpg" alt="Pilot Positions" border="0" /></a></td><td align="center"><a href="management.php"><img src="/images/management.jpg" alt="Management Positions" border="0" /></a></td></tr></table>
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