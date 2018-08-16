<?php

       $testo = $_POST['commento'];
       $file = fopen("home.html", "a+");
       fwrite($file, "<br>".$testo."<br>");
       fclose($file);

       $ritorno = $_SERVER["HTTP_REFERER"];
       header("Location: $ritorno");

?>
