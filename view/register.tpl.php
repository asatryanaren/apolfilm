<!doctype html>
<html lang="ru" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <script src="../assets/js/color-modes.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">

<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none logo">
                <h5 class="m-0">Кинопоиск <span class="badge bg-warning warn__badge">Lite</span></h5>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="../index.php" class="nav-link px-2 text-secondary d-flex align-items-center column-gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                        <span>Главная</span>
                    </a>
                </li>

                <li>
                    <a href="best.html" class="nav-link px-2 text-white d-flex align-items-center column-gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <span>Лучшее</span>
                    </a>
                </li>

                <li>
                    <a href="../categories.php" class="nav-link px-2 text-white d-flex align-items-center column-gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                            <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z"/>
                            <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z"/>
                            <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        <span>Жанры</span>
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center text-end">
                <a href="login.tpl.php" type="button" class="btn btn-outline-light me-2 d-flex align-items-center column-gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    <span>Войти</span>
                </a>
                <a href="register.html" type="button" class="btn btn-warning d-flex align-items-center column-gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                    <span>Создать аккаунт</span>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <h3 class="mt-3">Регистрация</h3>
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
<!--                        --><?php //echo $_COOKIE["hasUser"] ? $_COOKIE["hasUser"] . " с таокй лоигном уже есть ползватель" : null;?>
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

<footer class="py-3 mt-auto">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Главная</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Лучшее</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Жанры</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2023 Кинопоиск Lite</p>
</footer>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>