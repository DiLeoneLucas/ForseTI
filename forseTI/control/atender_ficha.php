<?php
require_once("../control/db_classes.php");
$hostname = gethostname();

$nome = explode("c", $hostname);
$pa_n = $nome[1];

require_once("db_classes.php");

$sql = "SELECT * FROM pa WHERE patrimonio = '$pa_n' ";
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);

$controle = $q_consulta->num_rows;

if ($controle > 0) {

    while ($linha = mysqli_fetch_assoc($q_consulta)) {

        $pa = $linha['posicao'];

    }

}


// Recebe os dados via POST
$id_ficha = isset($_POST['id_ficha']) ? intval($_POST['id_ficha']) : 0;
$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';

// Validação básica
if ($id_ficha <= 0 || $tipo == '' || $pa == '') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos.']);
    
}

$objDb = new db();
$conn = $objDb->conecta_mysql();

// Atualiza o status da ficha para 2 (atendida)
$sql_update = "UPDATE ficha SET status_ficha = 2 WHERE id_ficha = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("i", $id_ficha);
$stmt->execute();

// Verifica se a ficha atual existe (para salvar como anterior)
$ficha_atual_path = '../ficha_atual.txt';
if (file_exists($ficha_atual_path)) {
    $ficha_anterior = file_get_contents($ficha_atual_path);
    file_put_contents('../fichas_anteriores.txt', $ficha_anterior . PHP_EOL, FILE_APPEND);
}

// Gera novo conteúdo para a ficha atual
$texto_ficha = "$tipo $id_ficha - Atendimento no Guichê $pa";
file_put_contents($ficha_atual_path, $texto_ficha);

// Redireciona para a página da fila (ou retorne JSON, se preferir)
header("Location: fila.php");
