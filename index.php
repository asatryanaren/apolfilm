<?php
require_once "Routing.php";

$id = $_GET["id"];
//echo $id;

$url = key($_GET);
$r = new Router();
$r->addRoute("/", "home.php");
$r->addRoute("/admin", "admin.php");
$r->addRoute("/categories", "categories.php");
$r->addRoute("/bestmovies", "bestMovies.php");
$r->addRoute("/onemovie?id=$id", "oneMovie.php");
$r->addRoute("/filtercategories", "filterCategories.php");
$r->addRoute("/login", "view/login.tpl.php");
$r->addRoute("/registration", "view/register.tpl.php");
$r->addRoute("/exit", "exit.php");

$r->route("/".$url );
