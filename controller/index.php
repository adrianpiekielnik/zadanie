<?php

require_once 'model/machine.php';
require_once 'model/user.php';

try {
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['machine'] = new Machine();
    $_SESSION['user'] = new User();
    $_SESSION['user']->setCurrentUser(1); // default

    $aCoins = $_SESSION['machine']->getCoins();
    $aUsers = $_SESSION['user']->getUsers();
} catch (Exception $oExc) {
    echo 'Błąd: ' . $oExc->getMessage(), exit;
}
