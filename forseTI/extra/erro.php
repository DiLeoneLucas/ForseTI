<?php
$erro = isset($_GET['erro']) && $_GET['erro'] == 1 ? $_GET['erro']  : null;

switch($erro){
    case 1:
        ?>
        <div class="modal fade" id="erroModal" tabindex="-1" aria-labelledby="erroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="erroModalLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Usuário ou senha incorretos ou inválidos.<br>
                    Caso não saiba as credenciais, entre em contato com o setor de TI.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

  
    <?php
    break;
    default:
}




?>
