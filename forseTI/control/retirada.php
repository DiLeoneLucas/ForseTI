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
            background-color: #2c3e50; /* Cinza chumbo */
        }
        .btn-orange {
            background-color: #d35400; /* Laranja escuro */
            border-color: #a84300; /* Borda mais escura */
            color: white;
        }
        .btn-orange:hover {
            background-color: #a84300;
            border-color: #873600;
        }
        .btn-green {
            background-color: #27ae60; /* Verde escuro */
            border-color: #1e8449; /* Borda mais escura */
            color: white;
        }
        .btn-green:hover {
            background-color: #1e8449;
            border-color: #166534;
        }
        h1 {
            color: white;
        }
        .btn-container {
            width: 100%;
            max-width: 600px;
        }
        .btn-lg {
            padding: 25px;
            font-size: 1.8rem;
        }
        /* Estilização do botão escondido */
        .hidden-button {
            position: fixed;
            bottom: 10px;
            left: 10px;
            opacity: 0;
            transition: opacity 0.3s;
            background-color: #34495e; /* Azul escuro */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .hidden-button:hover {
            opacity: 1;
            background-color: #2c3e50; /* Cor mais escura ao passar o mouse */
        }
    </style>
</head>
<img src="../imagem/unisenac senac b.png" alt="unisenac" height="150" style="display: block; margin: 0 auto;">
<body class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="text-center btn-container">
        <h1 class="mb-4">SELECIONE A OPÇÃO</h1>

        <form action="cat.php" method="POST">
            <input type="hidden" name="option" value="NORMAL">
            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">NORMAL</button>
        </form>

        <form action="cat.php" method="POST">
            <input type="hidden" name="option" value="PREFERENCIAL">
            <button type="submit" class="btn btn-orange btn-lg w-100 mb-3">PREFERENCIAL</button>
        </form>

    </div>

    <!-- Botão escondido -->
    <a href="hub.php" class="hidden-button">Acesso Restrito</a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
