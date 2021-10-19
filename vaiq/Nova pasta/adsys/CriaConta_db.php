<?php
  session_start();
  
  $nome_usuario      = $_POST["nome_usuario"];
  $sobren_usuario    = $_POST["sobren_usuario"];
  $senha_usuario     = $_POST["senha_usuario"];
  $email_usuario     = $_POST["email_usuario"];
  $sexo_usuario      = $_POST["sexo_usuario"];
  $ativo_usuario     = 1;
  $cat_usuario       = 1;
  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");  
  

  $inclui = mysqli_query($conexao, "INSERT INTO tb_usuarios
                                    VALUES(NULL,
                                           '$nome_usuario',
										   '$sobren_usuario',
										   '$senha_usuario',
										   '$ativo_usuario',
										   '$email_usuario',
										   '$sexo_usuario',
										   '$cat_usuario'
										  );") or die(mysql_error());

  mysqli_close($conexao);

  if($inclui){
    header('Location: index.php');
  }else{
	echo 'Informações inseridas incorretamente, por favor tente novamente,';
  }