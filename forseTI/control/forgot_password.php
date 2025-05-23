<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esqueci a Senha</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Cinza chumbo */
            color: white;
        }
        .forgot-password-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: white;
            margin-bottom: 20px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .text-white {
            color: white;
        }
        .font-weight-bold {
            font-weight: bold;
        }
    </style>
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">

<img src="../imagem/unisenac senac b.png" alt="unisenac" height="150" style="display: block; margin: 0 auto;">

    <div class="forgot-password-container text-center">
        <h1>Esqueceu a senha para acessar o ForseTI?</h1>
        <p>Bom dia, boa tarde ou boa noite caro usuário,</p>
        <p>O seu usuário e a sua senha para acessar o ForseTI é a <b>mesma de rede, acesso às máquinas, e o email institucional.</b> Para acessar basta colocar o seu usuário ou email completo e a senha.</p>
        <p>Caso tenha esquecido a senha, entre em contato com o setor de TI pelo ramal <span class="font-weight-bold">RAMAL DO SETOR DE TI</span> ou também pelo correio eletrônico <a href="mailto:*" class="text-white font-weight-bold">EMAIL DO SETOR DE TI</a>.</p>
        <p>Agradecemos a sua atenção.</p>

        <div class="btn-container">
            <a href="login.php" class="btn btn-primary">Voltar ao Login</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
