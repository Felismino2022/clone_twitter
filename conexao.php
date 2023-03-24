<?php
/**
 * 
 * @return \PDO
 */
       function getConnection(){

            $dsn = "mysql:host=localhost;dbname=twitter_clone;charset=utf8";
            $user = "root";
            $pass = ""; 
            try {
                $pdoo = new PDO($dsn, $user, $pass);
                return $pdoo;
            } catch (PDOException $ex) {
                echo "Erro ao conectar".$ex->getMessage();
            }
        }
        
      
    
?>