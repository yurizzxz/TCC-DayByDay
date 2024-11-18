<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('#', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];

$sql_categoria = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
$result_categoria = $conn->query($sql_categoria);

$options = '';

if ($result_categoria->num_rows > 0) {
    $options .= "<option value='todas'>Todas as Categorias</option>";
    while ($row = $result_categoria->fetch_assoc()) {
        $options .= "<option value='{$row['id']}'>{$row['nome']}</option>";
    }
} else {
    $options = "<option value='all'>Todas as categorias</option>";
}

$sql_arquivo = "SELECT id, arquivo FROM nota WHERE id_usuario = '$id_usuario'";
$result_arquivo = $conn->query($sql_arquivo);

$arquivos = [];

if ($result_arquivo->num_rows > 0) {
    while ($row = $result_arquivo->fetch_assoc()) {
        $arquivos[] = $row; 
    }
}

$conn->close();

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$arquivo_para_exibir = !empty($arquivos) ? $arquivos[0]['arquivo'] : '';

echo "<script>
    console.log('ID do Usuário: $id_usuario');
    console.log('Notas:', " . json_encode($arquivos) . ");
    console.log('Arquivo para exibir:', '" . addslashes($arquivo_para_exibir) . "');
</script>";
?>

<style>
    .content-truncated {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .muted {
        color: #a0a0a0;
    }

    .modal-content {
        position: relative;
        display: flex;
    }

    #dropdown-menu {
        top: 100%;
        left: 70;
        z-index: 1000;
    }

    @keyframes click-animation {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.7);
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
    function validateForm() {
        const radios = document.querySelectorAll('input[name="cor_escolhida"]');
        let formValid = false;
        let selectedColor = '';
        let i = 0;
        while (!formValid && i < radios.length) {
            if (radios[i].checked) {
                formValid = true;
                selectedColor = radios[i].value;
            }
            i++;
        }
        if (!formValid) {
            alert("Por favor, selecione uma cor.");
            return false;
        } else {
            console.log("Cor selecionada: ", selectedColor);
            return true;
        }
    }
</script>

<div class="container mt-5" id="note-ctner">
    <di class="container">
        <div id="select-note">
            <select class="mb-3" id="categorySelect" name="categorySelect">
                <?php echo $options; ?>
            </select>
        </div>
        <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-create-cat" role="document">
                <div class="modal-content my-modal">

                    <div class="head-modal" style="border-bottom: none">
                        <h5 class="modal-title" id="myModalLabel">Adicionar Categoria</h5>
                        <button type="button" class="btn-cl" data-bs-dismiss="modal" aria-label="Close">close</button>
                    </div>

                    <div class="modal-body p-0">
                        <form id="categoryForm" action="salvar_categoria.php" onsubmit="return validateForm()"
                            method="post">
                            <div class="form-group">
                                <label for="categoryName" class="hidden">Nome</label>
                                <input type="text" class="form-control" id="categoryName" name="nome_categoria"
                                    placeholder="Digite o nome da categoria" required>
                            </div>
                            <div class="form-group mt-4" id="cubo-colors">
                                <label>Cor:</label><br>
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorF95B99" value="#F95B99"
                                            name="cor_escolhida">
                                        <label for="colorF95B99">
                                            <div class="color-option" style="background-color: #F95B99;"
                                                onclick="selectColor('colorF95B99')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorCB6CE6" value="#CB6CE6"
                                            name="cor_escolhida">
                                        <label for="colorCB6CE6">
                                            <div class="color-option" style="background-color: #CB6CE6;"
                                                onclick="selectColor('colorCB6CE6')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="color8C52FF" value="#8C52FF"
                                            name="cor_escolhida">
                                        <label for="color8C52FF">
                                            <div class="color-option" style="background-color: #8C52FF;"
                                                onclick="selectColor('color8C52FF')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorAA8DE4" value="#AA8DE4"
                                            name="cor_escolhida">
                                        <label for="colorAA8DE4">
                                            <div class="color-option" style="background-color: #AA8DE4;"
                                                onclick="selectColor('colorAA8DE4')"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                  
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorFF5757" value="#FF5757"
                                            name="cor_escolhida">
                                        <label for="colorFF5757">
                                            <div class="color-option" style="background-color: #FF5757;"
                                                onclick="selectColor('colorFF5757')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorFFFF00" value="#FFFF00"
                                            name="cor_escolhida">
                                        <label for="colorFFFF00">
                                            <div class="color-option" style="background-color: #FFFF00;"
                                                onclick="selectColor('colorFFFF00')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorFFCF52" value="#FFCF52"
                                            name="cor_escolhida">
                                        <label for="colorFFCF52">
                                            <div class="color-option" style="background-color: #FFCF52;"
                                                onclick="selectColor('colorFFCF52')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorFF914D" value="#FF914D"
                                            name="cor_escolhida">
                                        <label for="colorFF914D">
                                            <div class="color-option" style="background-color: #FF914D;"
                                                onclick="selectColor('colorFF914D')"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="color36DF32" value="#36DF32"
                                            name="cor_escolhida">
                                        <label for="color36DF32">
                                            <div class="color-option" style="background-color: #36DF32;"
                                                onclick="selectColor('color36DF32')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="color397D1D" value="#397D1D"
                                            name="cor_escolhida">
                                        <label for="color397D1D">
                                            <div class="color-option" style="background-color: #397D1D;"
                                                onclick="selectColor('color397D1D')"></div>
                                        </label>
                                    </div>

                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="color00FFFF" value="#00FFFF"
                                            name="cor_escolhida">
                                        <label for="color00FFFF">
                                            <div class="color-option" style="background-color: #00FFFF;"
                                                onclick="selectColor('color00FFFF')"></div>
                                        </label>
                                    </div>
                                    <div class="col-3 text-center">
                                        <input type="radio" class="color-checkbox" id="colorbababa" value="#3091FF"
                                            name="cor_escolhida">
                                        <label for="colorbababa">
                                            <div class="color-option" style="background-color: #3091FF;"
                                                onclick="selectColor('color3091FF')"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="push-cat justify-content-end mb-2 text-center align-items-center d-flex"
                                style="gap: 10px">
                                <button class="btn-cat-action material-symbols-outlined"
                                    style="color: var(--purple); background: none; border: none; font-size: 30px;"
                                    id="btn-confirm" type="submit">Send</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div id="notas-container" style="height: auto">
            <?php
            include_once 'conexao.php';

            $id_usuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM nota WHERE id_usuario = '$id_usuario'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-3 mt-3' id='card-layout-note'> ";
                    echo "<form method='get' action='editar_nota.php'>";
                    echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
                    echo "<button type='button' class='btn btn-transparent position-absolute top-0 end-0 m-2' 
                    data-bs-toggle='modal' data-bs-target='#updateNoteModal' 
                    data-id='" . htmlspecialchars($row['id']) . "' 
                    data-user-id='" . htmlspecialchars($id_usuario) . "'
                    data-title='" . htmlspecialchars($row['titulo']) . "' 
                    data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
                    data-content='" . htmlspecialchars($row['conteudo']) . "' 
                    data-color='" . htmlspecialchars($row['cor']) . "' 
                    data-file='" . htmlspecialchars($row['arquivo']) . "'>
                    </button>";
                   
                    echo "</form>";
                    echo "<div class='row'>";

                  
                    echo "<div class='col-sm-1'>";
                    echo "<div class='color-bar' style='background-color: " . htmlspecialchars($row['cor']) . "'></div>";
                    echo "</div>";

                    echo "<div class='col-sm-6' id='content-card-note'>";
                    echo "<div class='card-body' style='margin-top: 7px'>";
                    echo "<h5 class='card-title fw-bold fs-4'>" . htmlspecialchars($row['titulo']) . "</h5>";
                    echo "<p class='card-text' style='font-size: 18px'>" . htmlspecialchars($row['subtitulo']) . "</p>";

                    $content = $row['conteudo'];
                    $limit = 70;
                    $truncated = strlen($content) > $limit ? substr($content, 0, $limit) . '...' : $content;

                    echo "<p class='card-text textmuted'>" . htmlspecialchars($truncated) . "</p>";

                    if (!empty($row['arquivo'])) {
                        echo "<p class='card-text'><a href='/uploads/" . htmlspecialchars($row['arquivo']) . "' style='color: var(--purple);'>" . htmlspecialchars($row['arquivo']) . "</a></p>";
                    }

                    echo "</div>"; 
                    echo "</div>";
                    
                    echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
                    echo "<div class='mini-menu'>";
                    echo "<form method='post' action='excluir_nota.php' id='excluir-form-" . htmlspecialchars($row['id']) . "'>";
                    echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
                    echo "<button type='button' onclick='confirmarExclusao(" . htmlspecialchars($row['id']) . ")' class='btn mini-menu-action'><ion-icon name='trash-outline' style='color: var(--purple); font-size: 30px;' class='three-dots-icon'></ion-icon></button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>"; 
                    echo "</div>";
                }
            } else {
                echo "<div class='mt-2 no-note'>Nenhuma nota encontrada.</div>";
            }

            $conn->close();
            ?>
        </div>
        <script>
        function confirmarExclusao(notaId) {
            const modal = document.createElement('div');
            modal.innerHTML = `
        <div class="modal fade " id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content" style="width: 85%">
                    <div class="modal-header p-4 d-flex" style="justify-content: space-between">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Deseja realmente excluir esta nota?</h5>
                        <button type="button" class="btn-cl" data-bs-dismiss="modal" aria-label="Fechar">close</button>
                    </div>
                    <div class="modal-footer mb-3" style="border: none">
                        <button type="button" class="confirm-exclude" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="confirm-exclude" id="confirmDeleteButton">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    `;

            // Adiciona o modal ao body
            document.body.appendChild(modal);

            // Inicializa o modal com Bootstrap
            const confirmDeleteModal = new bootstrap.Modal(modal.querySelector('#confirmDeleteModal'));
            confirmDeleteModal.show();

            // Define o comportamento do botão de confirmação
            document.getElementById('confirmDeleteButton').onclick = function() {
                // Envia o formulário para excluir a nota
                document.getElementById('excluir-form-' + notaId).submit();
                confirmDeleteModal.hide();
            };

            // Remove o modal do DOM quando for fechado
            modal.addEventListener('hidden.bs.modal', function() {
                modal.remove();
            });
        }
        </script>
        <!-- Modal -->
        <div class="modal fade" id="updateNoteModal" tabindex="-1" aria-labelledby="updateNoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" id="modalDialog" style="padding-top: 50px">
                <div class="modal-content modal-width justify-content-center nota-contentt" style="border: none;">
                    <form id="updateNoteForm" action="atualizar_nota.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body d-flex flex-column">
                            <div class="d-flex justify-content-between" style="margin-top: 0px">
                                <input type="text" class="form-control" name="txttitulo" id="noteTitle" required
                                    placeholder="Insira um título">
                                <button type="button" id="modal-geral" class="btn-cl" data-bs-dismiss="modal"
                                    aria-label="Close" style="margin-right: 20px; margin-top: 0;">close</button>
                            </div>
                            <input type="text" class="form-control hidden" name="txtsubtitulo" id="noteSubtitle"
                                placeholder="Insira um subtítulo">
                            <textarea type="text" id="textarea-conteudo" class="form-control" name="txtconteudo"
                                cols="30" style="resize: none;" required rows="10"
                                placeholder="Comece aqui..."></textarea>

                            <div class="modal-footer p-0"
                            style="border: none; margin-top: 50px;
    margin-bottom: -20px; display: flex; justify-content: space-between;">
                                    <select name="id_categoria" id="categoria" class="form-control select-categoria"
                                        required>
                                        <?php echo $options; ?>
                                    </select>
                                    <div class="icons" style="
    display: flex;
    align-items: center;
    gap: 20px;
">
                                    <button type="button" class="icon-nota" id="dropdownTriggerEdit"
                                        style="border: none; background: transparent; font-size: 30px;">
                                        <ion-icon name="color-palette-outline"></ion-icon>
                                    </button>
                                    <ul id="dropdownMenuEdit" class="dropdown-menu"
                                        style="height: 170px; width: 320px; border: none; margin-left: none;">
                                        <div class="container p-3">
                                            <div class="title-colors text-center">
                                                <h4 style="font-size: 20px">Selecione a cor de sua nota</h4>
                                            </div>
                                            <div class="container justify-content-center align-items-center">
                                                <input type="radio" class="color-checkbox color-radio" id="color1"
                                                    value="#F95B99" name="cor_selecionada">
                                                <label for="color1">
                                                    <div class="color-option" style="background-color: #F95B99;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color2"
                                                    value="#CB6CE6" name="cor_selecionada">
                                                <label for="color2">
                                                    <div class="color-option" style="background-color: #CB6CE6;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color3"
                                                    value="#8C52FF" name="cor_selecionada">
                                                <label for="color3">
                                                    <div class="color-option" style="background-color: #8C52FF;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color4"
                                                    value="#AA8DE4" name="cor_selecionada">
                                                <label for="color4">
                                                    <div class="color-option" style="background-color: #AA8DE4;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color5"
                                                    value="#FF5757" name="cor_selecionada">
                                                <label for="color5">
                                                    <div class="color-option" style="background-color: #FF5757;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color6"
                                                    value="#ffff00" name="cor_selecionada">
                                                <label for="color6">
                                                    <div class="color-option" style="background-color: #ffff00;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color7"
                                                    value="#FFCF52" name="cor_selecionada">
                                                <label for="color7">
                                                    <div class="color-option" style="background-color: #FFCF52;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color8"
                                                    value="#FF914D" name="cor_selecionada">
                                                <label for="color8">
                                                    <div class="color-option" style="background-color: #FF914D;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color9"
                                                    value="#36DF32" name="cor_selecionada">
                                                <label for="color9">
                                                    <div class="color-option" style="background-color: #36DF32;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color10"
                                                    value="#397D1D" name="cor_selecionada">
                                                <label for="color10">
                                                    <div class="color-option" style="background-color: #397D1D;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color11"
                                                    value="#00FFFF" name="cor_selecionada">
                                                <label for="color11">
                                                    <div class="color-option" style="background-color: #00FFFF;">
                                                    </div>
                                                </label>
                                                <input type="radio" class="color-checkbox" id="color12"
                                                    value="#3091FF" name="cor_selecionada">
                                                <label for="color12">
                                                    <div class="color-option" style="background-color: #3091FF;">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </ul>

                                    <label class="file-input-label" for="file-input" style="cursor: pointer;">
                                        <ion-icon name="folder-outline"
                                            style="font-size: 30px;"></ion-icon>
                                        <input type="file" id="file-input" class="visually-hidden" name="arquivo"
                                            style="width: 20px;">
                                    </label>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const fileInput = document.getElementById('file-input');
                                        const uploadFileText = document.getElementById('upload-file-text');
                                        const uploadPreviewButton = document.getElementById('upload-file-preview');
                                        const uploadDropdownMenu = document.getElementById('upload-dropdown-menu');

                                        // Inicialmente, exibe "Nenhum arquivo para upload"
                                        uploadFileText.textContent = "Nenhum arquivo para upload";
                                        uploadPreviewButton.style.display = "none"; // Oculta o painel inicialmente

                                        const MAX_FILENAME_LENGTH = 40; // Define o limite de caracteres para o nome do arquivo

                                        if (fileInput && uploadFileText && uploadPreviewButton) {
                                            fileInput.addEventListener('change', function() {
                                                const file = fileInput.files[0];

                                                if (file) {
                                                    let fileName = file.name;

                                                    // Limita o tamanho do nome do arquivo
                                                    if (fileName.length > MAX_FILENAME_LENGTH) {
                                                        fileName = fileName.substring(0, MAX_FILENAME_LENGTH) + '...'; // Adiciona '...' se o nome for longo
                                                    }

                                                    uploadFileText.textContent = `${fileName}`; // Exibe o nome do arquivo para upload
                                                    uploadPreviewButton.style.display = "flex"; // Exibe o botão de pré-visualização para upload
                                                } else {
                                                    uploadFileText.textContent = "Nenhum arquivo para upload"; // Restaura o texto padrão
                                                    uploadPreviewButton.style.display = "none"; // Oculta o painel se nenhum arquivo for selecionado
                                                }
                                            });
                                        }
                                    });
                                </script>


                                <input type="hidden" name="nota_id" id="nota_id" value="">
                                <input type="hidden" name="txtarquivo" id="txtarquivo" value="">
                                <input type="hidden" name="txtcor" id="txtcorr">
                                <input type="hidden" id="userid" name="userid"
                                    value="<?php echo $_SESSION['idUsuario']; ?>">
                                <input type="submit"
                                    style="color: var(--purple); background: none; border: none; font-size: 25px;"
                                    class="material-symbols-outlined" id="postar-nota" name="btnconfirmar"
                                    value="Send">
                            </div>

                            <div id="selected-file-name" class="file-display hidden"
                                style="margin-top: 10px; color: var(--text-muted); display: none;">
                                Nenhum arquivo associado
                            </div>

                            <!-- Painel de Arquivos para Upload -->
                            <div id="upload-panel" style="margin-top: 20px; display: flex; align-items: center;">
                                <!-- Botão de Pré-visualização de Arquivo para Upload -->
                                <button class="file-preview" id="upload-file-preview"
                                    style="padding: 5px; border: 1px solid var(--text-muted); display: flex; justify-content: flex-start; align-items: center; background: transparent; cursor: pointer; border-radius: 5px; flex: 1; position: relative;">
                                    <div style="margin-left: 0px; display: flex; align-items: center;">
                                        <ion-icon name="cloud-upload-outline"
                                            style="font-size: 24px; margin-right: 5px; color: var(--purple);"></ion-icon>
                                        <span id="upload-file-text"
                                            style="margin-right: 10px; color: var(--text-muted);">Nenhum arquivo
                                            para upload</span>
                                    </div>
                                    <span id="upload-dropdown-toggle"
                                        style="position: absolute; top: 5px; right: 10px; font-size: 15px; color: var(--text-color); cursor: pointer;">•••</span>
                                </button>

                                <!-- Dropdown Menu para Upload -->
                                <ul id="upload-dropdown-menu" class="dropdown-menu"
                                    style="display: none; position: absolute; top: 440px; right: 10px; z-index: 1000; background-color: var(--white);">
                                    <li>
                                        <button class="remove-button dropdown-item" id="remove-btn"
                                            style="display: flex; align-items: center;" data-file-name="">
                                            <ion-icon name="trash" style="color: red; margin-right: 5px;"></ion-icon>
                                            <span style="color: var(--text-color);">Remover Upload</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <!-- Painel de arquivos abaixo do modal-footer -->
                            <div style="margin-top: 20px; display: flex; align-items: center;">
                                <!-- Botão de Pré-visualização de Arquivo -->
                                <button class="file-preview" id="file-preview"
                                    style="padding: 5px; border: 1px solid var(--text-muted); display: flex; align-items: center; background: transparent; cursor: pointer; border-radius: 5px; flex: 1; position: relative;">
                                    <div style="margin-left: 0px; display: flex; align-items: center;">
                                        <ion-icon name="document-outline"
                                            style="font-size: 24px; margin-right: 5px; color: var(--purple);"></ion-icon>
                                        <img id="file-image" src="" alt="Arquivo associado"
                                            style="display: none; max-width: 100%; height: auto;">
                                        <span id="file-text"
                                            style="margin-right: 10px; color: var(--text-muted);">Nenhum arquivo
                                            associado</span>
                                    </div>
                                    <span id="dropdown-toggle"
                                        style="position: absolute; top: 5px; right: 10px; font-size: 15px; color: var(--text-color); cursor: pointer;">•••</span>
                                </button>

                                <!-- Dropdown Menu -->
                                <ul id="dropdown-menu" class="dropdown-menu"
                                    style="display: none; position: absolute; right: 10px; z-index: 1000; background-color: var(--white);">
                                    <!-- Exemplo de botão para cada nota na lista -->
                                    <li>
                                        <button class="delete-button dropdown-item"
                                            style="display: flex; align-items: center;" data-user-id="" data-note-id=""
                                            data-file-name="">
                                            <ion-icon name="trash" style="color: red; margin-right: 5px;"></ion-icon>
                                            <span style="color: var(--text-color);">Excluir</span>
                                        </button>
                                    </li>

                                    <li>
                                        <a href="" id="download-image" class="dropdown-item"
                                            style="display: flex; align-items: center;" download onclick="">
                                            <ion-icon name="download"
                                                style="color: var(--purple); margin-right: 5px;"></ion-icon>
                                            <span style="color: var(--text-color);">Baixar</span>
                                        </a>
                                    </li>

                                    <li>
                                        <button class="dropdown-item hidden" id="open-modal"
                                            style="display: flex; align-items: center;">
                                            <ion-icon name="eye"
                                                style="color: var(--purple); margin-right: 5px;"></ion-icon>
                                            <span style="color: var(--text-color);">Ver Imagem</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal para exibir a imagem -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 25px; display: flex-end;" id="imageModalLabel"></h5>
                        <a id="download-link" href="" download
                            style="margin-left: auto; display: contents;">
                            <ion-icon name="download" style="color: var(--purple); font-size: 26px;"></ion-icon>
                        </a>
                        <button type="button" class="btn-cl" data-bs-dismiss="modal" aria-label=""
                            style="margin-left: auto;">Close</button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center" style="height: 100%;">
                        <img id="modal-image" src="" alt="Imagem"
                            style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');
                updateNoteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;

                    // Pega os valores dos atributos data
                    const noteId = button.getAttribute('data-id');
                    const userId = button.getAttribute('data-user-id');
                    const file = button.getAttribute('data-file');

                    // Pega os elementos de input do modal
                    const noteIdInput = document.getElementById('nota_id');
                    const userIdInput = document.getElementById('userid');
                    const fileInput = document.getElementById('txtarquivo');

                    // Preenche os valores nos inputs do modal
                    noteIdInput.value = noteId;
                    userIdInput.value = userId;
                    fileInput.value = file;
                });
            });

            document.querySelector('.delete-button').addEventListener('click', function() {
                const noteId = this.getAttribute('data-note-id');
                const userId = this.getAttribute('data-user-id');
                const fileName = this.getAttribute('data-file-name');

                // Agora você pode usar esses valores para fazer a requisição de exclusão
                console.log(`Excluindo nota com ID: ${noteId}, Usuário: ${userId}, Arquivo: ${fileName}`);
                // Adicione aqui a lógica para enviar esses dados ao servidor
            });

            document.querySelector('.delete-button').addEventListener('click', function() {
                const noteId = this.getAttribute('data-note-id');
                const userId = this.getAttribute('data-user-id');
                const fileName = this.getAttribute('data-file-name');

                // Confirma a exclusão
                if (confirm(`Deseja realmente excluir o arquivo ${fileName}?`)) {
                    fetch('deletar_arquivo.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                'nota_id': noteId,
                                'user_id': userId,
                                'file_name': fileName
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                // Atualiza a interface para remover a referência ao arquivo excluído
                                document.getElementById('file-text').innerText = 'Nenhum arquivo associado';

                                // Oculta o elemento file-preview
                                document.getElementById('file-preview').style.display = 'none';
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                            alert('Ocorreu um erro ao tentar excluir o arquivo.');
                        });
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');
                updateNoteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;

                    // Pega os valores dos atributos data do botão que abriu o modal
                    const noteId = button.getAttribute('data-id');
                    const userId = button.getAttribute('data-user-id');
                    const fileName = button.getAttribute('data-file');

                    // Pega os elementos de input do modal
                    const noteIdInput = document.getElementById('nota_id');
                    const userIdInput = document.getElementById('userid');
                    const fileInput = document.getElementById('txtarquivo');

                    // Preenche os valores nos inputs do modal
                    noteIdInput.value = noteId;
                    userIdInput.value = userId;
                    fileInput.value = fileName;

                    // Atualiza o botão de exclusão no dropdown com os novos valores
                    const deleteButton = document.querySelector('.delete-button');
                    deleteButton.setAttribute('data-note-id', noteId);
                    deleteButton.setAttribute('data-user-id', userId);
                    deleteButton.setAttribute('data-file-name', fileName);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');

                if (updateNoteModal) { // Verifique se o modal existe
                    updateNoteModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget; // O botão que abriu o modal
                        const fileName = button.getAttribute('data-file'); // Nome do arquivo
                        const filePath = fileName ? '../pages/uploads/' + fileName : ''; // Caminho do arquivo

                        const downloadImageLink = document.getElementById('download-image');

                        if (downloadImageLink) { // Verifique se o link de download existe
                            // Configura o link de download
                            downloadImageLink.href = filePath; // Define o caminho do arquivo para download
                            downloadImageLink.download = fileName; // Define o nome do arquivo para download

                            // Função para download forçado
                            downloadImageLink.onclick = function(event) {
                                event.preventDefault(); // Impede o comportamento padrão do link

                                // Cria um elemento <a> temporário
                                const tempLink = document.createElement('a');
                                tempLink.href = filePath; // Define o caminho do arquivo
                                tempLink.download = fileName; // Define o nome do arquivo

                                // Adiciona o elemento ao DOM
                                document.body.appendChild(tempLink);

                                // Simula o clique no link
                                tempLink.click();

                                // Remove o elemento do DOM
                                document.body.removeChild(tempLink);
                            };
                        } else {
                            console.error("Link de download não encontrado."); // Log de erro
                        }
                    });
                } else {
                    console.error("Modal de atualização não encontrado."); // Log de erro
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');

                if (updateNoteModal) { // Verifique se o modal existe
                    updateNoteModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget; // O botão que abriu o modal
                        const fileName = button.getAttribute('data-file'); // Nome do arquivo
                        const filePath = fileName ? '../pages/uploads/' + fileName : ''; // Caminho do arquivo

                        const downloadImageLink = document.getElementById('download-image');

                        if (downloadImageLink) { // Verifique se o link de download existe
                            // Configura o link de download
                            downloadImageLink.href = filePath; // Define o caminho do arquivo para download
                            downloadImageLink.download = fileName; // Define o nome do arquivo para download
                        } else {
                            console.error("Link de download não encontrado."); // Log de erro
                        }
                    });
                } else {
                    console.error("Modal de atualização não encontrado."); // Log de erro
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');
                const modalDialog = document.getElementById('modalDialog');

                updateNoteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // O botão que abriu o modal
                    const fileName = button.getAttribute('data-file'); // Nome do arquivo
                    const filePath = fileName ? '../pages/uploads/' + fileName : ''; // Caminho do arquivo

                    const fileImage = document.getElementById('file-image');
                    const fileText = document.getElementById('file-text');
                    const filePreview = document.getElementById('file-preview');
                    const downloadLink = document.getElementById('download-link'); // Link de download

                    // Verifica se há um arquivo associado
                    if (fileName) {
                        filePreview.style.display = 'block'; // Mostra o painel do arquivo

                        // Exibe apenas o nome do arquivo
                        fileImage.style.display = 'none'; // Oculta qualquer imagem
                        fileText.textContent = fileName; // Exibe o nome do arquivo
                        fileText.style.display = 'inline'; // Exibe o texto

                        // Atualiza o link de download
                        downloadLink.href = filePath; // Define o href do link de download
                        downloadLink.download = fileName; // Define o nome do arquivo para download
                        downloadLink.style.display = 'flex'; // Garante que o link de download seja exibido
                    } else {
                        filePreview.style.display = 'none'; // Oculta o painel do arquivo se não houver arquivo
                        downloadLink.style.display = 'none'; // Oculta o link de download se não houver arquivo
                    }
                });

                // Fechar o modal e ocultar o painel de arquivos
                updateNoteModal.addEventListener('hide.bs.modal', function() {
                    const filePreview = document.getElementById('file-preview');
                    filePreview.style.display = 'none'; // Oculte o painel ao fechar o modal
                });
            });


            document.addEventListener("DOMContentLoaded", function() {
                const openModalButton = document.getElementById("open-modal"); // Botão para abrir o modal
                const modalImage = document.getElementById("modal-image");
                const modalLabel = document.getElementById("imageModalLabel");
                const downloadLink = document.getElementById("download-link");

                openModalButton.addEventListener("click", function() {
                    const fileName = openModalButton.getAttribute("data-file"); // Obtém o nome do arquivo
                    if (fileName) {
                        const imageUrl = '../pages/uploads/' + fileName; // Constrói o caminho da imagem
                        modalImage.src = imageUrl; // Define a imagem no modal
                        modalLabel.textContent = fileName; // Atualiza o título do modal com o nome do arquivo

                        // Configura o download
                        downloadLink.href = imageUrl; // Define o href do link de download
                        downloadLink.download = fileName; // Define o nome do arquivo para download

                        const modalInstance = new bootstrap.Modal(document.getElementById('imageModal'));
                        modalInstance.show(); // Mostra o modal
                    } else {
                        alert("Nenhuma imagem associada."); // Alerta se não houver imagem
                    }
                });
            });
        </script>

        <script>
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault(); // Impede o envio do formulário
                });
            });


            document.addEventListener("DOMContentLoaded", function() {
                const openModalButton = document.getElementById("open-modal"); // Botão para abrir o modal
                const modalImage = document.getElementById("modal-image");
                const modalLabel = document.getElementById("imageModalLabel");

                openModalButton.addEventListener("click", function() {
                    const fileName = openModalButton.getAttribute("data-file"); // Obtém o nome do arquivo
                    if (fileName) {
                        const imageUrl = '../pages/uploads/' + fileName; // Constrói o caminho da imagem
                        modalImage.src = imageUrl; // Define a imagem no modal
                        modalLabel.textContent = fileName; // Atualiza o título do modal com o nome do arquivo
                        const modalInstance = new bootstrap.Modal(document.getElementById('imageModal'));
                        modalInstance.show(); // Mostra o modal
                    } else {
                        alert("Nenhuma imagem associada."); // Alerta se não houver imagem
                    }
                });

                // Remover backdrop ao fechar
                $('#imageModal').on('hidden.bs.modal', function() {
                    $(this).find('img').attr('src', ''); // Limpa a imagem para não ficar em cache
                    $('.modal-backdrop').remove(); // Remove o backdrop
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateNoteModal = document.getElementById('updateNoteModal');
                const modalDialog = document.getElementById('modalDialog');

                updateNoteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // O botão que abriu o modal
                    const fileName = button.getAttribute('data-file'); // Nome do arquivo
                    const filePath = fileName ? '../pages/uploads/' + fileName : ''; // Caminho do arquivo

                    const fileImage = document.getElementById('file-image');
                    const fileText = document.getElementById('file-text');
                    const filePreview = document.getElementById('file-preview');

                    // Verifica se há um arquivo associado
                    if (fileName) {
                        filePreview.style.display = 'block'; // Mostra o painel do arquivo

                        // Exibe apenas o nome do arquivo
                        fileImage.style.display = 'none'; // Oculta qualquer imagem
                        fileText.textContent = fileName; // Exibe o nome do arquivo
                        fileText.style.display = 'inline'; // Exibe o texto
                    } else {
                        filePreview.style.display = 'none'; // Oculta o painel do arquivo se não houver arquivo
                    }
                });

                // Fechar o modal e ocultar o painel de arquivos
                updateNoteModal.addEventListener('hide.bs.modal', function() {
                    const filePreview = document.getElementById('file-preview');
                    filePreview.style.display = 'none'; // Oculte o painel ao fechar o modal
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const dropdownToggle = document.getElementById("dropdown-toggle");
                const dropdownMenu = document.getElementById("dropdown-menu");
                const fileInput = document.getElementById("file-input"); // Input de arquivo
                const filePreviewButton = document.getElementById("upload-file-preview"); // Botão de pré-visualização de arquivo
                const modalImage = document.getElementById("modal-image"); // Imagem do modal
                const downloadLink = document.getElementById("download-link"); // Link de download do modal

                // Dropdown de upload
                const uploadDropdownToggle = document.getElementById("upload-dropdown-toggle");
                const uploadDropdownMenu = document.getElementById("upload-dropdown-menu");
                const uploadPanel = document.getElementById("upload-panel"); // Painel de upload

                dropdownToggle.addEventListener("click", function(event) {
                    event.stopPropagation();
                    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
                });

                // Impede o envio do formulário ao clicar nos três pontos
                dropdownToggle.addEventListener("click", function(event) {
                    event.preventDefault();
                });

                // Função para prevenir o envio ao clicar nos botões
                function preventSend(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    switch (event.currentTarget.id) {
                        case "upload-file-preview":
                            handleFilePreview();
                            break;
                        case "upload-dropdown-toggle":
                            toggleUploadDropdown();
                            break;
                        case "remove-btn":
                            handleRemove();
                            break;
                    }
                }

                // Adiciona o listener a cada um dos botões
                if (filePreviewButton) {
                    filePreviewButton.addEventListener("click", preventSend);
                }

                if (uploadDropdownToggle) {
                    uploadDropdownToggle.addEventListener("click", preventSend);
                }

                const removeButton = document.getElementById("remove-btn");
                if (removeButton) {
                    removeButton.addEventListener("click", preventSend);
                }

                // Fecha o dropdown ao clicar fora dele
                document.addEventListener("click", function() {
                    dropdownMenu.style.display = "none";
                    uploadDropdownMenu.style.display = "none";
                });

                // Função para abrir o dropdown de upload
                function toggleUploadDropdown() {
                    uploadDropdownMenu.style.display = uploadDropdownMenu.style.display === "block" ? "none" : "block";
                }

                // Função para pré-visualizar o arquivo e abrir o modal
                function handleFilePreview() {
                    const file = fileInput.files[0]; // Obtém o arquivo selecionado

                    if (file) {
                        const reader = new FileReader(); // Cria um novo FileReader
                        reader.onload = function(event) {
                            modalImage.src = event.target.result; // Define a imagem no modal
                            downloadLink.href = event.target.result; // Define o link de download
                            const modal = new bootstrap.Modal(document.getElementById('imageModal')); // Inicializa o modal do Bootstrap
                            modal.show(); // Mostra o modal

                            // Mostra o painel de upload
                            uploadPanel.style.display = "flex"; // Muda o display para flex
                        };
                        reader.readAsDataURL(file); // Lê o arquivo como URL de dados
                    } else {
                        alert("Nenhum arquivo selecionado para pré-visualização."); // Alerta se não houver arquivo
                    }
                }

                function handleRemove() {
                    // Lógica para remover o item
                    if (fileInput.files.length > 0) {
                        fileInput.value = ""; // Limpa o input de arquivo
                        modalImage.src = ""; // Limpa a imagem do modal
                        downloadLink.href = ""; // Limpa o link de download
                        uploadPanel.style.display = "none"; // Esconde o painel de upload
                        alert("Arquivo removido com sucesso!"); // Alerta que o arquivo foi removido
                    } else {
                        alert("Nenhum arquivo para remover."); // Alerta se não houver arquivo selecionado
                    }
                }
            });
        </script>

        <script>
            document.getElementById('dropdown-toggle').addEventListener('click', function() {
                const dropdownMenu = document.getElementById('dropdown-menu');
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            });

            document.getElementById('open-modal').addEventListener('click', function() {
                // Substitua pelo URL real da imagem ou pegue dinamicamente
                const imageUrl = document.getElementById('file-image').src; // Obtenha o src da imagem
                if (imageUrl) {
                    document.getElementById('modal-image').src = imageUrl; // Define a imagem do modal
                    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
                    imageModal.show(); // Exibe o modal
                } else {
                    alert("Nenhuma imagem associada."); // Mensagem de alerta se não houver imagem
                }
            });

            // Adicione um evento para fechar o dropdown quando clicar fora
            window.addEventListener('click', function(event) {
                if (!event.target.matches('#dropdown-toggle')) {
                    const dropdownMenu = document.getElementById('dropdown-menu');
                    if (dropdownMenu.style.display === 'block') {
                        dropdownMenu.style.display = 'none';
                    }
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                const filePreviewButton = document.getElementById("file-preview");
                const modal = document.getElementById("imageModal");
                const modalImage = document.getElementById("modalImage");

                // Ação ao clicar no botão de pré-visualização de arquivo
                filePreviewButton.addEventListener("click", function(event) {
                    event.stopPropagation(); // Impede que o clique se propague
                    const fileImage = document.getElementById("file-image").src; // Obtém a imagem do arquivo (caso exista)

                    if (fileImage) {
                        modalImage.src = fileImage; // Define a imagem no modal
                        const modalInstance = new bootstrap.Modal(modal); // Inicializa o modal do Bootstrap
                        modalInstance.show(); // Mostra o modal
                    } else {
                        alert("Nenhum arquivo associado."); // Alerta se não houver imagem
                    }
                });

                // Fecha o modal ao clicar fora dele (opcional, pois o Bootstrap já faz isso)
                modal.addEventListener("click", function(event) {
                    if (event.target === modal) {
                        const modalInstance = bootstrap.Modal.getInstance(modal);
                        modalInstance.hide();
                    }
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const dropdownToggle = document.getElementById("dropdown-toggle");
                const dropdownMenu = document.getElementById("dropdown-menu");
                const submitButton = document.getElementById("postar-nota"); // Botão de envio do formulário
                const filePreviewButton = document.getElementById("file-preview"); // Botão de pré-visualização de arquivo

                dropdownToggle.addEventListener("click", function(event) {
                    event.stopPropagation(); // Impede que o clique se propague
                    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block"; // Alterna a exibição do dropdown
                });

                // Impede o envio do formulário ao clicar nos três pontos
                dropdownToggle.addEventListener("click", function(event) {
                    event.preventDefault(); // Impede o comportamento padrão (caso haja)
                });

                // Fecha o dropdown ao clicar fora dele
                document.addEventListener("click", function() {
                    dropdownMenu.style.display = "none";
                });

                // Impede o envio do formulário ao clicar no botão de pré-visualização
                filePreviewButton.addEventListener("click", function(event) {
                    event.preventDefault(); // Impede que o botão de pré-visualização envie o formulário
                    // A lógica para exibir o modal ou qualquer outra ação pode ir aqui
                    const fileImage = document.getElementById("file-image").src; // Obtém a imagem do arquivo (caso exista)

                    if (fileImage) {
                        const modal = new bootstrap.Modal(document.getElementById('imageModal')); // Inicializa o modal do Bootstrap
                        document.getElementById('modal-image').src = fileImage; // Define a imagem no modal
                        modal.show(); // Mostra o modal
                    } else {
                        alert("Nenhum arquivo associado."); // Alerta se não houver imagem
                    }
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const filePreviewButton = document.getElementById("file-preview"); // Botão de pré-visualização de arquivo
                const modal = document.getElementById("imageModal");

                // Ação ao clicar no botão de pré-visualização de arquivo
                filePreviewButton.addEventListener("click", function(event) {
                    event.stopPropagation(); // Impede que o clique se propague
                    const fileName = document.getElementById("file-text").textContent; // Obtém o nome do arquivo

                    if (fileName) {
                        const fileImage = '../pages/uploads/' + fileName; // Constrói o caminho da imagem
                        document.getElementById("modal-image").src = fileImage; // Define a imagem no modal
                        const modalInstance = new bootstrap.Modal(modal); // Inicializa o modal do Bootstrap
                        modalInstance.show(); // Mostra o modal
                    } else {
                        alert("Nenhum arquivo associado."); // Alerta se não houver imagem
                    }
                });
            });
        </script>


        <!--popup success-->
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


        <!--jquery-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#categorySelect').change(function() {
                    var selectedOption = $(this).children("option:selected").val();
                    if (selectedOption === 'all') {
                        $('#myModal').modal('show');
                    }
                });
            });
        </script>
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            var colorCheckboxes = document.querySelectorAll(".color-checkbox");
            colorCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener("click", function() {

                    if (checkbox.checked) {
                        var selectedColor = checkbox.value;

                        document.querySelector('.nota-contentt').style
                            .setProperty('--color-bar-nota',
                                selectedColor);

                        document.getElementById("txtcorr").value =
                            selectedColor;

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
                    document.getElementById('color-preview').style.backgroundColor =
                        color;
                    document.getElementById('txtcorr').value = color;
                }
            });
        });
        </script>
        <script>
            $(document).ready(function() {
                function reassignModalEvents() {
                    document.querySelectorAll('.btn.btn-transparent').forEach(button => {
                        button.addEventListener('click', function() {
                            populateModal(this);
                            const updateNoteModal = new bootstrap.Modal(document.getElementById(
                                'updateNoteModal'));
                            updateNoteModal.show();
                        });
                    });
                }

                function populateModal(button) {
                    const noteId = button.dataset.id;
                    const noteTitle = button.dataset.title;
                    const noteSubtitle = button.dataset.subtitle;
                    const noteContent = button.dataset.content;
                    const noteColor = button.dataset.color;

                    document.getElementById('noteTitle').value = noteTitle || '';
                    document.getElementById('noteSubtitle').value = noteSubtitle || '';
                    document.getElementById('textarea-conteudo').value = noteContent || '';
                    document.getElementById('txtcorr').value = noteColor || '';
                    document.getElementById('nota_id').value = noteId || '';

                    document.querySelectorAll('input[name="cor_selecionada"]').forEach(radio => {
                        radio.checked = radio.value === noteColor;
                    });

                    const notaContentElement = document.querySelector('.nota-contentt');
                    if (notaContentElement) {
                        notaContentElement.style.setProperty('--color-bar-nota', noteColor || '#8C52FF');
                    }
                }

                // Remove o fundo escuro ao fechar o modal
                document.getElementById('updateNoteModal').addEventListener('hidden.bs.modal', function() {
                    const modalBackdrop = document.querySelector('.modal-backdrop');
                    if (modalBackdrop) {
                        modalBackdrop.remove();
                    }
                });

                $('#categorySelect').change(function() {
                    var categoriaId = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: 'buscar_notas.php',
                        data: {
                            categoria_id: categoriaId
                        },
                        success: function(response) {
                            $('#notas-container').html(response);

                            reassignModalEvents();
                        },
                        error: function(xhr, status, error) {
                            console.error('Erro na requisição AJAX:', status, error);
                        }
                    });
                });

                reassignModalEvents();
            });
        </script>

        <script>
            function validateForm() {
                // Seleciona todas as cores disponíveis
                var radios = document.getElementsByName('cor_escolhida');
                var formValid = false;

                // Verifica se algum dos radios está marcado
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        formValid = true;
                        break;
                    }
                }

                // Se nenhuma cor foi selecionada, exibe um alerta e impede o envio do formulário
                if (!formValid) {
                    alert("Por favor, escolha uma cor antes de enviar.");
                    return false; // Impede o envio do formulário
                }

                return true; // Permite o envio do formulário se uma cor foi escolhida
            }
        </script>

        <!--                Animação de Clique                -->
        <script>
            // Função para adicionar animação de clique
            function addClickAnimation(element) {
                element.classList.add('animate-click');
                setTimeout(() => {
                    element.classList.remove('animate-click');
                }, 200); // Deve corresponder à duração da animação no CSS
            }

            // Seleciona todos os ícones de três pontos
            const icons = document.querySelectorAll('.three-dots-icon');
            icons.forEach(icon => {
                icon.addEventListener('click', function(event) {
                    addClickAnimation(event.currentTarget);
                });
            });
        </script>

</div>
</div>