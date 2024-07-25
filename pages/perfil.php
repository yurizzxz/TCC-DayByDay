<!doctype html>
<html lang='pt-br'>
<?php
session_start();

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

$conn->close();
?>

<?php
include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];

$sql = "SELECT profile_pic_url FROM usuarios WHERE id='$id_usuario'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$conn->close();

$default_image = '../img/1.jpeg';
$profile_image = isset($user['profile_pic_url']) && !empty($user['profile_pic_url']) ? $user['profile_pic_url'] : $default_image;
?>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href=''>
    <title>Perfil | <?php echo $nomeUsuario; ?></title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>

    <style>
    body {
        background-color: #F8F6F6;
        height: 100vh;
    }

    .profile-content {
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .button-close {
        padding-top: 70px;
    }

    .user-pic {
        max-width: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: -15px;
    }

    .user-pic img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        background-size: cover
    }

    .profile-pic-user {
        background-color: black;
        width: 100%;
    }

    .user-infos {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .user-infos input {
        width: 240px;
        height: 4vh;
        border: none;
        padding-left: 2px;
        background-color: transparent;
        border-bottom: 1px solid black;
        color: gray;
    }

    .user-infos input:focus {
        outline: none;
    }

    .btn-save-user {
        width: 240px;
        padding: 10px;
        border: none;
        border-radius: 50px;
        font-weight: bold;
        flex-direction: column;
        align-items: center;
        display: flex;
        font-size: 20px;
        margin-bottom: 20px;
        background-color: #8C52FF;
        background: linear-gradient(to left, #7c3bff, #8C52FF);
        color: white;
    }

    @media (max-height: 768px) {
        .button-close {
            padding-top: 25px;
        }

        .profile-pic-user {
            background-color: black;
            padding: 110px;
            margin-bottom: -05px;
        }

        .user-infos h6 {
            font-size: 15px;
        }

        .user-infos input {
            width: 220px;
            font-size: 15px;
        }

        .btn-save-user {
            margin-top: -10px;
        }
    }

    @media (max-height: 700px) {
        .button-close {
            padding-top: 15px;
        }

        .profile-pic-user {
            background-color: black;
            padding: 110px;
            margin-bottom: -05px;
        }

        .user-infos h6 {
            font-size: 14px;
        }

        .user-infos input {
            width: 220px;
            font-size: 14px;
        }

        .btn-save-user {
            margin-top: -10px;
        }
    }

    @media (max-height: 650px) {
        .button-close {
            padding-top: 7px;
        }

        .profile-pic-user {
            background-color: black;
            padding: 110px;
            margin-bottom: -05px;
        }

        .user-infos h6 {
            font-size: 14px;
        }

        .user-infos input {
            width: 220px;
            font-size: 14px;
        }

        .btn-save-user {
            margin-top: -10px;
            margin-bottom: 10px;
        }
    }
    </style>
</head>

<body>
    <div class='profile-content'>

    <form action='atualizarperfil.php' method='post' enctype='multipart/form-data'>
    <div class='button-close'>
        <a href='index.php?p=notas' class='fw-bold'>
            <ion-icon name='close-outline' style='color: black; font-size: 30px'></ion-icon>
        </a>
    </div>
    <div class='user-pic'>
        <input type='file' class="d-none" name='profile_pic' id='profile_pic_input'
            accept='.png, .jpg, .jpeg, .webp' onchange="previewImage(event)">
        <label for='profile_pic_input'>
            <img id="preview" src='<?php echo $profile_image; ?>' name="profile_pic-user" class='profile-pic-user' alt='Imagem de Perfil'>
        </label>
    </div>

    <div class='user-infos mt-3'>
        <p class='text-muted mt-3' style='font-size: 12px'>// clique para alterar sua foto de exibição</p>
        <div class='user-name'>
            <h6 style='margin-bottom: -2px'>Nome</h6>
            <input type='text' name='nome' value="<?php echo htmlspecialchars($nome); ?>" required>
        </div>
        <div class='user-email mt-3'>
            <h6 style='margin-bottom: -2px'>Email</h6>
            <input type='email' name='email' value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class='user-pass mt-3'>
            <h6 style='margin-bottom: -2px'>Nova Senha</h6>
            <input type='password' name='new_password'>
        </div>
        <div class='confirm-user-pass mt-3'>
            <h6 style='margin-bottom: -2px'>Confirme a Nova Senha</h6>
            <input type='password' name='confirm_password'>
        </div>
    </div>
    <div class='btn-save' style='margin-top: 30px'>
        <button class='btn-save-user' type='submit'>Confirmar</button>
    </div>
</form>

        <form action='deletarperfil.php' method='post' class='d-flex justify-content-center' style='margin-top: -5px;'>
            <button type='submit' class='text-danger text-center' style='background: none; border: none;'>Excluir
                Conta</button>
        </form>

        <!-- Mensagem de Sucesso -->
        <?php if ( isset( $_SESSION[ 'message_success' ] ) ): ?>
        <div class='alert alert-success mt-3' role='alert'>
            <?php echo $_SESSION[ 'message_success' ]; unset( $_SESSION[ 'message_success' ] ); ?>
        </div>
        <script>
        //setTimeout(function() {
        //  window.location.href = 'index.php?p=notas';
        // }, 5000);
        </script>
        <?php endif; ?>

        <!-- Exibir a mensagem de erro, se existir -->
        <?php if ( isset( $_SESSION[ 'message_error' ] ) ): ?>
        <div class='alert alert-danger mt-3' role='alert'>
            <?php echo $_SESSION[ 'message_error' ]; unset( $_SESSION[ 'message_error' ] ); ?>
        </div>
        <?php endif; ?>

    </div>

    <script>
    // Função para pré-visualizar a imagem selecionada
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