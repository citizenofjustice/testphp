<?php
    $link = mysql_connect('test', 'root', 'wonderful') or die('Could not connect');
    mysql_select_db('database', $link);
?>