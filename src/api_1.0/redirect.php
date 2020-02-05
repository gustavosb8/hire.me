<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Short Url IO</title>
  <meta name="description" content="ShortURL is a url shortener to reduce a long link. Use our tool to shorten links and then share them, in addition you can monitor traffic statistics.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="resources/css/style.css">

  <script src="resources/js/jquery-2.4.1.min.js" type="text/javascript"></script>


  <link rel="shortcut icon" href="resources/img/logo.png">

</head>
<body>

<header>  
  <div id="logo">
    <img src="resources/img/logo.png">
    <a href="https://shorturlio.herokuapp.com/" class="logo">ShortUrl.io</a>
  </div>
</header>

<section class="boxes">

<?php

require_once('src/queries/TB_URL.php');

if(isset($pagina[2]) && !empty($pagina[2])){

	$url = getUrlbyAlias($pagina[2]);

	if(!empty($url)){
		header('Location: '.$url['URL']);
	}else{
		echo '<h1>Não foi encontrado URL para o alias: '.$pagina[2].'</h1>';
	}
	
}else{
	echo '<h1>Me diga um alias, que eu te direi uma url<br>Um alias válido rsrs. </h1>';
}

 ?>

    <p class="boxtextcenter">Ferramenta desenvolvida para teste realizado pelo Digital Lab para vaga de Desenvolvedor Pleno. Com a Shorturl.io é possível encurtar urls/links para ser utilizado posteriormente ou simplesmente recrutar o desenvolvedor que a desenvolveu para o time de feras do Digital Lab.</p>

    <a href="" class="colorbutton">Voltar</a>
  </section>

<?php

require_once('fragments/footer.php');

?>