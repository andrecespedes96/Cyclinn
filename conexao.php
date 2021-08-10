<?php
define('HOST', 'cad_cyclinn.mysql.dbaas.com.br');
define('USUARIO', 'cad_cyclinn');
define('SENHA', 'Fga@cyclinn123');
define('DB', 'cad_cyclinn');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>
