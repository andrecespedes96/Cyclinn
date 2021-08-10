<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: index.html');
	exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard - Controle de Usuários</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <img>
        <div class="logo_name">CYCLIIN</div>
      </div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav_list">
      <!--<li>
          <i class='bx bx-search' ></i>
          <input type="text" placeholder="Pesquisa...">
        <span class="tooltip">Pesquisa</span>
      </li>-->
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Avaliações</span>
        </a>
        <span class="tooltip">Avaliações</span>
      </li>


      <li>
        <a href="recomendacao_param.html">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Usuários</span>
        </a>
        <span class="tooltip">Usuários</span>
      </li>


    </ul>
    <div class="profile_content">
      <div class="profile">
        <div class="profile_details">
          <!--<img src="profile.jpg" alt="">-->
          <div class="name_job">
            <div class="name">Admin</div>
            <div class="job">Web Designer</div>
          </div>
        </div>
        <a href="logout.php"<i class='bx bx-log-out' id="log_out" ></i></a>
      </div>
    </div>
  </div>
  <div class="home_content">
    <div class="text"><h4>Olá, <?php echo $_SESSION['usuario'];?></h4></div>

		<table border = 1 class="tabela">
		    <tr>
		      <td style="width: 30px;text-align: center;">ID</td>
		      <td style="width: 300px;">Nome</td>
		      <td style="width: 100px;">CPF</td>
		     <td style="width: 100px;">Celular</td>
				 <td style="width: 100px;">Usuario</td>
				 <td style="width: 100px;">Senha</td>
				 <td style="width: 100px;text-align: center; ">Privilegio</td>
				 <td style="width: 100px;text-align: center; ">Status</td>
		    </tr>


		<?php

		include('conexao.php');
		$query = "SELECT * FROM `Login`";
		$result = $conexao->query($query);

		while($rows = mysqli_fetch_array($result)){



			echo '<tr>';

			echo '<td style="text-align: center; ">'.$rows['user_id'].'</td>';
			echo '<td>'.$rows['user_nome'].'</td>';
			echo '<td>'.$rows['user_cpf'].'</td>'; //Nome do autor

			echo '<td>'.$rows['user_cel'].'</td>'; //Nome do Gênero
			echo '<td>'.$rows['user_user'].'</td>';

			echo '<td>'.$rows['user_senha'].'</td>';
			echo '<td style="text-align: center; ">'.$rows['user_priv'].'</td>';
		  echo '<td style="text-align: center; ">'.$rows['user_status'].'</td>';

			echo '</tr>';


 		}
	echo '</table>';

		/* free result set */
		//$result->close();

		/* close connection */
		$conexao->close();
		?>




  </div>

  <script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
     if(btn.classList.contains("bx-menu")){
       btn.classList.replace("bx-menu" , "bx-menu-alt-right");
     }else{
       btn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }
  </script>
</body>
</html>
