<link href="style.css">

<?php

    session_start();

    $page = file_get_contents("home.html");
    $ba =file_get_contents("bottonea.html");
    $bb =file_get_contents("bottoneb.html");


    if(isset($_GET['errore'])){

        if($_GET['errore'] < 5){

         $page = file_get_contents("main.html");
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

            $page = file_get_contents("accesso.html");
            echo $page;
            echo "<p class='box_errore'>";
            echo "La password o e-mail digitate sono sbagliate";
            exit;

        }
   }

    if(isset($_GET['nome'])){
        $aux = $_GET['nome'];
        $page = str_replace('$ACCEDI$', $aux, $page);
        $page = str_replace('$REGISTRATI$', '', $page);
        echo $page;
        exit;
    } else{
        $page = str_replace('$ACCEDI$', $ba, $page);
        $page = str_replace('$REGISTRATI$', $bb, $page);
        echo $page;
    }



?>
