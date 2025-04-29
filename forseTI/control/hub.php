<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hub</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Cinza chumbo */
        }
        .btn-orange {
            background-color: #d35400; /* Laranja escuro */
            border-color: #a84300; /* Borda mais escura */
            color: white;
        }
        .btn-orange:hover {
            background-color: #a84300; /* Tom mais escuro ao passar o mouse */
            border-color: #873600;
        }
        h1 {
            color: white; /* Para contraste no fundo escuro */
        }
        .btn-container {
            max-width: 300px; /* Limitar a largura dos botões */
            width: 100%;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    

    <div class="text-center btn-container">
        <h1 class="mb-4">ForseTI</h1>
        <a href="retirada.php" class="btn btn-primary btn-lg w-100 mb-3">FILA</a>
        <a href="login.php" class="btn btn-orange btn-lg w-100">LOGIN</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
