<?php require_once "header/header.php"?>

<main>
    <div class="container">
        <h3 class="mt-3" style="color: white">Регистрация</h3>
        <hr>
    </div>
    <div class="container d-flex justify-content-center">


        <form action="../controllers/register.php" method="post" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Иван Иванов">
                        <label for="name">Имя</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input name="login" type="email" class="form-control" id="email" placeholder="name@areaweb.su">
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control" id="password" placeholder="*********">
                        <label for="password">Пароль</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input name="confirmPassword" type="password" class="form-control" id="password_confirmation" placeholder="*********">
                        <label for="password_confirmation">Подтверждение</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <button class="btn btn-primary">Создать аккаунт</button>
            </div>
        </form>
    </div>
</main>

<?php require_once "footer/footer.php"?>