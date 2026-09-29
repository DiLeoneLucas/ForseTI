<?php
session_start();
// Captura os dados do formulário (POST)
$nome = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

$vetor = explode("@", $nome);

$username = $vetor[0];

// Validação básica
if (empty($username) || empty($password)) {
    header("Location: login.php?erro=1");
    die("Usuário e senha são obrigatórios.");
}

// Configurações do LDAP
$ldap_server = "ldap://192.168.0.1";
$ldap_port = 389;
$base_dn = "DC=fspoa,DC=br";

// Configuração do usuário técnico de leitura (somente para consulta)
$ldap_user_tech = "lfleone@fspoa.br";  // Usuário técnico com permissões de leitura
$ldap_pass_tech = "Malucones33!yt";  // Senha do usuário técnico de leitura

// Monta o usuário no formato dominio\usuario
$ldap_user = $username."@fspoa.br";
$ldap_pass = $password;

require("verifica_login.php");

// Conecta ao servidor LDAP
$ldap_conn = ldap_connect($ldap_server, $ldap_port);
if (!$ldap_conn) {
    header("Location: login.php?erro=1");
    die("Falha ao conectar ao servidor LDAP.");
}

// Define opções
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);

// Tenta autenticar com o usuário técnico de leitura primeiro
if (ldap_bind($ldap_conn, $ldap_user_tech, $ldap_pass_tech)) {
    echo "Autenticado como usuário técnico com sucesso!<br>";

    // Agora tenta autenticar com as credenciais do usuário
    if (ldap_bind($ldap_conn, $ldap_user, $ldap_pass)) {
        echo "Usuário autenticado com sucesso!<br>";

        // Busca dados do usuário
        $filtro = "(sAMAccountName=$username)";
        $atributos = ["displayName", "mail", "distinguishedName"];  // Incluindo o distinguishedName
        $resultado = ldap_search($ldap_conn, $base_dn, $filtro, $atributos);

        if ($resultado && ldap_count_entries($ldap_conn, $resultado) > 0) {
            $entradas = ldap_get_entries($ldap_conn, $resultado);

            // Exibe os dados do usuário
            echo "<pre>";
            print_r($entradas[0]); // Exibe os dados do usuário
            echo "</pre>";

            // Armazenando o nome completo na variável de sessão
            $_SESSION['nome_full'] = $entradas[0]['displayname'][0];

            // Gerando uma nova sessão para o usuário
            $ses = rand();
            $_SESSION['sessao'] = $ses;

            // Buscando o Distinguished Name para encontrar a OU
            $dn = $entradas[0]['distinguishedname'][0]; // O Distinguished Name completo do usuário
            echo "Distinguished Name: " . $dn . "<br>";

            // Dividir o DN para encontrar a OU
            $dn_parts = explode(',', $dn);  // Divide o DN em partes
            $ou = ''; // Inicializa a variável para a OU
            foreach ($dn_parts as $part) {
                if (strpos($part, 'OU=') === 0) {
                    $ou = str_replace('OU=', '', $part); // Remove "OU=" e armazena o nome da OU
                    break; // Encontramos a primeira OU, podemos sair
                }
            }

            if ($ou) {
                echo "OU do usuário: " . $ou . "<br>";
                // Armazenar a OU na variável de sessão
                $_SESSION['tipo_user'] = $ou; // Salva a OU na sessão
            } else {
                echo "OU não encontrada.<br>";
            }

            // Redirecionar para o dashboard
            header("Location: dashboard.php");

        } else {
            echo "Usuário não encontrado no AD.";
        }
    } else {
        header("Location: login.php?erro=1");
        echo "Erro na autenticação do usuário: " . ldap_error($ldap_conn);
    }
} else {
    header("Location: login.php?erro=1");
    echo "Erro na autenticação do usuário técnico: " . ldap_error($ldap_conn);
    
}

// Fecha a conexão
ldap_unbind($ldap_conn);
?>
