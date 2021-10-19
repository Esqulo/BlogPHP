<?php
  session_start();
  
  date_default_timezone_set("Brazil/East");
  setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
  
  $autor_coment = $_SESSION["entrou"];
  $data_coment  = date('d/m/Y');
  $texto_coment = $_POST["comentario"];
  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);

  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);

  mysqli_set_charset($conexao, "utf8");  
  

  $inclui = mysqli_query($conexao, "INSERT INTO tb_comentarios
                                    VALUES(NULL,
                                          '$autor_coment',
                                          '$texto_coment',
                                          '$data_post'
										  );") or die(mysql_error());

  mysqli_close($conexao);

  if($inclui){
    header('Post.php?id_post=<?php echo base64_encode($id_post);?>');
  }