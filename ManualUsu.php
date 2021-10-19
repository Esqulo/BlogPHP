<!DOCTYPE HTML>                                                
    <html lang='pt-BR'>                                          
    <head>                                                      
    <meta charset='UTF-8'/> 
    <title> Site de Notcias </title>  
    <link rel="stylesheet" type="text/css" href= "Css/StyleManu.css">
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

</br>
</br>
</br>
</br>


    <h1> Manual do Usuário </h1>

    <h2> Introdução </h2>

</br>

    <h3> Foi criado um sistema gestor de conteúdo online, onde o usuário poderá fazer postagens, comentários, e curtir postagens de outros usuários que serão do seu agrado. </h3>
    <img id="fotos" src="images/Manu01.png">

    <h2> Acessando um post </h2>
</br>
    <h3> Para acessar um post e ver a notícia completa, basta clicar no post ou na foto, posteriomente você
     será redirecionado para a área do post desejado. </h3>
     <img id="fotos" src="images/Manu02.png">

     <h2> Curtindo e comentando o post </h2>
</br>
     <h3> É possivel curtir e comentar o post selecionado, para curtir é necessário fazer login, depois de logar é necessário clicar no botão curtir(referente a seta vermelha).
          Para comentar, basta preencher os campos(referente a seta azul), após ter preenchido os campos, é necessario clicar no botão enviar. </h3>
    <img id="fotos" src="images/Manu03.png">

    <h2> Fazendo Login </h2>
</br>
    <h3> Para fazer uma postagem é necessário estar logado no site, para fazer login bastar clicar no icone "Login" encontrado no canto superior da tela. </h3>
    <img id="fotos" src="images/Manu04.png">
    <h3> Após clicar no icone, você será redirecionado para a área de login, onde será necessário inserir o nome de usuário e a senha. </h3>
    <img id="fotos" src="images/Manu05.png">

    <h2> Criando uma conta </h2>
</br>
    <h3> Caso você não tenha uma conta, basta clicar no botão "criar uma conta", que se encontra em baixo do botão "Login". </h3>
    <img id="fotos" src="images/Manu06.png">
    <h3> Após clicar no botão "criar uma conta", você será redirecionado a área de criação de uma conta, nele será necessário preencher os dados requisitados. Após preencher os dados, clique em "criar conta" </h3>

</br>
    <h2> Criando uma Postagem </h2>
</br>
    <h3> Para criar uma postagem, é necessário estar logado e clicar no link "Postar" que se encontra no canto superior da página.
    <img id="fotos" src="images/Manu07.png">
    <h3> Após você ser redirecionado, será necessário preencher os dados dos campos, depois de preenchido basta clicar no botão "Publicar Postagem".



</body>
</html>