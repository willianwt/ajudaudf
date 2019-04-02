<?php
include_once "conexao.php";
include_once "funcoes.php";
    $uemail = $_POST['recuperaSenhaEmail'];
//    $uemail = mysqli_real_escape_string($db, $uemail);

    if (checkUser($uemail) == "true") {
        $userID = UserID($uemail);
        $token = generateRandomString();

        $query = mysqli_query($db, "INSERT INTO recovery_keys (usuario, token) VALUES ('$userID', '$token') ");
        if ($query) {
            $send_mail = send_mail($uemail, $token);

            if ($send_mail === 'success') {
                echo '<script type="application/javascript">alert("Foi enviado um email com as instruções de recuperação para o email informado. Favor verificar seu email, inclusive na caixa de spam."); window.location.href ="index.php";</script>';
                
            } else {
                echo '<script type="application/javascript">alert("Não foi possível enviar o email. Tente novamente."); window.location.href ="index.php";</script>';
               
            }

        } else {
             echo '<script type="application/javascript">alert("Algo deu errado. Tente novamente."); window.location.href ="index.php";</script>';
            
        }

    } else {
         echo '<script type="application/javascript">alert("O email informado não existe no nosso banco de dados."); window.location.href ="index.php";</script>';
        
    }


?>