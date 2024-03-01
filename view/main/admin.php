<?php
require_once "view/header/header.php";
require_once "model/Admin.php";
$DB = new Admin();
$result = $DB->selectDB();
$result2 = $DB->selectDBClone();
?>

    <main>
        <div class="container" style="margin-top: 60px; width: 65%">
            <div style="display: flex; justify-content: space-around">
                <div>
                    <h3 style="color: white; margin-bottom: 20px">Добавить фильм</h3>
                    <form id="addForm" style="width: 400px">
                        <input id="name" style="width: 100%; height: 50px; margin-bottom: 10px"
                               placeholder="Називания фильма" type="text">
                        <input id="img" style="width: 100%; height: 50px; margin-bottom: 10px"
                               placeholder="Картинка фильма" type="text">
                        <select id="genre" style="width: 100%; height: 50px; margin-bottom: 10px">
                            <option>Жанры</option>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['genre'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <textarea id="descrip" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Описания фильма"></textarea>
                        <button id="addFilm" type="submit" class="btn btn-warning d-flex align-items-center column-gap-2"
                                style="width: 100%">
                            <span style="display: block; margin: 0 auto">Добавить фильм</span>
                        </button>
                    </form>
                </div>
                <div>
                    <h3 style="color: white; margin-bottom: 20px">Добавить Жанр</h3>
                    <form id="addGenreMore" style="width: 400px">
                        <input id="genreMoreName" style="width: 100%; height: 50px; margin-bottom: 10px"
                               placeholder="Название фильма" type="text">
                        <select id="genreMore" style="width: 100%; height: 50px; margin-bottom: 10px">
                            <option selected>Жанры</option>
                            <?php while ($row = $result2->fetch_assoc()) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['genre'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit" class="btn btn-warning d-flex align-items-center column-gap-2"
                                style="width: 100%">
                            <span style="display: block; margin: 0 auto">Добавить Жанр</span>
                        </button>
                    </form>
                </div>
                <div>
                    <h3 style="color: white; margin-bottom: 20px">Удалить фильм</h3>
                    <form id="filmDelete" style="width: 400px">
                        <input id="nameDLT" style="width: 100%; height: 50px; margin-bottom: 10px" placeholder="Название фильма" type="text">
                        <button type="submit" class="btn btn-warning d-flex align-items-center column-gap-2"
                                style="width: 100%">
                            <span style="display: block; margin: 0 auto">Удалить фильм</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <script
                src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous">
        </script>
        <script src="../../assets/js/ajax.js"></script>
    </main>


<?php require_once "view/footer/footer.php"; ?>