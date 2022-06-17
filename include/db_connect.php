<?php
$db_host = 'localhost';
$db_user = 'Artist';
$db_pass = '12artist34';
$db_database = 'db';

$link = mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_database,$link)
    or die("Нет подключения к БД. Ошибка:".mysql_error());
mysql_query("SET names UTF-8");
?>