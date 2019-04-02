<?php

include ('conexao.php');
include ('funcoes.php');

$uemail = $_GET['email'];
$token = $_GET['token'];

$userID = UserID($uemail); 

$verifytoken = verifytoken($userID, $token);


if(isset($_POST['new_password']))
{
	$new_password = $_POST['new_password'];
	$new_password = make_hash($new_password);
	$retype_password = $_POST['retype_password'];
	$retype_password = make_hash($retype_password);
	
	if($new_password == $retype_password)
	{
		$update_password = mysqli_query($db, "UPDATE cadastro SET senha = '$new_password' WHERE usuario = '$userID'");
		if($update_password)
		{
				mysqli_query($db, "UPDATE recovery_keys SET valid = 0 WHERE usuario = '$userID' AND token ='$token'");
        echo '<script type="application/javascript">alert("Senha alterada com sucesso. Faça o login."); window.location.href ="index.php";</script>';
		}
	}else
	{
		 $msg = "As senhas não são iguais!";
		 $msgclass = 'bg-danger';
	}
	
}
?>
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
    html,body{
      width:100%;
      margin:0;
        height:100%;
    }
</style>
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>AjudaUDF</title>
  </head>
  <body>
		<div class="container w-100 h-100">
			<div class="row align-items-center justify-content-center h-100">

			<?php if($verifytoken == 1) { ?>
			<div class="col-md-7">
				<form method="POST" class="border rounded px-4 py-4">
			    <h2>Cadastre uma nova senha - <a href="index.php">AjudaUDF</a></h2>

				<?php if(isset($msg)) { ?>
                <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>
    
                <div class="form-group">
									<label for="novaSenha">Nova Senha</label>
									<input type="password" class="form-control" id="novaSenha" name="new_password" placeholder="Nova Senha">
								</div>
    
                 <div class="form-group">
									<label for="exampleInputPassword1">Confirme a nova senha</label>
									<input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Confirme a nova senha">
									</div>
					<div class="modal-footer">
									<a role="button" class="btn btn-secondary mr-auto" href="index.php" >Cancelar</a>
									<button type="submit" name="submit" class="btn btn-success">Alterar Senha</button>
							</div>
			</form>
			 </div>

		</div>
        
        <?php }else {?>
	    	<div class="col-md-7 align-self-center border px-4 py-4 rounded" style="background-color: rgba(255, 0, 0, 0.7);">
   		       	<h2>Link inválido ou vencido - <a href="index.php">AjudaUDF</a></h2>
	            <p>Opps! Parece que o link que voce clicou está quebrado ou já foi utilizado.Por favor certifique-se de ter copiado o link corretamente ou requisite outro link <a href="index.php">AQUI</a>.</p>
				</div>
        <?php }?>

			</div>
		</div>
    
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>