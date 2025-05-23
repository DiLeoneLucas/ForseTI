<?php

session_start();
require("db_classes.php");

$patr = $_POST['patrimonio'];
$position = $_POST['posicao'];

$sql = "INSERT INTO pa (patrimonio, posicao) VALUES ('$patr', '$position') ";
$objDb = new db();
$connect = $objDb->conecta_mysql();

if (mysqli_query($connect, $sql)) {
    // Obtém o ID do último registro inserido
    header("Location: editar_pa.php?erro=3");
}else{
    header("Location: editar_pa.php?erro=4");
}

?>