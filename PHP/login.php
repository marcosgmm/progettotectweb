<?php
        $email = $_POST['Email'];
		$psw = $_POST['Password'];

        if($email == "" || $psw == ""){
            $pagina = file_get_contents("../HTML/accesso.html");
            echo $pagina;
            echo "<div class='box_errore'>Tutti i campi devono essere compilati per accedere!</div>";
            exit;
        }

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
            $ComandoSQLperaccesso = "select id from utenti where email ='" . $email ."'";
            $Aux = $conn->query($ComandoSQLperaccesso);
            $Name = $Aux->fetch_assoc();
            $idUtente = $Name['id'];
            mysqli_close($conn);
            header("Location: capoHome.php?nome=$idUtente");

            exit;
        } else{
            mysqli_close($conn);
            $pagina = file_get_contents("../HTML/accesso.html");
            echo $pagina;
            echo "<div class='box_errore'>Password o e-mail digitate sono sbagliate!</div>";

        }

?>
