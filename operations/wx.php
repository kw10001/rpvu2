<?php
$view=$_GET['view'];
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

echo "<h2 class=\"bigger\">Weather Information</h2>";

if ($view=='sat') {

echo "<center><b>IR Satellite</b><br /><br /><img src=\"http://aviationweather.gov/data/obs/sat/intl/ir_ICAO-A.jpg\" /><br /><br />This service is provided by the <a href=\"http://adds.aviationweather.gov\" target=\"_blank\">Aviation Digital Data Service (ADDS)</a> and the <a href=\"http://www.aviationweather.gov\" targer=\"_blank\">Aviation Weather Center (AWC)</a>.</center>";

}elseif ($view=='turb') {

echo "<center><b>Turbulence, Icing, and Winds</b><br /><br /><img src=\"http://adds.aviationweather.gov/data/airmets/airmets_ALL.gif\" /><br /><br />Icing<br /><img src=\"http://adds.aviationweather.gov/data/airmets/airmets_IC.gif\"><br /><br />Turbulence<br><img src=\"http://adds.aviationweather.gov/data/airmets/airmets_TB.gif\"><br /><br />Winds<br /><img src=\"http://adds.aviationweather.gov/data/winds/ruc00hr_sfc_wind.gif\"><br /><br />This service is provided by the <a href=\"http://adds.aviationweather.gov\" target=\"_blank\">Aviation Digital Data Service (ADDS)</a> and the <a href=\"http://www.aviationweather.gov\" targer=\"_blank\">Aviation Weather Center (AWC)</a>.</center>";


}elseif ($view=='radar') {

echo "<center><b>U.S. Radar Composite</b><br /><br /><img src=\"http://aviationweather.gov/data/obs/radar/rcm_sm_tops.gif\"><br /><br />This service is provided by the <a href=\"http://adds.aviationweather.gov\" target=\"_blank\">Aviation Digital Data Service (ADDS)</a> and the <a href=\"http://www.aviationweather.gov\" targer=\"_blank\">Aviation Weather Center (AWC)</a>.</center>";

}elseif ($view=='metar') {

echo "<center><b>Search Current METAR Reports</b><br /><br /><form action=\"http://adds.aviationweather.gov/metars/index.php\" target=\"_blank\">ICAO Codes: <input type=\"text\" size=\"60\" name=\"station_ids\">&nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"Go!\"></form><br><br>- To search more than one airport, seperate the ICAO codes with a comma and no space. (ie: KVNY,KLAX).<br>- This service is provided by the <a href=\"http://adds.aviationweather.gov\" target=\"_blank\">Aviation Digital Data Service (ADDS)</a> and the <a href=\"http://www.aviationweather.gov\" targer=\"_blank\">Aviation Weather Center (AWC)</a>.</center>";


}else{

echo "<center><br /><a href=\"wx.php?view=sat\">IR Satellite</a><br /><a href=\"wx.php?view=turb\">Turbulence, Icing, and Winds</a><br /><a href=\"wx.php?view=radar\">US Radar Composite</a><br /><a href=\"wx.php?view=metar\">METAR Reports</a><br /><br /><br /><a href=\"http://www.nws.noaa.gov/oso/oso1/oso12/document/guide.shtml\" target=\"_blank\">Key to Aerodrome Forecast (TAF) and Aviation Routine Weather Report (METAR)</a></center>";

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