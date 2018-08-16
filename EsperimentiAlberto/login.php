<?php
        $email = $_POST['Email'];
		$psw = $_POST['Password'];

		$conn = new mysqli("localhost","root","", "prova");

		$comandoSQL = "select psw from utenti where email ='" . $email ."'";

		$risultatoAccesso = $conn -> query($comandoSQL);

        if ($risultatoAccesso) {

          if($riga = $risultatoAccesso -> fetch_assoc()) {
      			 $autenticato = ($psw === $riga['psw']);
    		} else {
   				    $autenticato = false; }
        }

        if ($autenticato){
            $ComandoSQLperaccesso = "select Nome from utenti where email ='" . $email ."'";
            $Aux = $conn->query($ComandoSQLperaccesso);
            $Name = $Aux->fetch_assoc();
            $NomeUtente = $Name['Nome'];
            mysqli_close($conn);
            header("Location: capo.php?nome=$NomeUtente");
            exit;
        } else{
            mysqli_close($conn);
      		header("Location: capo.php?errore=5");
        }

?>
