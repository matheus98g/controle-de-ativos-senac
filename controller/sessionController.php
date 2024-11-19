<?php
session_start();
if ($_SESSION['controle_login'] == false || $_SESSION['login_ok'] == false) {
    header('location:../view/login.php?erro=sem_acesso');
};
