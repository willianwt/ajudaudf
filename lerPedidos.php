<?php
	// include Database connection file 
	include("conexao.php");

	$data = '';

	$consulta = "SELECT * FROM pedidos ORDER BY id DESC";

	if (!$result = mysqli_query($db, $consulta)) {
        exit(mysqli_error($db));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
				$tipo = $row['tipo'];
				if($tipo == "Oferta"){
					$tipo = "primary";
				}
				if($tipo == "Pedido"){
					$tipo = "danger";
				}
    		$data .= '<div class="col-sm-4">
				<div class="card border-'.$tipo.' my-3" style="max-width: 22rem;">
				<div class="card-header"><h4>'.$row['id'].".".$row['curso'] ." - ". $row['materia'] .'</h4></div>
				<div class="card-body text-'.$tipo.'">
				<h5 class="card-title"> Assunto: </h5>
				<p class="card-text">'.$row['assunto'].'</p>
				<h6 class="card-title">Contrapartida</h6>
				<p class="card-text">'.$row['contrapartida'].'</p></div>
				<div class="card-footer text-muted"> Usuario: '.$row['usuario']. ' <BR> Contato: ' . $row['contato']. ' <BR> Disponibilidade: '.$row['disponibilidade'] .'</div></div></div>';
    	
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>
