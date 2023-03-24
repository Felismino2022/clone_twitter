<?php
session_start();
if($_SESSION['usuario'] == ""){header("Location: index.php?erro = 1");
}
//if(isset($_SESSION['usuario'])){header("Location: index.php?erro = 1");}
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
                        <a href="home.php" class="nav-link">home</a>
                    </li>    
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
                        <form id="form_procurar_pessoas">
                            <div class="input-group">
                                <input type="text" class="form-control" id="txt_nome" name="txt_nome" placeholder="quem você esta procurando" maxlength="140">
                                <span class="input-group-btn">
                                    <button class="btn btn-default ml-2" type="button" id="btn_pesquisar" name="btn_tweet">Pesquisar</button>
                                </span>
                            </div>
                        </form>
                       
                    </div>
                    <div class="card-header">
                            Procurar Pessoas
                    </div>
                    <div class="list-group list-group-flush" id="pessoas"></div>
                </div>
                </div>
            <div class="col-md-3">
                <div class="card  ">
                    <div class="card-body">
                        <h5><a href="#">Procurar pessoas</a></h5>
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
            $('#btn_pesquisar').click(function(){
                //verificadndo se o campo esta vazio
               if($('#txt_nome').val().length > 0){
                   $.ajax({
                       url: 'get_pessoas.php',
                       method: 'post',
                       data: $('#form_procurar_pessoas').serialize(),
                       success: function(data){
                           //alert(data);
                            $('#pessoas').html(data);

                            $('.btn_seguir').click(function(){
                                var id_usuario = $(this).data('id_usuario');
                                $('#seguir_'+id_usuario).hide();
                                $('#deixar_seguir_'+id_usuario).show();
                                $.ajax({
                                    url: 'seguir.php',
                                    method: 'post',
                                    data: {seguir_id_usuario: id_usuario},
                                    success: function(data){
                                        
                                    }
                                })
                            });

                            $('.btn_deixar_seguir').click(function(){
                                var id_usuario = $(this).data('id_usuario');
                                $('#deixar_seguir_'+id_usuario).hide();
                                $('#seguir_'+id_usuario).show();
                                $.ajax({
                                    url: 'deixar_seguir.php',
                                    method: 'post',
                                    data: {seguir_id_usuario: id_usuario},
                                    success: function(data){
                                        
                                    }
                                })
                            });
                       }
                   });
               }
            })

         
        });
    </script>
</body>
</html>