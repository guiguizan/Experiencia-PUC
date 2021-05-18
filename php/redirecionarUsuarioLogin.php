<?php
session_start();
$tipoUsuario = $_SESSION['tipo'];
$loginValido = $_SESSION["loginValido"];

if ($loginValido){
if($_SESSION["tipo"] != null){
    //falta  add para o admin tbm
    if($_SESSION["tipo"] == 1){
        header("Location: ../paginas/usuario/dashboardUsuario.php");
    }
}
}else{
    header("Location: ../paginas/login.html");
}