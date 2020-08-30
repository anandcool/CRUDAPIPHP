<?php

if(isset($_GET['url'])){
    $url = $_GET['url'];
    $url = explode("/",$url);
    $page = $url[0].".php";
    if(key_exists(1,$url)){
        $pageNum = $url[1];
    }
    if(file_exists($page)){
        include_once $page;
    }
}

?>