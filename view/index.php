<?php include 'controller/index.php' ?>

<html>

<head>
    <script type="text/javascript" src="view/javascript/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="view/javascript/index.js"></script>
</head>

<body>
    <form id="users" method="post">
        <fieldset>
            <p>
                <label for="user">Użytkownik</label><br>
                <select id="user" name="user">
                    <?php foreach ($aUsers as $iKey => $sValue) { ?>
                        <option value="<?= $iKey ?>" <?= $iKey == $_SESSION['user']->getCurrentUserId() ? 'selected' : '' ?>><?= $sValue ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <button onclick="">
                    Zaloguj
                </button>
                <button onclick="restart();">
                    RESTART
                </button>
            </p>
        </fieldset>
    </form>
    <form id="machine" method="post">
        <fieldset>
            <p>
                <label for="coin">Monety</label><br>
                <select id="coin" name="coin">
                    <?php foreach ($aCoins as $iKey => $sValue) { ?>
                        <option value="<?= $iKey ?>" <?= $iKey == 2 ? 'selected' : '' ?>><?= $sValue ?></option>
                    <?php } ?>
                </select>
            </p>
            <input type="hidden" id="action" name="action" value="" />
            <p>
                <button type="submit" onclick="action.value='insert';">
                    Włóż monetę
                </button>
                <button type="submit" onclick="action.value='twist';">
                    Przekręć
                </button>
            </p>
            <p>
                <button type="submit" onclick="action.value='add_candy';">
                    Dodaj cukierek
                </button>
            </p>
        </fieldset>
    </form>

    Maszyna:
    <div id="machine_state" style="background-color: beige; padding: 10px 20px 10px 20px;">
    </div>
    <br />
    Użytkownik:
    <div id="user_state" style="background-color: beige; padding: 10px 20px 10px 20px;">

    </div>
</body>

</html>