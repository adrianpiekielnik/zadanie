<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aReturn = [];
    try {
        if (!isset($_POST['state']) || !is_numeric($_POST['state'])) {
            throw new Exception('Błedny parametr sesji');
        }

        if ($_POST['state'] == 1 && !isset($_SESSION)) {
            session_start();
        }
        if ($_POST['state'] == 0 && isset($_SESSION)) {
            session_destroy();
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
}
