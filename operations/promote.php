<?php
$rank=$_POST['rank'];
?>
<?php
$admin_check=$_POST['admin_check'];
?>

<?PHP

include ("functions.php");

if (is_logged_in($user)) {

     include ("header.php");
      $cookie_read = explode("|", base64_decode($user));
      $username = $cookie_read[1];
      //put your code here (protected page).
      echo "Welcome <b>$username</b>.</p>";

if ($admin_check=='admintrue') {

echo "<br /><br /><center><u>Pending Promotions</u><br /><br /><table align=\"center\" width=\"700px\"><tr><td align=\"center\" width=\"175px\"><b>Full Name</b></td><td align=\"center\" width=\"175px\"><b>Email</b></td><td align=\"center\" width=\"175px\"><b>New Rank</b></td><td width=\"175px\" align=\"center\"><b>Promotion Action</b></td></tr>";

include ("config_ex.php");

$querya="SELECT * FROM `promote`";
$resulta=mysql_query($querya);
$numa=mysql_numrows($resulta);
mysql_close();

$ia=0;
while ($ia < $numa) {

$userid=mysql_result($resulta,$ia,"userid");
$fullname=mysql_result($resulta,$ia,"fullname");
$rank=mysql_result($resulta,$ia,"rank");

echo "<tr><td align=\"center\" width=\"175px\">$fullname</td><td align=\"center\" width=\"175px\">$userid</td><td align=\"center\" width=\"175px\">$rank</td><td width=\"175px\" align=\"center\"><form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"admin_check\" value=\"approve\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"fullname\" value=\"$fullname\"><input type=\"hidden\" name=\"rank\" value=\"$rank\"><input type=\"submit\" value=\"Promote\"></form><form action=\"promote.php\" method=\"post\"><input type=\"hidden\" name=\"admin_check\" value=\"review\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"submit\" value=\"Review Log\"></form></td></tr>";

$ia++;
}

echo "</table>";

}else{

include ("config_ex.php");

mysql_query("INSERT INTO `promote` (userid, fullname, rank) VALUES ('$username', '$fullname', '$rank')");

echo "<center><b>Promotion Submitted</b><br /><br />Your promotion request has been submitted. You requested a promotion to $rank.<br /><br /></center>";

}

      include ("footer.php");


//if the user is not logged in, then tell him to login.
}else{
     header("Location: index.php");  die();
}


?>
