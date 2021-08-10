<?php

require_once '../model/machine.php';
require_once '../model/user.php';

$aReturn = [];
try {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception('Błędne wywołanie metody');
    }
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        throw new Exception('Bład pobierania danych użytkownika');
    }
    if ($_SESSION['user']->getCurrentUserId() <> 0) {
        throw new Exception('Tylko serwisant może dodawać cukierki');
    }
    $_SESSION['machine']->addCandy();

    $aReturn = [
        'type' => 'success'
    ];
} catch (Exception $oExc) {
    $aReturn = [
        'type' => 'error',
        'message' => $oExc->getMessage()
    ];
}
echo json_encode($aReturn), exit;
