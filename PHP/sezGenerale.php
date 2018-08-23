<?php

        $testo = file_get_contents("../HTML/sezionegenerale.html");

        $sezione = $_SESSION['SEZIONE'];

        $testo = str_replace('$TESTO$', $sezione, $testo);

        echo $testo;

?>
