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
?>
<!DOCTYPE HTML>                                                
<html lang='pt-BR'>                                          
   <head>                                                      
		<meta charset='UTF-8'/> 
		<title> Site de Notcias </title>  
		<link rel="stylesheet" type="text/css" href= "Css/StyleLogin.css">
   </head>
   <body>
	<header>
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="postagem.php">Postar</a></li>
				<li><a href="Login.php">Login</a></li>
			</ul>
		</div> 
    </header>
	<br/><br/><br/><br/><br/><br/>
	<h3>Senha incorreta</h3>
	<a href="Login.php">Tentar novamente</a>
	</body>
</html>
<?php
	}
?>