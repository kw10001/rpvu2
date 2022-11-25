<?PHP

if (eregi("header.php", $_SERVER['SCRIPT_NAME'])) {
    Header("Location: index.php"); die();
}

global $site_name, $site_url, $site_info, $site_email, $tmp_header;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Regional Pilots Virtual Union : Operations</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://www.kylanwalters.com/rpvu/default.css" rel="stylesheet" type="text/css" />
<link href="http://www.kylanwalters.com/rpvu/layout.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="http://www.kylanwalters.com/rpvu/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://www.kylanwalters.com/rpvu/favicon.ico" type="image/x-icon">
<script>
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
		<center><a href="http://www.kylanwalters.com/rpvu/operations/"><img src="http://www.kylanwalters.com/rpvu/images/header_logo.jpg" alt="Regional Pilots Virtual Union" border="0" /></a></center>
	</div>
	<div id="main-menu">
		<center><ul>
			<li class="first"><a href="index.php" id="main-menu1" accesskey="1" title="Home">Ops Home</a></li>
			<li><a href="/forums/" id="main-menu2" accesskey="2" title="Forums">Forums</a></li>
			<li><a href="routes.php" id="main-menu3" accesskey="3" title="Routes">Routes</a></li>
			<li><a href="logbook.php" id="main-menu4" accesskey="4" title="Logbook">Pilot Logbook</a></li>
			<li><a href="downloads.php" id="main-menu5" accesskey="5" title="Downloads">Downloads</a></li>
			<li><a href="bookings.php?action=file" id="main-menu6" accesskey="6" title="File Flight">File Flight</a></li>
			<li><a href="wx.php" id="main-menu7" accesskey="7" title="Wx Info">Wx Info</a></li>
<li><a href="index.php?maa=Logout" id="main-menu8" accesskey="8" title="Logout">Logout</a></li></center>
		</ul>
	</div>
	<div id="content">
		<div id="left">
