<?php
  session_start();

  $id_post = base64_decode($_GET["id_post"]);

  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");
  
  $busca_postagem_001 = mysqli_query($conexao, "SELECT * 
                                               FROM tb_postagens 
                                               WHERE id_post = '{$id_post}';") or die(mysql_error());
  
  $busca_postagem_002 = mysqli_fetch_object($busca_postagem_001);
  
  $id_post = $busca_postagem_002 -> id_post;
  $nome_post = $busca_postagem_002 -> nome_post;
  $autor_post = $busca_postagem_002 -> autor_post;
  $data_post = $busca_postagem_002 -> data_post;
  $texto_post = $busca_postagem_002 -> texto_post;

  $alt_01 = mysqli_query($conexao, "SELECT * 
                                         FROM tb_usuarios 
                                         WHERE id_usuario = '$autor_post' 
                                         ORDER BY id_usuario ASC;") or die(mysql_error());
                              
  $alt_02 = mysqli_fetch_object($alt_01);
  $nome_usuario = $alt_02 -> nome_usuario;

  mysqli_close($conexao);
?>
<!DOCTYPE HTML>                                                
    <html lang='pt-BR'>                                          
    <head>                                                      
    <meta charset='UTF-8'/> 
    <title> Site de Notcias </title>  
    <link rel="stylesheet" type="text/css" href= "Css/StylePost.css">
    </head>
    <body>
    <div id="interface">
    <header id="cabecalho">
    
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postagem.php">Postar</a></li>
            <li><a href="Login.php">Login</a></li>
        <ul>
    </div>           
    </header>

    </br></br></br></br></br></br>

    <form action='index.php' method='post'>
	
    <article>
        <h1 id="Titulo"> <?php echo $nome_post;?> </h1>
        <h2> <i>Por</i> <b><?php echo $nome_usuario;?></b> <i>em</i> <b><?php echo $data_post;?></b> </h2>
		<!--Buscar Imagem no BD -->
        <img id="fotos" src="images/spotify.jpg">
        
    <div id="Corpo">
	
    <?php echo $texto_post; ?>

	</div>

    <h4> 7 curtidas! </h4>
    <button class="like"><a href="like_db.php">Curtir</button></a>
    </br></br>

<h2>  Comentários </h2>
<?php if ($_SESSION["entrou"] != 0){ ?>
    <div id="comentarios">
    <form action="comentario_db" method="post" name="form_comentario" id="form_comentario" >
        <input type="text" name="comentario" placeholder="Digitie seu comentário:" class="campo" size="50px" height="50px" />
    <button type = "submit" class = "botao submit"> Enviar </button>
</form>
      <div class="comentario">
<?php } else { echo '<h1>faça login para comentar</h1>'; } ?>
 </br></br>
    <strong> Nome: </strong> 
    <p> Comentario: </p>
    </div>
</div>
</form>	  

<footer id="rodape">

    <h1> Site criado para a realizaçao do projeto integrador de 2019 - by Grupo 04</h1>
    <a id="manu" href="ManualUsu.php"> Manual do Usuário </a>    
</footer> 
</body>
</html>