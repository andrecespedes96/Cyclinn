<?php

include('conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$cel = mysqli_real_escape_string($conexao, $_POST['celular']);
$user = mysqli_real_escape_string($conexao, $_POST['user']);
$senha = mysqli_real_escape_string($conexao, $_POST['pass']);

$query = "INSERT INTO `Login`(`user_user`, `user_senha`, `user_nome`, `user_cpf`, `user_cel`) VALUES ('$user','$senha','$nome','$cpf','$cel')";


$conexao->query($query);

	header('Location: https://cyclinn.com.br/login_flats');

/* close connection */
$conexao->close();

?>
