<?php

include('conexao.php');



$query = "select user_user from Login";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

echo $row;

?>
