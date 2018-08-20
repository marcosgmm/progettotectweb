<?php

    session_start();

    $page = file_get_contents("../HTML/NavigationBarUp.html");
    $nav2 = file_get_contents("../HTML/NavigationBarDown.html");
    $Home = file_get_contents("../HTML/home.html");
    $ba =file_get_contents("../HTML/bottonea.html");
    $paginaeventi = file_get_contents("../HTML/eventi.html");
    $paginahome = file_get_contents("../HTML/home.html");
    $padova = file_get_contents("../HTML/padova.html");
    $vicenza = file_get_contents("../HTML/vicenza.html");
    $verona = file_get_contents("../HTML/verona.html");
    $venezia = file_get_contents("../HTML/venezia.html");
    $footer = file_get_contents("../HTML/footer.html");
\

    if(isset($_GET['nome'])){

        $aux = $_GET['nome']; //prendo l'id dell'utente
        $conn = new mysqli("localhost","root","", "prova");
        $ComandoSQLperaccesso = "select nome from utenti where id ='" . $aux ."'";
        $Aux = $conn->query($ComandoSQLperaccesso);
        $Name = $Aux->fetch_assoc();
        $NomeUtente = $Name['nome'];
        $NomeUtente = strtoupper($NomeUtente);
        mysqli_close($conn);

        $page = str_replace('$UTENTE$', $NomeUtente, $page);
        $page = str_replace('$ACCEDI$', "", $page);
        $page = str_replace('$DOWN$', $Home, $page);

        echo $page;
        exit;
    }
     else{

           if(isset($_GET['pagina'])){

                if($_GET['pagina'] == 'padova'){
                    $page = str_replace('$ACCEDI$', $ba, $page);
                    $page = str_replace('$UTENTE$', "", $page);
                    $page = str_replace('$DOWN$', $nav2, $page);
                    $page = str_replace('$PAGINA$', $padova, $page);
                    $page = str_replace('$FOOTER$', $footer, $page);
                    echo $page;                                       }

                if($_GET['pagina'] == 'vicenza'){
                    $page = str_replace('$ACCEDI$', $ba, $page);
                    $page = str_replace('$UTENTE$', "", $page);
                    $page = str_replace('$DOWN$', $nav2, $page);
                    $page = str_replace('$PAGINA$', $vicenza, $page);
                    $page = str_replace('$FOOTER$', $footer, $page);
                    echo $page;                                       }

                if($_GET['pagina'] == 'verona'){
                    $page = str_replace('$ACCEDI$', $ba, $page);
                    $page = str_replace('$UTENTE$', "", $page);
                    $page = str_replace('$DOWN$', $nav2, $page);
                    $page = str_replace('$PAGINA$', $verona, $page);
                    $page = str_replace('$FOOTER$', $footer, $page);
                    echo $page;                                       }

                 if($_GET['pagina'] == 'venezia'){
                    $page = str_replace('$ACCEDI$', $ba, $page);
                    $page = str_replace('$UTENTE$', "", $page);
                    $page = str_replace('$DOWN$', $nav2, $page);
                    $page = str_replace('$PAGINA$', $venezia, $page);
                    $page = str_replace('$FOOTER$', $footer, $page);

                    echo $page;                                       }
                }
         else{
                $page = str_replace('$ACCEDI$', $ba, $page);
                $page = str_replace('$UTENTE$', "", $page);
                $page = str_replace('$DOWN$', $Home, $page);
                $page = str_replace('$FOOTER$', $footer, $page);


                echo $page;
         }
  }

?>
