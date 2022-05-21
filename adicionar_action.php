<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email){
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->execute();

    header("Location: index.php");
    exit;
}else{
    header("Location: index.php");
    exit;
}