<?php

//Página que faz a conexão com o Banco de Dados

class db{

    //host
    private $host = 'localhost';

    //Usuário do banco
    private $user = 'root'; 

    //Senha utilizada no Banco de Dados
    private $psw = '';

    //Nome do Banco de dados
    private $database = 'forseti_db';

    public function conecta_mysql()    {

        $connect = mysqli_connect($this->host, $this->user, $this->psw, $this->database, 3306);

        mysqli_set_charset($connect, 'utf8');

        if (mysqli_connect_errno()) {
            echo 'Erro: ' . mysqli_connect_errno();
        }

        return $connect;
    }
}
?>