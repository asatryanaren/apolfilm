<?php require_once "view/header/header.php"; ?>
<?php
    $mysql = new mysqli("localhost", "root", "", "my_films");
    $result = $mysql->query("SELECT * FROM `genre`");
    $mysql->close();
?>

<main>
    <h3 class="mt-3" style="color: white; margin-left: 120px" >Жанры</h3>
    <div class="container" style="display: flex; flex-wrap: wrap; margin: 0 auto">
        <hr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <?php $id = $row['id'] ?>
            <div class="movies" style="width: 300px; margin:  10px">
                <a href="filterCategories.php?genre=<?= $row['genre'] ?>" class="card text-decoration-none movies__item">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row["genre"]?></h5>
                        <p class="card-text">Фильмов <span class="badge bg-info warn__badge">
                                <?php  $mysql = new mysqli("localhost", "root", "", "my_films");
                                $res = $mysql->query("SELECT COUNT(id_genre) FROM `films_genre` WHERE films_genre.id_genre = '$id'")->fetch_assoc();
                                echo $res["COUNT(id_genre)"] ; ?></span>
                        </p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php require_once "view/footer/footer.php";?>