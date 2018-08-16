<?php

    $nome = '';

    if(isset($_GET['name'])){
       $nome =  $_GET['name'];
    }

    $testo = $_POST['commento'];
    $file = fopen("home.html", "a+");
    fwrite($file, $name."<br>".$testo."<br>");
    fclose($file);

    $ritorno = $_SERVER["HTTP_REFERER"];
    header("Location: $ritorno");

?>
