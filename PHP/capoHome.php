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
    $padova = file_get_contents("../HTML/padova.html");
    $vicenza = file_get_contents("../HTML/vicenza.html");
    $verona = file_get_contents("../HTML/verona.html");
    $venezia = file_get_contents("../HTML/venezia.html");


    if(isset($_GET['nome'])){

        $aux = $_GET['nome']; //prendo l'id dell'utente
        $conn = new mysqli("localhost","root","", "prova");
        $ComandoSQLperaccesso = "select nome from utenti where id ='" . $aux ."'";
        $Aux = $conn->query($ComandoSQLperaccesso);
        $Name = $Aux->fetch_assoc();
        $NomeUtente = $Name['nome'];
        $NomeUtente = strtoupper($NomeUtente);
        mysqli_close($conn);

         $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
         $pageHome = str_replace('$DOWN$', "", $pageHome);
         $pageHome = str_replace('$ACCEDI$', "", $pageHome);
         $pageHome = str_replace('$UTENTE$', $NomeUtente, $pageHome);
         $pageHome = str_replace('$PAGINA$', $Home, $pageHome);
         $pageHome = str_replace('$FOOTER$', $footer, $pageHome);

         echo $pageHome;
        exit;
    }
     else{

           if(isset($_GET['pagina'])){

                if($_GET['pagina'] == 'padova'){
                   $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                   $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                   $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                   $pageHome = str_replace('$UTENTE$', "", $pageHome);
                   $pageHome = str_replace('$PAGINA$', $padova, $pageHome);
                   $pageHome = str_replace('$FOOTER$', $footer, $pageHome);
                   $pageHome = str_replace('$CITTA$', "padova", $pageHome);
                    echo $pageHome;
                    exit;                                           }

                if($_GET['pagina'] == 'vicenza'){
                   $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                   $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                   $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                   $pageHome = str_replace('$UTENTE$', "", $pageHome);
                   $pageHome = str_replace('$PAGINA$', $vicenza, $pageHome);
                   $pageHome = str_replace('$FOOTER$', $footer, $pageHome);
                   $pageHome = str_replace('$CITTA$', "vicenza", $pageHome);
                    echo $pageHome;
                    exit;                                         }

                if($_GET['pagina'] == 'verona'){
                   $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                   $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                   $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                   $pageHome = str_replace('$UTENTE$', "", $pageHome);
                   $pageHome = str_replace('$PAGINA$', $verona, $pageHome);
                   $pageHome = str_replace('$FOOTER$', $footer, $pageHome);
                   $pageHome = str_replace('$CITTA$', "verona", $pageHome);
                    echo $pageHome;
                    exit;                                         }

                 if($_GET['pagina'] == 'venezia'){
                   $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                   $pageHome = str_replace('$DOWN$', $nav2, $pageHome);
                   $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                   $pageHome = str_replace('$UTENTE$', "", $pageHome);
                   $pageHome = str_replace('$PAGINA$', $venezia, $pageHome);
                   $pageHome = str_replace('$FOOTER$', $footer, $pageHome);
                   $pageHome = str_replace('$CITTA$', "venezia", $pageHome);
                    echo $pageHome;
                    exit;                                         }
                }
         else{
                $pageHome = str_replace('$HEADER$', $nav1, $pageHome);
                $pageHome = str_replace('$DOWN$', "", $pageHome);
                $pageHome = str_replace('$ACCEDI$', $bottoniNav1, $pageHome);
                $pageHome = str_replace('$UTENTE$', "", $pageHome);
                $pageHome = str_replace('$PAGINA$', $Home, $pageHome);
                $pageHome = str_replace('$FOOTER$', $footer, $pageHome);

                echo $pageHome;
         }
  }

?>
