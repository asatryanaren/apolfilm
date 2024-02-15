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
             $file_dir = "oneMovie.php";
             $path = "1";
         }
         if ($path == "") {
             require_once "404.php";
             exit();
         }
         if (file_exists($file_dir)) {
             require_once $file_dir;
         }else {
             require_once "404.php";
             exit();
         }
     }
 }