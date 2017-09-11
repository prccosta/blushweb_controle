<?php
define('BD_USER', 'blushweb_master');
define('BD_PASS', 'w4Hm5MyadadGnbTv');
define('BD_NAME', 'blushweb_bd');

mysql_connect('localhost', BD_USER, BD_PASS) or trigger_error(mysql_error());
mysql_select_db(BD_NAME) or trigger_error(mysql_error());
?>