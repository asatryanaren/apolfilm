<?php
    require_once "view/header/header.php";
    require_once "controllers/connect.php";

    $result = $mysql->query("SELECT genre.genre, genre.id FROM genre");
    $result2 = $mysql->query("SELECT genre.genre, genre.id FROM genre");
?>

<main>
    <div class="container" style="margin-top: 60px; width: 65%">
        <div style="display: flex; justify-content: space-around">
            <div>
                <h3 style="color: white; margin-bottom: 20px" >Добавить фильм</h3>
                <form action="../../controllers/adminPage.php" method="post" style="width: 400px" >
                    <input name="name" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Називания фильма" type="text">
                    <input name="img" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Картинка фильма" type="text">
                    <select name="genre" style="width: 100%; height: 50px; margin-bottom: 10px" >
                        <option  >Жанры</option>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <option value="<?=$row['id']?>"><?=$row['genre']?></option>
                        <?php endwhile; ?>
                    </select>
                    <textarea name="descrip" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Описания фильма" ></textarea>
                    <button type="submit" class="btn btn-warning d-flex align-items-center column-gap-2" style="width: 100%">
                        <span style="display: block; margin: 0 auto">Добавить фильм</span>
                    </button>
                </form>
            </div>
            <div>
                <h3 style="color: white; margin-bottom: 20px">Добавить Жанр</h3>
                <form action="../../controllers/adminPage.php" method="post" style="width: 400px">
                    <input name="genreMoreName" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Название фильма" type="text">
                    <select name="genreMore" style="width: 100%; height: 50px; margin-bottom: 10px" >
                        <option selected>Жанры</option>
                        <?php while ($row = $result2->fetch_assoc()) : ?>
                            <option value="<?=$row['id']?>"><?=$row['genre']?></option>
                        <?php endwhile; ?>
                    </select>
                    <button type="submit" class="btn btn-warning d-flex align-items-center column-gap-2" style="width: 100%">
                        <span style="display: block; margin: 0 auto">Добавить Жанр</span>
                    </button>
                </form>
            </div>
            <div>
                <h3 style="color: white; margin-bottom: 20px">Удалить фильм</h3>
                <form action="../../controllers/adminPage.php" method="post" style="width: 400px">
                    <input name="nameDLT" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Название фильма" type="text">
                    <button type="submit" class="btn btn-warning d-flex align-items-center column-gap-2" style="width: 100%">
                        <span style="display: block; margin: 0 auto">Удалить фильм</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</main>

<?php require_once "view/footer/footer.php";?>