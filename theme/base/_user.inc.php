<?php
/**
 * @author  Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 */

if (!empty($_GET['code']) && empty($_SESSION['token'])) {
    $_SESSION['token'] = $_GET['code'];
    $data = $oInstagram->getOAuthToken($_SESSION['token']);
    // Storing instagram user data into session
    $_SESSION['user'] = $data;
    $_SESSION['name'] = ucfirst($data->user->username);
} else {
    // Check whether an error occurred
    if (!empty($_GET['error'])) {
        echo 'An error occurred: '.$_GET['error_description'];
    }
}

if (!empty($_SESSION['user'])) {
    $data = $_SESSION['user'];
}

if (!empty($_REQUEST['logout'])) {
    $_SESSION = array();
    unset($_SESSION);
    header('Location: ' . Config::URL);
    exit;
}
