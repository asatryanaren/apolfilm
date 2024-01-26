<?php require_once "view/header/header.php"; ?>
<?php
    $mysql = new mysqli("localhost", "root", "", "my_films");
    $result = $mysql->query("SELECT * FROM `genre`");
//    $countGenreFilms = $mysql->query("SELECT * FROM `films`");
    $mysql->close();
?>

<main>
    <h3 class="mt-3" style="color: white; margin-left: 120px" >Жанры</h3>
    <div class="container" style="display: flex; flex-wrap: wrap; margin: 0 auto">
        <hr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="movies" style="width: 300px; margin:  10px">
                <a href="oneMovie.php?id=<?= $row['id'] ?>" class="card text-decoration-none movies__item">
                    <img src="images/genreImg/<?=$row["img"]?>" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row["genre"]?></h5>
                        <p class="card-text">Фильмов <span class="badge bg-info warn__badge">10</span></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php require_once "view/footer/footer.php";?>