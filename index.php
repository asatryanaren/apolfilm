<?php
    require_once "Routing.php";

    $id = $_GET["id"];
    $genre = $_GET["genre"];

    $url = key($_GET);
    $r = new Router();

    $r->addRoute("/", "view/main/home.php");
    $r->addRoute("/admin", "view/main/admin.php");
    $r->addRoute("/categories", "view/main/categories.php");
    $r->addRoute("/bestmovies", "view/main/BestMovies.php");
    $r->addRoute("/onemovie?id=$id", "view/main/OneMovie.php");
    $r->addRoute("/filtercategories?genre=$genre", "view/main/filterCategories.php");
    $r->addRoute("/login", "view/login.tpl.php");
    $r->addRoute("/registration", "view/register.tpl.php");
    $r->addRoute("/exit", "Routing.php");

    $r->route("/".$url );
