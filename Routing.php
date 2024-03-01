<?php
 class Router {
     private $pages = [];
     function addRoute($url, $path) {
         $this->pages[$url] = $path;
     }
     function route($url) {
         $path = $this->pages[$url];
         $file_dir = $path;

         if ($url == "/onemovie"){
             $file_dir = "view/main/OneMovie.php";
             $path = "1";
         }elseif ($url == "/filtercategories") {
             $file_dir = "view/main/filterCategories.php";
             $path = "1";
         }
         elseif ($url == "/exit") {
             setcookie("user", $user["name"], time() - 3600, "/");
             header("Location: /");
         }
         if ($path == "") {
             require_once "view/main/404.php";
             exit();
         }
         if (file_exists($file_dir)) {
             require_once $file_dir;
         }else {
             require_once "view/main/404.php";
             exit();
         }
     }
 }