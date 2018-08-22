<?php

        session_start();

        $email = $_SESSION['email'];

        $vecchiaPsw = $_POST['Vecchiapsw'];
        $nuovaPsw = $_POST['Nuovapsw'];
        $nuovaPsw2 = $_POST['Nuovapsw2'];

        $conn = new mysqli("localhost","root","", "prova");
        $comandoSQL = "select psw from utenti where email ='" . $email."'";
        $risultatoAccesso = $conn -> query($comandoSQL);
        $row = $risultatoAccesso -> fetch_assoc();
        $psw = $row['psw'];

       if($psw != $vecchiaPsw){
            mysqli_close($conn);
            header("Location: ../HTML/profiloUtente.html?cambiata=22");
            exit;
        }

        if($nuovaPsw == $nuovaPsw2){
            $comandoSQL2 = "update utenti SET psw = '".$nuovaPsw."' where email = '".$email."'";
            $risultatoModifica = $conn -> query($comandoSQL2);
            if($risultatoModifica){
                   mysqli_close($conn);
                   header("Location: ../HTML/profiloUtente.html?cambiata=si");       }
            else {
                   mysqli_close($conn);
                    header("Location: ../HTML/profiloUtente.html?cambiata=no");
                    exit;  }
        } else{
            echo "Zio le due password non corrispondono";
        }
?>
