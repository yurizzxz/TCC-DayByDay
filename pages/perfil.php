<!doctype html>
<html lang='pt-br'>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
<link href="../css/css.css" rel="stylesheet">
<?php


if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['nomeUsuario'])) {
    header('Location: login.php');
    exit();
}

$nomeUsuario = $_SESSION['nomeUsuario'];

$id_usuario = $_SESSION['idUsuario'];



$sql = "SELECT nome, email, profile_pic_url FROM usuarios WHERE id = '$id_usuario'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $email = $row['email'];
    $profilePicUrl = $row['profile_pic_url'];
} else {
    echo 'Erro ao carregar os dados do usuário.';
    exit();
}


$profilePicUrl = !empty($profilePicUrl) ? $profilePicUrl : '../img/profile/profile_1.png';

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$conn->close();
?>

<style>
    .profile-content {
        color: var(--text-color);
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        margin-top: 15dvh;
    }

    .button-close {
        padding-top: 70px;
    }

    .user-pic {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .user-pic img {
        width: 100%;
        max-width: 450px;
        margin-top: 20px;
    }

    .profile-pic-user {
        background-color: black;
        width: 100%;
    }

    .user-infos input {
        width: 100%;
        padding: 10px;
        border: none;
        padding-left: 2px;
        background-color: transparent;
        border-bottom: 1px solid var(--button-hover);
        color: gray;
    }

    .user-infos input:focus {
        outline: none;
    }

    .btn-save-user {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        margin-bottom: 20px;
        background-color: #8C52FF;
        background: linear-gradient(to left, #7c3bff, #8C52FF);
        color: white;
    }
</style>
</head>

<body>
    <div class="container profile-content">
        <div class="row">
            <div class="col-md-5 d-flex flex-column align-items-center">
                <div class='user-pic'>
                    <button type="button" style="border: unset; background: unset; padding: unset"
                        data-bs-toggle="modal" data-bs-target="#imageModal">
                        <img id="preview" style="border-radius: 300px;" src="<?php echo $profilePicUrl; ?>"
                            name="profile_pic-user" class="profile-pic-user">
                    </button>
                </div>
                <p class='textmuted mt-3' style='font-size: 12px'>// clique para alterar sua foto de exibição</p>
            </div>

            <div class="col-md-7">
                <form id="profileForm" action='atualizarperfil.php' method='post' enctype='multipart/form-data'>
                    <div class='user-infos'>
                        <div class='user-name'>
                            <h6>Nome</h6>
                            <input type='text' name='nome' value="<?php echo ($nome); ?>" required>
                        </div>
                        <div class='user-email mt-4'>
                            <h6>Email</h6>
                            <input type='email' name='email' value="<?php echo ($email); ?>" required>
                        </div>
                        <div class='user-pass mt-4'>
                            <h6>Nova Senha</h6>
                            <div style="position: relative;">
                                <input type='password' id="newPassword" name='new_password' required>
                                <span onclick="togglePasswordVisibility('newPassword', 'toggleNewPasswordIcon')"
                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted);">
                                    <span class="material-symbols-outlined"
                                        id="toggleNewPasswordIcon">visibility_off</span>
                                </span>
                            </div>
                        </div>
                        <div class='confirm-user-pass mt-4'>
                            <h6>Confirme a Nova Senha</h6>
                            <div style="position: relative;">
                                <input type='password' id="confirmPassword" name='confirm_password'>
                                <span onclick="togglePasswordVisibility('confirmPassword', 'toggleConfirmPasswordIcon')"
                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted);">
                                    <span class="material-symbols-outlined"
                                        id="toggleConfirmPasswordIcon">visibility_off</span>
                                </span>
                            </div>
                        </div>

                        <input type="hidden" id="operationType" name="operationType" value="">

                        <input type="hidden" id="selectedProfilePic" name="profile_pic_url"
                            value="<?php echo $profilePicUrl; ?>">
                        <div class='btn-save' style='margin-top: 30px'>
                            <button class='btn-save-user' type='button' onclick="saveAndRedirect();">Confirmar</button>
                        </div>
                    </div>
                </form>
                <button class='text-danger w-100 text-center' style='background: none; border: none;'
                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Excluir Conta</button>

                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja excluir sua conta?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <form action='deletarperfil.php' method='post'>
                                    <button type="submit" class="btn btn-danger">Excluir Conta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='popup-overlay' id='popup-overlay'></div>
    <div class='popup' id='popup'>
        <p id='popup-message'></p>
    </div>

    <?php if (!empty($mensagem)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var message = <?php echo json_encode($mensagem); ?>;
                document.getElementById('popup-message').innerText = message;
                document.getElementById('popup-overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';
                setTimeout(function () {
                    document.getElementById('popup-overlay').style.display = 'none';
                    document.getElementById('popup').style.display = 'none';
                }, 3000);
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_SESSION['message_error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var message = <?php echo json_encode($_SESSION['message_error']); ?>;
                document.getElementById('popup-message').innerText = message;
                document.getElementById('popup-overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';
                setTimeout(function () {
                    document.getElementById('popup-overlay').style.display = 'none';
                    document.getElementById('popup').style.display = 'none';
                }, 3000);
            });
        </script>
        <?php
        unset($_SESSION['message_error']);
    endif; ?>

    <!-- Modal de seleção de imagem -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0">
                    <div class="title">
                        <h5 class="modal-title" id="imageModalLabel">Escolha uma Foto de Perfil</h5>
                        <p class="textmuted">Selecione a foto de perfil que você se identifica!</p>
                    </div>
                    <button type="button" style="margin-left: 20%;" class="btn-cl" data-bs-dismiss="modal"
                        aria-label="Close">close</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_1.png" style="border-radius: 90px;" alt="Imagem 1"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_1.png')">
                        </div>
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_2.png" style="border-radius: 90px;" alt="Imagem 2"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_2.png')">
                        </div>
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_3.png" style="border-radius: 90px;" alt="Imagem 3"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_3.png')">
                        </div>
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_4.png" style="border-radius: 90px;" alt="Imagem 4"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_4.png')">
                        </div>
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_5.png" style="border-radius: 90px;" alt="Imagem 5"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_5.png')">
                        </div>
                        <div class="col-4 text-center mb-3">
                            <img src="../img/profile/profile_6.png" style="border-radius: 90px;" alt="Imagem 6"
                                class="img-thumbnail" onclick="selectImage('../img/profile/profile_6.png')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedImageSrc = '';
        let operationType = '';

        // Função para atualizar a imagem em todos os lugares necessários
        function updateImage(imageSrc) {
            selectedImageSrc = imageSrc;
            document.getElementById('preview').src = imageSrc; // Atualiza a pré-visualização
            document.getElementById('selectedProfilePic').value = imageSrc; // Atualiza o campo oculto
            operationType = 'updatePhoto'; // Define a operação como atualização de foto
        }

        // Função para selecionar uma imagem pré-definida (ex: ao clicar em uma imagem pré-definida no modal)
        function selectImage(imageSrc) {
            updateImage(imageSrc); // Atualiza a imagem

            // Fechar o modal automaticamente após a seleção da imagem
            const modalElement = document.getElementById('imageModal');
            const modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide(); // Fecha o modal
            }
        }

        // Função para salvar e redirecionar (exibe a mensagem de confirmação e redireciona depois de um tempo)
        function saveAndRedirect() {

            // Manter o pop-up visível por 3 segundos antes de redirecionar
            setTimeout(function () {
                document.getElementById('popup-overlay').style.display = 'none';
                document.getElementById('popup').style.display = 'none';
                document.getElementById('profileForm').submit(); // Envia o formulário
            }, 3000);
        }

        // Exemplo de chamada da função de salvar quando a imagem é carregada
        document.getElementById('profileForm').onsubmit = function () {
            if (!selectedImageSrc) {
                operationType = 'updateInfo'; // Atualiza a operação para a atualização de informações
            }
        }

        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.innerText = "visibility"; // Ícone para exibir a senha
            } else {
                input.type = "password";
                icon.innerText = "visibility_off"; // Ícone para ocultar a senha
            }
        }

    </script>

    <script type='module' src='https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js'></script>
    <script nomodule src='https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js'></script>
    <?php include_once 'scripts.php'; ?>
</body>