<?php
header('Content-type: text/html; charset=UTF-8');
require_once "conexao.php";

//Função para o select dos cursos
function option_curso(){
	global $db;
	$curso="select * from curso";
	$result = mysqli_query($db, $curso);	
		echo "<option selected value=''>Selecione o Curso:</option>";
		while($row = $result->fetch_assoc()) {
       echo "<option value='".$row['curso']."' >" . $row['curso'] . "</option>";
				}
}

//Cria o hash da senha, usando MD5 e SHA-1

function make_hash($str)
{
    return sha1(md5($str));
}

function checkUser($uemail)
{
	global $db;
	
	$query = mysqli_query($db, "SELECT usuario FROM cadastro WHERE email = '$uemail'");

	if(mysqli_num_rows($query) > 0)
	{
		return 'true';
	}else
	{
		return 'false';
	}
}

function UserID($uemail)
{
	global $db;
	
	$query = mysqli_query($db, "SELECT usuario FROM cadastro WHERE email = '$uemail'");
	$row = mysqli_fetch_assoc($query);
	
	return $row['usuario'];
}


function generateRandomString($length = 20) {
	// This function has taken from stackoverflow.com
    
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}

function send_mail($to, $token)
{
	// Inclui o arquivo class.phpmailer.php
require_once("phpmailer/class.phpmailer.php"); 	
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->isSMTP();
	$mail->Host = 'smtp-relay.sendinblue.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'suporte.ajudaudf@gmail.com';
	$mail->Password = '-';
	$mail->Port = 587;
	
	$mail->From = 'suporte.ajudaudf@gmail.com';
	$mail->FromName = 'Suporte AjudaUDF';
	$mail->addAddress($to);
	$mail->addReplyTo('suporte.ajudaudf@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'Recuperação de Senha - AjudaUDF';
	$link = 'http://www.ajudaudf.tk/forget.php?email='.$to.'&token='.$token;
	$mail->Body    = "<b>Olá,</b><br><br>Voce solicitou uma recuperação de senha.<br> <a href='$link' target='_blank'>CLIQUE AQUI</a> para resetar sua senha. Caso não consiga clicar, copie o endereço abaixo e cole no seu navegador.<br><i>". $link."</i><br><br><b>Caso não tenha solicitado, desconsidere esse email.</b><br><br>Atenciosamente,<br>Equipe AjudaUDF";
	
	
	if(!$mail->send()) {
		return 'fail';
	} else {
		return 'success';
	}
}

function verifytoken($userID, $token)
{	
	global $db;
	
	$query = mysqli_query($db, "SELECT valid FROM recovery_keys WHERE usuario = '$userID' AND token = '$token'");
	$row = mysqli_fetch_assoc($query);
	
	if(mysqli_num_rows($query) > 0)
	{
		if($row['valid'] == 1)
		{
			return 1;
		}else
		{
			return 0;
		}
	}else
	{
		return 0;
	}
	
}
