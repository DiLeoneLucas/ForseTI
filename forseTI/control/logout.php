<?php

session_start();

unset($_SESSION['sessao']);
unset($_SESSION['nome_full']);

session_destroy();

header("Location: login.php");


?>