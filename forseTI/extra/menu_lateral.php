<?php


$backtrace = debug_backtrace();
if (isset($backtrace[0]['file'])) {
    $arquivo = basename($backtrace[0]['file']);
}

if($arquivo == "dashboard.php"){

?>

<div class="sidebar" id="sidebar">
        <img src="https://img.freepik.com/vetores-gratis/ilustracao-de-usuario-avatar-icone_53876-5907.jpg?t=st=1743509181~exp=1743512781~hmac=cb95adcd6a36eb8bd8266618f400d4619c259e074057e8046d613e8a30d6901f&w=740" alt="Avatar do usuário">
        <p><?php echo $nome_usuario."<br>".$tipo_user; ?></p>
        <a href="relatorio.php" class="btn sidebar-btn">RELATÓRIO</a>
        <a href="editar_pa.php" class="btn sidebar-btn">EDITAR PA</a>
        <a href="logout.php" class="btn logout-btn">SAIR</a>
    </div>

<?php
}elseif($arquivo == "editar_pa.php"){

    ?>

<div class="sidebar" id="sidebar">
        <img src="https://img.freepik.com/vetores-gratis/ilustracao-de-usuario-avatar-icone_53876-5907.jpg?t=st=1743509181~exp=1743512781~hmac=cb95adcd6a36eb8bd8266618f400d4619c259e074057e8046d613e8a30d6901f&w=740" alt="Avatar do usuário">
        <p><?php echo $nome_usuario."<br>".$tipo_user; ?></p>
        <a href="dashboard.php" class="btn sidebar-btn">DASHBOARD</a> <!-- Botão para retornar ao dashboard -->
        <a href="relatorio.php" class="btn sidebar-btn">RELATÓRIO</a>
        <a href="logout.php" class="btn logout-btn">SAIR</a>
    </div>

    <?php

}elseif($arquivo == "fila.php"){
    ?>
<div class="sidebar" id="sidebar">
        <img src="https://img.freepik.com/vetores-gratis/ilustracao-de-usuario-avatar-icone_53876-5907.jpg?t=st=1743509181~exp=1743512781~hmac=cb95adcd6a36eb8bd8266618f400d4619c259e074057e8046d613e8a30d6901f&w=740" alt="Avatar do usuário">
        <p><?php echo $nome_usuario."<br>".$tipo_user; ?></p>
        <a href="dashboard.php" class="btn sidebar-btn">DASHBOARD</a> <!-- Botão para retornar ao dashboard -->
        <a href="relatorio.php" class="btn sidebar-btn">RELATÓRIO</a>
        <a href="editar_pa.php" class="btn sidebar-btn">EDITAR PA</a>
        <a href="logout.php" class="btn logout-btn">SAIR</a>
    </div>
    <?php

}

?>