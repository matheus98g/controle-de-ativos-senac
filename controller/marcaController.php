<?php

// controlador para cadastrar marca


include_once('../model/db.php');
include_once('sessionController.php');

$marca = $_POST['descricao'];
$userId = $_SESSION['id_user'];

$query = "INSERT INTO marca (descricaoMarca, statusMarca, idUsuario)
          VALUES ('$marca', 'S', $userId)";

$result = mysqli_query($db, $query) or die(false);

if ($result) {
    echo "Cadastro realizado";
}
