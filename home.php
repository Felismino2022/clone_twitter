<?php
session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}
//if(isset($_SESSION['usuario'])){header("Location: index.php?erro = 1");}
require_once('conexao.php');
$id_usuario = $_SESSION["id_usuario"];
$con = getConnection();
// quantidade de tweets
$sql = "select * from tweet where id_usuario = $id_usuario";
$stmt = $con->prepare($sql);
if($stmt->execute()){
    $result = $stmt->fetchAll();
    echo count($result);
  } else {
     echo "<br> erro ao pesquisar";
  }
/*$stmt = $con->prepare($sql);
if($stmt->execute()){
    $resultado = $stmt->fetchAll();
    foreach($resultado as $value){
        echo $value['tweet'];
    }
}
*/



//echo $resultado;
//quantidades de seguidores
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!--Links Externos-->
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css" >
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
            <!--navbar brand-->
            <a href="#" class="navbar-brand mb-0"><i class="fa fa-twitter mr-1" aria-hidden="true"></i>twitter</a>
            <!--Botão recolher ou expandir-->
            <!--O código a baixo serve para definir o botão de recolher ou expandir-->
            <button class="navbar-toggler" type="button" data-toggle = "collapse" data-target = "#SiteTwitter">
                <!--Vamos definir o ícone de expandir-->
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="SiteTwitter">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="sair.php" class="nav-link">sair</a>
                    </li>
                </ul>
            </div>
        </div><!--/container-->
    </nav>
    <div class="container mt-3">
        <div class = "row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <?= $_SESSION["usuario"]?>
                         <hr/>
                        <div class="row">
                            <div class="col-md-6">
                                TWEETS <br/> 1
                            </div>
                            <div class="col-md-6">
                                SEGUIDORES<br/> 1
                            </div>   
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="form_tweet">
                            <div class="input-group">
                                <input type="text" class="form-control" id="txt_tweet" name="txt_tweet" placeholder="o que estás a pensar" maxlength="140">
                                <span class="input-group-btn">
                                    <button class="btn btn-default ml-2" type="button" id="btn_tweet" name="btn_tweet">Tweet</button>
                                </span>
                            </div>
                        </form>
                       
                    </div>
                    <div class="card-header">
                            Tweets
                    </div>
                    <div class="list-group list-group-flush" id="tweets"></div>
                </div>
                </div>
            <div class="col-md-3">
                <div class="card  ">
                    <div class="card-body">
                        <h5><a href="procurar_pessoas.php">Procurar pessoas</a></h5>
                    </div>
                </div>
            </div>
        </div><!--/row-->
    </div><!--/container-->
<!----------------------------- Script Externos---------------------------->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            // se o botão foi clicado
            $('#btn_tweet').click(function(){
                //verificadndo se o campo esta vazio
               if($('#txt_tweet').val().length > 0){
                   $.ajax({
                       url: 'inclui_tweet.php',
                       method: 'post',
                       data: $('#form_tweet').serialize(),
                       success: function(data){
                           //alert(data);
                        $('#txt_tweet').val('');
                        actualizaTweet();
                       }
                   });
               }
            })

            function actualizaTweet(){
                //carregar os tweets
                $.ajax({
                    url: 'get_tweet.php',
                    method: 'post',
                    success: function(data){
                        $('#tweets').html(data);
                    }
                })
            }

            actualizaTweet();
        });
    </script>
</body>
</html>