<?php

session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}

require_once('conexao.php');

$id_usuario = $_SESSION["id_usuario"];
$seguir_id_usuario = $_POST['seguir_id_usuario'];


$con = getConnection();
   
$sql = "delete from usuarios_seguidores where id_usuario = $id_usuario and seguindo_id_usuario = $seguir_id_usuario";
$stmt = $con->prepare($sql);
$stmt->execute();
?>