$(document).ready(function () {
    $('#registerForm').submit(function (event) {
        event.preventDefault();
        let name = $("#nameR").val();
        let email = $("#loginR").val();
        let password = $("#passwordR").val();
        let confirmPassword = $("#confirmPasswordR").val();

        $.ajax({
            url: '../../controllers/Register.php',
            type: 'POST',
            data: {name: name, email: email, password: password, confirmPassword: confirmPassword},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#nameR, #loginR, #passwordR, #confirmPasswordR").val("");
                if (response.success)  {
                    window.location.replace('/login');
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

                if(name.length < 2 || name.length > 30) {
                    $('#regErrorName').text('Не допустимая длина имени');
                }
                if(email.length < 5 || email.length > 90) {
                    $('#regErrorEmail').text('Не допустимая длина логина');
                }
                if(password.length < 3 || password.length > 10) {
                    $('#regErrorPassword').text('Не допустимая длина пароля ( от 3 до 10 )');
                }
                if(password !== confirmPassword) {
                    $('#regErrorConPass').text('Подтверждение пароля не совпадает');
                }
            }
        });
    });
});
