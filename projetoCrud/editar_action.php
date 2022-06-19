<?php
require 'config.php';
require 'dao/UsuarioDAOMysql.php';

$usuarioDao = new UsuarioDAOMysql($pdo);  


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$id = filter_input(INPUT_POST, 'id');

if ($name && $email && $id) {


    $usuario = new Usuario();
    $usuario->setNome($name);
    $usuario->setEmail($email);
    $usuario->setId($id);



    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;
} else {
    header("Location: editar.php?id=".$id); 
    exit;
}
