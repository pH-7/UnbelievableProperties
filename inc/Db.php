<?php
$dir = 'sqlite:' . dirname(__DIR__) . '/unbelievableproperties.sqlite';
$dbh  = new PDO($dir) or exit('Cannot open the database');
