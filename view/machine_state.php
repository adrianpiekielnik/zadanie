<?php include '../controller/machine_state.php' ?>

<?php if (isset($_SESSION['machine'])) { ?>
    <p>Tryb: <?= $_SESSION['machine']->getState() ?></p>
    <p>Cashbox: <?= $_SESSION['machine']->getCoinCount() ?>zł</p>
    <p>Cukierki: <?= $_SESSION['machine']->getCandyCount() ?>szt</p>
<?php } else { ?>
    Błąd pobierania danych maszyny
<?php } ?>