<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        header("Location: ./". $_SERVER["PHP_SELF"]);
    }
    require_once "view/header/header.php";
    require_once "model/OneMovie.php";
    $sqlDB = new OneMovie();
    $resultMovie = $sqlDB->selectFilmDB();
    $resultComments = $sqlDB->selectCommentDB();
    $id = $sqlDB->selectId();

?>

<main>
    <div class="container">
        <div class="one-movie">
            <div class="card mb-3 mt-3 one-movie__item">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img  src="images/filmsImg/<?=$resultMovie["img"]?>" class="img-fluid rounded one-movie__image" alt="...">
                            <form action="../../controllers/comments.php" method="post" class="m-3 w-100">
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
                                <button id="commentBtn" type="submit" class="btn btn-primary mt-2">Оставить отзыв</button>
                            </form>
                    </div>
                    <div class="col-md-8">
                        <?php if ($resultComments != null) : ?>
                        <div class="card-body">
                            <h1 class="card-title"><?=$resultMovie["name"]?></h1>
                            <p>Жанры</p>
                            <p><?=$resultMovie["genres"]?></p>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?=floor($resultMovie["average_rating"])?></span></p>
                            <p class="card-text"><?=$resultMovie["descriptions"]?></p>
                            <h4>Отзывы</h4>
                            <?php while ($row = $resultComments->fetch_assoc()) : ?>
                            <?php $d = $row["date"] == null ? null : "<p class='card-text'><small class='text-body-secondary'>Дата {$row['date']} </small></p>"; echo $d;?>
                            <div class="one-movie__reviews">
                                <?php if ($row["comment"] || $resultMovie["rating"]) : ?>
                                    <div class="card">
                                        <div class="card-header">
                                            Пользователь: <?=$row["wrote"]?>
                                        </div>
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p><?=$row["comment"]?></p>
                                            </blockquote>
                                        </div>
                                    </div>
                                <?php else: echo "Нет отзывов"; endif; ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once "view/footer/footer.php" ?>