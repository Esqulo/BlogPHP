<!DOCTYPE HTML>                                                
    <html lang='pt-BR'>                                          
    <head>                                                      
        <meta charset='UTF-8'/> 
        <title> Site de Notcias </title>  

        <script type='text/javascript'>
            function isvalid(){
                var senha_usuario = document.inclui.senha_usuario.value;
                var consenha_usuario = document.inclui.consenha_usuario.value;
        
                if(senha_usuario != consenha_usuario ){
                    alert("Por favor, confirme sua senha.");
                    return false;
                }
            }
        </script>

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
  <form class="login-form" action='CriaConta_db.php' method='post' name='inclui' onsubmit='return isvalid();'>
      <h1> Criando Conta </h1>
      </br>  

      <input type="text" name='nome_usuario' placeholder="Primeiro Nome" required />
      <input type="text" name='sobren_usuario' placeholder="Sobrenome" required />
      <input type="password" name='senha_usuario' placeholder="Senha" required />
      <input type="password" name='consenha_usuario' placeholder="Confirme sua senha" required />
      <input type="e-mail" name='email_usuario' placeholder="Informe seu e-mail" required />
	  <div class="campo"> 
            <label>
                Sexo:
                <input type="radio" name="sexo_usuario" value="1" required> Masculino
                <input type="radio" name="sexo_usuario" value="0" required> Feminino
            </label>
       </div>
	
	
      <button type="submit">Criar Conta </button>
	  </form>   
      <p class="mensagem">Já possui conta? <a href="Login.php">Faça Login</a></p>
	 
  </div>
</div>