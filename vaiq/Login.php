<?php
session_start();
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

<div class="login">
  <div class="form">
  <form method='post' class="login-form" action='Login_db.php'>
      <h1> Login </h1>
	  <input type="text"     name='email' placeholder="Email" required />
	  <input type="password" name='senha' placeholder="Senha" required />
      <button type='submit'>Login</button>
      <p class="mensagem">Não possui conta? <a href="CriaConta.php">Criar uma conta</a></p>
    </form>
  </div>
</div>
        
