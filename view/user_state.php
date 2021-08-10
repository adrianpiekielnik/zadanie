<?php include '../controller/user_state.php' ?>

<?php if (isset($_SESSION['user'])) { ?>
    <p>Zalogowany: <?= $_SESSION['user']->getCurrentUser() ?></p>
<?php } else { ?>
    Błąd pobierania danych użytkownika
<?php } ?>