<?php


        $articolo = file_get_contents("../HTML/boxArticolo.html");

        $sezione = $_SESSION['SEZIONE'];
        $citta = $_SESSION['PAGINA'];

        $conn = new mysqli("localhost","root","", "prova");

        $SQL = "select * from ". $citta ." where sezione ='" . $sezione ."' ORDER BY id ASC LIMIT 1";
        $RIS = $conn -> query($SQL);

    /*  $SQLtitolo = "select titolo from ". $citta ." where sezione ='" . $sezione ."'";
        $SQLtesto = "select testo from ". $citta ." where sezione ='" . $sezione ."'";
        $SQLimg = "select img from ". $citta ." where sezione ='" . $sezione ."'";
        $SQLalt = "select alt from ". $citta ." where sezione ='" . $sezione ."'";  */


    while($riga = $RIS -> fetch_assoc()){
            $titolo = $riga['titolo'];
            $testo =  $riga['testo'];
            $img = $riga['img'];
            $alt = $riga['alt'];
            $id = $riga['id'];
            $articolo = str_replace('$TITOLO$', $titolo, $articolo);
            $articolo = str_replace('$TESTO$', $testo, $articolo);
            $articolo = str_replace('$URL$', $img, $articolo);
            $articolo = str_replace('$ALT$', $alt, $articolo);
            echo $articolo;
            $articolo = file_get_contents("../HTML/boxArticolo.html");
            $id = $id + 1;
            $SQL2 = "select * from ". $citta ." where sezione ='" . $sezione ."' AND id = '". $id ."'";
            $RIS = $conn -> query($SQL2);
        }

     /*   $risultatoTitolo = $conn -> query($SQLtitolo);
        $risultatoTesto = $conn -> query($SQLtesto);
        $risultatoImg = $conn -> query($SQLimg);
        $risultatoAlt = $conn -> query($SQLalt);

        if($risultatoTitolo && $risultatoTesto && $risultatoImg && $risultatoAlt){
            $riga1 = $risultatoTitolo -> fetch_assoc();
            $riga2 = $risultatoTesto -> fetch_assoc();
            $riga3 = $risultatoImg -> fetch_assoc();
            $riga4 = $risultatoAlt -> fetch_assoc();
            $titolo = $riga1['titolo'];
            $testo =  $riga2['testo'];
            $img = $riga3['img'];
            $alt = $riga4['alt'];
            $articolo = str_replace('$TITOLO$', $titolo, $articolo);
            $articolo = str_replace('$TESTO$', $testo, $articolo);
            $articolo = str_replace('$URL$', $img, $articolo);
            $articolo = str_replace('$ALT$', $alt, $articolo);
            echo $articolo;
        } else{
            echo "false";
        }  */

?>
