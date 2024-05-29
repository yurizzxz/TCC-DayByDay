<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

// Verifica se o ID da nota foi fornecido
if (!isset($_GET['nota_id'])) {
    header('Location: index.php');
    exit();
}

// Obtém o ID do usuário da sessão
$id_usuario = $_SESSION['idUsuario'];

// Obtém o ID da nota da query string
$nota_id = $_GET['nota_id'];

// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta para obter os detalhes da nota
$sql = "SELECT * FROM nota WHERE id_usuario = '$id_usuario' AND id = '$nota_id'";
$result = $conn->query($sql);

// Verifica se a nota existe e pertence ao usuário logado
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $titulo = $row['titulo'];
    $subtitulo = $row['subtitulo'];
    $conteudo = $row['conteudo'];
    $cor = $row['cor'];
} else {
    // Se a nota não existir ou não pertencer ao usuário, redireciona para a página de notas
    header('Location: index.php');
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota <?php echo $titulo; ?></title>
    <?php include_once 'header.php'; ?>
    <style>
        .color-checkbox {
            display: none;
            /* Escondendo os checkboxes */
        }

        /* Estilo base para o círculo */
        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            /* Formato de círculo */
            cursor: pointer;
            /* Mudança de cursor para indicar interatividade */
            border: 2px solid #fff;
            /* Borda branca para destacar */
            margin: 5px;
            /* Espaçamento entre os círculos */
        }

        /* Estilo quando o círculo está selecionado */
        .color-checkbox:checked+label .color-option {
            border: 2px solid #000;
            /* Borda preta para indicar seleção */
        }

        #colors-dropdown {
            margin-left: 0px;
            margin-top: -20px
        }
    </style>
</head>

<body>

    <!-- Adicione aqui o formulário de edição da nota -->
    <div class="container w-50" style="margin-top: 20vh">
        <h2>Editar Nota</h2>
        <div class="form-container">
            <form action="atualizar_nota.php" method="post">
                <input type="hidden" name="nota_id" value="<?php echo $nota_id; ?>">
                <div class="form-group">
                    <label for="txttitulo">Título:</label>
                    <input type="text" class="form-control" id="txttitulo" name="txttitulo"
                        value="<?php echo $titulo; ?>">
                </div>
                <div class="form-group">
                    <label for="txtsubtitulo">Subtítulo:</label>
                    <input type="text" class="form-control" id="txtsubtitulo" name="txtsubtitulo"
                        value="<?php echo $subtitulo; ?>">
                </div>
                <div class="form-group">
                    <label for="txtconteudo">Conteúdo:</label>
                    <textarea class="form-control" id="txtconteudo" name="txtconteudo" rows="4"
                        cols="50"><?php echo $conteudo; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Cor:</label>
                    <div class="title-colors text-center">
                        <h4>Selecione a cor de sua nota</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="" class="icon-nota"><ion-icon
                                                    name="calendar-outline"></ion-icon></a>
                                            <button type="button" class="icon-nota"
                                                style="border: none; background: transparent" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <ion-icon name="color-palette-outline"></ion-icon>
                                            </button>
                        <input type="radio" class="color-checkbox d-none" id="color1" value="#ff0000"
                            name="cor_selecionada" <?php echo ($cor == "#ff0000") ? 'checked' : ''; ?>>
                        <label for="color1">
                            <div class="color-option"
                                style="background-color: #ff0000; width: 20px; height: 20px; margin: 5px;"></div>
                        </label>
                        <input type="radio" class="color-checkbox d-none" id="color2" value="#00ff00"
                            name="cor_selecionada" <?php echo ($cor == "#00ff00") ? 'checked' : ''; ?>>
                        <label for="color2">
                            <div class="color-option"
                                style="background-color: #00ff00; width: 20px; height: 20px; margin: 5px;"></div>
                        </label>
                        <input type="radio" class="color-checkbox d-none" id="color3" value="#0000ff"
                            name="cor_selecionada" <?php echo ($cor == "#0000ff") ? 'checked' : ''; ?>>
                        <label for="color3">
                            <div class="color-option"
                                style="background-color: #0000ff; width: 20px; height: 20px; margin: 5px;"></div>
                        </label>
                        <input type="radio" class="color-checkbox d-none" id="color4" value="#ffff00"
                            name="cor_selecionada" <?php echo ($cor == "#ffff00") ? 'checked' : ''; ?>>
                        <label for="color4">
                            <div class="color-option"
                                style="background-color: #ffff00; width: 20px; height: 20px; margin: 5px;"></div>
                        </label>
                        <input type="radio" class="color-checkbox d-none" id="color5" value="#ff00ff"
                            name="cor_selecionada" <?php echo ($cor == "#ff00ff") ? 'checked' : ''; ?>>
                        <label for="color5">
                            <div class="color-option"
                                style="background-color: #ff00ff; width: 20px; height: 20px; margin: 5px;"></div>
                        </label>
                   
                
                <label class="icon-nota" for="input-arquivo" style="cursor: pointer">
                    <ion-icon name="folder-outline" style="font-size: 20px;"></ion-icon>
                    <input type="file" id="input-arquivo" class="visually-hidden" style="width: 20px;">
                </label>
                <a href="" class="icon-nota"><ion-icon name="text-outline"></ion-icon></a>

                <input type="hidden" name="txtcor" id="txtcor">
                </div> </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                
            </form>
        </div>
    </div>

</body>

</html>