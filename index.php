<?php
    $erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clone Twitter</title>

    <!--Links Externos-->
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css" >
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <!--Criando a navbar-->
    <div class="ja">

    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
            <!--navbar brand-->
            <a href="#" class="navbar-brand mb-0"><i class="fa fa-twitter mr-1" aria-hidden="true"></i>twitter</a>
            <!--Botão recolher ou expandir-->
            <!--O código a baixo serve para definir o botão de recolher ou expandir-->
            <button class="navbar-toggler" type="button" data-toggle = "collapse" data-target="#SiteTwitter">
                <!--Vamos definir o ícone de expandir-->
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="SiteTwitter">
                <ul class="navbar-nav ml-auto mr-5">
                    <!--definimos comando php curta para empidir que a drop entrar se minimise-->
                    <li class="nav-item dropdown mr-3 <?= $erro == 1 ?'show':'';?>">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Entrar</a>
                        <div class="dropdown-menu <?= $erro == 1 ?'show':'';?>">
                            <!--Formulário dropdown para entrar-->
                            <form action="validar_acesso.php" class="px-3 py-3" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-labe">Usuário</label>
                                    <input type="text" class="form-control" placeholder="Usuário" name="usuario" id="usuario">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-labe">Senha</label>
                                    <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                                </div>
                                <div class="mb-3 px-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-label">Guardar a senha?</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary btn-block" id="btn_entar">Entrar</button>

                            <?php
                                echo "<br>";
                                if($erro == 1){
                                    echo "<font color= #FF0000>dados introduzidos inválidos</font>";
                                }
                            ?>
                            
                            </form>
                            <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item">Não possues um conta?</a>
                                <a href="" class="dropdown-item">esqueceste a tua palavra passe?</a>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="inscreve.php" class="nav-link">Inscreve-se</a>
                    </li>
                </ul>
            </div>
        </div><!--/container-->
    </nav>
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 sectionCor">
                <div class="ml-5">
                <h1 class="display-3">Bem vindo ao twitter clone</h1>
                <h5 class=" text-muted">Veja o que esta acontecendo agora...</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="ii">

    </div>
    <!--fim da navbar-->
    <!----------------------------- Script Externos---------------------------->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script>
        $(document).ready(function(){
            // verificar se os campos de usuário e senha foram devidamente preenchidos
            $('#btn_entar').click(function(){
                var campo_vazio = false;
                if($('#usuario').val() == ""){
                    //alert("O campo usuário esta vazia");
                    $('#usuario').css({'border-color' : '#A94442'})
                    var campo_vazio = true;
                } else {
                    $('#usuario').css({'border-color' : '#ccc'})
                }

                if($('#senha').val() == ""){
                    //alert("O campo senha esta vazia");
                    $('#senha').css({'border-color' : '#A94442'})
                    var campo_vazio = true;
                } else {
                    $('#senha').css({'border-color' : '#ccc'})
                }

                if(campo_vazio){
                    return false;
                }
            });
        });
        // fazer o camando acima usando js normal
    </script>
</body>
</html>