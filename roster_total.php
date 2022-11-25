<?php

include ("config_hd.php");

$sqla="SELECT Sum(Duration) FROM logbooks";

$totalhours = mysql_query ($sqla)
or die (mysql_error());
if ($totalhours = mysql_result($totalhours,0))

?>


