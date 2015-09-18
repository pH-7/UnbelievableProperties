<?php 
session_start();

ob_start();


require_once 'inc/Config.php';
require_once 'inc/Db.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/instagram.php';
require_once __DIR__ . '/inc/Library.php';
require_once __DIR__ . '/inc/Geo.php';
require_once 'theme/base/layout.php';


ob_end_flush();
