<?php
require_once("../control/db_classes.php");

$sql = "SELECT * FROM v_ficha WHERE status_ficha = 1"; // Apenas fichas ativas
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Atendimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Fichas em Espera</h2>
    <?php
    if ($q_consulta->num_rows > 0) {
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Tipo</th><th>Senha</th><th>PA</th><th>Ação</th></tr></thead><tbody>';
        while ($linha = mysqli_fetch_assoc($q_consulta)) {
            $id = $linha['id_ficha'];
            $tipo = $linha['nome_tipo_ficha'];
            $pa = $linha['nome_pa'];
            echo "
                <tr>
                    <td>$tipo</td>
                    <td>$id</td>
                    <td>$pa</td>
                    <td><button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal_$id'>Pegar</button></td>
                </tr>

                <!-- Modal -->
                <div class='modal fade' id='modal_$id' tabindex='-1' aria-labelledby='modalLabel_$id' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='modalLabel_$id'>Confirmar Atendimento - $tipo</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                            </div>
                            <div class='modal-body'>
                                Deseja atender o cliente da fila <strong>$tipo</strong> com a senha <strong>$id</strong>?
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                <button type='button' class='btn btn-primary confirmar-ficha' 
                                    data-id='$id' 
                                    data-tipo='$tipo' 
                                    data-pa='$pa'>Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="alert alert-info">Nenhuma ficha em espera.</div>';
    }
    ?>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.confirmar-ficha').click(function(){
        let id = $(this).data('id');
        let tipo = $(this).data('tipo');
        let pa = $(this).data('pa');

        $.post('atender_ficha.php', {
            id_ficha: id,
            tipo: tipo,
            pa: pa
        }, function(res){
            try {
                let r = JSON.parse(res);
                if (r.status === 'ok') {
                    alert('Ficha atendida!');
                    location.reload(); // Atualiza a tabela para remover ficha atendida
                } else {
                    alert('Erro: ' + r.mensagem);
                }
            } catch (e) {
                alert('Erro inesperado.');
                console.error(res);
            }
        });
    });
});
</script>
</body>
</html>
