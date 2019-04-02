<?php
include "conexao.php";
include "funcoes.php";
if (isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$nascimento = $_POST['nascimento']; 
		$sexo = $_POST['sexo'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = make_hash($_POST['senha']); 
		$curso = $_POST['curso'];
		$semestre = $_POST['semestre'];
		$turno = $_POST['turno'];
		$descricao = $_POST['descricao'];
		$sql = "INSERT INTO cadastro (nome,usuario,nascimento,sexo,telefone,email,senha,curso,semestre,turno,descricao) VALUES ('$nome', '$usuario', '$nascimento', '$sexo','$telefone', '$email', '$senha','$curso','$semestre','$turno','$descricao')";
		mysqli_query($db,$sql);
		// success
		if($sql){
    echo '<script type="application/javascript">alert("Registro realizado. Faça o Login!"); window.location.href ="index.php";</script>';

		}else{
			 echo '<script type="application/javascript">alert("Houve um problema. Tente novamente...".mysql_error()); window.location.href ="index.php";</script>';
		}
}
?>