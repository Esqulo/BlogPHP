<?php
  session_start();
  
  date_default_timezone_set("Brazil/East");
  setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
  
  $nome_post  = $_POST["titulo"];
  $autor_post = $_SESSION["entrou"];
  $data_post  = date('d/m/Y');
  $texto_post = $_POST["texto"];
  
  	$info = pathinfo($_FILES['userFile']['name']);
	$ext = $info['extension'];
	$newname = "imagem.".$_SESSION["id_imagem"].".".$ext; 

	$target = 'images/postagens/'.$newname;
	move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
  
  if (($_FILES['userFile']['name'])!= ""){
	$imagem_post= $target;
  }
  else{
	$imagem_post='images/facigLogo.png';  
  }
	  
  $conexao = mysqli_connect($_SESSION["servidor"], $_SESSION["login"], $_SESSION["senha"]);
  $banco_dados = mysqli_select_db($conexao, $_SESSION["bancoDeDados"]);
  mysqli_set_charset($conexao, "utf8");  

  $inclui = mysqli_query($conexao, "INSERT INTO tb_postagens
                                    VALUES(NULL,
                                          '$nome_post',
                                          '$autor_post',
                                          '$data_post',
										  '$texto_post',
										  '$imagem_post'
										  );") or die(mysql_error());

  mysqli_close($conexao);

  if($inclui){
     header ('Location: index.php');
  }