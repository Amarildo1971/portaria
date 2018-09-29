<?php
 ini_set('default_charset','UTF-8');
$output = shell_exec('ipconfig');
echo "<pre>$output</pre>";
?>