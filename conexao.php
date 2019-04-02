<?php
//https://pt.stackoverflow.com/questions/43193/d%C3%BAvida-com-charset-iso-8859-1-e-utf8
//Dúvidas com UTF-8
header('Content-type: text/html; charset=UTF-8');
define('HOST', 'localhost');
define('USUARIO', 'udf');
define('SENHA', 'udf');
define('DB', 'ajudaudf'); 
$db = new mysqli(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
if (!mysqli_set_charset($db, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($db));
    exit;
}

?>