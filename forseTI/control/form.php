<?php
session_start();

$_SESSION['option'] = $_POST['option'];
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
    <!-- Font Awesome CSS for the eye icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Cinza chumbo */
        }
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: white;
        }
        label {
            color: white;
        }
        .forgot-password {
            margin-top: 10px;
        }
        .forgot-password a {
            color: #FFA500;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .form-check-label {
            color: white;
        }
        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #000000;
            cursor: pointer;
        }
        .password-container {
            position: relative;
        }
        .modal-body {
            text-align: center;
        }
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

    <div class="login-container text-center">
        <h1 class="mb-4">DIGITE O SEU E-MAIL PARA RECEBER A SENHA</h1>
        <form action="envio.php" method="POST">
                    <div class="mb-3">
                            <label for="email">Nome Completo</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
            </div>    
        <div class="mb-3">
                <label for="email">Endereço de Email:</label>
                <input type="email" name="mail" class="form-control" placeholder="Email" >
            </div>
                        <button type="submit" class="btn btn-primary w-100">ENVIAR</button>
        </form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS for the eye icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const icon = document.getElementById('togglePassword');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('erro')) {
            var erroModal = new bootstrap.Modal(document.getElementById('erroModal'));
            erroModal.show();
        }
    </script>
    <a href="hub.php" class="hidden-button">Acesso Restrito</a>
</body>
</html>