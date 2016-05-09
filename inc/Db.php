<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 */
$dir = 'sqlite:' . dirname(__DIR__) . '/unbelievableproperties.sqlite';
$dbh  = new PDO($dir) or exit('Cannot open the database');
