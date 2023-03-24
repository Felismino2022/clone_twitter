<?php
    $erro_usuario = isset($_GET["erro_usuario"]) ? $_GET["erro_usuario"] : 0;
    $erro_email= isset($_GET["erro_email"]) ? $_GET["erro_email"] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Link externo-->
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css" >
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
     <!--Criando a navbar-->
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
                        <a href="index.php" class="nav-link">Voltar Para Home</a>
                    </li>
                </ul>
            </div>
        </div><!--/container-->
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 mt-5">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center"><i class="fa fa-paper-plane text-primary mr-2"></i>Inscreva-se já</h4>
                    </div>
                </div>
                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-12 ">
                        <form action="registra_usuario.php" method="post" id="formCadastrase">
                            <div class= "form-row">
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" name="usuario" placeholder="Usuário">
                                    <?php
                                        if($erro_usuario){ // nota o zero tem o valor false e 1 tem o valor true
                                            echo " <font style ='color: #ff0000'>usuário já cadastrado</font>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <input type="email" class="form-control" placeholder="email" name="email">
                                    <?php
                                        if($erro_email){// nota o zero tem o valor false e 1 tem o valor true
                                            echo " <font style ='color: #ff0000'>email já cadastrado</font>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <input type="password" class="form-control" placeholder="senha" name="senha">
                                    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block">Inscrever</button>
                        </form>
                    </div>
                </div> <!--/ row justify-content-center mt-2 mb-2-->
            </div><!--/col-5-->
        </div><!--/row justify-content-center-->
    </div><!--/container-->
    <!----------------------------- Script Externos---------------------------->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>