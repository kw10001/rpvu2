<?php

include ("config_hd.php");

$sqla="SELECT Sum(Duration) FROM logbooks WHERE pilot = '$username'";

$singlehours = mysql_query ($sqla)
or die (mysql_error());
if ($singlehours = mysql_result($singlehours,0))

?>


