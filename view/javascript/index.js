function setSession(iState) {
    $.ajax({
        url: 'controller/session.php',
        data: {
            state: iState
        },
        dataType: 'json',
        async: false,
        type: 'POST',
        success: function (response) {
            if (response.type == 'error') {
                alert(response.message);
            }
            return;
        },
        error: function (response) {
            console.log(response);
            return;
        }
    });
}

function restart() {
    setSession(0);
    window.location.reload();
}

function getMachineState() {
    $.ajax({
        url: 'view/machine_state.php',
        dataType: 'text',
        async: true,
        type: 'GET',
        success: function (response) {
            $('#machine_state').html(response);
            return;
        },
        error: function (response) {
            console.log(response);
            return;
        }
    });
    return;
}

function getUserState() {
    $.ajax({
        url: 'view/user_state.php',
        dataType: 'text',
        async: true,
        type: 'GET',
        success: function (response) {
            $('#user_state').html(response);
            return;
        },
        error: function (response) {
            console.log(response);
            return;
        }
    });
    return;
}

function setUser(iState) {
    $.ajax({
        url: 'model/user.php',
        data: {
            state: iState
        },
        dataType: 'json',
        async: true,
        type: 'POST',
        success: function (response) {
            if (response.type == 'error') {
                alert(response.message);
            }
            return;
        },
        error: function (response) {
            console.log(response);
            return;
        }
    });
}

$(document).ready(function () {
    setSession(1);
    getUserState();
    getMachineState();

    var formUser = $('#users');
    formUser.submit(function () {
        $.ajax({
            url: 'controller/user_login.php',
            data: formUser.serialize(),
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function (response) {
                if (response.type == 'success') {
                    getMachineState();
                    getUserState();
                } else if (response.type == 'error') {
                    alert(response.message);
                }
                return;
            },
            error: function (response) {
                console.log(response);
                return;
            }
        });
        return false;
    });

    var formMachine = $('#machine');
    formMachine.submit(function () {
        var action = $('#action').val();
        if (action == 'insert') {
            $.ajax({
                url: 'controller/coin_add.php',
                data: formMachine.serialize(),
                dataType: 'json',
                async: true,
                type: 'POST',
                success: function (response) {
                    if (response.type == 'success') {
                        getMachineState();
                    } else if (response.type == 'error') {
                        alert(response.message);
                    }
                    return;
                },
                error: function (response) {
                    console.log(response);
                    return;
                }
            });
        } else if (action == 'twist') {
            $.ajax({
                url: 'controller/candy_remove.php',
                data: formMachine.serialize(),
                dataType: 'json',
                async: true,
                type: 'POST',
                success: function (response) {
                    if (response.type == 'success') {
                        getMachineState();
                    } else if (response.type == 'error') {
                        alert(response.message);
                    }
                    return;
                },
                error: function (response) {
                    console.log(response);
                    return;
                }
            });
        } else if (action == 'add_candy') {
            $.ajax({
                url: 'controller/candy_add.php',
                data: formMachine.serialize(),
                dataType: 'json',
                async: true,
                type: 'POST',
                success: function (response) {
                    if (response.type == 'success') {
                        getMachineState();
                    } else if (response.type == 'error') {
                        alert(response.message);
                    }
                    return;
                },
                error: function (response) {
                    console.log(response);
                    return;
                }
            });
        }
        return false;
    });
});