<?php
session_start();

$sessao = @$_SESSION['sessao'];

if($sessao == null){
    header("Location: login.php");
}

require_once("../control/db_classes.php");

$texto_ficha = "";

// Lê o conteúdo da ficha atual
// Lê o conteúdo da ficha atual
if (file_exists("../ficha_atual.txt")) {
    $texto_ficha = trim(file_get_contents("../ficha_atual.txt"));

    // Atualiza fichas_anteriores.txt mantendo no máximo 5 entradas
    if (!empty($texto_ficha)) {
        $caminhoArquivo = "../fichas_anteriores.txt";
        $linhas = file($caminhoArquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Adiciona nova ficha ao topo
        array_unshift($linhas, $texto_ficha);

        // Mantém só as 5 mais recentes
        $linhas = array_slice($linhas, 0, 5);

        // Grava novamente no arquivo
        file_put_contents($caminhoArquivo, implode(PHP_EOL, $linhas));
    }
}


// Lê o histórico anterior
$fichas_anteriores = [];
if (file_exists("../fichas_anteriores.txt")) {
    $linhas = file("../fichas_anteriores.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $fichas_anteriores = array_reverse($linhas);
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TV de Atendimento</title>
    <link rel="icon" type="image/x-icon" href="../imagem/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
        }

        .current-info, .previous-info {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        }

        .current-info h3, .previous-info h3 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .ficha-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            margin-top: 10px;
        }

        .ficha {
            padding: 25px;
            border-radius: 12px;
            font-size: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
            text-align: center;
            width: 250px;
            cursor: pointer;
        }

        .current-info .ficha {
            background-color: #007bff;
            color: white;
            font-size: 26px;
            width: 270px;
        }

        .current-info .ficha:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .ficha-preferencial {
            background-color: #e67e22;
        }

        .ficha-preferencial:hover {
            background-color: #d35400;
        }

        .ficha-financeiro {
            background-color: #28a745;
        }

        .ficha-financeiro:hover {
            background-color: #1e7e34;
        }

        .ficha-normal {
            background-color: #1e3d58;
        }

        .ficha-normal:hover {
            background-color: #152c3d;
        }

        .ficha:hover {
            transform: scale(1.1);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.4);
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
<body>

<img src="../imagem/unisenac senac b.png" alt="unisenac" height="150" style="display: block; margin: 0 auto;">

<div class="container">
    <div class="current-info">
        <h3>FICHA ATUAL</h3>
        <div class="ficha-row">
            <audio id="somChamada" src="../imagem/audio/aviso.mp3" preload="auto"></audio>
            <?php if (!empty($texto_ficha)) : ?>
                <div class="ficha ficha-normal"><?= htmlspecialchars($texto_ficha) ?></div>
            <?php else : ?>
                <div class="ficha ficha-normal">Aguardando chamada...</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="previous-info">
        <h3>FICHAS ANTERIORES</h3>
        <div class="ficha-row">
            <?php foreach ($fichas_anteriores as $linha) : ?>
                <div class="ficha ficha-normal"><?= htmlspecialchars($linha) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<a href="dashboard.php" class="hidden-button">Acesso Restrito</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const audio = new Audio('../imagem/audio/aviso.mp3');
    let ultimaFicha = "<?= addslashes($texto_ficha) ?>";
    let audioPermitido = false;

    // Desbloqueia o áudio quando a página carrega
    window.addEventListener('load', () => {
        audio.play().then(() => {
            audio.pause();
            audio.currentTime = 0;
            audioPermitido = true;
        }).catch(() => {
            // Caso bloqueado, segue sem erro
            console.warn("Reprodução automática bloqueada.");
        });
    });

    function checarAtualizacaoFicha() {
        fetch('../ficha_atual.txt?_=' + new Date().getTime()) // cache-busting
            .then(response => response.text())
            .then(texto => {
                const novaFicha = texto.trim();

                if (novaFicha.replace(/\s+/g, '') !== ultimaFicha.replace(/\s+/g, '')) {
                    if (audioPermitido) {
                        audio.play().then(() => {
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }).catch(err => {
                            console.warn("Erro ao tocar o áudio:", err);
                            location.reload();
                        });
                    } else {
                        location.reload();
                    }
                }
            })
            .catch(error => console.error('Erro ao verificar ficha:', error));
    }

    setInterval(checarAtualizacaoFicha, 3000);
</script>

</body>
</html>
