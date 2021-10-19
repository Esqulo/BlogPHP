<?php
  session_start();

  $id_post = base64_decode($_GET["id_post"]);
  $_SESSION["postagem"]= base64_encode($id_post);
  
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
  $imagem_post = $busca_postagem_002 -> imagem_post;

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
    
    <?php if ($_SESSION["entrou"] != 0 ){?> <!-- Exibe mensagem se o usuario estiver logado -->
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
    <?php } ?>
    
    </header>

    </br></br></br></br></br></br>
	
    <article>
        <h1 id="Titulo"> <?php echo $nome_post;?> </h1>
        <h2> <i>Por</i> <b><?php echo $nome_usuario;?></b> <i>em</i> <b><?php echo $data_post;?></b> </h2>
       <!-- <a id="edit" href=#> Editar Postagem </a> -->	
		<!--Buscar Imagem no BD -->
        <img id="fotos" src="<?php echo $imagem_post;?>">
        
    <div id="Corpo">
    <?php echo $texto_post; ?>

	</div>
<?php
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");
  
   $curtidas_001 = mysqli_query($conexao, "SELECT * 
                                         FROM tb_curtidas 
                                         ORDER BY id_curtida ASC;") or die(mysql_error());
 
   while($curtidas_002 = mysqli_fetch_object($curtidas_001)){
	
		$curtidas_003  = $curtidas_002 -> post_curtida;

		if ($curtidas_003 == $id_post){
			$total_curtidas++;
		}
 
	}
    mysqli_close($conexao);
 ?>
    <h4> 
	<?php 
	    if ($total_curtidas == 0){
			echo 'Nenhuma curtida ainda';
		}
		
		if ($total_curtidas == 1){
			echo $total_curtidas;
			echo ' curtida!';
		}
		
		if ($total_curtidas > 1){ 
			echo $total_curtidas;
			echo ' curtidas!';
		}
	?> 
    </h4>
	<?php if ($_SESSION["entrou"] != 0){ ?>
    <button class="like"><a href="curtidas_db.php">Curtir</button></a>
	<?php		}
			else { echo  '<div class="h1"> Faça login para curtir! </div>';
				 }
	?>
	</br></br>

<h2>  Comentários </h2>
   <div id="comentarios">
	   <form action="comentario_db.php" method="post" name="form_comentario" id="form_comentario" >
       <textarea required placeholder="Digite seu comentário: " name='comentar' rows="6" cols="136" class="campo"/></textarea>
</br></br>
		<button type= "submit" class= "botao submit"> Enviar </button>
		</form>
		<div class="comentario">
<?php 
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");
  
  $coments_001 = mysqli_query($conexao, "SELECT * 
                                         FROM tb_comentarios 
                                         ORDER BY id_coment ASC;") or die(mysql_error());

  while($coments_002 = mysqli_fetch_object($coments_001)){
	$post_coment  = $coments_002 -> post_coment;
	$autor_coment = $coments_002 -> autor_coment;
	$texto_coment = $coments_002 -> texto_coment;
	$data_coment  = $coments_002 -> data_coment;
	
	$alt_01 = mysqli_query($conexao, "SELECT * 
                                           FROM tb_usuarios 
                                           WHERE id_usuario = '{$autor_coment}' 
                                           ORDER BY id_usuario ASC;") or die(mysql_error());
                                
    $alt_02 = mysqli_fetch_object($alt_01);    
    $nome_usuario = $alt_02 -> nome_usuario;
	if ($id_post == $post_coment){
?>			
			<strong> Nome: 
			<?php if ($autor_coment != 0){
					echo $nome_usuario;
				  }
				  else {
		  			echo "Visitante";
			      }
			?> 
			</strong> 
			<p> Comentario: <?php echo $texto_coment ?> </p>
			
			_____________________________________________________________________________________________
			<br/><br/>
			
		
 <?php  } } mysqli_close($conexao);?>	
		</div>
	</div>  

<footer id="rodape">

    <h1> Site criado para a realizaçao do projeto integrador de 2019 - by Grupo 04</h1>
    <a id="manu" href="ManualUsu.php"> Manual do Usuário </a>    
</footer> 
</body>
</html>