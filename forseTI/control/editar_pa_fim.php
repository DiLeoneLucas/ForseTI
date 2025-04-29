<?php
//Página referente a finalização do chamado

//Conecta com o Banco de Dados
require_once("../control/db_classes.php");

$patrimonio_n = $_POST['patrimonio'];
$id_n = $_POST['id_ficha'];

//Gera a atualização no banco de dados referente ao ID enviado via POST
$qu_chamado = "UPDATE pa SET patrimonio='$patrimonio_n' WHERE id_pa = '$id_n' ";
$objDb = new db();
$conncet = $objDb->conecta_mysql();

//Se a consulta for efeituada o usuário é redirecionado ao menu
if(mysqli_query($conncet, $qu_chamado)){
	echo "entrei";
	header("Location: ../control/editar_pa.php");
}else{
	
	echo "erro de consulta";
}

?>