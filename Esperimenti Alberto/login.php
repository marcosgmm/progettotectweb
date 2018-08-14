<?php
        $email = $_POST['Email'];
		$psw = $_POST['Password'];

		$conn = new mysqli("localhost","root","", "prova");

		$comandoSQL = "select psw from utente where email ='" . $email ."'";

		$risultatoAccesso = $conn -> query($comandoSQL);

        if ($risultatoAccesso) {

          if($riga = $risultatoAccesso -> fetch_assoc()) {
      			 $autenticato = ($psw === $riga['psw']);
    		} else {
   				    $autenticato = false; }
        }

        if ($autenticato){
            mysqli_close($conn);
            header("Location: capo.php");
            exit;
        } else{
            mysqli_close($conn);
      		header("Location: capo.php?errore=5");
        }

?>
