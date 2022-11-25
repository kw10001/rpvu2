<?php
$func=$_POST['func'];
?>
<?php
$dicao=$_POST['dicao'];
?>
<?php
$aicao=$_POST['aicao'];
?>
<?php
$airline=$_POST['airline'];
?>
<?php
$today=date('D');
?>
<?php
$acsrch=$_POST['acsrch'];
?>
<?php
$dayoftoday1=date('l',mktime()+86400);
?>
<?php
$dayoftoday=date('l');
?>
<?php

if (($aicao=='') && ($acsrch=='') && ($airline=='')) {

$r_func='1';

}elseif (($dicao=='') && ($acsrch=='') && ($airline=='')) {

$r_func='2';

}elseif (($dicao=='') && ($aicao=='') && ($airline=='')) {

$r_func='3';

}elseif (($dicao=='') && ($aicao=='') && ($acsrch=='')) {

$r_func='8';

}elseif (($acsrch=='') && ($airline=='')) {

$r_func='4';

}elseif (($aicao=='') && ($airline=='')) {

$r_func='5';

}elseif (($dicao=='') && ($acsrch=='')) {

$r_func='13';

}elseif (($aicao=='') && ($acsrch=='')) {

$r_func='14';

}elseif (($dicao=='') && ($airline=='')) {

$r_func='6';

}elseif ($acsrch=='') {

$r_func='9';

}elseif ($airline=='') {

$r_func='10';

}elseif ($aicao=='') {

$r_func='11';

}elseif ($dicao=='') {

$r_func='12';

}else{

$r_func='7';

}
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
			echo "<h2 class=\"bigger\">Route Search Engine</h2>";

if ($func=='srchroutes') {

echo "<center><form action=\"routes.php\" method=\"post\"><table align=\"center\" width=\"700px\" border=\"0\" class=\"login\"><tr><td width=\"400px\" align=\"center\">Dept Airport ICAO / Name: <input type=\"text\" name=\"dicao\" size=\"35\"><br />Arr Airport ICAO / Name: <input type=\"text\" name=\"aicao\" size=\"35\"></td><td width=\"300px\" align=\"center\">Equip: <select name=\"acsrch\"><option></option><option>AT72</option><option>B190</option><option>CRJ1</option><option>CRJ2</option><option>CRJ7</option><option>CRJ9</option><option>DH8A</option><option>DH8B</option><option>DH8C</option><option>DH8D</option><option>E120</option><option>E135</option><option>E145</option><option>E170</option><option>E190</option><option>SF34</option></select><br />Airline: <select name=\"airline\"><option></option><option value=\"ACA\">Air Canada (ACA)</option><option value=\"AWI\">Air Wisconsin (AWI)</option><option value=\"EGF\">American Eagle (EGF)</option><option value=\"ASQ\">Atlantic Southeast (ASQ)</option><option value=\"CHQ\">Chautauqua (CHQ)</option><option value=\"CJC\">Colgan Air (CJC)</option><option value=\"COM\">Comair (COM)</option><option value=\"UCA\">CommutAir (UCA)</option><option value=\"CPZ\">Compass Airlines (CPZ)</option><option value=\"BTA\">ExpressJet (BTA)</option><option value=\"FRL\">Freedom Airlines (FRL)</option><option value=\"GJS\">GoJet Airlines (GJS)</option><option value=\"GLA\">Great Lakes Aviation (GLA)</option><option value=\"GFT\">Gulfstream International (GFT)</option><option value=\"MKU\">Hawaii Island Air (MKU)</option><option value=\"QXE\">Horizon Air (QXE)</option><option value=\"JZA\">Jazz Air (JZA)</option><option value=\"JBU\">jetBlue (JBU)</option><option value=\"ASH\">Mesa Airlines (ASH)</option><option value=\"MES\">Mesaba Aviation (MES)</option><option value=\"PDT\">Piedmont Airlines (PDT)</option><option value=\"FLG\">Pinnacle Airlines (FLG)</option><option value=\"JIA\">PSA Airlines (JIA)</option><option value=\"RPA\">Republic Airlines (RPA)</option><option value=\"TCF\">Shuttle America (TCF)</option><option value=\"SKW\">SkyWest Airlines (SKW)</option><option value=\"LOF\">Trans States Airlines (LOF)</option></select></td></tr></table><br /><br /><input type=\"hidden\" name=\"func\" value=\"srchroutes\"><input type=\"submit\" value=\"Search Routes\"></form><br /><br /><hr /><br />";


if ($r_func=='1') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY arrive ASC";
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

}elseif ($r_func=='2') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY origin ASC";
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

}elseif ($r_func=='3') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE ac='$acsrch' ORDER BY origin, arrive ASC";
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

}elseif ($r_func=='8') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY origin, arrive ASC";
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

}elseif ($r_func=='4') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY flightno ASC";
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

}elseif ($r_func=='5') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY arrive ASC";
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

}elseif ($r_func=='13') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY arrive, flightno ASC";
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

}elseif ($r_func=='14') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY arrive, flightno ASC";
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

}elseif ($r_func=='9') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci ORDER BY origin, arrive ASC";
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

}elseif ($r_func=='10') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY origin, arrive ASC";
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

}elseif ($r_func=='11') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY arrive, flightno ASC";
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

}elseif ($r_func=='12') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `flightno` LIKE CONVERT( _utf8 '%$airline%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY origin, flightno ASC";
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

}elseif ($r_func=='6') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY origin ASC";
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

}elseif ($r_func=='7') {

echo "<table width=\"700px\" border=\"1\"><tr><td width=\"75px\" align=\"center\"><b>Flight Number</b></td><td width=\"200px\" align=\"center\"><b>Departure</b></td><td width=\"200px\" align=\"center\"><b>Arrival</b></td><td width=\"75px\" align=\"center\"><b>Duration</b></td><td width=\"75px\" align=\"center\"><b>Equipment</b></td><td width=\"75px\" align=\"center\">Book</td></tr>";

include ("config_ex.php");

$querya="SELECT *
FROM `routes`
WHERE `origin` LIKE CONVERT( _utf8 '%$dicao%'
USING latin1 )
COLLATE latin1_swedish_ci && `arrive` LIKE CONVERT( _utf8 '%$aicao%'
USING latin1 )
COLLATE latin1_swedish_ci && ac='$acsrch' ORDER BY flightno ASC";
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
}

echo "</table></center>";

}else{

echo "<center><form action=\"routes.php\" method=\"post\"><table align=\"center\" width=\"700px\" border=\"0\" class=\"login\"><tr><td width=\"400px\" align=\"center\">Dept Airport ICAO / Name: <input type=\"text\" name=\"dicao\" size=\"35\"><br />Arr Airport ICAO / Name: <input type=\"text\" name=\"aicao\" size=\"35\"></td><td width=\"300px\" align=\"center\">Equip: <select name=\"acsrch\"><option></option><option>AT72</option><option>B190</option><option>CRJ1</option><option>CRJ2</option><option>CRJ7</option><option>CRJ9</option><option>DH8A</option><option>DH8B</option><option>DH8C</option><option>DH8D</option><option>E120</option><option>E135</option><option>E145</option><option>E170</option><option>E190</option><option>SF34</option></select><br />Airline: <select name=\"airline\"><option></option><option value=\"ACA\">Air Canada (ACA)</option><option value=\"AWI\">Air Wisconsin (AWI)</option><option value=\"EGF\">American Eagle (EGF)</option><option value=\"ASQ\">Atlantic Southeast (ASQ)</option><option value=\"CHQ\">Chautauqua (CHQ)</option><option value=\"CJC\">Colgan Air (CJC)</option><option value=\"COM\">Comair (COM)</option><option value=\"UCA\">CommutAir (UCA)</option><option value=\"CPZ\">Compass Airlines (CPZ)</option><option value=\"BTA\">ExpressJet (BTA)</option><option value=\"FRL\">Freedom Airlines (FRL)</option><option value=\"GJS\">GoJet Airlines (GJS)</option><option value=\"GLA\">Great Lakes Aviation (GLA)</option><option value=\"GFT\">Gulfstream International (GFT)</option><option value=\"MKU\">Hawaii Island Air (MKU)</option><option value=\"QXE\">Horizon Air (QXE)</option><option value=\"JZA\">Jazz Air (JZA)</option><option value=\"JBU\">jetBlue (JBU)</option><option value=\"ASH\">Mesa Airlines (ASH)</option><option value=\"MES\">Mesaba Aviation (MES)</option><option value=\"PDT\">Piedmont Airlines (PDT)</option><option value=\"FLG\">Pinnacle Airlines (FLG)</option><option value=\"JIA\">PSA Airlines (JIA)</option><option value=\"RPA\">Republic Airlines (RPA)</option><option value=\"TCF\">Shuttle America (TCF)</option><option value=\"SKW\">SkyWest Airlines (SKW)</option><option value=\"LOF\">Trans States Airlines (LOF)</option></select></td></tr></table><br /><br /><input type=\"hidden\" name=\"func\" value=\"srchroutes\"><input type=\"submit\" value=\"Search Routes\"></form><br /><br /><hr /><br />";

}

	include ("footer.php");



//if the user is not logged in, then tell him to login.
}else{

      include ("header.php");
     //header("Location: index.php");  die();
     echo "Welcome visitor, please <a href=\"index.php\">login</a>.";

     include ("footer.php");

}

?>
