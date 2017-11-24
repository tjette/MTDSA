<?php
$link = mysql_connect('127.0.0.1:8889', 'tjette', 'tjette');
if (!$link) {
die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>
