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
    $_SESSION['user'] = new User();

    if (!isset($_POST['user']) || !is_numeric($_POST['user']) || !in_array($_POST['user'], array_keys($_SESSION['user']->getUsers()))) {
        throw new Exception('Błędny identyfikator użytkownika');
    }
    $_SESSION['user']->setCurrentUser($_POST['user']);
    $_SESSION['machine']->setStateNeutral();

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
