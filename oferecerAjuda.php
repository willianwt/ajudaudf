
<?php
session_start();
	if(isset($_POST['contato']) && isset($_POST['assunto']))
	{
		// include Database connection file 
		include("conexao.php");
		// get values 
				$tipo = "Oferta";
        $usuario = $_SESSION['usuario'];
        $contato = $_POST['contato'];
        $curso = $_POST['curso'];
        $materia = $_POST['materia'];
        $assunto = $_POST['assunto'];
        $disponibilidade = $_POST['disponibilidade'];


				$query="INSERT INTO pedidos (tipo, usuario, contato, curso, materia, assunto, disponibilidade) VALUES ('$tipo', '$usuario', '$contato', '$curso', '$materia', '$assunto', '$disponibilidade' )";
		if (!$result = mysqli_query($db, $query)) {
	        exit(mysqli_error($db));
	    }
	    echo "1 Record Added!";
	}