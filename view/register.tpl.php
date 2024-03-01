<?php
    require_once "header/header.php";
    require_once "controllers/Register.php";

    $register = new Register();
?>

<main>
    <div class="container">
        <h3 class="mt-3" style="color: white">Регистрация</h3>
        <hr>
    </div>
    <div class="container d-flex justify-content-center">
        <form id="registerForm" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input id="nameR" type="text" class="form-control" id="name" placeholder="Иван Иванов">
                        <label for="name">Имя</label>
                    </div>
                </div>
            </div>
            <div id="regErrorName" style="color: red"></div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input id="loginR" type="email" class="form-control" id="email" placeholder="name@areaweb.su">
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>
            <div id="regErrorEmail" style="color: red"></div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input id="passwordR" type="password" class="form-control" id="password" placeholder="*********">
                        <label for="password">Пароль</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input id="confirmPasswordR" type="password" class="form-control" id="password_confirmation" placeholder="*********">
                        <label for="password_confirmation">Подтверждение</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <button class="btn btn-primary">Создать аккаунт</button>
            </div>
            <div id="regErrorPassword" style="color: red"></div>
            <div id="regErrorConPass" style="color: red"></div>



        </form>
    </div>
</main>

    <script src="../assets/js/ajaxRegister.js" ></script>

<?php require_once "footer/footer.php"?>