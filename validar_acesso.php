<?php

session_start();

    require_once('conexao.php');
    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);

    $con = getConnection();

   $sql = "select * from usuario where usuario = '$usuario' and senha = '$senha' ";
   $stmt = $con->prepare($sql);
   $resultado =  $stmt->execute();

   // verifcando se ouve erro na cosnulta...
   if($resultado){

     $result = $stmt->fetchAll();
     //verificando se há algum dado no vetor
     if($result){
        foreach($result as $dados){
          $_SESSION["usuario"] = $dados["usuario"];
          $_SESSION["email"] = $dados["email"];
          $_SESSION["id_usuario"] = $dados["id"];
          header("Location: home.php");
        }
     } else {
      //a função header() ela redireciona o navegador para o outro endereço url
      // ela força a substituição da página do browser
      header("Location: index.php?erro=1");
     }
     
   } else {
       echo "Erro na execução da consulta...";
   }
  //$result = $stmt->fetchAll();

?>