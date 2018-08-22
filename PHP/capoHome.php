<?php

    session_start();


    $pageHome = file_get_contents("../HTML/home.html");
    $Home = file_get_contents("../HTML/paginaHomeSito.html");
    $nav1 = file_get_contents("../HTML/NavigationBarUp.html");
    $nav2 = file_get_contents("../HTML/NavigationBarDown.html");
    $bottoniNav1 =file_get_contents("../HTML/bottonea.html");
    $footer = file_get_contents("../HTML/footer.html");

    $paginaeventi = file_get_contents("../HTML/eventi.html");
    $paginahome = file_get_contents("../HTML/home.html");


    if (isset($_SESSION['name'])){

         $NomeUtente = $_SESSION['name'];
         $NomeUtente = strtoupper($NomeUtente);
         $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
         $pageHome = str_replace('$ACCEDI$', "", $pageHome);
         $pageHome = str_replace('$UTENTE$', $NomeUtente, $pageHome);

         if(isset($_GET['pagina']))     {
             $pag = $_GET['pagina'];
             $_SESSION['PROVA'] = $pag;
             $citta = file_get_contents("../HTML/$pag.html");
             $pageHome = str_replace('$PAGINA$', $citta, $pageHome);
             $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
             $pageHome = str_replace('$CITTA$', $pag, $pageHome);            }

        else if(isset($_GET['sez']))       {
                $pag = $_SESSION['PROVA'];
                $sezione = $_GET['sez'];
                $citta = file_get_contents("../HTML/$sezione.html");
                $pageHome = str_replace('$PAGINA$', $citta, $pageHome);
                $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                $pageHome = str_replace('$CITTA$', $pag, $pageHome);       }

             else{
                    $pageHome = str_replace('$DOWN$', "", $pageHome);
                    $pageHome = str_replace('$PAGINA$', $Home, $pageHome);
                 }

         $pageHome = str_replace('$FOOTER$', $footer, $pageHome);

         echo $pageHome;
         exit;
    }
     else{
                $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                $pageHome = str_replace('$UTENTE$', "", $pageHome);

                if(isset($_GET['pagina']))     {
                        $pag = $_GET['pagina'];
                        $_SESSION['PROVA'] = $pag;
                        $citta = file_get_contents("../HTML/$pag.html");
                        $pageHome = str_replace('$PAGINA$', $citta, $pageHome);
                        $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                        $pageHome = str_replace('$CITTA$', $pag, $pageHome);            }

                else if(isset($_GET['sez']))       {
                        $pag = $_SESSION['PROVA'];
                        $sezione = $_GET['sez'];
                        $citta = file_get_contents("../HTML/$sezione.html");
                        $pageHome = str_replace('$PAGINA$', $citta, $pageHome);
                        $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                        $pageHome = str_replace('$CITTA$', $pag, $pageHome);       }

                     else{
                            $pageHome = str_replace('$DOWN$', "", $pageHome);
                            $pageHome = str_replace('$PAGINA$', $Home, $pageHome);
                         }


                $pageHome = str_replace('$FOOTER$', $footer, $pageHome);

                echo $pageHome;
                exit;
        }


?>
