<?php
    if(isset($_GET['nome'])){
        $name = $_GET['nome'];
    }
    $testo = $_POST['commento'];
    $file = fopen("home.html", "a+");
    fwrite($file, $name."<br>".$testo."<br><br>");
    fclose($file);

    $ritorno = $_SERVER["HTTP_REFERER"];
    header("Location: $ritorno");

?>
