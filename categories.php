<?php
    require_once "view/header/header.php";
    require_once "controllers/connect.php";

    $result = $mysql->query("SELECT genre.genre, COUNT(DISTINCT films_genre.id_film) AS count_films FROM genre
                                    INNER JOIN films_genre ON genre.id = films_genre.id_genre
                                    INNER JOIN films ON films.id = films_genre.id_film WHERE films.id = films_genre.id_film GROUP BY  genre.genre;");
    $mysql->close();
?>

<main>
    <h3 class="mt-3" style="color: white; margin-left: 120px" >Жанры</h3>
    <div class="container" style="display: flex; flex-wrap: wrap; margin: 0 auto">
        <hr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <?php $id = $row['id'] ?>
            <div class="movies" style="width: 300px; margin:  10px">
                <a href="filtercategories?genre=<?= $row['genre'] ?>" class="card text-decoration-none movies__item">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row["genre"]?></h5>
                        <p class="card-text">Фильмов <span class="badge bg-info warn__badge">
                                <?=$row["count_films"]?>
                            </span>
                        </p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php require_once "view/footer/footer.php";?>