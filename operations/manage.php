<?php
$action=$_GET['action'];
?>
<?php
$today = date("F j, Y, g:i a"); 
?>
<?php
$acct=$_GET['acct'];
?>
<?php
$id=$_GET['id'];
?>
<?PHP

include ("functions.php");

//if the user is logged in.
if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";

include ("config_ex.php");

$queryc="SELECT * FROM `maaking_users` WHERE username='$username'";
$resultc=mysql_query($queryc);
$numc=mysql_numrows($resultc);

mysql_close();

$ic=0;
while ($ic < $numc) {

$rank=mysql_result($resultc,$ic,"manager");

$ic++;
}

if ($rank=='yes')

{

if ($action=='promotions')
{
echo "<center><u>Manage Pending Promotions</u></center><br /><br />";

include ("config_ex.php");

$query="SELECT * FROM `maaking_users` WHERE status='Pending'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

	if ($num=='0') {
		echo "<center>No Pending Promotions.</center>"; }

else {

echo "<table width=\"98%\" align=\"center\" border=\"0\">
<tr align=\"center\"><td><b>App ID</b></td><td><b>Full Name</b></td><td><b>Email</b></td><td>Options</td></tr>";

$i=0;
while ($i < $num) {

$userid=mysql_result($result,$i,"userid");
$email=mysql_result($result,$i,"email");
$fullname=mysql_result($result,$i,"fullname");

echo "<tr>
<td align=\"center\">$userid</td>
<td align=\"center\">$fullname</td>
<td align=\"center\">$email</td>
<td align=\"center\">PE <form action=\"approvepilot.php\"><input type=\"text\" size=\"5\" maxlength=4 name=\"id\">&nbsp;&nbsp;<input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"submit\" value=\"Go\"></form></td>
</tr>";

$i++;
}

echo "</table><br /><br /><br />";

}

}
elseif ($action=='pireps') {

echo "<center><u>Manage Pending PIREPs</u></center><br /><br />";

include ("config_ex.php");

$query="SELECT * FROM `logbooks` WHERE approved='No'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

	if ($num=='0') {
		echo "<center>No Pending PIREPs.</center>"; }

else {

echo "<table width=\"98%\" align=\"center\"><tr align=\"center\"><td><b>Pilot & Flight</b></td><td><b>Dep</b></td><td><b>Arr</b></td><td><b>Dur & Equip</b></td><td><b>CRZ, Fuel, Comments</b></td><td><b>Manage</b></td></tr>";

$i=0;
while ($i < $num) {

$id=mysql_result($result,$i,"reportid");
$pilot=mysql_result($result,$i,"pilot");
$fnum=mysql_result($result,$i,"flightno");
$dep=mysql_result($result,$i,"origin");
$arr=mysql_result($result,$i,"arrive");
$sched_dept_time=mysql_result($result,$i,"sched_dept_time");
$sched_arr_time=mysql_result($result,$i,"sched_arr_time");
$p_dept_time=mysql_result($result,$i,"p_dept_time");
$p_arr_time=mysql_result($result,$i,"p_arr_time");
$duration=mysql_result($result,$i,"duration");
$ac=mysql_result($result,$i,"ac");
$crz=mysql_result($result,$i,"crz");
$fuel=mysql_result($result,$i,"fuel");
$comments=mysql_result($result,$i,"comments");

echo "<tr>
<td align=\"center\">$pilot<br />$fnum</td>
<td align=\"center\">$dep<br />S: $sched_dept_time<br />P: $p_dept_time</td>
<td align=\"center\">$arr<br />S: $sched_arr_time<br />P: $p_arr_time</td>
<td align=\"center\">$duration hrs<br />$ac</td>
<td align=\"center\">FL$crz | Fuel: $fuel lbs<br />$comments</td>
<td align=\"center\"><form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pirep_approve\"><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"submit\" value=\"Approve\"></form><br /><form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pirep_delete\"><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"submit\" value=\"Delete\"></form></td>
</tr>";

$i++;
}
echo "</table><br /><br /><br />";
}

}
elseif ($action=='pirep_approve') {

echo "<center><br /><br /><b>Are you sure you wish to approve PIREP $id?<br /><br /><form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pirep_approve_conf\"><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"submit\" value=\"Yes\"></form>&nbsp;&nbsp;&nbsp;<form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pireps\"><input type=\"submit\" value=\"No\"></form></center>";

}
elseif ($action=='pirep_approve_conf') {

include ("config_ex.php");

mysql_query("UPDATE `logbooks` SET approved='Yes' WHERE reportid='$id'");

echo "<center><br /><br /><b>PIREP $id Approved!</b><br /><br /><a href=\"manage.php?action=pireps\">Back.</a></center>";

}
elseif ($action=='pirep_delete') {

echo "<center><br /><br /><b>Are you sure you wish to delete PIREP $id?<br /><br /><form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pirep_delete_conf\"><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"submit\" value=\"Yes\"></form>&nbsp;&nbsp;&nbsp;<form action=\"manage.php\"><input type=\"hidden\" name=\"action\" value=\"pireps\"><input type=\"submit\" value=\"No\"></form></center>";

}
elseif ($action=='pirep_delete_conf') {

include ("config_ex.php");

$query="SELECT * FROM `logbooks` WHERE reportid='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result);

echo "<center><table width=\"98%\" align=\"center\"><tr align=\"center\"><td><b>Pilot & Flight</b></td><td><b>Dep</b></td><td><b>Arr</b></td><td><b>Dur & Equip</b></td><td><b>CRZ, Fuel, Comments</b></td></tr>";

$i=0;
while ($i < $num) {

$pilot=mysql_result($result,$i,"pilot");
$fnum=mysql_result($result,$i,"flightno");
$dep=mysql_result($result,$i,"origin");
$arr=mysql_result($result,$i,"arrive");
$sched_dept_time=mysql_result($result,$i,"sched_dept_time");
$sched_arr_time=mysql_result($result,$i,"sched_arr_time");
$p_dept_time=mysql_result($result,$i,"p_dept_time");
$p_arr_time=mysql_result($result,$i,"p_arr_time");
$duration=mysql_result($result,$i,"duration");
$ac=mysql_result($result,$i,"ac");
$crz=mysql_result($result,$i,"crz");
$fuel=mysql_result($result,$i,"fuel");
$comments=mysql_result($result,$i,"comments");

echo "<tr>
<td align=\"center\">$pilot<br />$fnum</td>
<td align=\"center\">$dep<br />S: $sched_dept_time<br />P: $p_dept_time</td>
<td align=\"center\">$arr<br />S: $sched_arr_time<br />P: $p_arr_time</td>
<td align=\"center\">$duration hrs<br />$ac</td>
<td align=\"center\">FL$crz | Fuel: $fuel lbs<br />$comments</td>
</tr>";

$i++;
}

echo "</table>";

echo "<br /><br /><center><form action=\"notifypilot.php\">Reason for Delete:<br /><input type=\"text\" size=\"50\" name=\"r\"><br /><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"hidden\" name=\"pilot\" value=\"$pilot\"><input type=\"hidden\" name=\"admin\" value=\"$username\"><input type=\"submit\" value=\"Delete PIREP\"></form></center>";

}else{

echo "";

}

}

else{

echo "<center><b>You are not a manager.</b></center>";

}


include ("footer_nav.php");

      include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: users.php");  die();
     echo "Welcome visitor, please login.";

     include ("footer.php");

}

?>
