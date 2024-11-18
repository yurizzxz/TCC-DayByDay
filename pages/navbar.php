<?php
session_start();
$msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
unset($_SESSION['msg']); 

if (isset($_SESSION['nomeUsuario']) && isset($_SESSION['emailUsuario'])) {
    $nomeUsuario = $_SESSION['nomeUsuario'];
    $emailUsuario = $_SESSION['emailUsuario'];
    $profilePicUrl = isset($_SESSION['profilePicUrl']) && !empty($_SESSION['profilePicUrl'])
        ? $_SESSION['profilePicUrl']
        : '../img/profile/profile_1.png';
}
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "tcc";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

$query = "SELECT id, nome FROM categoria WHERE id_usuario = '" . $_SESSION['idUsuario'] . "'"; 
$result = mysqli_query($conexao, $query);

if (!$result) {
    echo "Erro ao buscar categorias: " . mysqli_error($conexao);
}
?>


<style>
    @keyframes click-animation {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.8);
        }

        100% {
            transform: scale(1);
        }
    }

    .animate-click {
        animation: click-animation 0.1s ease;
    }
</style>

<script>
    console.log("<?php echo isset($_SESSION['profilePicUrl']) ? $_SESSION['profilePicUrl'] : 'Imagem não definida'; ?>");
</script>


<nav class="navbar fixed-top">

    <div class="container-fluid">
        <div class="bg">
            <button id="open_btn">
                <ion-icon id="open_btn_icon" name="reorder-three-outline"
                    style="font-size: 35px; margin-bottom: -5px"></ion-icon>
            </button>
            <a href="?p=notas"><img src="../img/logopng.png" style="margin-top:-15px" height="25" alt=""></a>
        </div>

        <div class="left-items justify-content-center align-items-center d-flex">
            <!--BOTAO MODAL -->
            <div class="create-note">
                <div class="dropdown">
                    <button class="btn modal-btn" type="button" id="dropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        + Criar
                    </button>
                    <ul class="dropdown-menu create-bd" aria-labelledby="dropdown">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalNota">
                                <ion-icon name="add-outline"></ion-icon>
                                Criar Nota
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <ion-icon name="duplicate-outline"></ion-icon>
                                Criar Categoria
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- MODAL NOTA -->
                <div class="modal fade align-items-center justify-content-center mt-5" id="modalNota" tabindex="-1"
                    aria-labelledby="modalNotaLabel" aria-hidden="true">
                    <div class="container">
                        <div class="modal-dialog" style="padding-top: 40px">

                            <div class="modal-content modal-width justify-content-center nota-content"
                                style="border: none">

                                <form id="updateNoteForm" action="salvar_nota.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="modal-body d-flex flex-column">
                                        <div class="d-flex justify-content-between" style="margin-top: 0px">
                                            <input type="text" class="form-control " name="txttitulo" required
                                                placeholder="Insira um título">
                                            <button type="button" class="btn-cl close-button" data-bs-dismiss="modal"
                                                aria-label="Close"
                                                style="margin-right: 20px; margin-top: 0;">close</button>
                                        </div>
                                        <input type="text" class="form-control hidden" name="txtsubtitulo"
                                            placeholder="Insira um subtítulo">
                                        <textarea resize class="form-control" name="txtconteudo" cols="30"
                                            style="resize: none; padding-top: 5px" required rows="10"
                                            placeholder="Começe aqui..."></textarea>
                                    </div>
                                    <div class="modal-footer" style="padding-inline: 10px 27px !important;
    display: flex;
    justify-content: space-between;
    border: none;
    margin-top: 40px;"><select name="id_categoria" id="categoria" class="form-control select-categoria mb-3">
                                            <option value="">Selecione uma categoria</option>
                                            <?php
                                        
                                        if (mysqli_num_rows($result) > 0) {
                                        
                                            while ($categoria = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $categoria['id'] . "'>" . htmlspecialchars($categoria['nome']) . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>Nenhuma categoria encontrada</option>";
                                        }
                                        ?>
                                        </select>


                                        <div class="icons" style="display: flex;align-items: center;gap: 20px;">


                                            <button type="button" class="icon-nota" id="dropdownTriggerColor"
                                                style="border: none; background: transparent; font-size: 30px;">
                                                <ion-icon name="color-palette-outline"></ion-icon>
                                            </button>
                                            <ul id="dropdownMenuColor" class="dropdown-menu" id="colors-dropdown"
                                                style="height: 170px; width: 320px; border: none">
                                                <div class="container p-3">
                                                    <div class="title-colors text-center">
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
                                                            value="#00FFFF" name="cor_selecionada"><label for="color11">
                                                            <div class="color-option"
                                                                style="background-color: #00FFFF;">
                                                            </div>
                                                        </label>
                                                        <input type="radio" class="color-checkbox" id="color12"
                                                            value="#3091FF" name="cor_selecionada"><label for="color12">
                                                            <div class="color-option" style="background-color: #3091FF">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </ul>
                                            <label class="icon-nota" for="input-arquivo" style="cursor: pointer; height: 35px;">
                                                <ion-icon name="folder-outline" style="font-size: 30px;"></ion-icon>
                                                <input type="file" id="input-arquivo" class="visually-hidden"
                                                    name="arquivo" style="width: 20px;">
                                            </label>
                                        </div>
                                        <input type="hidden" name="txtcor" id="txtcor">
                                        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">
                                        <input type="submit"
                                            style="color: var(--purple); background: none; border: none; font-size: 30px;"
                                            class="material-symbols-outlined" id="postar-nota" name="btnconfirmard"
                                            value="Send">

                                </form>

                            </div>
                            <!--file-->
                            <div id="file-name" class="file-add"></div>
                        </div>

                        <script>
                            document.getElementById('input-arquivo').addEventListener('change', function() {
                                const fileInput = document.getElementById('input-arquivo');
                                const fileName = fileInput.files[0].name;
                                document.getElementById('file-name').textContent = `Arquivo selecionado: ${fileName}`;
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>

        <!--PERFIL + NOTIFICAÇAO-->
        <div class="perfil-noti d-flex">
            <a id="notifications" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <ion-icon name="notifications-outline"
                    style="z-index: 99; font-size: 25px; margin-top: 08px; cursor: pointer">
                </ion-icon>
            </a>
        </div>

        <div class="offcanvas offcanvas-end" style="margin-top: 50px;" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasWithBothOptionsLabel">Notificações</h5>
                <button type="button" class="btn-cl" data-bs-dismiss="offcanvas" aria-label="Close">close</button>
            </div>
            <div class="offcanvas-body">
                <?php include 'mostrar_eventos.php'; ?>
            </div>
        </div>


        <div class="dropdown">
            <img id="dropdownTrigger" src="<?php echo $profilePicUrl; ?>?v=<?php echo time(); ?>"
                class="mini-profile-img" height="40" type="button">
            <ul id="dropdownMenu" class="dropdown-menu menu-user-navbar">
                <div class="container">
                    <div class="modal-head d-flex mt-3">
                        <img id="dropdownProfileImage" src="<?php echo $profilePicUrl; ?>?v=<?php echo time(); ?>"
                            class="profile-img" height="80">
                        <div class="d-flex flex-column" style="margin-left: 15px; width: 100%;">
                            <div class="d-flex align-items-center" style="width: 100%; justify-content: space-around">
                                <h4 class="user-name mt-2" id="username"><?php echo $nomeUsuario; ?></h4>
                                <a href="logout.php" class="material-symbols-outlined"
                                    style="margin-left: auto; text-decoration: none; color:#8C52FF; font-size: 30px;">Logout</a>
                            </div>
                            <p class="user-mail" id="usermail" style="margin-top: -5px; text-align: left">
                                <?php echo $emailUsuario; ?>
                            </p>
                        </div>
                    </div>
                    <li class="d-flex mt-3">
                        <div class="container ">
                            <div class=" d-flex flex-column" style="gap: 20px; margin-top: 10px">
                                <div class="a d-flex">
                                    <ion-icon name="help-outline"
                                        style="padding-right: 10px; font-size: 20px;"></ion-icon>
                                    <a href="../landingpage/index.php?p=home">Ajuda</a>
                                </div>
                                <div class="form-check dark-mode-layout d-flex">
                                    <ion-icon name="moon-outline"></ion-icon>
                                    <p class="dark-mode-text" style="padding-left: 10px; margin-right: auto">Modo Escuro
                                    </p>
                                    <input type="checkbox" id="chk" />
                                    <label for="chk" class="switch">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <hr style="opacity: 0.1">
                    <button type="button" class="btn mt-0 change-infos" data-bs-toggle="modal"
                        data-bs-target="#modalChanges">
                        <ion-icon name="settings-outline" style="padding-right: 10px"></ion-icon>Alterar Informações
                    </button>
                </div>
            </ul>
        </div>

        <!-- MUDAR INFORMAÇÕES -->
        <div class="modal fade" id="modalChanges" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center align-items-center" style="min-height: 90vh;">
                <div class="modal-content modal-escuro">
                    <div class="container">
                        <button type="button" class="btn-cl" data-bs-dismiss="modal" aria-label="Close"
                            style="margin-right: 20px; margin-top: 15px;"></button>
                    </div>
                    <div class="modal-body text-center justify-content-center align-items-center">
                        <h5 style="margin-top: -15px;">Insira sua senha para prosseguir</h5>
                        <form id="passwordForm" method="post" action="validarsenha.php">
                            <input type="password" class="form-control mt-3 mb-3" style="margin-left: -6px"
                                id="inputPassword" name="password">
                            <?php if (!empty($msg)): ?>
                                <p class="text-danger"><?php echo $msg; ?></p>
                            <?php endif; ?>
                            <div class="btn-confirmar-senha">
                                <div class="forgot-pass mb-3 mt-3">
                                    <a href="#">Esqueceu a senha?</a>
                                </div>
                                <button type="submit" class="btn btn-primary" id="change-info-btn"
                                    style="border:none">Prosseguir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--SIDEBAR NOTIFICAÇAO-->

        <div class="offcanvas offcanvas-end offcanvas-noti" data-bs-scroll="true" tabindex="0"
            id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="container">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Notificações</h5>
                    <button type="button" class="btn-cl" data-bs-dismiss="offcanvas">close</button>
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

<div class='popup-overlay' id='popup-overlay'></div>
<div class='popup' id='popup'>
    <p id='popup-message'></p>
</div>



<!--scripts-->
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyDp_PN6SK2vmkEUmMRLu_nghKiw0iLWBGU",
        authDomain: "notificacao-6ea18.firebaseapp.com",
        projectId: "notificacao-6ea18",
        storageBucket: "notificacao-6ea18.appspot.com",
        messagingSenderId: "664596901045",
        appId: "1:664596901045:web:21696e64f9be5614c762fc",
        measurementId: "G-FPY2TFZW6R"
    };
    const app = initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/firebase-messaging-sw.js')
            .then(function(registration) {
                console.log('Service Worker registrado com sucesso:', registration);
                messaging.useServiceWorker(registration);
            })
            .catch(function(err) {
                console.log('Falha ao registrar o Service Worker:', err);
            });
    }

    messaging.requestPermission()
        .then(function() {
            console.log('Permissão para notificações concedida.');
            return messaging.getToken();
        })
        .then(function(token) {
            console.log('Token FCM:', token);
        })
        .catch(function(err) {
            console.log('Erro ao obter permissão para notificações', err);
        });

    messaging.onMessage(function(payload) {
        console.log('Mensagem recebida: ', payload);
        const notificationTitle = payload.notification.title;
        const notificationOptions = {
            body: payload.notification.body,
            icon: '/firebase-logo.png'
        };

        new Notification(notificationTitle, notificationOptions);
    });

    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeButton = document.getElementById('theme');

        themeButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    });

    document.addEventListener("DOMContentLoaded", function() {

        var visualizarIdDt = document.getElementById("visualizar_id").previousElementSibling;
        var visualizarIdDd = document.getElementById("visualizar_id");

        visualizarIdDt.style.display = "none";
        visualizarIdDd.style.display = "none";
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputArquivo = document.getElementById('input-arquivo');
        const fileNameDisplay = document.getElementById('file-name');

        inputArquivo.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                fileNameDisplay.textContent = `Arquivo: ${file.name}`;
                fileNameDisplay.style.display = 'block';
            } else {
                fileNameDisplay.textContent = 'Nenhum arquivo selecionado';
                fileNameDisplay.style.display = 'none';
            }
        });

        if (inputArquivo.files.length === 0) {
            fileNameDisplay.style.display = 'none';
        } else {
            fileNameDisplay.style.display = 'block';
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdowns = [{
                triggerId: 'dropdownTrigger',
                menuId: 'dropdownMenu'
            },
            {
                triggerId: 'dropdownTriggerEdit',
                menuId: 'dropdownMenuEdit'
            },
            {
                triggerId: 'dropdownTriggerColor',
                menuId: 'dropdownMenuColor'
            }
        ];

        dropdowns.forEach(({
            triggerId,
            menuId
        }) => {
            const dropdownTrigger = document.getElementById(triggerId);
            const dropdownMenu = document.getElementById(menuId);

            function toggleDropdown() {
                dropdownMenu.classList.toggle('show');
            }

            dropdownTrigger.addEventListener('click', function() {
                toggleDropdown();
            });

            document.addEventListener('click', function(event) {
                if (!dropdownTrigger.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var colorCheckboxes = document.querySelectorAll(".color-checkbox");
        colorCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener("click", function() {

                if (checkbox.checked) {
                    var selectedColor = checkbox.value;

                    document.querySelector('.nota-content').style.setProperty('--color-bar-nota',
                        selectedColor);

                    document.getElementById("txtcor").value = selectedColor;

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

    document.getElementById("open_btn").addEventListener("click", function() {
        const icon = document.getElementById("open_btn_icon");
        icon.classList.toggle("rotatee"); // Adiciona ou remove a rotação
    });
</script>

<script>
    function addClickAnimation(element) {
        element.classList.add('animate-click');
        setTimeout(() => {
            element.classList.remove('animate-click');
        }, 200);
    }

    const notifications = document.getElementById('notifications');
    if (notifications) {
        notifications.addEventListener('click', function() {
            addClickAnimation(this);
        });
    }

    const buttons = document.querySelectorAll('.btn-cl');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            addClickAnimation(this);
        });
    });

    const openBtn = document.getElementById('open_btn');
    if (openBtn) {
        openBtn.addEventListener('click', function() {
            addClickAnimation(this);
        });
    }

    const openBtnIcon = document.getElementById('open_btn_icon');
    if (openBtnIcon) {
        openBtnIcon.addEventListener('click', function(event) {
            addClickAnimation(event.currentTarget.parentElement);
        });
    }

    const dropdownBtn = document.getElementById('dropdown');
    if (dropdownBtn) {
        dropdownBtn.addEventListener('click', function() {
            addClickAnimation(this);
        });
    }

    const dropdownTrigger = document.getElementById('dropdownTrigger');
    if (dropdownTrigger) {
        dropdownTrigger.addEventListener('click', function() {
            addClickAnimation(this);
        });
    };
</script>