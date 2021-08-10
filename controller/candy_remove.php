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

    if ($_SESSION['machine']->getStateId() == 0) {
        throw new Exception('Maszyna musi być w trybie OPEN by wydać cukierek');
    } elseif ($_SESSION['machine']->getStateId() == 1) {
        $_SESSION['machine']->removeCandy();
        $_SESSION['machine']->addCash();
        $_SESSION['machine']->setStateClosed();
    }
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
