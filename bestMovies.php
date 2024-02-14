<?php
    require_once "view/header/header.php";
    require_once "controllers/connect.php";

    $result = $mysql->query("SELECT films.*, AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) AS average_rating 
                                    FROM films INNER JOIN comments ON films.id = comments.id_comment
                                    GROUP BY films.id HAVING AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) > 6;");

    $mysql->close();
?>
<main>
    <h3 style="color: white; margin-left: 120px" class="mt-3" >Лучшее</h3>
        <div class="container" style="display: flex; flex-wrap: wrap; margin: 0 auto">
        <hr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="movies" style="width: 300px; margin:  10px">
                    <a href="oneMovie.php?id=<?=$row["id"]?>" class="card text-decoration-none movies__item">
                        <img src="images/filmsImg/<?=$row["img"]?>" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$row["name"]?></h5>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?=(int)$row["average_rating"]?></span></p>
                            <p class="card-text"><?=$row["descriptions"]?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile;?>
    </div>
</main>

<?php require_once "view/footer/footer.php";?>