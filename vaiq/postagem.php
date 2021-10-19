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
        
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postagem.php">Postar</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </div>           
<div class="postagem"> 
 <form action='postagem_db.php' method='post' name='inclui'>
	<form class="postagem-form">
		<h1> Criando uma postagem </h1>
</br></br>
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
    <input accept='image/jpeg, image/gif' name='ncraplrysh' type='file' value='10240000' />  

</br>
</br>
    <button type="submit"> Publicar Postagem </button>	
   </div>
  </form> 
 </body>
</html>
  <?php } else {?>
<!DOCTYPE HTML>                                                
  <html lang='pt-BR'>                                            
   <head>                                                       
		<meta charset='UTF-8' />                                  
		<title> Site de Noticia </title> 
		<link rel="stylesheet" type="text/css" href= "Css/StylePostagem.css" >
   </head>
<body>
        
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postagem.php">Postar</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </div>
</br></br> </br></br> </br></br> 	
		<h1> Faça login para poder publicar </h1>
  
 </body>
</html>  
  <?php } ?>  