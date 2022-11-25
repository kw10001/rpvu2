
<?PHP
###########################################
#-----------Users login system------------#
###########################################
/*=========================================\
Author      :  Mohammed Ahmed(M@@king)    \\
Version     :  1.1                        \\
Date Created:  Aug 20  2005               \\
----------------------------              \\
Last Update:    18-SEP-2006               \\
----------------------------              \\
Country    :   Palestine                  \\
City       :   Gaza                       \\
E-mail     :   m@maaking.com              \\
WWW        :   http://www.maaking.com     \\
Mobile/SMS :   00972-599-622235           \\
                                          \\
===========================================\
------------------------------------------*/

include ("functions.php");

//if the user is logged in.
if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";

echo "<h2 class=\"bigger\">Pilot Logbook</h2>";

include ("config_ex.php");

$sqla="SELECT Sum(Duration) FROM logbooks WHERE pilot = '$username'";

$resulta = mysql_query ($sqla)
or die (mysql_error());
if ($myresult = mysql_result($resulta,0))

echo "<center><b>Total Hours:</b> $myresult</center>"; 

$query="SELECT * FROM maaking_users WHERE username = '$username'";
$result=mysql_query($query);

$num=mysql_numrows($result);

$result_all_rows = mysql_query("SELECT * FROM `logbooks` WHERE pilot='$username'");

         $totalrows = mysql_num_rows($result_all_rows);

mysql_close();

$i=0;
while ($i < $num) {

$rank=mysql_result($result,$i,"rank");
$pilotstatus=mysql_result($result,$i,"status");
$regdate=mysql_result($result,$i,"regdate");
$fullname=mysql_result($result,$i,"fullname");

echo "<center><b>Pilot Rank:</b> $rank<br /><b>Member Since:</b> $regdate<br /><br /><u>$fullname's Logbook</u></center><br /><br />";

if (($myresult > 9.9) && ($rank=='Trainee')) {

include ("config_ex.php");

$queryq="SELECT * FROM `promote` WHERE userid='$username'";
$resultq=mysql_query($queryq);
$numq=mysql_numrows($resultq);
mysql_close();

if ($numq=='0')
echo "<center>You are eligible for a promotion. <form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"rank\" value=\"Second Officer\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"submit\" value=\"Request Second Officer Rank\"></form></center><br /><br />";
else
echo "<center>Your promotion request is currently in review.</center><br /><br />";

}elseif (($myresult > 49.9) && ($rank=='Second Officer')) {

include ("config_ex.php");

$queryq="SELECT * FROM `promote` WHERE userid='$username'";
$resultq=mysql_query($queryq);
$numq=mysql_numrows($resultq);
mysql_close();

if ($numq=='0')
echo "<center>You are eligible for a promotion. <form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"rank\" value=\"First Officer\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"submit\" value=\"Request First Officer Rank\"></form></center><br /><br />";
else
echo "<center>Your promotion request is currently in review.</center><br /><br />";

}elseif (($myresult > 199.9) && ($rank=='First Officer')) {

include ("config_ex.php");

$queryq="SELECT * FROM `promote` WHERE userid='$username'";
$resultq=mysql_query($queryq);
$numq=mysql_numrows($resultq);
mysql_close();

if ($numq=='0')
echo "<center>You are eligible for a promotion. <form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"rank\" value=\"Captain\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"submit\" value=\"Request Captain Rank\"></form></center><br /><br />";
else
echo "<center>Your promotion request is currently in review.</center><br /><br />";

}elseif (($myresult > 899.9) && ($rank=='Captain')) {

include ("config_ex.php");

$queryq="SELECT * FROM `promote` WHERE userid='$username'";
$resultq=mysql_query($queryq);
$numq=mysql_numrows($resultq);
mysql_close();

if ($numq=='0')
echo "<center>You are eligible for a promotion. <form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"rank\" value=\"Chief Pilot\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"submit\" value=\"Request Chief Pilot Rank\"></form></center><br /><br />";
else
echo "<center>Your promotion request is currently in review.</center><br /><br />";

}elseif (($myresult > 1499.9) && ($rank=='Chief Pilot')) {

include ("config_ex.php");

$queryq="SELECT * FROM `promote` WHERE userid='$username'";
$resultq=mysql_query($queryq);
$numq=mysql_numrows($resultq);
mysql_close();

if ($numq=='0')
echo "<center>You are eligible for a promotion. <form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"rank\" value=\"Fleet Captain\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"submit\" value=\"Request Fleet Captain Rank\"></form></center><br /><br />";
else
echo "<center>Your promotion request is currently in review.</center><br /><br />";

}else{
echo "";
}
$i++;
}
?>
<?php
include ("config_ex.php");

echo "<table width=\"98%\" align=\"center\" border=\"0\">
<tr align=\"center\"><td><b>Flight</b></td><td><b>Dep</b></td><td><b>Arr</b></td><td><b>Duration</b></td><td><b>Equipment</b></td><td><b>View Full Report</b></td></tr>";

$users_per_page = "20";
         
         if (!isset($page) or $page=="") $page=1;
         $nexlimit = $page * $users_per_page - $users_per_page;

$query="SELECT * FROM `logbooks` WHERE pilot='$username' ORDER BY reportid DESC LIMIT $nexlimit,$users_per_page";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

$i=0;
while ($i < $num) {

$reportid=mysql_result($result,$i,"reportid");
$flightno=mysql_result($result,$i,"flightno");
$ac=mysql_result($result,$i,"ac");
$origin=mysql_result($result,$i,"origin");
$arrive=mysql_result($result,$i,"arrive");
$date=mysql_result($result,$i,"date");
$duration=mysql_result($result,$i,"duration");

echo "<tr>
<td align=\"center\">$flightno</td>
<td align=\"center\">$origin</td>
<td align=\"center\">$arrive</td>
<td align=\"center\">$duration hrs</td>
<td align=\"center\">$ac</td>
<td align=\"center\"><form action=\"viewreport.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"$reportid\"><input type=\"submit\" value=\"View\"></form></td>
</tr>";

$i++;
}

echo "</table><center>";

$totpages = ceil($totalrows/$users_per_page);
         for ($i=1;$i<=$totpages;$i++) {
	    if ($i==$page) {
		$pages .= " $i ";
	    } else {
		$pages .= "   <a href=\"logbook.php?page=$i\">$i</a>   ";
	    }
         }
         echo "<br /><center>Pages: $pages <br />";

echo "<center><br /<br /><i>All flights listed here are approved by the database. However, the PIREP Moderator must manually review each and every flight filed.</i><br /><br /></center>";

	include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: index.php");  die();
     echo "Welcome visitor, please <a href=\"index.php\">login</a>.";

     include ("footer.php");

}

?>
