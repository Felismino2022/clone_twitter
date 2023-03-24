<?php

session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}

require_once('conexao.php');

$id_usuario = $_SESSION["id_usuario"];
$tweet = $_POST["txt_tweet"];

$con = getConnection();
   
$sql = "insert into tweet(id_usuario, tweet) values ('$id_usuario', '$tweet')";

$stmt = $con->prepare($sql);

if($stmt->execute()){
  echo "<br> Publicado...";
} else {
   echo "<br> erro ao publicar...";
}
/*
  o comando a baixo verifica se o usuário já foi cadastrado
 
  $stmt = $con->prepare($sql);
  if($stmt->execute()){
      $result = $stmt->fetchAll();
      if($result){
        echo "<br>usuário já cadastrado";
        $usuario_existe = true;
      }

  } else {
    echo "erro ao tentar localizar o registro de usuário no banco de dados";
  }

  //o comando a baixo verifica se o email já foi cadastrado
  $sql = "select * from usuario where email = '$email'";
  $stmt2 = $con->prepare($sql);
  if($stmt2->execute()){
      $result = $stmt2->fetchAll();
      if($result){
        echo "<br>email já cadastrado";
        $email_existe = true;
      } 

  } else {
    echo "erro ao tentar localizar o registro de email no banco de dados";
  }

  if($usuario_existe || $email_existe){
    $retorno_get = "";

    //usamos o & comercial para indicar onde a variável termina
    if($usuario_existe){
      $retorno_get.="erro_usuario=1&";
    }

    if($email_existe){
      $retorno_get.="erro_email=1&";
    }
    header("Location: inscreve.php?". $retorno_get);
    die();
  }


  // o die(); funciona como interupção na interpretação do script
  // o php ele é interpretado ele lê linha linha, más quando ele encontra o die() ele para como se fosse um break.


   $sql = "insert into usuario(usuario, email, senha) values ('$usuario','$email','$senha')";
   $stmt = $con->prepare($sql);

   if($stmt->execute()){
     echo "<br>Slavo com sucesso";
   } else {
      echo "<br>erro a salvar";
   }

*/
?>