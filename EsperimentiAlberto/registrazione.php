<?php

		//ok la pagina è stata davvero richiamata dalla form

		$email = $_POST['Email']; //recupero il contenuto della casella email
		$psw = $_POST['Password']; //recupero il contenuto della casella password
        $psw2 = $_POST['Password2'];
        $Nome = $_POST['Nome'];
        $Cognome = $_POST['Cognome'];

        if($email == '' || $Nome == '' || $Cognome == '' || $psw == '' || $psw2 == ''){
            header("Location: capo.php?errore=1"); //non sono stati compilati dei campi
            exit;
        }

        if(strlen($psw)<8){
            header("Location: capo.php?errore=4"); //lunghezza della password troppo corta
            exit;
        }

        if($psw != $psw2){
            header("Location: capo.php?errore=2"); //password digitate non sono uguali
            exit;
        }
        else{

		$conn = new mysqli("localhost","root","", "prova");

		$comandoSQL = "select psw from utenti where email ='" . $email ."'";

		$risultatoAccesso = $conn->query($comandoSQL);

			if ($risultatoAccesso->fetch_assoc()) {
				header("Location: capo.php?errore=3"); //la email è già utilizzata
				exit;
			}

			$comandoSQL = "insert into utenti values ( null ,'". $email ."','" . $psw ."','" . $Nome . "','" . $Cognome . "')";

			$risultato = $conn->query($comandoSQL);

			if ($risultato){
				header("Location: capo.php?nome=$Nome");
    		}
    		else{
    			mysqli_close($conn);
      			header("Location: main.html?errore=3"); //inserimento fallito
    		}

    		exit;

		}



?>
