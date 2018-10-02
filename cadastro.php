<?php 
require_once "conexao.php";
if (isset($_POST['rgm'])){
		
		$nome = $_POST['nome'];
		$rgm = $_POST['rgm'];
		$datanascimento = $POST['datanascimento'];
		$sexo = $_POST['sexo'];
		$telefone = $_POST['telfone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$faculdade = $_POST['faculdade'];
		$curso = $_POST['curso'];
		$semeste = $_POST['semestre'];
		$turno = $_POST['turno'];
		$descricao = $_POST['descricao'];
		$sql = "INSERT INTO cadastro (nome,rgm,nascimento,sexo,telefone,email,senha) VALUES ('$nome', '$rgm', '$nascimento', '$sexo','$telefone', '$email', '$senha')";
		mysqli_query($db,$sql);
		}
?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <title>AjudaUDF</title>
  </head>
  <body>
		
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
						
	</div>

	<form action="cadastro.php" method="post">

	<div class="form-row col">
		<div class="form-group col-md-6">
    		<label for="nome">Nome completo</label>
      		<input type="text" class="form-control" id="nome" placeholder="Nome completo">
    	</div>

		<div class="form-group col-md-6">
    		<label for="rgm">RGM</label>
      			<input type="number" class="form-control" id="rgm" placeholder="RGM">
    	</div>
  		</div>
 	 </div>
  	<div class="form-row col">
    	<div class="form-group col">
      		<label for="datanascimento">Data de nascimento</label>
    		  <input type="date" class="form-control" id="datanascimento" placeholder="Data de nascimento">
    	</div>
    	<div class="form-group col-md-5">
            <label for="sexo">Sexo</label>
      			<select id="sexo" class="form-control">
        			<option selected>Escolher...</option>
					<option value="homem">Homem</option>
					<option value="mulher">Mulher</option>
					<option value="nf">Não informado</option>
			     </select>
    	</div>
    	<div class="form-group col-md-5">
    		<label for="telefone">Telefone</label>
      			<input type="number" class="form-control" id="telefone" placeholder="Telefone" >
    	</div>
  	</div>

	

<div class="form-row col">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" placeholder="Senha">
    </div>
 </div>

	<div class="form-row col-md-4">
    	<label for="Faculdade" class="col-sm-2 col-form-label">Faculdade</label>
      		<input type="text" class="form-control" id="faculdade" placeholder="Faculdade">
    	</div>
  	</div>

	<div class="form-row col">
    	<div class="form-group col-md-6">
      		<label for="curso">Curso</label>
     		<input type="text" class="form-control" id="curso" placeholder="Curso">
    	</div>
    	<div class="form-group col-md-4">
      		<label for="semestre">Semestre</label>
      			<select id="semestre" class="form-control">
        			<option selected>Escolher...</option>
			        <option value="1°">1</option>
							<option value="2°">2</option>
							<option value="3°">3</option>
							<option value="4°">4</option>
							<option value="5°">5</option>
							<option value="6°">6</option>
							<option value="7°">7</option>
							<option value="8°">8</option>
							<option value="9°">9</option>
							<option value="10°">10</option>
							<option value="11°">11</option>
							<option value="12°">12</option>
			      </select>
    	</div>
    	<div class="form-group col-md-2">
      		<label for="turno">Turno</label>
      		<input type="text" class="form-control" id="turno" placeholder="Turno">
    	</div>
  	</div>

<div class="form-group col">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="5" cols="20" maxlength="500" placeholder="Pequeno comentario sobre experiências profissionais e conhecimentos"></textarea>
 </div>

<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Enviar</button>
</div>

    
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>