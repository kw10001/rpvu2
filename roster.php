<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Regional Pilots Virtual Union</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
	@import url("/layout.css");
-->
</style>
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
			<li><a href="/contact.php" id="main-menu5" accesskey="5" title="Contact Us">Contact Us</a></li>
			<li><a href="/roster.php" id="main-menu6" accesskey="6" title="Roster">Roster</a></li></center>
		</ul>
	</div>
	<div id="content">
		<div id="left">
			<h2 class="bigger">Pilot Roster</h2>
<?php
include ("config_hd.php");

$query="SELECT * FROM `maaking_users` ORDER BY userid ASC";
$result=mysql_query($query);
$num=mysql_numrows($result);

?>
<?php
include ("roster_total.php");
?>
<center><i>Total Hours of Airline:</i> <?php echo "$totalhours"; ?><br /></center><br />
<table width="95%" align="center">
<tr align="center"><td><b>Name</b></td><td><b>Member Since</b></td><td><b>Rank</b></td><td><b>VATSIM ID</b></td><td><b>Total Hours</b></td></tr>

<?php
$i=0;
while ($i < $num) {

$username=mysql_result($result,$i,"username");
$fullname=mysql_result($result,$i,"fullname");
$rank=mysql_result($result,$i,"rank");
$regdate=mysql_result($result,$i,"regdate");
$manager=mysql_result($result,$i,"manager");
$vatsim=mysql_result($result,$i,"vatid");
?>
<tr>
<td align="center"><?php if ($manager=='yes') {echo "<i>$fullname</i> *"; }else{ echo "$fullname"; } ?></td>
<td align="center"><?php echo "$regdate"; ?></td>
<td align="center"><?php echo "$rank"; ?></td>
<td align="center"><?php echo "$vatsim"; ?></td>
<td align="center"><?php include ("roster_hours.php"); 
echo "$singlehours"; ?></td></tr>

<?php
$i++;
}
?>
</table><br /><br /><center>* Managers are noted with italics.</center><br /><br />
</div>
	</div>

	<div class="hr1">
	<hr />
	</div>


	<div id="footer">
		<p>Copyright &copy; 2009. Regional Pilots Virtual Union (RPVU).<br />RPVU is not a real-world airline and does not offer any real-world product or service. RPVU is not associated, affiliated or endorsed by any real-world service, organization, or corporation of any kind. RPVU does not employ any employees nor does it provide monetary or any other imbursement to its members.<br /><br /><a href="http://www.getfirefox.com" target="_blank">Site Best Viewed With Firefox</a></p>
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

