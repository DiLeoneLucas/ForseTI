<?php

require_once("../extra/erro.php");
@session_start();

$sessao = @$_SESSION['sessao'];

if($sessao == null){
    header("Location: login.php");
}

$nome_usuario = $_SESSION['nome_full'];
$tipo_user = $_SESSION['tipo_user'];

if($tipo_user != 'TI'){
    header("Location: dashboard.php?erro=2");
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDITAR PA</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .dashboard-container {
            text-align: center;
            max-width: 800px;
            width: 100%;
        }
        .btn-orange {
            background-color: #d35400;
            border-color: #a84300;
            color: white;
        }
        .btn-orange:hover {
            background-color: #a84300;
            border-color: #873600;
        }
        .btn-blue {
            background-color: #3498db;
            border-color: #217dbb;
            color: white;
        }
        .btn-blue:hover {
            background-color: #217dbb;
            border-color: #1a5d8e;
        }
        h1 {
            color: white;
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }
        .btn-row {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .sidebar {
            position: fixed;
            right: 0;
            top: 0;
            height: 100vh;
            width: 250px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            text-align: center;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.open {
            transform: translateX(0);
        }
        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .sidebar p {
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .sidebar .logout-btn {
            margin-top: 15px;
            background-color: #e74c3c;
            border-color: #c0392b;
            color: white;
        }
        .sidebar .logout-btn:hover {
            background-color: #c0392b;
            border-color: #a93226;
        }
        .sidebar .sidebar-btn {
            margin-top: 15px;
            background-color: #3498db;
            border-color: #217dbb;
            color: white;
            width: 100%;
        }
        .sidebar .sidebar-btn:hover {
            background-color: #217dbb;
            border-color: #1a5d8e;
        }
        .toggle-sidebar {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            font-size: 28px;
            border-radius: 5px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        .toggle-sidebar:hover {
            opacity: 1;
        }
        .toggle-sidebar.hidden {
            display: none;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        table {
            width: 100%;
            margin-top: 20px;
            color: white;
            border-collapse: separate;
            border-spacing: 0;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 2px solid #d3d3d3;
            border-radius: 10px;
        }
        table th {
            background-color: #34495e;
        }
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.8) !important;
        }
        .modal-content {
            background-color: #34495e;
            color: white;
        }
    </style>
</head>
<body>

    <button class="toggle-sidebar" id="toggleButton" onclick="toggleSidebar()">☰</button>

    <div class="dashboard-container">
        <h1>Selecione a PA</h1>
        <p style="color: white">Ao selecionar a PA serás redirecionado para outra página, nessa página altere o patrimônio da PA em questão</p>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
        </div>

        <?php
        require_once("../extra/tabela_pa.php");
        require_once("../extra/menu_lateral.php");
        ?>

        <!-- Modal Editar -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar PA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" id="patrimonio" readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Adicionar -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="add_pa.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Adicionar Nova PA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="novoPatrimonio" class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" id="novoPatrimonio" name="patrimonio" required>
                            </div>
                            <div class="mb-3">
                                <label for="novaPosicao" class="form-label">Posição</label>
                                <input type="number" class="form-control" id="novaPosicao" name="posicao" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>Desenvolvido por: <br>Lucas Fernandes Di Leone<br>Porto Alegre, RS, 2025</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            const toggleButton = document.getElementById('toggleButton');
            toggleButton.classList.toggle('hidden');
        }

        function openModal(patrimonio, numeroPA) {
            document.getElementById('patrimonio').value = patrimonio;
            document.getElementById('editModalLabel').innerText = `Editar PA ${numeroPA}`;
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('erro')) {
            var erroModal = new bootstrap.Modal(document.getElementById('erroModal'));
            erroModal.show();
        }
    </script>

</body>
</html>
