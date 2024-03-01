$(document).ready(function () {
    $('#addForm').submit(function (event) {
        event.preventDefault();
        let name = $("#name").val();
        let img = $("#img").val();
        let genre = $("#genre").val();
        let descrip = $("#descrip").val();
        let method = 'filmAdd';

        $.ajax({
            url: '../../controllers/AdminPage.php',
            type: 'POST',
            data: {name: name, img: img, genre: genre, descrip: descrip, method: method},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log("Фильм успешно добавлен");
                $("#name, #img, #genre, #descrip").val("");
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#filmDelete').submit(function (event) {
        event.preventDefault();
        let nameDLT = $("#nameDLT").val();
        let method = 'filmDelete';

        $.ajax({
            url: '../../controllers/AdminPage.php',
            type: 'POST',
            data: {nameDLT: nameDLT, method: method},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log("Фильм успешно удален");
                $("#nameDLT").val("");
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#addGenreMore').submit(function (event) {
        event.preventDefault();
        let name = $("#genreMoreName").val();
        let genre = $("#genreMore").val();
        let method = 'addGenreMore';

        $.ajax({
            url: '../../controllers/AdminPage.php',
            type: 'POST',
            data: {genreMoreName: name, genreMore: genre, method: method},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log("Жанр успешно добавлен");
                $("#genreMoreName, #genreMore").val("");
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});