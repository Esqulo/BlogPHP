<?php
  session_start();
  
  date_default_timezone_set("Brazil/East");
  setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
  
  $post_coment = base64_decode($_SESSION["postagem"]);
  $autor_coment = $_SESSION["entrou"];
  $texto_coment = $_POST["comentar"];
  $data_coment  = date('d/m/Y');
  
  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");  
  

  $inclui = mysqli_query($conexao, "INSERT INTO tb_comentarios
                                    VALUES(NULL,
									      '$post_coment',
                                          '$autor_coment',
                                          '$texto_coment',
                                          '$data_coment'
										  );") or die(mysql_error());

  mysqli_close($conexao);

  if($inclui){
    header("Location:Post.php?id_post=".$_SESSION["postagem"]);
  }
?>