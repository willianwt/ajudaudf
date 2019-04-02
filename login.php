<?php
include 'conexao.php';
include "funcoes.php";


$usuario = $_POST['usuario'];
$senha = make_hash($_POST['senha']);
 
$query = "select * from cadastro where usuario = '$usuario' and senha = '$senha'";
 
$result = mysqli_query($db, $query);
 
$row = mysqli_num_rows($result);
$dados = mysqli_fetch_array($result);
if($row == 1) {
	session_start();
	$_SESSION['usuario'] = $dados['usuario'];
	$_SESSION['nome'] = $dados['nome'];
	$_SESSION['sexo'] = $dados['sexo'];
	header('Location: index.php');

	exit();
} else {
	echo '<script type="application/javascript">alert("Login OU Senha INCORRETOS. TENTE NOVAMENTE."); window.location.href ="index.php";</script>';
	exit();
}