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

    if ($_SESSION['machine']->getStateId() == 1) {
        throw new Exception('Automat może przyjąć jedną monetę');
    }
    if ($_POST['coin'] != 2) {
        throw new Exception('Automat przyjmuje wyłącznie monety 2zł');
    }
    if (!isset($_POST['coin']) || !is_numeric($_POST['coin']) || empty($_POST['coin'])) {
        throw new Exception('Wrzuć monetę');
    }
    if ($_SESSION['machine']->getCandyCount() < 1) {
        throw new Exception('Brak cukierków');
    }
    $_SESSION['machine']->setStateOpen();

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
