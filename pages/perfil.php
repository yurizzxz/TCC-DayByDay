<!doctype html>
<html lang='pt-br'>
<?php

if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['nomeUsuario'])) {
    header('Location: login.php');
    exit();
}

$nomeUsuario = $_SESSION['nomeUsuario'];

$id_usuario = $_SESSION['idUsuario'];

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

$sql = "SELECT nome, email FROM usuarios WHERE id = '$id_usuario'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row['nome']; 
    $email = $row['email']; 
} else {
    echo 'Erro ao carregar os dados do usuário.';
    exit();
}

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$conn->close();
?>

<?php
include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];

$sql = "SELECT profile_pic_url FROM usuarios WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();

$default_image = '../img/1.jpeg';
$profile_image = isset($user['profile_pic_url']) && !empty($user['profile_pic_url']) ? $user['profile_pic_url'] : $default_image;
?>

<style>
.profile-content {
    color: var(--text-color);
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    height: 90dvh;
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

            <form action='atualizarperfil.php' method='post' enctype='multipart/form-data'>
    <div class='user-pic'>
        <input type='file' class="d-none" name='profile_pic' id='profile_pic_input'
               accept='.png, .jpg, .jpeg, .webp' onchange="previewImage(event)">
        <label for='profile_pic_input'>
            <img id="preview" src='<?php echo htmlspecialchars($profile_image); ?>' name="profile_pic-user"
                 class='profile-pic-user' alt='Imagem de Perfil'>
        </label>
    </div>
                </form>
                <p class='text-muted mt-3' style='font-size: 12px'>// clique para alterar sua foto de exibição</p>
            </div>
            <div class="col-md-7">
                <form action='atualizarperfil.php' method='post' enctype='multipart/form-data'>
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
                            <input type='password' name='new_password'>
                        </div>
                        <div class='confirm-user-pass mt-4'>
                            <h6>Confirme a Nova Senha</h6>
                            <input type='password' name='confirm_password'>
                        </div>
                        <div class='btn-save' style='margin-top: 30px'>
                            <button class='btn-save-user' type='submit'>Confirmar</button>
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

                <div class='popup-overlay' id='popup-overlay'></div>
        <div class='popup' id='popup'>
            <p id='popup-message'></p>
        </div>

        <?php if (!empty($mensagem)): ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var message = <?php echo json_encode($mensagem); ?>;
            document.getElementById('popup-message').innerText = message;
            document.getElementById('popup-overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
            setTimeout(function() {
                document.getElementById('popup-overlay').style.display = 'none';
                document.getElementById('popup').style.display = 'none';
            }, 3000);
        });
        </script>
        <?php endif; ?>


                <!-- Exibir a mensagem de erro, se existir -->
                <?php if (isset($_SESSION['message_error'])): ?>
                <div class='alert mt-3' role='alert' style="color: red">
                    <?php echo $_SESSION['message_error']; unset($_SESSION['message_error']); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
    // pré-visualizar a imagem selecionada
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
<script type='module' src='https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js'></script>
<script nomodule src='https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js'></script>
<? include_once 'scripts.php' ?>