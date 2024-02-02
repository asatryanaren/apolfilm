<?php
require_once "view/header/header.php";
?>

<?php
$mysql = new mysqli("localhost", "root", "", "my_films");
$id = $_GET["id"];

$result = $mysql->query("SELECT films.*, GROUP_CONCAT(genre.genre SEPARATOR ', ') AS genres FROM films 
                                    INNER JOIN films_genre ON films.id = films_genre.id_film 
                                    INNER JOIN genre ON films_genre.id_genre = genre.id")->fetch_assoc();

//$resultComments = $mysql->query("SELECT * FROM `comments` INNER JOIN films_genre ON films_genre.id_comment = comments.id;");
//var_dump($id);
$mysql->close();
?>

<main>
    <div class="container">
        <div class="one-movie">
            <div class="card mb-3 mt-3 one-movie__item">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img  src="images/filmsImg/<?=$result["img"]?>" class="img-fluid rounded one-movie__image" alt="...">
<!--                        --><?php //if ($_POST["bodyComment"]) : ?>
                            <form action="controllers/comments.php" method="post" class="m-3 w-100">
                                <?= $grade ?>
                                <select name="grade" class="form-select" aria-label="Default select example">
                                    <option selected>Оценка</option>
                                    <?php for($i = 1; $i <= 10; $i++) : ?>
                                        <option value="<?=$i?>"><?=$i?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="form-floating mt-2">
                                    <textarea name="bodyComment" class="form-control" placeholder="Укажи свое мнение о фильме" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Комментарий</label>
                                </div>
                                <input type="hidden" name="id" value="<?=$id?>" >
                                <button type="submit" class="btn btn-primary mt-2">Оставить отзыв</button>
                            </form>
<!--                        --><?php //endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title"><?=$result["name"]?></h1>
                            <p>Жанры</p>
                            <p><?=$result["genres"]?></p>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?=$result["rating"]?></span></p>
                            <p class="card-text"><?=$result["descriptions"]?></p>
                            <p class="card-text"><small class="text-body-secondary">Добавлен 24/12/2023</small></p>
                            <h4>Отзывы</h4>
                            <?php while ($row = $result->fetch_assoc()) :  ?>
                            <div class="one-movie__reviews">
                                <div class="card">
                                    <div class="card-header">
                                        Пользователь: <?=$result["wrote"]?>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p><?=$row["comment"]?></p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once "view/footer/footer.php"?>