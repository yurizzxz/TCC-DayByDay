<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Bem vindo ao DayByDay!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    * {
        transition: 0.3s ease-in-out;
    }

    .form-signin {
        display: flex;
        border-radius: 8px;
        margin-top: 30px;
        border: 1px solid #F0F0F0;
        background-color: #FCFCFC;
        flex-direction: column;
        justify-content: center;
        width: 75vh;
        max-width: 430px;
        font-size: 18px;
        padding: 23px;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        margin-left: auto;
        padding: 10px 45px 10px;
        font-size: 20px;
        border-radius: 4px;
    }

    .fullWidth {
        width: 100%;
        margin-left: -3.5px;
        text-align: center;
        padding: 10px;
        border-radius: 0px;
    }

    #form-layout {
        height: 97vh;
    }

    /* roxo */
    .purple-space {
        background-color: #cc5dfc;
        background: linear-gradient(to left, #aa57fa, #cc5dfc);
        color: white;

    }

    #purple-space {
        height: 100vh;
    }

    #titulo-purple {
        font-size: 60px;
        width: 65%;
        margin-top: -0px;
    }

    /* */

    .btn-btn-login {
        background-color: #cc5dfc;
        background: linear-gradient(to left, #aa57fa, #cc5dfc);
        color: white;
        font-size: 25px;
        transition: 0.3s ease-in-out;
        border-radius: 4px;
    }

    .btn-btn-login:hover {
        background-color: #A843F6;
        color: white;
        font-size: 25px;
        transition: 0.3s ease-in-out;
    }

    /* icon */

    #icon {
        margin-right: -55px;
        margin-left: 15px;
        color: black;
        font-size: 18px;
        z-index: 99;
    }

    .forgot-password a {
        list-style: none;
        text-decoration: none;
        color: black;
        transition: 0.3s ease-in-out;

    }

    .forgot-password a:hover {
        border-bottom: 1px solid;
        color: #A843F6;
        transition: 0.3s ease-in-out;
    }

    /* outline */
    .outline-btn-transition {
        border: 1px solid white;
        background-color: white;
        color: #A843F6;
        padding: 15px 20px;
        border-radius: 10px;
        font-size: 35px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-transition {
        margin-top: 20px;
    }

    /* responsive */

    .mobile-aviso {
        display: NONE;
    }

    
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="first-column">
            <div class="col-md-5 col-sm-12 purple-space">
                <div class="container d-flex text-center align-items-center" id="purple-space">
                    <div class="mx-auto">
                        <div id="desktop-aviso" style="
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    text-align: center;
                    align-items: center;
                ">
                            <h1 class="fw-bold" id="titulo-purple">É NOVO POR AQUI?</h1>
                            <div class="btn-transition">
                                <a href="#" class="outline-btn-transition" id="criar-conta">CRIAR CONTA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-12">
                <div class="container" id="form-layout-ctner">
                    <div id="form-layout" class="d-flex justify-content-center align-items-center">
                        <div>
                            <form class="form-signin" method="post" action="login_processar.php">
                                <div class="container-fluid">
                                    <!--titulo-->
                                    <div class="titulo-heading text-center">
                                        <h3 class="text-dark fs-2 mt-4 mb-4">Entrar</h3>
                                    </div>
                                    <div class="form-infos" style=" margin-left: -5px">
                                        <div class="form-group d-flex align-items-center mb-1">
                                            <ion-icon name="mail-outline" id="icon"></ion-icon>
                                            <!--email-->
                                            <input type="email" id="inputEmail" class="form-control"
                                                placeholder="Insira seu email..." required name="txtemail">
                                        </div>
                                        <div class="form-group d-flex align-items-center mb-3">
                                            <ion-icon name="lock-closed-outline" id="icon"></ion-icon>
                                            <!--senha-->
                                            <input type="password" id="inputPassword" class="form-control"
                                                placeholder="Insira sua senha..." required name="txtsenha">
                                        </div>
                                    </div>
                                </div>
                                <div class="forgot-password container mb-3">
                                    <a href="#" class="text-muted" style="margin-left: auto">Esqueceu a senha?</a>
                                </div>
                                <!--enviar-->
                                <div class="container text-center" style="margin-bottom: 35px">
                                    <input type="submit" class="btn btn-btn-login fullWidth" name="btnlogar"
                                        value="Entrar" />
                                </div>
                                <div class="container text-center">
                                    <p class="d-none" style="margin-bottom: 2px">powered by:</p>
                                    <img src="../img/logopng.png" height="25" alt="">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--second column-->
        <!--second column-->
        <!--second column-->
        <!--second column-->
        <!--second column-->
        <!--second column-->
        <!--second column-->
        <div class="row d-none" id="second-column">
            <div class="col-md-5 col-sm-12 purple-space order-md-2">
                <div class="container d-flex text-center align-items-center" id="purple-space">
                    <div class="mx-auto">
                        <div id="desktop-aviso" style="
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    text-align: center;
                    align-items: center;
                ">
                            <h1 class="fw-bold" id="titulo-purple">JÁ POSSUI UMA CONTA?</h1>
                            <div class="btn-transition">
                                <a href="#" class="outline-btn-transition" id="entrar">ENTRAR</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--cadastro-->
            <div class="col-md-7 col-sm-12">
                <div class="container" id="form-layout-ctner">
                    <div id="form-layout" class="d-flex justify-content-center align-items-center">
                        <div>
                            <form action="cadastro_processar.php" class="form-signin" method="post">
                                <div class="container-fluid">
                                    <!--titulo-->
                                    <div class="titulo-heading text-center">
                                        <h3 class="text-dark mt-4 mb-4">Criar uma Conta</h3>
                                    </div>
                                    <div class="form-infos" style=" margin-left: -5px">
                                        <div class="form-group d-flex align-items-center mb-1">
                                            <ion-icon name="person-outline" id="icon"></ion-icon>
                                            <!--NOME-->
                                            <input type="text" id="inputNome" class="form-control"
                                                placeholder="Insira seu nome" required name="txtnome">
                                        </div>
                                        <div class="form-group d-flex align-items-center mb-1">
                                            <ion-icon name="mail-outline" id="icon"></ion-icon>
                                            <!--email-->
                                            <input type="email" id="inputEmail" class="form-control"
                                                placeholder="Insira seu email" required name="txtemail">
                                        </div>
                                        <div class="form-group d-flex align-items-center mb-3">
                                            <ion-icon name="lock-closed-outline" id="icon"></ion-icon>
                                            <!--senha-->
                                            <input type="password" id="inputPassword" class="form-control"
                                                placeholder="Senha" required name="txtsenha">
                                        </div>
                                    </div>
                                </div>
                                <!--enviar-->
                                <div class="container text-center" style="margin-bottom: 35px; margin-left: 0px">
                                    <input type="submit" class="btn btn-btn-login fullWidth" name="btnsalvar"
                                        value="Criar Conta" />
                                </div>
                                <div class="container text-center">
                                    <p class="d-none" style="margin-bottom: 2px">powered by:</p>
                                    <img src="../img/logopng.png" height="25" alt="">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
    var criarContaBtn = document.getElementById('criar-conta');
    var entrarBtn = document.getElementById('entrar');

    var firstColumn = document.getElementById('first-column');
    var secondColumn = document.getElementById('second-column');

    criarContaBtn.addEventListener('click', function(event) {
        event.preventDefault();

        firstColumn.classList.add('d-none');
        secondColumn.classList.remove('d-none');
    });

    entrarBtn.addEventListener('click', function(event) {
        event.preventDefault();

        secondColumn.classList.add('d-none');
        firstColumn.classList.remove('d-none');
    });
    </script>


    <?php include_once 'scripts.php' ?>

</body>

</html>