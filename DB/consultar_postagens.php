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
  $likes_post = $busca_postagem_002 -> curtidas_post;

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
    <meta charset='UTF-8' />                                   
    <title>Equipe Quatro</title>
  </head> 
  <body>
    <font face='Arial, Helvetica'>
      <h1>Ler postagem</h1>
      <form action='cadastro_postagens.php' method='post'>
        <table bgcolor='silver' border='1' width='100%'>
          <tr>
            <td width='10%'>ID</td>
            <td width='40%'><?php echo $id_post;?></td>
		  	<td width='20%'>Curtidas</td>
			<td width='30%'><?php echo $likes_post; ?></td>
          </tr>
          <tr>
            <td>Título</td>
            <td colspan='3'><?php echo $nome_post;?></td>
          </tr>
          <tr>
            <td>Autor</td>
            <td colspan='3'><?php echo $nome_usuario;?></td>
          </tr>
          <tr>
            <td>Data</td>
            <td colspan='3'><?php echo $data_post;?></td>
          </tr>
		  <tr>
			<td>Texto</td>
			<td colspan='3'><?php echo $texto_post; ?></td>
		  </tr>
          <tr>
            <td align='center' colspan='4'>
			  <input name='curtir' onClick="location.href='curtidas_postagens_db.php'" type='button' value='Curtir' />
              <input name='voltar' onClick="location.href='cadastro_postagens.php'" type='button' value='Voltar' />						
            </td>
          </tr>
        </table>
      </form>	  
    </font>									
  </body>
</html>