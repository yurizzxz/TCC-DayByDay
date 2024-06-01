<?php
session_start();

if (isset($_SESSION['nomeUsuario']) && isset($_SESSION['emailUsuario'])) {
    $nomeUsuario = $_SESSION['nomeUsuario'];
    $emailUsuario = $_SESSION['emailUsuario'];
} else {
    header('location:login.php');
    exit;
}
?>
<style>
    .modal {
        border: none;
        outline: none;
    }

    .modal-body input[name="txttitulo"] {
        font-size: 30px;
        font-weight: bold;
        border: none;
        margin-bottom: 10px;
    }

    .modal-body input[name="txtsubtitulo"] {
        font-size: 21px;
        margin-bottom: 10px;
        border: none;
    }

    .modal-body textarea[name="txtconteudo"] {
        font-size: 16px;
        border: none;
    }

    .modal-body input[name="txttitulo"]:focus {
        font-size: 30px;
        font-weight: bold;
        border: none;
        box-shadow: none;
        outline: none;
        margin-bottom: 10px;
    }

    .modal-body input[name="txtsubtitulo"]:focus {
        border: none;
        box-shadow: none;
        outline: none;
        margin-bottom: 10px;
    }

    .modal-body textarea[name="txtdescricao"]:focus {
        box-shadow: none;
        outline: none;
        border: none;
    }

    .modal-width {
        width: 100%;
        height: 60vh;
        margin-left: auto;
        margin-right: auto;
    }

    .create-note .modal-header button[name="modal-close"]:focus {
        box-shadow: none;
        outline: none;
        border: none;
    }

    .offcanvas-backdrop.show {
        opacity: .0;
    }

    .offcanvas.offcanvas-end {
        border-left: none;
    }

    .offcanvas-noti {
        height: 94.1vh;
        margin-top: auto
    }

    #postar-nota {
        display: block;
        text-align: center;
        padding: 0.4rem 1.2rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: black;
        text-decoration: none;
        background: #e8e8e8;
        transition: 0.3s ease-in-out;
    }

    #postar-nota:hover {
        background: #cfcfcf;
        transition: 0.3s ease-in-out;
    }

    #change-info-btn {
        background: #e8e8e8;
        transition: 0.3s ease-in-out;
    }

    #change-info-btn:hover {
        background: #cfcfcf;
        transition: 0.3s ease-in-out;
    }

    @keyframes slideFromTop {
        from {
            transform: translateY(-100%);
        }

        to {
            transform: translateY(0);
        }
    }

    :root {
        --color-bar-nota: #00ff00;
    }

    .color-bar-nota {
        background-color: var(--color-bar-nota);
    }

    @media (min-width: 601px) {
        .color-bar-nota {
            width: 30%;
            height: 580px;
            margin-top: -12px;
            margin-bottom: -570px;
        }

        .modal-body {
            margin-left: 15px;
        }
    }

    @media (max-width: 600px) {
        .color-bar-nota {
            width: 100%;
            height: 20px;
        }

        .modal-body {
            margin-left: 0px;
        }
    }

    .icon-nota {
        color: black;
        margin-left: 30px;
        font-size: 25px;
    }

    .color-checkbox {
        display: none;
    }

    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid #fff;
        margin: 5px;
    }

    .color-checkbox:checked+label .color-option {
        border: 2px solid #000;
    }

    #colors-dropdown {
        margin-left: 0px;
        margin-top: -20px
    }
</style>

<nav class="navbar bg-light">
    <div class="container-fluid">
        <div class="bg">
            <button id="open_btn">
                <ion-icon id="open_btn_icon" name="reorder-three-outline" style="font-size: 35px; margin-bottom: -5px"></ion-icon>
            </button>
            <a href="?p=notas"><img src="../img/logopng.png" style="margin-top:-15px" height="25" alt=""></a>
        </div>
        <!--ITENS ESQUERDA-->
        <!--ITENS ESQUERDA-->
        <!--ITENS ESQUERDA-->
        <div class="left-items justify-content-center align-items-center d-flex">
            <!--BOTAO MODAL --><!--BOTAO MODAL --><!--BOTAO MODAL -->
            <div class="create-note">
                <button type="button" class="btn" id="modal-btn" data-bs-toggle="modal" data-bs-target="#modalNota">+
                    Criar nota
                </button>
                <!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA -->
                <!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA -->
                <!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA -->
                <!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA --><!-- MODAL NOTA -->
                <div class="modal fade align-items-center justify-content-center mt-5" id="modalNota" tabindex="-1" aria-labelledby="modalNotaLabel" aria-hidden="true">
                    <div class="container">
                        <div class="modal-dialog">

                            <div class="modal-content modal-width justify-content-center" style="border: none">
                                <div class="col-sm-1">

                                    <div class="color-bar-nota"></div>
                                </div>
                                <form action="salvar_nota.php" method="post">
                                    <div class="modal-body  flex-column">

                                        <div class="d-flex justify-content-between" style="margin-top: 0px">
                                            <input type="text" class="form-control txt-lg" name="txttitulo" id="form-control" required placeholder="Insira um título">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 20px; margin-top: 15px;"></button>
                                        </div>
                                        <input type="text" class="form-control txt-lg" name="txtsubtitulo" id="form-control" placeholder="Insira um subtítulo">
                                        <textarea resize class="form-control" name="txtconteudo" id="form-control" cols="30" style="resize: none;" required rows="10" placeholder="Começe aqui..."></textarea>
                                    </div>
                                    <div class="modal-footer d-flex" style="border: none;margin-top: 80px">

                                        <div class="icons" style="margin-right: auto;">
                                            <a href="" class="icon-nota"><ion-icon name="calendar-outline"></ion-icon></a>
                                            <button type="button" class="icon-nota" style="border: none; background: transparent" data-bs-toggle="dropdown" aria-expanded="false">
                                                <ion-icon name="color-palette-outline"></ion-icon>
                                            </button>
                                            <ul class="dropdown-menu" id="colors-dropdown" style="height: 15vh; width: 30vh">
                                                <div class="container p-3">
                                                    <div class="title-colors text-align-center">
                                                        <h4 style="font-size: 20px">Selecione a cor de sua nota</h4>
                                                    </div>
                                                    <div class="container justify-content-center align-items-center">
                                                        <input type="radio" class="color-checkbox" id="color1" value="#ff0000" name="cor_selecionada"><label for="color1">
                                                            <div class="color-option" style="background-color: #ff0000;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color2" value="#00ff00" name="cor_selecionada"><label for="color2">
                                                            <div class="color-option" style="background-color: #00ff00;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color3" value="#0000ff" name="cor_selecionada"><label for="color3">
                                                            <div class="color-option" style="background-color: #0000ff;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color4" value="#ffff00" name="cor_selecionada"><label for="color4">
                                                            <div class="color-option" style="background-color: #ffff00;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color5" value="#ff00ff" name="cor_selecionada"><label for="color5">
                                                            <div class="color-option" style="background-color: #ff00ff;">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </ul>
                                            <label class="icon-nota" for="input-arquivo" style="cursor: pointer">
                                                <ion-icon name="folder-outline" style="font-size: 20px;"></ion-icon>
                                                <input type="file" id="input-arquivo" class="visually-hidden" style="width: 20px;">
                                            </label>
                                            <a href="" class="icon-nota"><ion-icon name="text-outline"></ion-icon></a>
                                        </div>
                                        <input type="hidden" name="txtcor" id="txtcor">
                                        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">
                                        <input type="submit" class="btn" id="postar-nota" name="btnconfirmar" style="margin-left: 90px" value="Salvar Nota">

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO-->
        <!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO--><!--PERFIL + NOTIFICAÇAO-->
        <div class="perfil-noti d-flex">
            <a id="notifications" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <ion-icon name="notifications-outline" style="z-index: 99; font-size: 25px; margin-top: 08px; color: #252525">
                </ion-icon>
            </a>
            <div class="dropdown">
                <img src="../img/5.jpeg" class="profile-img" height="40" class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                </img>
                <ul class="dropdown-menu bg-light">
                    <div class="container text-center">

                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <div class="modal-head d-flex mt-3">
                            <img src="../img/5.jpeg" class="profile-img" height="80" class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <div class="d-flex flex-column" style="margin-left: 10px">
                                <div class="d-flex align-items-center" style="width: 23vh">
                                    <h4 class="user-name mt-2" id="username"><?php echo $nomeUsuario; ?></h4>
                                    <a href="logout.php" class="logout-btn-dropdown" style="margin-left: auto; text-decoration: none;">Logout</a>
                                </div>
                                <!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER-->
                                <!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER-->
                                <!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER-->
                                <!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER--><!--EMAIL USER-->
                                <p class="user-mail" id="usermail" style="margin-top: -5px; text-align: left">
                                    <?php echo $emailUsuario; ?>
                                </p>
                            </div>
                        </div>

                        <li class="d-flex">
                            <div class="container">
                                <div class="img d-flex justify-content-center align-items-center" style="margin-left: 50px; margin-top: 10px">
                                    <div class="a me-5">
                                        <img src="../img/1.jpeg" class="profile-img" height="50" class="" type="button">
                                        <p>20</p>

                                    </div>
                                    <div class="a me-5">
                                        <img src="../img/1.jpeg" class="profile-img" height="50" class="" type="button">
                                        <p>80</p>
                                    </div>
                                    <div class="a me-5">
                                        <img src="../img/1.jpeg" class="profile-img" height="50" class="" type="button">
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <button type="button" class="btn mt-0" id="change-info-btn" data-bs-toggle="modal" data-bs-target="#modalChanges">Alterar Informações
                        </button>
                    </div>
                </ul>
            </div>

            <!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES -->
            <!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES -->
            <div class="modal fade" id="modalChanges" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center align-items-center" style="min-height: 90vh;">
                    <div class=" modal-content">

                        <div class="modal-body text-center justify-content-center align-items-center">
                            <h5>Insira sua senha para prosseguir</h6>
                            <input type="password" class="form-control mt-3 mb-3" style="margin-left: -6px">
                            <div class="btn-confirmar-senha">
                                <button type="button" class="btn btn-primary text-dark" id="change-info-btn" style="border:none">Prosseguir</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO-->
            <!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO-->

            <div class="offcanvas offcanvas-end offcanvas-noti bg-light" data-bs-scroll="true" tabindex="0" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="container">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Notificações</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>
                        <div class="card" style="width: 18rem; border: none">
                            <div class="card-body">
                                <h5 class="card-title">Titulo notificação</h5>
                                <p class="card-text">Evento [nome] se aproximando</p>
                                <a href="" class="btn btn-primary text-dark" id="change-info-btn" style="border:none">Ir até lá</a>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // event listener para os checkbox
        var colorCheckboxes = document.querySelectorAll(".color-checkbox");
        colorCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener("click", function() {

                if (checkbox.checked) {

                    var selectedColor = checkbox.value;

                    document.documentElement.style.setProperty('--color-bar-nota', selectedColor);

                    document.getElementById("cor-selecionada").value = selectedColor;

                    colorCheckboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });
    });

    document.querySelectorAll('.color-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                var color = this.value;
                document.getElementById('color-preview').style.backgroundColor = color;
                document.getElementById('txtcor').value = color;
            }
        });
    });
</script>