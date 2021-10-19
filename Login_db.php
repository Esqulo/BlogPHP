<?php
  session_start();
  
  $email_usuario = $_POST['email'];
  $senha_usuario = $_POST['senha']; 
  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");  
  
  $busca_dados_001 = mysqli_query($conexao, "SELECT * 
                                               FROM tb_usuarios 
                                               WHERE email_usuario = '{$email_usuario}';") or die(mysql_error());
  
  $busca_dados_002 = mysqli_fetch_object($busca_dados_001);
  
  $email_login = $busca_dados_002 -> email_usuario;
  $senha_login = $busca_dados_002 -> senha_usuario;
  
  if ($senha_usuario == $senha_login){
		$_SESSION["entrou"]= $busca_dados_002 -> id_usuario;
		$_SESSION["nome_pessoa"]= $busca_dados_002 -> nome_usuario;
		$_SESSION["sexo_usuario"]= $busca_dados_002 -> sexo_usuario;
		header('Location: index.php');
	} 
	else{		
    echo ("<script>alert('Login ou Senha incorretos, tente novamente.'); location.href='Login.php';</script>");
	}
?>