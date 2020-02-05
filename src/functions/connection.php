<?php



 function conectarDB(){

    include('config.php');

        try{
 
            $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
     
            $conn = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND = "SET NAMES utf8");
         
     
        }catch(PDOException $exception){
     
          die("<br><br>Não foi possível se conectar com a base de dados - ".$dbname);
     
        }
         
        return $conn;
     
     
    }

?>