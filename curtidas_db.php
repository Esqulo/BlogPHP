<?php
  session_start();
  $comentou = false;
  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");
  
  $curtidas_001 = mysqli_query($conexao, "SELECT * 
                                         FROM tb_curtidas 
                                         ORDER BY id_curtida ASC;") or die(mysql_error());

	while($curtidas_002 = mysqli_fetch_object($curtidas_001)){
	
		$curtidas_003  = $curtidas_002 -> usuario_curtida;
		$curtidas_004  = $curtidas_002 -> id_curtida;
		
		if ($curtidas_003 == $_SESSION["entrou"]){
			$curtiu_post = $curtidas_004;
			$comentou = true;
		}
 
	}
 	mysqli_close($conexao);
	
	if ($comentou == true){
		$conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
		$banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
		mysqli_set_charset($conexao, "utf8");  
  
		$delete = mysqli_query($conexao, "DELETE FROM tb_curtidas 
                                   WHERE id_curtida = '{$curtiu_post}'") or die(mysql_error());
  
		mysqli_close($conexao);

	} 
	else {
  $postagem_curtida = base64_decode($_SESSION["postagem"]);
  $usuario_curtida = $_SESSION["entrou"];
    
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");  
  

  $inclui = mysqli_query($conexao, "INSERT INTO tb_curtidas
                                    VALUES( NULL,
										   '$postagem_curtida',
                                           '$usuario_curtida'
										   );") or die(mysql_error());

  mysqli_close($conexao);
}
header("Location:Post.php?id_post=".$_SESSION["postagem"]);
?>