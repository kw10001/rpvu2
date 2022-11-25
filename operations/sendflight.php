<?php
$bid=$_POST['bid'];
?>
<?php
$p_dep=$_POST['requiredp_dep'];
?>
<?php
$p_arr=$_POST['requiredp_arr'];
?>
<?php
$dur_hours=$_POST['requireddur_hours'];
?>
<?php
$dur_mins=$_POST['requireddur_mins'];
?>
<?php
$crz=$_POST['requiredcrz'];
?>
<?php
$fuel=$_POST['requiredfuel'];
?>
<?php
$route=$_POST['requiredroute'];
?>
<?php
$comments=$_POST['comments'];
?>
<?php
$today = date("F j, Y, g:i a"); 
?>
<?php
$day=date('D');
?>
<?PHP

include ("functions.php");

if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";

include ("config_ex.php");

$query="SELECT * FROM `bookings` WHERE bid='$bid'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$flightno=mysql_result($result,$i,"flightno");
$unorigin=mysql_result($result,$i,"origin");
$unarrive=mysql_result($result,$i,"arrive");
$ac=mysql_result($result,$i,"ac");
$day=mysql_result($result,$i,"day");
$dept_time=mysql_result($result,$i,"dept_time");
$arr_time=mysql_result($result,$i,"arr_time");

$i++;
}

include ("config_ex.php");

$origin = mysql_real_escape_string($unorigin);
$arrive = mysql_real_escape_string($unarrive);
$fix_comments = mysql_real_escape_string($comments);
$fix_route = mysql_real_escape_string($route);

mysql_query("INSERT INTO `logbooks` (pilot, date, flightno, origin, arrive, sched_dept_time, sched_arr_time, p_dept_time, p_arr_time, duration, ac, crz, fuel, route, comments) VALUES ('$username', '$today', '$flightno', '$origin', '$arrive', '$dept_time', '$arr_time', '$p_dep', '$p_arr', '$dur_hours$dur_mins', '$ac', '$crz', '$fuel', '$fix_route', '$fix_comments')");

include ("config_ex.php");

mysql_query("DELETE FROM `bookings` WHERE pilot='$username' AND bid='$bid'");

echo "<center><b>Flight Report Submitted</b><br /><br />Your flight has been submitted and your booking for this flight has been deleted. Note: your flight report is currently pending approval by a management team member, you may check its approval status in your logbook.<br /><br /><br /><br /><u>Suggested Return Flights</u><br /><table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE origin='$arrive' && arrive='$origin' ORDER BY arrive ASC";
$resulta=mysql_query($querya);
$numa=mysql_numrows($resulta);
mysql_close();

$ia=0;
while ($ia < $numa) {

$flightno=mysql_result($resulta,$ia,"flightno");
$ac=mysql_result($resulta,$ia,"ac");
$origin=mysql_result($resulta,$ia,"origin");
$arrive=mysql_result($resulta,$ia,"arrive");
$dept_time=mysql_result($resulta,$ia,"dept_time");
$arr_time=mysql_result($resulta,$ia,"arr_time");
$duration=mysql_result($resulta,$ia,"duration");
$id=mysql_result($resulta,$ia,"id");

echo "<tr><td width=\"75px\" align=\"center\">$flightno</td><td width=\"200px\" align=\"center\">$origin<br />$dept_time</td><td width=\"200px\" align=\"center\">$arrive<br />$arr_time</td><td width=\"75px\" align=\"center\">$duration hrs</td><td width=\"75px\" align=\"center\">$ac</td><td width=\"75px\" align=\"center\"><form action=\"book.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"$id\"><input type=\"submit\" value=\"Book\"></form></td></tr>";

$ia++;
}
echo "</table>";

echo "<br /><br /></center>";


      include ("footer.php");


//if the user is not logged in, then tell him to login.
}else{
     header("Location: index.php");  die();
}


?>
