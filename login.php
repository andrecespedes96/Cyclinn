<?php
session_start();
include('conexao.php');

/*if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: https://www.cyclinn.com.br');
	exit();
}*/

$checkin = $_POST ['checkin'];
$checkout = $_POST ['checkout'];
$pessoas = $_POST ['pessoas'];

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select user_user from Login where user_user = '{$usuario}' and user_senha = '{$senha}' ";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	//header('Location: https://cyclinn.com.br/flats/');
	//header('Location: https://cyclinn.com.br/login_flats/?checkin='.$checkin.'&checkout='.$checkout.'&pessoas='.$pessoas);
	header('Location: https://cyclinn.guestybookings.com/listings?guests='.$pessoas.'&endDate='.$checkout.'&startDate='.$checkin);

	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>
