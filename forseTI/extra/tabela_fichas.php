<?php
require_once("../control/db_classes.php");

$sql = "SELECT * FROM v_ficha where stats = 'Ativo' ORDER BY `v_ficha`.`id_ficha` ASC";
$objDb = new db();
$conncet = $objDb->conecta_mysql();
$q_consulta = mysqli_query($conncet, $sql);

$controle = $q_consulta->num_rows;

if($controle > 0){
    echo '<table>
    <thead>
        <tr>
            <th>Senha</th>
            <th>Tipo</th>
            <th>Categoria</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>';

    while($linha = mysqli_fetch_assoc($q_consulta)){
        $idFicha = $linha['id_ficha'];
        $tipo = $linha['tipo'];
        $cat = $linha['categoria'];
        $modalId = 'modalPreferencial_' . $idFicha;
        $fichaText = strtoupper($tipo) . ' ' . str_pad($idFicha, 3, '0', STR_PAD_LEFT) . ' - Atendimento na PA 0' . $idFicha;

        echo '
        <tr>
            <td>'.$idFicha.'</td>
            <td>'.$tipo.'</td>
            <td>'.$cat.'</td>
            <td><button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#'.$modalId.'">Pegar</button></td>
        </tr>

        <!-- Modal exclusivo para a ficha -->
        <div class="modal fade" id="'.$modalId.'" tabindex="-1" aria-labelledby="'.$modalId.'Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="'.$modalId.'Label">Confirmar Atendimento - '.$tipo.'</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        Você deseja atender o cliente da fila <strong>'.$tipo.'</strong> com a senha <strong>'.$idFicha.'</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form method="POST" action="atender_ficha.php" onsubmit="enviarFichaParaTV(\''.$fichaText.'\')">
                            <input type="hidden" name="id_ficha" value="'.$idFicha.'">
                            <input type="hidden" name="tipo" value="'.$tipo.'">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </form>
                    </div>
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