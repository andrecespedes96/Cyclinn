<?php

include('conexao.php');

/*if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: https://www.cyclinn.com.br');
	exit();
}*/

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from Admin_Login where adm_user = '{$usuario}' and adm_senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row >= 1) {
	$num = rand(10000,900000);
	session_start();
	$_SESSION['logado'] = $usuario;
	$_SESSION['numLogin'] = $num;

	//header('Location: https://cyclinn.com.br/flats/');
	header('Location: /login/admin/index.php?id='.$num);
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	alert("Usuário e Senha incorretos!");
	header('Location: /login/admin.html');
	exit();
}

?>
