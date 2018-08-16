<?php


    if(isset($_GET['id'])){
       $testo = $_POST['commento'];
       $nome = $_GET['id'];
       $file = fopen("home.html", "a+");
       fwrite($file, $nome."<br>".$testo."<br>");
       fclose($file);

       $ritorno = $_SERVER["HTTP_REFERER"];
       header("Location: $ritorno");
    }
    else{
        $ritorno = $_SERVER["HTTP_REFERER"];
        header("Location: $ritorno");
    }
?>
