<?php
session_start();
$_SESSION['tipo_de_ficha'] = $_POST['option'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FICHA</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
        }
        .btn-blue {
            background-color: #3498db;
            border-color: #2980b9;
            color: white;
        }
        .btn-blue:hover {
            background-color: #2980b9;
            border-color: #1c6691;
        }
        .btn-orange {
            background-color: #e67e22;
            border-color: #ca6f1e;
            color: white;
        }
        .btn-orange:hover {
            background-color: #ca6f1e;
            border-color: #a35413;
        }
        .btn-green {
            background-color: #27ae60;
            border-color: #1e8449;
            color: white;
        }
        .btn-green:hover {
            background-color: #1e8449;
            border-color: #166534;
        }
        .btn-white {
            background-color: white;
            border-color: #bdc3c7;
            color: black;
        }
        .btn-white:hover {
            background-color: #ecf0f1;
            border-color: #bdc3c7;
        }
        .btn-red {
            background-color: #e74c3c;
            border-color: #c0392b;
            color: white;
        }
        .btn-red:hover {
            background-color: #c0392b;
            border-color: #a93226;
        }
        .btn-indigo {
            background-color: indigo;
            border-color: indigo;
            color: white;
        }
        .btn-indigo:hover {
            background-color: #4b0082;
            border-color: #3a0066;
        }
        .btn-peach {
            background-color: PeachPuff;
            border-color: #f5cba7;
            color: black;
        }
        .btn-peach:hover {
            background-color: #f0b27a;
            border-color: #e59866;
        }
        h1 {
            color: white;
        }
        .btn-container {
            width: 100%;
            max-width: 600px;
        }
        .btn-lg {
            padding: 10px;
            font-size: 1.1rem;
        }
        .hidden-button {
            position: fixed;
            bottom: 10px;
            left: 10px;
            opacity: 0;
            transition: opacity 0.3s;
            background-color: #34495e;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .hidden-button:hover {
            opacity: 1;
            background-color: #2c3e50;
        }
    </style>
</head>
<img src="../imagem/unisenac senac b.png" alt="unisenac" height="150" style="display: block; margin: 0 auto;">
<body class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="text-center btn-container">
        <h1 class="mb-4">PARA ATENDIMENTO SELECIONE A OPÇÃO</h1>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="1">
            <button type="submit" class="btn btn-blue btn-lg w-100 mb-3">GRADUAÇÃO</button>
        </form>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="4">
            <button type="submit" class="btn btn-orange btn-lg w-100 mb-3">EAD</button>
        </form>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="5">
            <button type="submit" class="btn btn-white btn-lg w-100 mb-3">GASTRONOMIA</button>
        </form>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="6">
            <button type="submit" class="btn btn-indigo btn-lg w-100 mb-3">PROGRAMA SENAC GRATUIDADE - PSG</button>
        </form>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="7">
            <button type="submit" class="btn btn-peach btn-lg w-100 mb-3">MATRÍCULA</button>
        </form>

        <form action="form.php" method="POST">
            <input type="hidden" name="option" value="5">
            <button type="submit" class="btn btn-red btn-lg w-100 mb-3">INFORMAÇÕES</button>
        </form>

    </div>

    <!-- Botão escondido -->
    <a href="hub.php" class="hidden-button">Acesso Restrito</a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
