<?php
include "conexao.php";
include "funcoes.php";
ini_set('default_charset', 'UTF-8');
include 'crud.php';
$object = new Crud();

?>
<!--###################################################################################################################################
#		PROJETO AJUDAUDF -  ATIVIDADE INTERDISCIPLINAR I - 2º SEMESTRE 2018 
#		AUTORES: 		ANTONY LUCAS
#						    THIAGO MACHADO 
#						    WILLIAN TAIGUARA 
#		AGRADECIMENTOS: 
#		-- https://www.webslesson.info/2016/12/php-mysql-ajax-crud-using-oops-pagination.html -- Adaptação do CRUD
#		-- https://www.canalti.com.br/programacao/web/php/como-criar-sistema-de-login-com-php-e-mysql/ -- Adaptação do login e cadastro 
#		-- https://codepen.io/rdallaire/pen/apoyx -- Botão Scroll UP 																																	
#		-- http://blog.ultimatephp.com.br/sistema-de-login-php/ -- Adaptação de cadastro e criptografia de senha 											
#		-- http://getbootstrap.com/ -- CSS, Javascript, jQuery
		-- https://use.fontawesome.com/ -- icones
		-- http://phpmailer.codeworxtech.com/ -- sistema de email php
		-- http://www.sendinblue.com -- gerenciador de emails
#		-- https://www.eggslab.net/forgot-password-recovery-script-using-php-and-mysqli/ - adaptação da recuperação de senha
# 		***Todos os direitos reservados.***
#######################################################################################################################################-->

	<!doctype html>
	<html lang="pt-br">

	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<title>AjudaUDF</title>
		<style>
	#return-to-top {
			position: fixed;
			bottom: 10px;
			right: 0px;
			background: rgb(0, 0, 0);
			background: rgba(0, 0, 0, 0.7);
			width: 45px;
			height: 45px;
			display: block;
			text-decoration: none;
			-webkit-border-radius: 35px;
			-moz-border-radius: 35px;
			border-radius: 35px;
			display: none;
			-webkit-transition: all 0.3s linear;
			-moz-transition: all 0.3s ease;
			-ms-transition: all 0.3s ease;
			-o-transition: all 0.3s ease;
			transition: all 0.3s ease;
			padding: 0;
	}
	#return-to-top i {
			color: #fff;
			margin: 0;
			position: relative;
			left: 16px;
			top: 13px;
			font-size: 19px;
			-webkit-transition: all 0.3s ease;
			-moz-transition: all 0.3s ease;
			-ms-transition: all 0.3s ease;
			-o-transition: all 0.3s ease;
			transition: all 0.3s ease;
	}
	#return-to-top:hover {
			background: rgba(0, 0, 0, 0.9);
	}
	#return-to-top:hover i {
			color: #fff;
			top: 5px;
	}
		</style>
	</head>

	<body>
		<div>
			

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<a class="navbar-brand" href="#"><i class="fas fa-handshake"></i> AjudaUDF</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link btn btn-outline-warning my-2 my-sm-0 mx-2 mx-sm-2"  data-toggle="modal" data-target="#sobre">Sobre</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link btn btn-outline-info my-2 my-sm-0 mx-2 mx-sm-2" data-toggle="modal" data-target="#tutorial">Tutorial</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<div class="mr-2" style="color: white"> <?php if(isset($_SESSION['sexo']) == "M"){
																																	echo "Seja bem vindo";
																																}elseif(isset($_SESSION['sexo']) == "F"){
																																	echo "Seja bem vinda";
																																}else{
																																	echo "Olá";
																																}
					if (isset($_SESSION['usuario'])){ echo ", ". $_SESSION['nome'];}; ?>! </div>
					<?php
					if (!isset($_SESSION['usuario'])){
					echo '<a class="btn btn-success my-2 my-sm-0 mx-2 mx-sm-2" data-toggle="modal" data-target="#login">Login</a>';
					}else{
					echo '<a class="btn btn-outline-danger my-2 my-sm-0" href="logout.php">Sair</a>';
					}; ?>
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
						<form action="javascript:oferecerAjuda()" class="needs-validation" novalidate>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nome">Usuário</label>
									<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario']; ?>" placeholder="<?php echo $_SESSION['usuario']; ?>" readonly>
								</div>
								<div class="form-group col-md-6">
									<label for="contato">Contato</label>
									<input type="text" class="form-control" id="contato" name="contato" placeholder="Contato" required>
									<div class="invalid-feedback">
										Insira uma forma de contato.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="curso">Curso</label>
									<select class="custom-select" name="curso" id="curso" required>
               		 <?php
										option_curso();
										?>
              </select>
									<div class="invalid-feedback">
										Escolha um curso.
									</div>
								</div>
								<div class="form-group col-md-6">
									<label for="materia">Matéria</label>
									<input type="text" class="form-control" id="materia" name="materia" placeholder="Informe a matéria da ajuda" required>
									<div class="invalid-feedback">
										Informe uma matéria.
									</div>
								</div>
								
							</div>
							<label for="nome">Disponibilidade:</label>
							<input type="text" class="form-control" id="disponibilidade" name="disponibilidade" placeholder="Horários disponíveis para contato" required>
							<div class="invalid-feedback">
										Informe um horário.
							</div>

							<div class="form-group">
								<label for="assunto">O que eu ofereço?</label>
								<textarea class="form-control" id="assunto" name="assunto" rows="3" placeholder="Estou oferecendo ajuda em..." required></textarea>
								<div class="invalid-feedback">
										É necessário preencher o assunto.
									</div>
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
						<form action="javascript:pedirAjuda()" class="needs-validation" novalidate>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nome">Usuário</label>
									<input type="text" class="form-control" id="usuario_pedir" name="usuario_pedir" value="<?php echo $_SESSION['usuario']; ?>" placeholder="<?php echo $_SESSION['usuario']; ?>" readonly>
								</div>
								<div class="form-group col-md-6">
									<label for="contato">Contato</label>
									<input type="text" class="form-control" id="contato_pedir" name="contato" placeholder="Contato" required>
									<div class="invalid-feedback">
										Insira uma forma de contato.
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="curso">Curso</label>
									<select class="custom-select" name="curso" id="curso_pedir" required>
                    <?php
											option_curso();
										?>
              </select>
									<div class="invalid-feedback">
										Selecione o curso.
									</div>
								</div>
								<div class="form-group col-md-6">
									<label for="materia">Matéria</label>
									<input type="text" class="form-control" id="materia_pedir" name="materia" placeholder="Informe a matéria da ajuda" required>
									<div class="invalid-feedback">
										Insira a matéria.
									</div>
								</div>
							</div>
							<label for="nome">Disponibilidade:</label>
							<input type="text" class="form-control" id="disponibilidade_pedir" name="disponibilidade" placeholder="Horários disponíveis para contato" required>
							<div class="invalid-feedback">
										Insira a disponibilidade.
							</div>

							<div class="form-group">
								<label for="assunto">O que eu preciso?</label>
								<textarea class="form-control" id="assunto_pedir" name="assunto" rows="3" placeholder="Preciso de ajuda em..." maxlength="280" required></textarea>
								<div class="invalid-feedback">
										Insira o assunto.
									</div>
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
		<!-- INICIO MODAL CADASTRO -->
		<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="cadastroTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form method="POST" action="cadastro.php">

							<div class="form-row col">
								<div class="form-group col-md-6">
									<label for="nome">Nome completo</label>
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
								</div>

								<div class="form-group col-md-6">
									<label for="usuario">Nome de Usuário</label>
									<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
								</div>
							</div>
							<div class="form-row col">
								<div class="form-group col">
									<label for="nascimento">Data de nascimento</label>
									<input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Data de nascimento" required>
								</div>
								<div class="form-group col-md-5">
									<label for="sexo">Sexo</label>
									<select id="sexo" name="sexo" class="form-control">
										<option selected value="">Sexo:</option>
										<option value="M">Masculino</option>
										<option value="F">Feminino</option>
										<option value="NI">Não informado</option>
									</select>
								</div>
								<div class="form-group col-md-5">
									<label for="telefone">Telefone</label>
									<input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
								</div>
							</div>
							<div class="form-row col">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								</div>
								<div class="form-group col-md-6">
									<label for="senha">Senha</label>
									<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
								</div>
							</div>
							<div class="form-row col">
								<div class="form-group col-md-6">
									<label for="curso">Curso</label>
									<select class="custom-select" name="curso" id="curso_cadastro" required>
                    <?php
											option_curso();
										?>
              </select>
								</div>
								<div class="form-group col-md-4">
									<label for="semestre">Semestre</label>
									<select id="semestre" name="semestre" class="form-control" required>
										<option selected value="">Escolha o semestre:</option>
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
									<select id="turno" name="turno" class="form-control" required>
									<option selected value="">Turno:</option>
										<option value="M">Matutino</option>
										<option value="V">Vespertino</option>
										<option value="N">Noturno</option>
									</select>
								</div>
							</div>

							<div class="form-group col">
								<label for="descricao">Descrição</label>
								<textarea class="form-control" id="descricao" name="descricao" rows="5" cols="20" maxlength="500" placeholder="Fale um pouco sobre você, experiências profissionais e conhecimentos."></textarea>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Enviar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
			<!-- FIM MODAL CADASTRO -->	
			<!-- INICIO MODAL LOGIN -->
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form action="login.php" method="POST">
								<div class="form-group">
									<label for="exampleInputEmail1">Usuário</label>
									<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Seu nome de usuário" required>
									<small id="emailHelp" class="form-text text-muted">O seu usuário é único, respeitando as nossas políticas de privacidade e segurança.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Senha</label>
									<input type="password" class="form-control" id="senha_login" name="senha" placeholder=" Sua senha" required>
								</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-danger mr-auto" data-toggle="modal" data-target="#esquecisenha">Esqueci minha senha</button>
									<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
							</form>
							
					</div>
				</div>
			</div>
			</div>
			<!-- FIM MODAL CADASTRO -->
		
		<!-- INÍCIO MODAL SOBRE -->
		
<div class="modal fade" id="sobre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5 class="modal-title" id="TituloSobre">Sobre o projeto AjudaUDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
				
				<p>
					O projeto <strong>AjudaUDF </strong>é uma plataforma onde o intuito é que os usuários possam se ajudar cadastrando ofertas e ao mesmo tempo 
				procurando ajuda nos estudos. Tudo isso pode ser feito de forma simples, objetiva e recíproca. 
				Totalmente grátis, onde a nossa filosofia é clara: ajudar o próximo.
					</p>
				<p>
					A plataforma também é responsiva; sendo assim é possível acessar o site de qualquer lugar a qualquer momento sem a necessidade de 
				instalar nenhum programa ou aplicativo.
				Compatível com os navegadores mais modernos e adaptado para se ajustar a diversos tamanhos de telas.
				Não serão permitidas vendas nem trocas por dinheiro. A filosofia por trás desse projeto é promover a socialização entre os membros, não discriminando por condição financeira.

					</p>
				A única moeda aceita aqui é o conhecimento, e todos possuem algum tipo de conhecimento em alguma área que possa ser útil ao próximo.

				<br><p>
					A nossa proposta é clara, ajudar para ser ajudado! 
					<p>
						
				
						 </br>Abraços, </p>

					</br><p align="left">Equipe AjudaUDF.<br>suporte.ajudaudf@gmail.com</p>

					</p>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- FIM MODAL SOBRE-->


		<!-- INÍCIO MODAL TUTORIAL -->
		<div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="TituloTutorial"> Como utilizar o AjudaUDF</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<p>
							 <strong>Seja bem vindo ao AjudaUDF!</strong>
							</p>
						<p>


		<p>
			Temos algumas dicas para te ajudar na utilização do site.
		</p>

						<p>

						** Para visualização dos cartões não é necessário ter um cadastro, porém você não poderá interagir com os mesmos **

						</p>
						<p>
							Caso você queira interagir, aqui vão os passos:
						</p>


		<p>


		1. Efetue o seu cadastro com as informações necessárias. <br/>

		2. Efetue seu login com nome de usuário e senha que foram criados no passo anterior. <br/>

		3. Feito o login, você poderá criar o seu cartão de <strong>Oferecer Ajuda</strong> ou <strong>Solicitar Ajuda</strong> clicando no menu ao lado esquerdo. <br/>

		4. Depois que o seu cartão for criado, somente você poderá excluí-lo, a qualquer momento, clicando no ícone da lixeira na parte inferior do cartão. <br/>

		5. Caso esteja procurando ajuda ou assunto específico basta utilizar o campo de “busca” também ao seu lado esquerdo. <br/>
		</p>	


		<p>
			Desejamos ótimos estudos e que você sane suas dúvidas.
						</p>

		<p>
		 Abraços, </p> <br/> 

		<p align="left">Equipe AjudaUDF.</p>

			</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

					</div>
				</div>
			</div>
		</div>
		
	<!-- FIM MODAL TUTORIAL-->

<!-- INICIO MODAL RECUPERAR SENHA-->
<div class="modal fade" id="esquecisenha" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Esqueci minha Senha</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					</div>
					<div class="modal-body">
						<form action="recuperarsenha.php" method="POST">
								<div class="form-group">
									<p>
										Esqueceu sua senha? Sem problemas, vamos arrumar isso. Apenas informe o email cadastrado e nos vamos enviar as instruções para recuperar sua senha ao seu email. 
									</p>
									<input type="email" class="form-control" id="recuperaSenhaEmail" name="recuperaSenhaEmail" aria-describedby="emailHelp" placeholder="Email cadastrado" required>
								</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Recuperar Senha</button>
							</div>
							</form>
							
					</div>
				</div>
			</div>
			</div>
<!-- FIM MODAL RECUPERAR SENHA-->




			<!-- INICIO DA LATERAL ESQUERDA, COM OS CARTOES -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3" style="background-color: #fff">
						<div>	
						<!-- AQUI ENTRA UM IF ISLOGGEDIN ENTAO MOSTRA OS BOTOES OFERECER E PEDIR E ESCONDE O BOTAO CADASTRAR -->
							<?php 	if (!isset($_SESSION['usuario'])){
						echo '<button type="button" class="btn btn-success btn-block my-3" data-toggle="modal" data-target="#cadastro">Cadastro</button>';
								}else{
						echo '<button type="button" class="btn btn-primary btn-block my-3" data-toggle="modal" data-target="#oferecerAjuda">Oferecer Ajuda</button>
						<button type="button" class="btn btn-danger btn-block mt-3 mb-4" data-toggle="modal" data-target="#pedirAjuda">Pedir Ajuda</button>';
} ?>
						<form>
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Buscar (Matéria, Curso, Assunto, Usuário...)">
							</div>
						</form>
						</div>
					</div>
					<!-- FIM DA LATERAL ESQUERDA -->
					<!-- INICIO LATERAL DIREITA  -->

					<div class="col-sm-9 container" style="background-color: #F8F8F8">
						 					<div id="user_table"></div>

					
						</div>
				</div>
			</div>
			</div>


			<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up fa-sm"></i></a>

			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="script.js"></script>

			<script type="text/javascript">
				$(window).scroll(function() {
					if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
							$('#return-to-top').fadeIn(200);    // Fade in the arrow
					} else {
							$('#return-to-top').fadeOut(200);   // Else fade out the arrow
					}
				});
				$('#return-to-top').click(function() {      // When arrow is clicked
					$('body,html').animate({
							scrollTop : 0                       // Scroll to top of body
					}, 500);
				});
			</script>
		
		<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
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
