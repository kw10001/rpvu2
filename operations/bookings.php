<?php
$action=$_POST['action'];
?>
<?php
$fnum=$_POST['fnum'];
?>
<?php
$bid=$_POST['bid'];
?>
<?php
$dep=$_POST['dep'];
?>
<?php
$today = date("F j, Y, g:i a"); 
?>
<?php
$dayoftoday=date('D');
?>
<?php
$dayoftoday1=date('D',mktime()-86400);
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

echo "<h2 class=\"bigger\">Flight Reports and Bookings</h2>";

if ($action=='file')
{

include ("config_ex.php");

$query="SELECT * FROM `bookings` WHERE pilot='$username'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

	if ($num=='0') {
		echo "<center><b>You have no bookings.</b> Please <a href=\"routes.php\">book a flight</a> to continue with the filing process.</center>"; }

else {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Options</td></tr>";

include ("config_ex.php");

$query="SELECT * FROM `bookings` WHERE pilot='$username'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$flightno=mysql_result($result,$i,"flightno");
$ac=mysql_result($result,$i,"ac");
$origin=mysql_result($result,$i,"origin");
$arrive=mysql_result($result,$i,"arrive");
$dept_time=mysql_result($result,$i,"dept_time");
$arr_time=mysql_result($result,$i,"arr_time");
$duration=mysql_result($result,$i,"duration");
$bida=mysql_result($result,$i,"bid");

echo "<tr><td width=\"75px\" align=\"center\">$flightno</td><td width=\"200px\" align=\"center\">$origin<br />$dept_time</td><td width=\"200px\" align=\"center\">$arrive<br />$arr_time</td><td width=\"75px\" align=\"center\">$duration hrs</td><td width=\"75px\" align=\"center\">$ac</td><td width=\"75px\" align=\"center\"><form action=\"bookings.php\" method=\"post\"><input type=\"hidden\" name=\"bid\" value=\"$bida\"><input type=\"hidden\" name=\"action\" value=\"fileflight\"><input type=\"submit\" value=\"File\"></form><form action=\"bookings.php\" method=\"post\"><input type=\"hidden\" name=\"bid\" value=\"$bida\"><input type=\"hidden\" name=\"action\" value=\"deletebooking\"><input type=\"submit\" value=\"Delete\"></form></td>
</tr>";

$i++;
}
echo "</table><br /><br />";
}
}
elseif ($action=='deletebooking') {

include ("config_ex.php");

mysql_query("DELETE FROM `bookings` WHERE pilot='$username' AND bid='$bid'");

echo "<center><br />Your booking has been deleted.<br /><br /><br /><a href=\"bookings.php?action=file\">Return to the bookings area.</a></center>";

}elseif ($action=='fileflight') {

include ("config_ex.php");

$queryb="SELECT * FROM `bookings` WHERE bid=$bid";
$resultb=mysql_query($queryb);
$numb=mysql_numrows($resultb);

mysql_close();

$ib=0;
while ($ib < $numb) {

$flightno=mysql_result($resultb,$ib,"flightno");
$ac=mysql_result($resultb,$ib,"ac");
$origin=mysql_result($resultb,$ib,"origin");
$arrive=mysql_result($resultb,$ib,"arrive");
$dept_time=mysql_result($resultb,$ib,"dept_time");
$arr_time=mysql_result($resultb,$ib,"arr_time");
$duration=mysql_result($resultb,$ib,"duration");

$ib++;
}

echo "<br /><br /><form action=\"sendflight.php\" onSubmit=\"return checkrequired(this)\" method=\"post\"><center>Filing <u>$flightno</u> : Sched Depart $origin @ $dept_time / Sched Arrive $arrive @ $arr_time.<br />Equipment: $ac  |  Sched Duration: $duration hrs<br /><br />Your Departure Time*: <input type=\"text\" name=\"requiredp_dep\" size=\"6\" maxlength=5> (00:00 Format)<br />Your Arrival Time: <input type=\"text\" name=\"requiredp_arr\" size=\"6\" maxlength=5> (00:00 Format)<br /><br />Your Duration: <select name=\"requireddur_hours\"><option></option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select> hours, <select name=\"requireddur_mins\"><option></option><option value=\".0\">0-5</option><option value=\".1\">6-11</option><option value=\".2\">12-17</option><option value=\".3\">18-23</option><option value=\".4\">24-29</option><option value=\".5\">30-35</option><option value=\".6\">36-41</option><option value=\".7\">42-47</option><option value=\".8\">48-53</option><option value=\".9\">54-59</option></select> minutes<br /><br /><input type=\"hidden\" name=\"bid\" value=\"$bid\">Cruise Altitude: FL <input type=\"text\" name=\"requiredcrz\" size=\"5\" maxlength=3><br />Fuel Consumed: <input type=\"text\" name=\"requiredfuel\" size=\"6\"> lbs<br /><br />Flight Plan Route: <input type=\"text\" name=\"requiredroute\" size=\"50\"><br />Comments: <input type=\"text\" name=\"comments\" size=\"50\"><br /><br /><input type=\"submit\" value=\"File This Flight\"></form><br /><br />* You may depart in FS no more than 5 minutes prior to the scheduled time or 15 minutes after the scheduled time.";

}

      include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: index.php");  die();
     echo "Welcome visitor, please login.";

     include ("footer.php");

}

?>
