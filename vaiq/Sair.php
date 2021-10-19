<?php
	session_start();
  $_SESSION["servidor"] = "177.85.98.125";
  $_SESSION["login"] = "adsystem_eq04";
  $_SESSION["senha"] = "4nali535ys04";
  $_SESSION["bancoDeDados"] = "adsystem_equipe_04";
  $_SESSION["nome_pessoa"] = 0; 
  $_SESSION["entrou"]= 0;
?>
<!DOCTYPE HTML>                                                
    <html lang='pt-BR'>                                          
    <head>                                                      
    <meta charset='UTF-8'/> 
    <title> Site de Notcias </title>  
    <link rel="stylesheet" type="text/css" href= "Css/StyleMain.css">
    </head>
    <body>
    <div id="interface">
    <header>
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postagem.php">Postar</a></li>
            <li><a href="Login.php">Login</a></li>
        <ul>
    </div> 

    <div id="boavinda">
        <h5><i>Logout com sucesso!</i></h5>  
   </div>
             
    </header>

    </br></br></br></br></br></br>

<?php
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");  
  
  $postagens_001 = mysqli_query($conexao, "SELECT * 
                                         FROM tb_postagens 
                                         ORDER BY id_post ASC;") or die(mysql_error());

  while($postagens_002 = mysqli_fetch_object($postagens_001)){
	$id_post = $postagens_002 -> id_post;
    $nome_post = $postagens_002 -> nome_post;
    $autor_post = $postagens_002 -> autor_post;
    $data_post = $postagens_002 -> data_post;
	
    $alt_01 = mysqli_query($conexao, "SELECT * 
                                           FROM tb_usuarios 
                                           WHERE id_usuario = '{$autor_post}' 
                                           ORDER BY id_usuario ASC;") or die(mysql_error());
                                
    $alt_02 = mysqli_fetch_object($alt_01);    
    $nome_usuario = $alt_02 -> nome_usuario;
?> 
	<!--Estrutura a ser Repetida -->
    <a href= "Post.php?id_post=<?php echo base64_encode($id_post); ?>"><img id="fotos" src="images/facigLogo.png"></a>
    <article id="noticia">
		<h1><b><a id="noticia" href= "Post.php?id_post=<?php echo base64_encode($id_post);?>"> <?php echo $nome_post; ?> </a></b></h1>
		<i>publicado por</i>
		<?php echo $nome_usuario ?> </br>
		<i>em</i>
		<?php echo $data_post ?>
	</article>
	
<?php  } mysqli_close($conexao);      //termina o laço e fecha a conexão com o BD.    ?>
  
 <footer id="rodape">
    <h1> Site criado para a realizaçao do projeto integrador de 2019 - by Grupo 04</h1>  
    <a id="manu" href="ManualUsu.php"> Manual do Usuário </a>
</footer> 
    </div>
    </body>
    </html>