<html>
<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
</head>
<?php

include('conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$cpf_digitado = mysqli_real_escape_string($conexao, $_POST['cpf']);
$cel = mysqli_real_escape_string($conexao, $_POST['celular']);
$user = mysqli_real_escape_string($conexao, $_POST['user']);
$senha = mysqli_real_escape_string($conexao, $_POST['pass']);

/* VALIDA O CPF */
$cpf = $cpf_digitado;

$cpf = preg_replace('/[^0-9]/','',$cpf);
//echo $cpf."<br><br>";

$d0 = 0;
$d2 = 0;
for($i=0, $x = 10; $i<=8; $i++,$x-- ){
	$d1 = $d1 + $cpf[$i] * $x;
	//echo $d1."<br>";
}
for($i=0, $x = 11; $i<=9;  $i++,$x-- ){
	$d2 =  $d2 +  $cpf[$i] * $x;

	//echo $d2."<br>";

	if(str_repeat($i, 11)== $cpf){
		die('CPF Inválido');
	}
}

$d3 = $d1*10;
$d4 = $d2*10;

$re1 = ($d3%11);
$re2 = ($d4%11);

//echo "<br>".$re1."<br>";
//echo $re2."<br>";

if($re1 == 10){
	$re1=0;
}

if($re1 != $cpf[9] || $re2 != $cpf[10]){
	die("CPF digitado nao e Valido");
}else{

	$query = "SELECT user_user from Login where user_cpf = '{$cpf_digitado}' ";

	$result = mysqli_query($conexao, $query);

	$row = mysqli_num_rows($result);

	if($row == 1) {
		echo "<script>alert('CPF: ".$cpf_digitado." ja cadastrado. Favor entrar com Login.');";
		echo "javascript:window.location='https://www.cyclinn.com.br/login';</script>";
	} else {
		$query2 = "INSERT INTO `Login`(`user_user`, `user_senha`, `user_nome`, `user_cpf`, `user_cel`) VALUES ('$user','$senha','$nome','$cpf_digitado','$cel')";
		$conexao->query($query2);

			header('Location: https://cyclinn.com.br/login_flats');

		/* close connection */
		$conexao->close();
	}



}




?>
</html>
