<?php
session_start();
if ($_SESSION['controle_login'] == false) {
    header('location:../view/login.php?erro=sem_acesso');
};
