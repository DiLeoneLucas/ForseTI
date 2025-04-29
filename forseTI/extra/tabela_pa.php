<?php
require_once("../control/db_classes.php");

$sql = "SELECT * FROM pa ";
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);

$controle = $q_consulta->num_rows;

if ($controle > 0) {
    echo '<table>
    <thead>
        <tr>
            <th>PATRIMÔNIO</th>
            <th>Nº DA PA</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody>';

    while ($linha = mysqli_fetch_assoc($q_consulta)) {
        $idPa = $linha['id_pa'];
        $patrimonio = $linha['patrimonio'];
        $local = $linha['posicao'];
        $modalId = 'modalPreferencial_' . $idPa;
        $fichaText = strtoupper($patrimonio) . ' ' . str_pad($idPa, 3, '0', STR_PAD_LEFT) . ' - Atendimento na PA 0' . $idPa;

        echo '
        <tr>
            <td>' . $patrimonio . '</td>
            <td>' . $local . '</td>
            <td><button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">Editar</button></td>
        </tr>

        <!-- Modal exclusivo para a ficha -->
        <div class="modal fade" id="' . $modalId . '" tabindex="-1" aria-labelledby="' . $modalId . 'Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="editar_pa_fim.php" onsubmit="enviarFichaParaTV(document.getElementById(\'patrimonio_' . $idPa . '\').value)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="' . $modalId . 'Label">Confirmar Edição - ' . $patrimonio . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <p>Você deseja editar o patrimônio da PA <strong>' . $patrimonio . '</strong> com a senha <strong>' . $idPa . '</strong>?</p>

                            <div class="mt-3">
                                <label for="patrimonio_' . $idPa . '" class="form-label">Editar Patrimônio:</label>
                                <textarea class="form-control" name="patrimonio" id="patrimonio_' . $idPa . '" rows="3">' . $patrimonio . '</textarea>
                            </div>

                            <input type="hidden" name="id_ficha" value="' . $idPa . '">
                            <input type="hidden" name="tipo_original" value="' . $idPa . '">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    }

    echo '</tbody></table>';
} else {
    echo "<h1 style='color = white;'>Nenhuma ficha foi retirada!</h1>";
}


?>

<script>
function enviarFichaParaTV(ficha) {
    fetch('tv.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'ficha_atual=' + encodeURIComponent(ficha)
    });
}
</script>
