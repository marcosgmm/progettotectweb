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

    if(isset($_GET['errore'])){

        if($_GET['errore'] < 5){

         $page = file_get_contents("../HTML/registrazione.html");
         echo $page;

         echo "<p class='box_errore'>";

            switch ($_GET['errore']) {

				case '1':
					echo "Errore: e' obbligatorio compilare tutti i campi!";
					break;

				case '2':
					echo "Errore: le password digitate non corrispondono!";
					break;

                case '3':
                    echo "Errore: la e-mail inserita e' già stata utlizzata!";
                    break;

                case '4':
                    echo "La lunghezza della password deve essere minimo di 8 caratteri!";
                    break;
            }


            exit();

        }
        else{

            $page = file_get_contents("../HTML/accesso.html");
            echo $page;
            echo "<p class='box_errore'>";
            echo "La password o e-mail digitate sono sbagliate";
            exit;

        }
   }

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
