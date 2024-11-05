<?php

// cria a conexao com o banco
$db = mysqli_connect('localhost', 'root', '', 'db_patrimonio');

// verifica se conectou (true)
if (!$db) {
    die("Ocorreu um erro na conexão com o banco de dados.");
}
