<?php
 //$password = password_hash('test', PASSWORD_DEFAULT);
 $password = md5("test", FALSE);
echo "\n".$password."\n";
?>
