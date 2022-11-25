<?php
$id=$_POST['reportid']
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
echo "<h2 class=\"bigger\">View Flight Report</h2>";

include ("config_ex.php");

$query="SELECT * FROM `logbooks` WHERE reportid='$id' AND pilot='$username'";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

if ($num=='0')
{
echo "<center><br /><br /><b>This report does not appear to be yours.</b><br /><br />Either you are trying to view a report that is not in your name or this report doesn't exist. Your IP address has been logged, and you may be contacted by an administrator.<br /><br /><u>DO NOT</u> attempt to hack this system.<br /><br /></center>";}

else {

$i=0;
while ($i < $num) {

$pilot=mysql_result($result,$i,"pilot");
$date=mysql_result($result,$i,"date");
$dep=mysql_result($result,$i,"origin");
$arr=mysql_result($result,$i,"arrive");
$fnum=mysql_result($result,$i,"flightno");
$sched_dept_time=mysql_result($result,$i,"sched_dept_time");
$sched_arr_time=mysql_result($result,$i,"sched_arr_time");
$p_dept_time=mysql_result($result,$i,"p_dept_time");
$p_arr_time=mysql_result($result,$i,"p_arr_time");
$duration=mysql_result($result,$i,"duration");
$equip=mysql_result($result,$i,"ac");
$approved=mysql_result($result,$i,"approved");
$route=mysql_result($result,$i,"route");
$crz=mysql_result($result,$i,"crz");
$fuel=mysql_result($result,$i,"fuel");
$comments=mysql_result($result,$i,"comments");

echo "<center><br /><b>Flight Number:</b> $fnum<br /><b>Date Flown:</b> $date UTC<br /><br /><b>Departure:</b> $dep | Scheduled to Depart at $sched_dept_time | Pilot Departed at $p_dept_time.<br /><b>Arrival:</b> $arr | Scheduled to Arrive at $sched_arr_time | Pilot Arrived at $p_arr_time.<br /><b>Duration:</b> $duration hrs<br /><b>Equipment:</b> $equip<br /><br /><b>Cruise Altitude:</b> FL$crz<br /><b>Fuel Used:</b> $fuel lbs<br /><b>Route:</b> $route<br /><b>Comments:</b> $comments<br /><br /><b>Approved:</b> $approved<br /><br /><br />";

$i++;
}

}
	include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: users.php");  die();
     echo "Welcome visitor, please <a href=\"users.php\">login</a>.";

     include ("footer.php");

}

?>
