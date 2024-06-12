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


<nav class="navbar">
    <div class="container-fluid">
        <div class="bg">
            <button id="open_btn">
                <ion-icon id="open_btn_icon" name="reorder-three-outline"
                    style="font-size: 35px; margin-bottom: -5px"></ion-icon>
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
                <div class="modal fade align-items-center justify-content-center mt-5" id="modalNota" tabindex="-1"
                    aria-labelledby="modalNotaLabel" aria-hidden="true">
                    <div class="container">
                        <div class="modal-dialog">

                            <div class="modal-content modal-width justify-content-center" style="border: none">
                                <div class="col-sm-1">

                                    <div class="color-bar-nota"></div>
                                </div>
                                <form action="salvar_nota.php" method="post">
                                    <div class="modal-body flex-column">
                                        <div class="d-flex justify-content-between" style="margin-top: 0px">
                                            <input type="text" class="form-control text-info" name="txttitulo"
                                               required placeholder="Insira um título">
                                            <button type="button" class="btn-close close-button" data-bs-dismiss="modal"
                                                aria-label="Close"
                                                style="margin-right: 20px; margin-top: 15px;"></button>
                                        </div>
                                        <input type="text" class="form-control text-info" name="txtsubtitulo"
                                             placeholder="Insira um subtítulo">
                                        <textarea resize class="form-control text-info" name="txtconteudo" 
                                            cols="30" style="resize: none;" required rows="10"
                                            placeholder="Começe aqui..."></textarea>
                                    </div>
                                    <div class="modal-footer d-flex" style="border: none;margin-top: 80px">

                                        <div class="icons" style="margin-right: auto;">
                                            <a href="" class="icon-nota"><ion-icon
                                                    name="calendar-outline"></ion-icon></a>
                                            <button type="button" class="icon-nota"
                                                style="border: none; background: transparent" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <ion-icon name="color-palette-outline"></ion-icon>
                                            </button>
                                            <ul class="dropdown-menu" id="colors-dropdown"
                                                style="height: 17vh; width: 33vh; border: none">
                                                <div class="container p-3">
                                                    <div class="title-colors text-align-center">
                                                        <h4 style="font-size: 20px">Selecione a cor de sua nota</h4>
                                                    </div>
                                                    <div class="container justify-content-center align-items-center">

                                                        <input type="radio" class="color-checkbox" id="color1"
                                                            value="#F95B99" name="cor_selecionada"><label for="color1">
                                                            <div class="color-option"
                                                                style="background-color: #F95B99;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color2"
                                                            value="#CB6CE6" name="cor_selecionada"><label for="color2">
                                                            <div class="color-option"
                                                                style="background-color: #CB6CE6;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color3"
                                                            value="#8C52FF" name="cor_selecionada"><label for="color3">
                                                            <div class="color-option"
                                                                style="background-color: #8C52FF;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color4"
                                                            value="#AA8DE4" name="cor_selecionada"><label for="color4">
                                                            <div class="color-option"
                                                                style="background-color: #AA8DE4;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color5"
                                                            value="#FF5757" name="cor_selecionada"><label for="color5">
                                                            <div class="color-option"
                                                                style="background-color: #FF5757;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color6"
                                                            value="#ffff00" name="cor_selecionada"><label for="color6">
                                                            <div class="color-option"
                                                                style="background-color: #ffff00;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color7"
                                                            value="#FFCF52" name="cor_selecionada"><label for="color7">
                                                            <div class="color-option"
                                                                style="background-color: #FFCF52;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color8"
                                                            value="#FF914D" name="cor_selecionada"><label for="color8">
                                                            <div class="color-option"
                                                                style="background-color: #FF914D;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color9"
                                                            value="#36DF32" name="cor_selecionada"><label for="color9">
                                                            <div class="color-option"
                                                                style="background-color: #36DF32;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color10"
                                                            value="#397D1D" name="cor_selecionada"><label for="color10">
                                                            <div class="color-option"
                                                                style="background-color: #397D1D;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color11"
                                                            value="#000" name="cor_selecionada"><label for="color11">
                                                            <div class="color-option" style="background-color: #000;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color12"
                                                            value="#bababa" name="cor_selecionada"><label for="color12">
                                                            <div class="color-option" style="background-color: #bababa">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </ul>
                                            <label class="icon-nota" for="input-arquivo" style="cursor: pointer">
                                                <ion-icon name="folder-outline" style="font-size: 20px;"></ion-icon>
                                                <input type="file" id="input-arquivo" class="visually-hidden"
                                                    style="width: 20px;">
                                            </label>
                                            <a href="" class="icon-nota"><ion-icon name="text-outline"></ion-icon></a>
                                        </div>
                                        <input type="hidden" name="txtcor" id="txtcor">
                                        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">
                                        <input type="submit" class="btn" id="postar-nota" name="btnconfirmar"
                                            value="Salvar Nota">

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
            <a id="notifications" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <ion-icon name="notifications-outline"
                    style="z-index: 99; font-size: 25px; margin-top: 08px; ">
                </ion-icon>
            </a>
            <div class="dropdown">
                <img src="../img/5.jpeg" class="mini-profile-img" height="40" class="" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                </img>
                <ul class="dropdown-menu menu-user-navbar">
                    <div class="container">

                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER--> <!--USER-->
                        <div class="modal-head d-flex mt-3">
                            <img src="../img/5.jpeg" class="profile-img" height="80" class="" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">

                            <div class="d-flex flex-column" style="margin-left: 10px">
                                <div class="d-flex align-items-center" style="width: 23vh">
                                    <h4 class="user-name mt-2" id="username"><?php echo $nomeUsuario; ?></h4>
                                    <a href="logout.php" class="logout-btn-dropdown"
                                        style="margin-left: auto; text-decoration: none; color:#8C52FF">Logout</a>
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

                        <li class="d-flex mt-3">
                            <div class="container">
                                <div class="" style="margin-top: 10px">
                                    <div class="a me-5">
                                        <ion-icon name="help-outline" style="padding-right: 10px"></ion-icon> <a
                                            href="#">Ajuda</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr style="opacity: 0.1">
                        <button type="button" class="btn mt-0 change-infos" data-bs-toggle="modal"
                            data-bs-target="#modalChanges"><ion-icon name="settings-outline"
                                style="padding-right: 10px"></ion-icon>Alterar
                            Informações
                        </button>
                    </div>
                </ul>
            </div>

            <!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES -->
            <!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES --><!-- MUDAR INFORMAÇÕES -->
            <div class="modal fade" id="modalChanges" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center align-items-center" style="min-height: 90vh;">
                    <div class=" modal-content" style="margin-left: -15px">
                        <div class="container">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="margin-right: 20px; margin-top: 15px;"></button>
                        </div>
                        <div class="modal-body text-center justify-content-center align-items-center">
                            <h5 style="margin-top: -15px;">Insira sua senha para prosseguir</h6>
                                <input type="password" class="form-control mt-3 mb-3" style="margin-left: -6px">
                                <div class="btn-confirmar-senha">
                                    <div class="forgot-pass mb-3 mt-3">
                                        <a href="#" class="text-dark">Esqueceu a senha?</a>
                                    </div>
                                    <button type="button" class="btn btn-primary text-dark" id="change-info-btn"
                                        style="border:none">Prosseguir</button>
                                </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO-->
            <!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO--><!--SIDEBAR NOTIFICAÇAO-->

            <div class="offcanvas offcanvas-end offcanvas-noti" data-bs-scroll="true" tabindex="0"
                id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
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
                                <a href="" class="btn btn-primary" id="change-info-btn" style="border:none">Ir
                                    até lá</a>
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
    document.addEventListener("DOMContentLoaded", function () {
        // event listener para os checkbox
        var colorCheckboxes = document.querySelectorAll(".color-checkbox");
        colorCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener("click", function () {

                if (checkbox.checked) {

                    var selectedColor = checkbox.value;

                    document.documentElement.style.setProperty('--color-bar-nota', selectedColor);

                    document.getElementById("cor-selecionada").value = selectedColor;

                    colorCheckboxes.forEach(function (otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });
    });

    document.querySelectorAll('.color-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                var color = this.value;
                document.getElementById('color-preview').style.backgroundColor = color;
                document.getElementById('txtcor').value = color;
            }
        });
    });
</script>