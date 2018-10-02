<!-- os dados daqui foram para o formulario no index.
aqui colocaremos os dados do chamado em php ao clicar no botao enviar. -->

<?php
	if(isset($_POST['contato']) && isset($_POST['assunto']))
	{
		// include Database connection file 
		include("conexao.php");
		// get values 
				$tipo = $_POST['tipo'];
        $usuario = $_POST['usuario'];
        $contato = $_POST['contato'];
        $curso = $_POST['curso'];
        $materia = $_POST['materia'];
        $assunto = $_POST['assunto'];
        $contrapartida = $_POST['contrapartida'];
        $disponibilidade = $_POST['disponibilidade'];


				$query="INSERT INTO pedidos (tipo, usuario, contato, curso, materia, assunto, contrapartida, disponibilidade) VALUES ('$tipo', '$usuario', '$contato', '$curso', '$materia', '$assunto', '$contrapartida', '$disponibilidade' )";
		if (!$result = mysqli_query($db, $query)) {
	        exit(mysqli_error($db));
	    }
	    echo "1 Record Added!";
	}