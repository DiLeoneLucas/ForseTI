<?php
session_start();
require("db_classes.php");
$stats = 1;

$option = $_POST['option'];
$categoria = $_SESSION['tipo_de_ficha'];

$sql = "INSERT INTO ficha (tipo, status_ficha, categoria) VALUES ('$option', '$stats', '$categoria') ";
$objDb = new db();
$connect = $objDb->conecta_mysql();

if (mysqli_query($connect, $sql)) {
    // Obtém o ID do último registro inserido
    $num = mysqli_insert_id($connect);
}else{
    echo "Erro";
}

$sql_hora = "SELECT NOW()";
$objDb = new db();
$connect = $objDb->conecta_mysql();

// Executa a query
$result = mysqli_query($connect, $sql_hora);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $horario = $row['NOW()'];  // Pega o valor retornado pela função NOW()
    
    $vetor = explode(" ", $horario);
    $hora = $vetor[1]; // Pega só a parte da hora

} else {
    echo "Erro na consulta SQL.";
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hub</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
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
        .btn-green {
            background-color: #27ae60;
            border-color: #1e8449;
            color: white;
        }
        .btn-green:hover {
            background-color: #1e8449;
            border-color: #166534;
        }
        h1 {
            color: white;
        }
        .btn-lg {
            padding: 25px;
            font-size: 1.8rem;
        }
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2rem;
            flex-direction: column;
        }
        .spinner {
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-top: 5px solid blue;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @page {
            size: 80mm 200mm;
            margin: 0;
        }
        .print-content {
            display: none;
            font-size: 12px;
            padding: 10px;
            text-align: center;
            width: 80mm;
            min-height: 150mm;
            max-height: 300mm;
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        @media print {
            body {
                width: 80mm;
                height: 200mm;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .print-content {
                display: block;
            }
            .loading {
                display: none;
            }
        }
        .normal {
            font-size: 36px;
            font-weight: bold;
        }
        .text {
            font-size: 18px;
        }
        .date {
            font-size: 12px;
            color: #555;
        }
        .imprimir {
            display: none;
        }
    </style>
<script>
    function showLoading() {
        document.getElementById('loading').style.display = 'flex';
    }
    window.onload = function () {
        var printButton = document.getElementById("imprimir");
        setTimeout(() => {
            printButton.click();
        }, 1000);

        window.onafterprint = function () {
            // Exibe o botão como fallback
            const btn = document.getElementById('continue-btn');
            if (btn) {
                btn.style.display = 'block';
            }

            // Redireciona automaticamente após 2 segundos
            setTimeout(() => {
                window.location.href = 'retirada.php';
            }, 2000);
        };
    };
</script>

</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">

    <?php

        switch($option){
            case 1:
                $cat = "GRADUAÇÃO";
                break;
            
            case 2:
                $cat = "EAD";
                break;
            
            case 3:
                $cat = "TRÂNSITO";
                break;

            case 4:
                $cat = "GASTRONOMIA";
                break;

            case 5:
                $cat = "INFORMAÇÕES";
                break;

            case 6:
                $cat = "PSG - Programa Senac Gratuidade";
                break;

            case 7:
                $cat = "Matrícula";
                break;
            
            case 7:
                $cat = "Informações";
                break;
            
            default:
                $cat = "ERRO";
        }
        
?>

    <div class="loading" id="loading">
        <div class="spinner"></div>
        <p>Aguarde...</p>
        <button id="continue-btn" class="btn btn-success mt-3" style="display: none;" onclick="window.location.href='retirada.php';">CONTINUAR</button>
    </div>

    <div class="content print-content">
        <div class="normal"> <?php echo $categoria."<br>".$cat." 0".$num; ?></div>
        <div class="text">UniSenac RS - Campus Porto Alegre</div>
        <div class="date">Porto Alegre, <?php echo date("d/m/Y")." ".$hora; ?></div>
    </div>

    <button id="imprimir" class="imprimir" onclick="window.print();">Imprimir</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>