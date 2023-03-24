<?php

session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}

require_once('conexao.php');

$id_usuario = $_SESSION["id_usuario"];


$con = getConnection();
   
$sql = "select tweet.id_tweet, tweet.id_usuario, tweet.tweet, DATE_FORMAT(tweet.data_inclusao, '%d %b %y %T') as data_inclusao_formatada, usuario.usuario from tweet join usuario on (tweet.id_usuario = usuario.id) where id_usuario = $id_usuario or id_usuario in(select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario) order by data_inclusao desc";
$stmt = $con->prepare($sql);
if($stmt->execute()){
  $result = $stmt->fetchAll();
  foreach($result as $value){
    echo '<ul class="list-group-flush" >';
    echo '<li class="list-group-item">'.$value['usuario'].' <small>'.$value['data_inclusao_formatada'].'</small><br>'.$value['tweet'].'</li>';
    echo '</ul>';
    echo '<hr>';
}
} else {
   echo "<br> erro ao pesquisar";
}

?>