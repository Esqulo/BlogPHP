<?php
  session_start();
  if ($_SESSION["entrou"] != 0){
?>
<!DOCTYPE HTML>                                                
  <html lang='pt-BR'>                                            
   <head>                                                       
		<meta charset='UTF-8' />                                  
		<title> Site de Noticia </title> 
		<link rel="stylesheet" type="text/css" href= "Css/StylePostagem.css" >
   </head>
   <body>
   <div id="interface">
    <header>  
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postagem.php">Postar</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </div>    

    <div id="boavinda">
       <?php if ($_SESSION["sexo_usuario"]== 0){ 
												echo '<div class="h5"> Bem-vinda, </div>' ;
												}
			else { 
												echo  '<div class="h5"> Bem-vindo, </div>' ;
				} 
												echo '<div class="h6">' . $_SESSION["nome_pessoa"]?> | 
    </div>
   <a id ="Sair" href="Sair.php">Sair</a>                                                
    
  </header>

  </br></br></br></br></br></br>

<div class="postagem"> 
 <form action='postagem_db.php' method='post' name='inclui' enctype="multipart/form-data">
	<form class="postagem-form">
		<h1> Criando uma postagem </h1>
</br>
   <h2> Titulo da Postagem </h2>    
   <input maxlength='150' name='titulo' type="text" placeholder="Insira um titulo para a postagem" required />
</br></br>

    <h2> Texto </h2>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'})</script>
    <textarea name='texto'>Insira o texto da publicação. </textarea>

</br>
</br>

    <h2> Upload de Fotos </h2>
    <label for="Upload"> Inserir Imagem: </label>		
    <input type="file" name="userFile">  </br>
	jpeg e png apenas</br>	
	
</br>
</br>
    <button type="submit"> Publicar Postagem </button>	
   <!-- <button type="submit"> Salvar como rascunho </button>	-->
   </div>
  </form> 
 </body>
</html>
  <?php } else {
    echo ("<script>alert('É necessário fazer Login para postar.'); location.href='Login.php';</script>");
   } ?>  