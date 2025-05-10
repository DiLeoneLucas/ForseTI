<?php
session_start();

$sessao = @$_SESSION['sessao'];

if($sessao == null){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RELATÓRIOS</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Cinza chumbo */
        }
        .container-box {
            background-color: rgba(255, 255, 255, 0.1); /* Fundo levemente transparente */
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            color: white;
            max-width: 500px;
            width: 100%;
        }
        .btn-back {
            background-color: #d35400; /* Laranja escuro */
            border-color: #a84300;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #a84300;
            border-color: #873600;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="container-box">
        <h2>Feature ainda em testes, por favor aguarde.</h2>
        <a href="dashboard.php" class="btn-back mt-4">Voltar ao Dashboard</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
