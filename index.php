<?php
session_start();
include "conexao.php";

?>

	<!doctype html>
	<html lang="pt-br">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
		<title>AjudaUDF</title>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">AjudaUDF</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<a class="btn btn-outline-danger my-2 my-sm-0" href="logout.php">Sair</a>
				</form>
			</div>
		</nav>


		<!-- MODAL OFERECER AJUDA -->
		<div class="modal fade" id="oferecerAjuda" tabindex="-1" role="dialog" aria-labelledby="oferecerAjudaTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Oferecer Ajuda</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form action="javascript:oferecerAjuda()"> 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nome">Usuário</label>
									<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome">
									<!-- alterar pra pegar do banco e deixar sem editar -->
								</div>
								<div class="form-group col-md-6">
									<label for="contato">Contato</label>
									<input type="text" class="form-control" id="contato" name="contato" placeholder="Contato">
									<!-- providenciar que somente usuario cadastrado veja -->
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="curso">Curso</label>
									<!-- AQUI DEVE ALTERAR PARA PEGAR OS CURSOS DO BANCO -->
									<select class="custom-select" name="curso" id="curso">
                <option selected>Selecione o curso</option>
                <option value="ads">ADS</option>
                <option value="adm">ADM</option>
                <option value="adv">ADV...</option>
              </select>
								</div>
								<div class="form-group col-md-6">
									<label for="materia">Matéria</label>
									<input type="text" class="form-control" id="materia" name="materia" placeholder="Informe a matéria da ajuda">
								</div>
							</div>
							<label for="nome">Disponibilidade:</label>
									<input type="text" class="form-control" id="disponibilidade" name="disponibilidade" placeholder="Horários disponíveis para contato">
							
							<div class="form-group">
								<label for="assunto">O que eu ofereço?</label>
								<textarea class="form-control" id="assunto" name="assunto" rows="3" placeholder="Estou oferecendo ajuda em..."></textarea>
							</div>
							<div class="form-group">
								<label for="contrapartida">O que eu preciso?</label>
								<textarea class="form-control" id="contrapartida" name="contrapartida" rows="3" placeholder="Preciso de ajuda em... (não obrigatório) (pode ser um abraço)"></textarea>
								<input type="hidden" id="tipo" name="tipo" value="Oferta">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FIM MODAL OFERECER AJUDA -->

		<!-- MODAL PEDIR AJUDA -->
				<div class="modal fade" id="pedirAjuda" tabindex="-1" role="dialog" aria-labelledby="pedirAjudaTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Pedir Ajuda</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form action="javascript:pedirAjuda()"> 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nome">Usuário</label>
									<input type="text" class="form-control" id="usuario_pedir" name="usuario" placeholder="Nome">
									<!-- alterar pra pegar do banco e deixar sem editar -->
								</div>
								<div class="form-group col-md-6">
									<label for="contato">Contato</label>
									<input type="text" class="form-control" id="contato_pedir" name="contato" placeholder="Contato">
									<!-- providenciar que somente usuario cadastrado veja -->
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="curso">Curso</label>
									<!-- AQUI DEVE ALTERAR PARA PEGAR OS CURSOS DO BANCO -->
									<select class="custom-select" name="curso" id="curso_pedir">
                <option selected>Selecione o curso</option>
                <option value="ads">ADS</option>
                <option value="adm">ADM</option>
                <option value="adv">ADV...</option>
              </select>
								</div>
								<div class="form-group col-md-6">
									<label for="materia">Matéria</label>
									<input type="text" class="form-control" id="materia_pedir" name="materia" placeholder="Informe a matéria da ajuda">
								</div>
							</div>
							<label for="nome">Disponibilidade:</label>
									<input type="text" class="form-control" id="disponibilidade_pedir" name="disponibilidade" placeholder="Horários disponíveis para contato">
							
							<div class="form-group">
								<label for="assunto">O que eu preciso?</label>
								<textarea class="form-control" id="assunto_pedir" name="assunto" rows="3" placeholder="Estou oferecendo ajuda em..."></textarea>
							</div>
							<div class="form-group">
								<label for="contrapartida">O que eu ofereço?</label>
								<textarea class="form-control" id="contrapartida_pedir" name="contrapartida" rows="3" placeholder="Preciso de ajuda em... (não obrigatório) (pode ser um abraço)"></textarea>
								<input type="hidden" id="tipo_pedir" name="tipo" value="Pedido">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FIM MODAL PEDIR AJUDA -->

		<!-- INICIO DA LATERAL ESQUERDA, COM OS CARTOES -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-9" style="background-color: #fff">
					<div class="row pedidos">
						


					</div>
				</div>
				<!-- FIM DA LATERAL ESQUERDA -->
				<!-- INICIO LATERAL DIREITA COM OS BOTOES -->

				<div class="col-sm-3 container" style="background-color: #F8F8F8">
					<button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal" data-target="#oferecerAjuda">Oferecer Ajuda</button>
					<button type="button" class="btn btn-warning btn-block mt-2 mb-4" data-toggle="modal" data-target="#pedirAjuda">Pedir Ajuda</button>
					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar">
							<button type="button" class="btn btn-info btn-block">Buscar</button>
						</div>
					</form>
				</div>
			</div>
		</div>





		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="script.js"></script>

		<script>
			// DESABILITA O ENVIO DE FORMULARIO SE TIVER CAMPOS INVALIDOS - FONTE: BOOTSTRAP
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation'); //PRECISA ADICIONAR ESSA CLASSE
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
	</body>

	</html>