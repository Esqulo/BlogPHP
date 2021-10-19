<?php

  session_start();

  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");  

  $id_post = base64_decode($_GET["id_post"]);
  
  $delete = mysqli_query($conexao, "DELETE FROM tb_postagens 
                                   WHERE id_post = '{$id_post}'") or die(mysql_error());
  
  mysqli_close($conexao);

  if($delete){
    echo "<script>location.href='cadastro_postagens.php';</script>";
  }