<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Bem vindo ao DayByDay!</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">

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
            width: 100%;
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

        .background-form {
            background: url(../img/texturagray.jpeg);
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .background-form:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -99;
        }

        .form-control:focus {
            border: 1px solid #A843F6;
            outline: none;
            box-shadow: 0 0 0 0 !important;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.01) !important
        }

        .back-button {
            top: 20px;
            left: 20px;
            padding-top: 6px;
            background-color: #cc5dfc;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            position: absolute;
        }

        .back-button:hover {
            transform: scale(1.20);
        }

        .back-button a {
            color: white;
            font-size: 30px;
            text-decoration: none;
        }

        .tooltip {
            visibility: hidden;
            width: 60px;
            background-color: black;
            color: white;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            top: 110%;
            left: 50%;
            margin-left: -30px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .back-button a:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .resp {
                display: none;
            }
        }

        .reg {
            display: none;
        }

        @media (max-width: 768px) {
            .reg {
                display: inline;
            }

            .form-signin {
                margin-top: 0;
            }
        }

        .form-group {
            position: relative;
        }

        #inputPassword {
            padding-left: 40px;
        }

        #togglePassword {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .icon-lock {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        
    </style>
</head>

<body>

    <div class="back-button">
        <a href="" id="back-to-home">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span class="tooltip">Voltar</span>
        </a>
    </div>


    <div class="container-fluid">
        <div class="row" id="first-column">
            <div class="col-md-5 col-sm-12 purple-space resp">
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

            <div class="col-md-7 col-sm-12 background-form">
                <div class="container" id="form-layout-ctner">
                    <div id="form-layout" class="d-flex justify-content-center align-items-center">
                        <div>
                            <form class="form-signin" method="post"
                                onsubmit="event.preventDefault(); enviarFormulario();">
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

                                        <!-- Div para exibir o erro de email -->
                                        <div id="erroEmail" class="text-danger"
                                            style="font-size: 0.9rem; border: 0px;"></div>

                                        <div class="form-group d-flex align-items-center mb-3 position-relative">
                                            <ion-icon name="lock-closed-outline" class="icon-lock"
                                                style="position: absolute;"></ion-icon>
                                            <input type="password" class="form-control ps-5 password-input"
                                                placeholder="Senha" required name="txtsenha">
                                            <span class="togglePassword"
                                                style="cursor: pointer; position: absolute; right: 10px; margin-top: 2px;">
                                                <ion-icon name="eye-off-outline" class="eye-icon"></ion-icon>
                                            </span>
                                        </div>

                                        <!-- Div para exibir o erro de senha -->
                                        <div id="erroSenha" class="text-danger"
                                            style="font-size: 0.9rem; border: 0px;"></div>

                                    </div>
                                </div>
                                <div class="forgot-password container mb-3">
                                    <a href="esqueceu_senha.php" class="text-muted" style="margin-left: auto">Esqueceu a senha?</a>
                                </div>
                                <!--enviar-->
                                <div class="container text-center">
                                    <input type="submit" class="btn btn-btn-login fullWidth" name="btnlogar"
                                        value="Entrar" />
                                </div>

                                <div class="container text-center reg" style="margin-bottom: 15px; margin-top: 10px;">
                                    <span style="color: #555;">Não possui uma conta?</span>
                                    <a href="#" id="registre-se"
                                        style="color: #cc5dfc; margin-left: 5px;">Registre-se</a>
                                </div>


                                <div class="container text-center mt-3">
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
            <div class="col-md-5 col-sm-12 purple-space order-md-2 resp">
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
            <div class="col-md-7 col-sm-12 background-form">
                <div class="container" id="form-layout-ctner">
                    <div id="form-layout" class="d-flex justify-content-center align-items-center">
                        <div>
                            <form action="cadastro_processar.php" id="formCadastro" class="form-signin" method="post">
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
                                        <div class="form-group d-flex align-items-center mb-3 position-relative">
                                            <ion-icon name="lock-closed-outline" id="icon"
                                                style="position: absolute;"></ion-icon>
                                            <input type="password" id="inputPassword" class="form-control ps-5"
                                                placeholder="Senha" minlength="6" required name="txtsenha">
                                            <span id="togglePassword"
                                                style="cursor: pointer; position: absolute; right: 10px; margin-top: 2px;">
                                                <ion-icon name="eye-off-outline" id="eyeIcon"></ion-icon>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <!--enviar-->
                                <div class="container text-center" style="margin-left: 0px">
                                    <input type="submit" class="btn btn-btn-login fullWidth" name="btnsalvar"
                                        value="Criar Conta" />
                                </div>

                                <div class="container text-center reg" style="margin-bottom: 15px; margin-top: 10px;">
                                    <span style="color: #555;">Já Possui uma Conta ?</span>
                                    <a href="#" id="entre" style="color: #cc5dfc; margin-left: 5px;">Entre</a>
                                </div>

                                <div class="container text-center mt-3">
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
        var registraBtn = document.getElementById('registre-se'); 
        var entreBtn = document.getElementById('entre');

        var firstColumn = document.getElementById('first-column');
        var secondColumn = document.getElementById('second-column');

        criarContaBtn.addEventListener('click', function (event) {
            event.preventDefault();

            firstColumn.classList.add('d-none');
            secondColumn.classList.remove('d-none');
        });

        entrarBtn.addEventListener('click', function (event) {
            event.preventDefault();

            secondColumn.classList.add('d-none');
            firstColumn.classList.remove('d-none');
        });

        registraBtn.addEventListener('click', function (event) {
            event.preventDefault();

            firstColumn.classList.add('d-none');
            secondColumn.classList.remove('d-none');
        });

        entreBtn.addEventListener('click', function (event) {
            event.preventDefault();

            secondColumn.classList.add('d-none');
            firstColumn.classList.remove('d-none');
        });

        document.getElementById('back-to-home').addEventListener('click', function (event) {
            event.preventDefault();
            window.history.back();
        });
    </script>

    <script>
        var togglePassword = document.getElementById('togglePassword');
        var passwordInput = document.getElementById('inputPassword');
        var eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
          
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            eyeIcon.setAttribute('name', type === 'password' ? 'eye-off-outline' : 'eye-outline');
        });
    </script>

    <script>
        document.querySelectorAll('.togglePassword').forEach(function (togglePassword) {
            togglePassword.addEventListener('click', function () {
                var passwordInput = this.previousElementSibling;
                var eyeIcon = this.querySelector('.eye-icon');

                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

               
                eyeIcon.setAttribute('name', type === 'password' ? 'eye-off-outline' : 'eye-outline');
            });
        });
    </script>

    <?php include_once 'scripts.php' ?>

    <div id="errorModal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/logopng.png" alt="Foto de perfil" class="profile-img">
                <button type="button" class="btn-cl" onclick="closeModal()" data-bs-dismiss="modal">close</button>
            </div>
            <div class="modal-body">
                <span id="modalMessage" class="modalMessage"></span>
            </div>
        </div>
    </div>

    <style>
        #errorModal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 10px;
            max-width: 900px;
            width: 100%;
            max-height: 90vh;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            margin-inline: auto;
            margin-top: 350px;
        }

        .btn-cl {
            content: 'close';
            font-family: 'Material Symbols Outlined';
            font-size: 30px;
            background-color: var(--white);
            background: transparent;
            border: none;
            color: var(--event-title);
        }

        .modal-header {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-img {
            width: 90%;
            height: 30px;
            object-fit: scale-down;
            margin-left: 40px;
        }

        .modalMessage {
            font-size: 25px;
        }
    </style>

    <script>
        document.getElementById("formCadastro").addEventListener("submit", function (event) {
            event.preventDefault(); 

            const formData = new FormData(this);

            fetch("cadastro_processar.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json()) 
                .then(data => {
                    if (data.status === "error") {
                        document.getElementById("modalMessage").innerText = data.message;
                        document.getElementById("errorModal").style.display = "block";
                    } else if (data.status === "success") {
                        window.location.href = "index.php?p=notas";
                    }
                })
                .catch(error => {
                    console.error("Erro:", error);
                });
        });

        function closeModal() {
            document.getElementById("errorModal").style.display = "none";
        }

        function enviarFormulario() {
            const formData = new FormData(document.querySelector('.form-signin'));

            document.getElementById('erroSenha').innerText = '';

            fetch('login_processar.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "error") {
                        if (data.message === "Senha incorreta!") {
                            document.getElementById('erroSenha').innerText = data.message;
                        } else {
                            document.getElementById('modalMessage').innerText = data.message;
                            document.getElementById('errorModal').style.display = 'flex';
                        }
                    } else if (data.status === "success") {
                        window.location.href = data.redirect;
                    }
                })
                .catch(error => console.error('Erro:', error));
        }

        function enviarFormulario() {
            const formData = new FormData(document.querySelector('.form-signin'));

            document.getElementById('erroEmail').innerText = '';
            document.getElementById('erroSenha').innerText = '';

            fetch('login_processar.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "error") {
                        if (data.message === "Senha incorreta!") {
                            document.getElementById('erroSenha').innerText = data.message;
                        } else if (data.message === "Usuário não encontrado!") {
                            document.getElementById('erroEmail').innerText = data.message;
                        } else {
                            document.getElementById('modalMessage').innerText = data.message;
                            document.getElementById('errorModal').style.display = 'flex';
                        }
                    } else if (data.status === "success") {
                        window.location.href = data.redirect;
                    }
                })
                .catch(error => console.error('Erro:', error));
        }


    </script>

</body>

</html>