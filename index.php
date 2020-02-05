
<?php 

	$request = explode('?', $_SERVER['REQUEST_URI']);
	$pagina = explode('/', $request[0]);


	if(empty($pagina[1])){

		require_once('src/index.php');

	}elseif($pagina[1] === 'create'){

		require_once('src/api_1.0/shortner.php');

	}elseif ($pagina[1] === 'retrieve') {
		require_once('src/api_1.0/retriever.php');

	}elseif ($pagina[1] === 'u') {
		require_once('src/api_1.0/redirect.php');
	
	
	}elseif($pagina[1] === 'cliente'){

		require_once('src/index.php');

	}elseif($pagina[1] === 'ranking'){

		require_once('src/mais_acessados.php');
		

	}else{
		//var_dump($pagina);
		require_once('404.php');
	}
?>
