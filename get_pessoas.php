<?php

session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}

require_once('conexao.php');

$id_usuario = $_SESSION["id_usuario"];
$nome = $_POST["txt_nome"];


$con = getConnection();
   
$sql = "select * from usuario left join usuarios_seguidores on (usuario.id = usuarios_seguidores.seguindo_id_usuario and usuarios_seguidores.id_usuario = $id_usuario) where usuario like '%$nome%' and id <> $id_usuario";


$stmt = $con->prepare($sql);
if($stmt->execute()){
  $result = $stmt->fetchAll();
  foreach($result as $value){

    $esta_seguindo_usuario_sn = ($value['id_usuario_seguidor'] == '') && !empty($value['id_usuario_seguidor']) ? 'S' : 'N';
    echo '<ul class="list-group-flush" >';
    echo '<li class="list-group-item"><strong>'.$value['usuario'].' </strong><small>'.$value['email'].'</small> ';

    $btn_seguir_display = 'block';
    $btn_deixar_seguir_display = 'block';
    if($esta_seguindo_usuario_sn){
      $btn_deixar_seguir_display = 'none';
    }else{
      $btn_seguir_display = 'none';
    }
    echo '<a href="#" class="px-4 btn btn-default btn_seguir" id="seguir_'.$value['id'].'" data-id_usuario="'.$value['id'].'" style="display:"'.$btn_deixar_seguir_display.'">seguir</a><a href="#" class="px-1 btn btn-info btn_deixar_seguir" id="deixar_seguir_'.$value['id'].'" data-id_usuario="'.$value['id'].'" style="display:"'.$btn_deixar_seguir_display.'">deixar de seguir</a>';
    echo '</li>';
    echo '</ul>';
    

}
} else {
   echo "<br> erro ao pesquisar";
}

?>