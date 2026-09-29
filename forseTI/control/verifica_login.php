<?php

@session_start();

require_once("db_classes.php");


$nome = $_POST['username'];
$senha = $_POST['password'];

$vetor = explode("@", $nome);

$user = $vetor[0];

$sql = "SELECT * FROM usuario WHERE user = '$user' and senha = '$senha' and id_status = 1 ";
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);

$controle = $q_consulta->num_rows;
$linha = mysqli_fetch_assoc($q_consulta);

$nome_consulta = $linha['nome'];
$sobrenome_consulta = $linha['sobrenome'];
$nome_completo = $nome_consulta." ".$sobrenome_consulta;

$sql_tipo = "SELECT tipo FROM v_usuario WHERE nome = '$nome_consulta' and sobrenome = '$sobrenome_consulta'";
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta2 = mysqli_query($conncet, $sql_tipo);

$linha2 = mysqli_fetch_assoc($q_consulta2);

$_SESSION['tipo_user'] = $linha2['tipo'];

$id_usuario = $linha['id_user'];

$_SESSION['nome_full'] = $nome_completo;


//Se a consulta resultar verdadeiro a sessão é iniciada
if($controle>0){
	$ses=rand();
	session_start();
	$_SESSION['sessao'] = $ses;

	if($id_usuario == '2'){
		header("Location: tv.php");
		exit();
	}

	header("Location: dashboard.php");
}


?>