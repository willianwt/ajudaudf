<?php
//action.php
include 'crud.php';
$object = new Crud();
if(isset($_POST["action"]))
{
 if($_POST["action"] == "Load")
 {
  $record_per_page = 12;
  $page = '';

  if(isset($_POST["page"]))
  {
   $page = $_POST["page"];
  }
  else
  {
   $page = 1;
  }
  $start_from = ($page - 1) * $record_per_page;
  $con = mysqli_connect('localhost','root','','ajudaudf');
  $result = $con -> query("SELECT * FROM `pedidos`");
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records/$record_per_page);
  echo $object->get_data_in_table("SELECT * FROM pedidos ORDER BY id DESC LIMIT $start_from, $record_per_page");
  echo '<br /><div class="row justify-content-center"><nav><ul class="pagination">';

  if($page > 1)
  {
  echo '<li class="page-item"><a class="pagination_link page-link" style="cursor:pointer;" id="1">Primeira</a></li>';
  echo '<li class="page-item"><a class="pagination_link page-link" style="cursor:pointer;" id='.($page -1).'><i class="far fa-hand-point-left"></i></a></li>';
  }
  echo $object->make_pagination_link("SELECT * FROM pedidos ORDER by id", $record_per_page);
  if ($page < $total_pages){
  echo '<li class="page-item"><a class="pagination_link page-link" style="cursor:pointer;" id='.($page +1).'><i class="far fa-hand-point-right"></i></a></li>';
  echo '<li class="page-item"><a class="pagination_link page-link" style="cursor:pointer;" id='.($total_pages).'>Última</a></li>';
  }
  echo '</ul></nav></div><br />';

 }
 
 if($_POST["action"] == "Delete")
 {
  $query = "DELETE FROM pedidos WHERE id = '".$_POST["id"]."'";
  $object->execute_query($query);
  echo "Pedido Excluído";
 }
 
 if($_POST["action"] == "Search")
 {
  $search = mysqli_real_escape_string($object->connect, $_POST["query"]);
  $query = "
  SELECT * FROM pedidos 
  WHERE materia LIKE '%".$search."%' 
  OR assunto LIKE '%".$search."%' 
  OR curso LIKE '%".$search."%' 
  OR disponibilidade LIKE '%".$search."%' 
  OR usuario LIKE '%".$search."%' 
  ORDER BY id DESC
  ";
  //echo $query;
  echo $object->get_data_in_table($query);
 }
 
}
/*  PARA EDITAR, SE FOR USAR

if($_POST["action"] == "Fetch Single Data") {
  $output = '';
  $query = "SELECT * FROM users WHERE id = '".$_POST["user_id"]."'";
  $result = $object->execute_query($query);
  while($row = mysqli_fetch_array($result))
  {
   $output["first_name"] = $row['first_name'];
   $output["last_name"] = $row['last_name'];
  
  }
  echo json_encode($output);
 }

if($_POST["action"] == "Edit")
 {
  
  $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);
  $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);
  $query = "UPDATE users SET first_name = '".$first_name."', last_name = '".$last_name."', image = '".$image."' WHERE id = '".$_POST["user_id"]."'";
  $object->execute_query($query);
  echo 'Data Updated';
  //echo $query;
 }
 */
?>