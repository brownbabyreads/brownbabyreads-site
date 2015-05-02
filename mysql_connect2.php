<?php
// opens connection to database

$db_host = "localhost";
$db_username = "cocoakidsread1";
$db_pass = "Kairos1999";
$db_name = "registration";

@mysql_connect ("$db_host","$db_username","$db_pass") or die ("Could not connect to mysql");
@mysql_select("$db_name") or die ("No database");

echo "Successful Connection";

?>
