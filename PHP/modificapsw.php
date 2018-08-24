<?php

        session_start();

         mysqli_report(MYSQLI_REPORT_STRICT);

        try {
                $connection = new mysqli("localhost","root","", "prova") ;
                } catch (Exception $e ) {
                    echo "<h2> Database momentaneamente non disponibile :( <h2>";
                    exit;
                }

        $email = $_SESSION['email'];
        $psw = $_SESSION['password'];

        $vecchiaPsw = $_POST['Vecchiapsw'];
        $nuovaPsw = $_POST['Nuovapsw'];
        $nuovaPsw2 = $_POST['Nuovapsw2'];

        $conn = new mysqli("localhost","root","", "prova");

         if($psw != $vecchiaPsw){
            mysqli_close($conn);

            $profilo = file_get_contents("../HTML/profiloUtente.html");

            $NomeUtente = $_SESSION['name'];
            $Cognome = $_SESSION['cognome'];
            $Email = $_SESSION['email'];
            $messaggio = "Password sbagliata!";

            $profilo = str_replace('$EMAIL$', $Email, $profilo);
            $profilo = str_replace('$NOME$', $NomeUtente, $profilo);
            $profilo = str_replace('$COGNOME$', $Cognome, $profilo);
            $profilo = str_replace('$MESSAGGIO$', $messaggio, $profilo);

            echo $profilo;
            exit;
        }

        if(strlen($nuovaPsw)<8){
            mysqli_close($conn);

            $profilo = file_get_contents("../HTML/profiloUtente.html");

            $NomeUtente = $_SESSION['name'];
            $Cognome = $_SESSION['cognome'];
            $Email = $_SESSION['email'];
            $messaggio = "La nuova password deve essere almeno 8 caratteri!";

            $profilo = str_replace('$EMAIL$', $Email, $profilo);
            $profilo = str_replace('$NOME$', $NomeUtente, $profilo);
            $profilo = str_replace('$COGNOME$', $Cognome, $profilo);
            $profilo = str_replace('$MESSAGGIO$', $messaggio, $profilo);

            echo $profilo;
            exit;
        }

        if($nuovaPsw == $nuovaPsw2){
            $comandoSQL2 = "update utenti SET psw = '".$nuovaPsw."' where email = '".$email."'";
            $risultatoModifica = $conn -> query($comandoSQL2);
            if($risultatoModifica){

            $profilo = file_get_contents("../HTML/profiloUtente.html");

            $NomeUtente = $_SESSION['name'];
            $Cognome = $_SESSION['cognome'];
            $Email = $_SESSION['email'];
            $messaggio = "La tua password e' stata modificata!";

            $profilo = str_replace('$EMAIL$', $Email, $profilo);
            $profilo = str_replace('$NOME$', $NomeUtente, $profilo);
            $profilo = str_replace('$COGNOME$', $Cognome, $profilo);
            $profilo = str_replace('$MESSAGGIO$', $messaggio, $profilo);

            echo $profilo;
            exit;
                                                }
            else {
                   mysqli_close($conn);
                    header("Location: ../HTML/profiloUtente.html?cambiata=no");
                    exit;  }
        } else{
            $profilo = file_get_contents("../HTML/profiloUtente.html");
            $NomeUtente = $_SESSION['name'];
            $Cognome = $_SESSION['cognome'];
            $Email = $_SESSION['email'];
            $messaggio = "Le nuove password non corrispondono!";

            $profilo = str_replace('$EMAIL$', $Email, $profilo);
            $profilo = str_replace('$NOME$', $NomeUtente, $profilo);
            $profilo = str_replace('$COGNOME$', $Cognome, $profilo);
            $profilo = str_replace('$MESSAGGIO$', $messaggio, $profilo);

            echo $profilo;
            exit;
        }
?>
