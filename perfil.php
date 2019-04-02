<!DOCTYPE html>
<html>

<head>
  <title>Perfil</title>
  <meta charset="UTF-08">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">Perfil</h5>
  </div>
    
  <div class="form-group col">
    <label for="usuario">Usuario</label>
    <input type="text" readonly class="form-control-plaintext">
  </div>

  <div class="form-group col">
    <label for="nome">Nome</label>
    <input type="text" readonly class="form-control-plaintext">
  </div>

  

 <div class="form-row col">
    <div class="form-group col-md-6">
      <label for="datanascimento">Data de nascimento</label>
      <input type="date" readonly class="form-control-plaintext">
 </div>
    
 <div class="form-group col-md-6">
      <label for="sexo">Sexo</label>
      <input type="text" readonly class="form-control-plaintext">
    </div>
 </div>
  
 <div class="form-group col">
    <label for="nome">Contato</label>
 </div>

 <div class="form-row  col">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" readonly class="form-control-plaintext">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone">Telefone</label>
      <input type="number" readonly class="form-control-plaintext">
    </div>
 </div>

 <div class="form-group col-md-6">
      <label for="curso">Curso</label>
      <input type="text" readonly class="form-control-plaintext">
    </div>
 </div>
 							
  <div class="form-group col">
		<label for="descricao">Descricao</label>
    <readonly class="form-control-plaintext"></readonly>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
  
  
  
  
</body>

</html>