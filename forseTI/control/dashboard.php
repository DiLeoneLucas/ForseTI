<?php

@session_start();

$nome_usuario = $_SESSION['nome_full'];
$tipo_user = $_SESSION['tipo_user'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Cinza chumbo */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .dashboard-container {
            text-align: center;
            max-width: 600px;
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
        .toggle-sidebar-retract {
            position: absolute;
            left: 20px;
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
        .toggle-sidebar-retract:hover {
            opacity: 1;
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
    </style>
</head>
<body>

    <button class="toggle-sidebar" id="toggleButton" onclick="toggleSidebar()">☰</button>
    <button class="toggle-sidebar-retract hidden" id="retractButton" onclick="retractSidebar()">◁</button>

    <div class="dashboard-container">
        <h1>FORSETI</h1>
        <div class="btn-container">
            <div class="btn-row">
                <a href="fila.php" class="btn btn-blue btn-lg w-100">FILA</a>
                <a href="https://chamados.senacrs.br" target="balnk" class="btn btn-blue btn-lg w-100">GLPI</a>
            </div>
            <div class="btn-row">
                <a href="tv.php" class="btn btn-blue btn-lg w-100">TV</a>
            </div>
        </div>
    </div>

 
    <!-- Footer -->
    <footer>
        <p>Desenvolvido por: <br>Lucas Fernandes Di Leone<br>Porto Alegre, RS, 2025</p>
    </footer>
    <?php

require_once("../extra/menu_lateral.php");

?>
    <!-- Incluir o menu lateral -->
<?php require_once("../extra/menu_lateral.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script do menu lateral -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleButton");
        const retractButton = document.getElementById("retractButton");

        if (!sidebar || !toggleButton || !retractButton) {
            console.warn("Elementos do menu lateral não encontrados.");
            return;
        }

        toggleButton.addEventListener("click", function () {
            sidebar.classList.add("open");
            toggleButton.classList.add("hidden");
            retractButton.classList.remove("hidden");
        });

        retractButton.addEventListener("click", function () {
            sidebar.classList.remove("open");
            toggleButton.classList.remove("hidden");
            retractButton.classList.add("hidden");
        });

        console.log("Script do menu lateral carregado.");
    });
</script>
</body>
</html>



</body>
</html>
