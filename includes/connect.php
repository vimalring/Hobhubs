<?php

/*

database connection module Version 0.1
Version Name:Kitten (bcoz i love kittens)

*/

$db='hobhubsbd';
$host='hobhubsbd.db.11483835.hostedresource.com';
$username='hobhubsbd';
$password='H0bhubs@';

$con=mysql_connect($host,$username,$password);
// Check connection
if (!$con)
  {
  echo "Failed to connect to MySQL Server: " . mysql_error();
  }

$db_con=mysql_select_db($db);

?>
