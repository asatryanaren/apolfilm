$(document).ready(function () {
    let mySession = '@Request.RequestContext.HttpContext.Session["user"]';

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
                if (mySession) {
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