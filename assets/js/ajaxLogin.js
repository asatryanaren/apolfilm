$(document).ready(function () {
    function getCookie(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    $('#loginForm').submit(function (event) {
        event.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            url: '../../controllers/login.php',
            type: 'POST',
            data: {email: email, password: password},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                $("#email, #password").val("");

                let myCookie = getCookie('user');
                if (myCookie) {
                    window.location.href = "/";
                }else {
                   $("#loginError").text("Не верный логин или пароль");
                }

            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});