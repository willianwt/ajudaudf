<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Crud
{
 //crud class
 public $connect;
 private $host = "localhost";
 private $username = 'udf';
 private $password = 'udf';
 private $database = 'ajudaudf';

 function __construct()
 {
  $this->database_connect();
  $this->connect->set_charset("utf8");

 }

 public function database_connect()
 {
  $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
   
 }

 public function execute_query($query)
 {
  return mysqli_query($this->connect, $query);
 }

 public function get_data_in_table($query)
 {
  $output = '';
  $result = $this->execute_query($query);
  $output .='<div class="row">';
  if(mysqli_num_rows($result) > 0)
  {
   while($row = mysqli_fetch_array($result))
   {
     $tipo = $row['tipo'];
				if($tipo == "Oferta"){
					$tipo = "primary";
				}
				if($tipo == "Pedido"){
					$tipo = "danger";
				}
    $output .='<div class="col-sm-4">
                <div class="card border-'.$tipo.' my-3" style="min-width: 17em; min-height: 18em;">
                <div class="card-header"';
		 						if ($tipo == "primary"){
		 						$output .= ' style="background-color: rgba(0, 98, 204, 0.5);"';
								}else{
		 						$output .= ' style="background-color: rgba(255, 0, 0, 0.5);"';
								}
								$output .='><h6>'.$row['id'].".".$row['curso'] ." - ". $row['materia'] .'</h6></div>
                <div class="card-body text-'.$tipo.'">
                <h6 class="card-title">';
								if ($row['tipo'] == "Oferta"){
									$output .= 'Oferta:';
								}else{
								$output .= 'Pedido:'; 
								}
								$output .= '</h6>
                <p style="font-size: 0.9em;" class="card-text">'.$row['assunto'].'</p>
                </div> <div style="font-size: 0.8em;"  class="card-footer text-muted">';
		 					 if($_SESSION){
                $output .= 'Usuario: '.$row['usuario']. ' <BR> Contato: ' . $row['contato']. ' <BR> Disponibilidade: '.$row['disponibilidade'];
							 }else{
                $output .= 'Usuario: '.$row['usuario']. ' <BR> Contato: <a style="cursor:pointer;" data-toggle="modal" data-target="#login"><u>Faça login para visualizar.</u></a> <BR> Disponibilidade: '.$row['disponibilidade'];
							 }
		 					if ($_SESSION){
               if ($_SESSION['usuario'] == $row['usuario']) {
    						$output .= '<button name="delete" id="'.$row['id'].'" class="btn btn-secondary delete float-right" style="width: 1.5em; height: 1.5em; padding: 0;"><i class="far fa-trash-alt fa-sm"></i></button>';
               }
							}
                $output .= '</div>
                </div>
                </div>';
   }
  }
  else
  {
   $output .= '
    <tr>
     <td colspan="5" align="center">Não foram encontrados itens com o termo utilizado na busca. Tente outras palavras.</td>
    </tr>
   ';
  }
  $output .= '</div>';
  return $output;
 } 

 function make_pagination_link($query, $record_per_page)
 {
  global $page;

  $output = '';
   

  $result = $this->execute_query($query);
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records/$record_per_page);

  for($i = max(1, $page - 2); $i <= min($page + 2, $total_pages); $i++)
  {
		if($page==$i)
{
   $output .= '<li class="page-item active"><a class="pagination_link page-link" style="cursor:pointer;" id="'.$i.'">'.$i.'</a></li>';
  }else{
			$output .= '<li class="page-item"><a class="pagination_link page-link" style="cursor:pointer;" id="'.$i.'">'.$i.'</a></li>';
		}
	}
  return $output;
 }
}

/* BOTAO DE EDITAR, CASO FOR USAR 
<button name="update" id="'.$row['id'].'" class="btn btn-info update float-right mx-1" style="width: 1.5em; height: 1.5em; padding: 0;"><i class="far fa-edit fa-sm"></i></button> */
?>
