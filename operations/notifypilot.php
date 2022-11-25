<?php
$pilot=$_GET['pilot'];
?>
<?php
$admin=$_GET['admin'];
?>
<?php
$id=$_GET['id'];
?>
<?php
$r=$_GET['r'];
?>

<?php

include ('header.php');

echo "<center><b>Report $id Deleted.</b><br /><br />This report has been emailed to you. <b>PLEASE WAIT UNTIL THIS PAGE FINISHES LOADING TO MOVE ON.</b><br /><br /><a href=\"/operations/\">Back.</a></center>";

include ('footer.php');

?>

<?php

include ("config_ex.php");

$query="SELECT * FROM `logbooks` WHERE reportid='$id' AND pilot='$pilot'";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$id=mysql_result($result,$i,"reportid");
$pilot=mysql_result($result,$i,"pilot");
$date=mysql_result($result,$i,"date");
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

$i++;
}

include ("config_ex.php");

$querya="SELECT * FROM `maaking_users` WHERE username='$pilot'";
$resulta=mysql_query($querya);
$numa=mysql_numrows($resulta);

mysql_close();

$ia=0;
while ($ia < $numa) {

$p_fullname=mysql_result($resulta,$ia,"fullname");

$ia++;
}

include ("config_ex.php");

$queryb="SELECT * FROM `maaking_users` WHERE username='$admin'";
$resultb=mysql_query($queryb);
$numb=mysql_numrows($resultb);

mysql_close();

$ib=0;
while ($ib < $numb) {

$a_fullname=mysql_result($resultb,$ib,"fullname");

$ib++;
}

?>
<?

$from = "From: $a_fullname <$admin>";
$to = "$pilot";
$subject = "Pilot Report $fnum Deleted";
$body = "Hello $p_fullname ($pilot):

Your recent flight report, filed at $date UTC, was deleted by an administrator for the following reasons:

$r

The entire report is listed below. If correction procedures are not included in the reasons, please reply to this email kindly asking what correction procedures you may use.

###

Flown on: $date UTC
Flight Number: $fnum
Dep: $dep | Scheduled at $sched_dept_time | Pilot Reported $p_dept_time
Arr: $arr | Schedueld at $sched_arr_time | Pilot Reports $p_arr_time
Duration: $duration
Equip: $ac
Cruise Alt: FL$crz
Fuel Burn: $fuel lbs
Comments: $comments


";

if(mail($to,$subject,$body,$from)) echo "";
else echo "MAIL FAILED";
?>
<?

$from = "From: RPVU Admin Center <hr@vregionalpilots.com>";
$to = "$admin";
$subject = "ADMIN COPY : Pilot Report Deleted";
$body = "Hello $a_fullname:

You recently deleted a flight report, filed at $date UTC, by pilot $p_fullname ($pilot). The reason you listed was:

$r

The entire report is listed below. The pilot has been told to kindly contact you via email for further support.

###

Flown on: $date UTC
Flight Number: $fnum
Dep: $dep | Scheduled at $sched_dept_time | Pilot Reported $p_dept_time
Arr: $arr | Schedueld at $sched_arr_time | Pilot Reports $p_arr_time
Duration: $duration
Equip: $ac
Cruise Alt: FL$crz
Fuel Burn: $fuel lbs
Comments: $comments


";

if(mail($to,$subject,$body,$from)) echo "";
else echo "MAIL FAILED";
?>

<?php

include ("config_ex.php");

mysql_query("DELETE FROM `logbooks` WHERE reportid='$id'");

?>