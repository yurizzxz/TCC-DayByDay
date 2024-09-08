<?php
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];

$sql = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
$result = $conn->query($sql);

$options = '';

if ($result->num_rows > 0) {
    $options .= "<option value='todas'>Todas as Categorias</option>";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row['id']}'>{$row['nome']}</option>";
    }
} else {
    $options = "<option value='all'>Todas as categorias</option>";
}

$conn->close();

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

?>

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
<div class="container mt-4" id="note-ctner">
    <div class="container">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-0">
                        <form id="categoryForm" action="salvar_categoria.php" onsubmit="return validateForm()"
                            method="post">
                            <div class="form-group">
                                <label for="categoryName">Nome</label>
                                <input type="text" class="form-control" id="categoryName" name="nome_categoria"
                                    placeholder="Digite o nome da categoria" required>
                            </div>
                            <div class="form-group mt-4" id="cubo-colors">
                                <label>Cor:</label><br>
                                <div class="row mt-3">
                                    <!-- First Row -->
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
                                    <!-- Second Row -->
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
                                </div>
                            </div>
                            <div class="push-cat justify-content-center mb-2 text-center align-items-center d-flex"
                                style="gap: 10px">
                                <button class="btn-cat-action" id="btn-confirm" type="submit">Confirmar</button>
                                <button class="btn-cat-action" id="btn-cancel" type="button" data-bs-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div id="notas-container">
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
                        data-title='" . htmlspecialchars($row['titulo']) . "' 
                        data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
                        data-content='" . htmlspecialchars($row['conteudo']) . "' 
                        data-color='" . htmlspecialchars($row['cor']) . "'></button>";
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

                        if (strlen($content) > $limit) {
                            $truncated = substr($content, 0, $limit) . '...';
                        } else {
                            $truncated = $content;
                        }

                        echo "<p class='card-text textmuted'>" . htmlspecialchars($truncated) . "</p>";

                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
                        echo "<div class='mini-menu'>";
                        echo "<input type='checkbox' id='toggle-" . htmlspecialchars($row['id']) . "'>";
                        echo "<label for='toggle-" . htmlspecialchars($row['id']) . "'><ion-icon name='ellipsis-vertical-outline'></ion-icon></label>";
                        echo "<div class='menu'>";
                        echo "<form class='d-none' method='get' action='editar_nota.php'>";
                        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
                        echo "<button type='button' class='btn mini-menu-action edit' 
                            data-id='" . htmlspecialchars($row['id']) . "' 
                            data-title='" . htmlspecialchars($row['titulo']) . "' 
                            data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
                            data-content='" . htmlspecialchars($row['conteudo']) . "' 
                            data-color='" . htmlspecialchars($row['cor']) . "'>Editar</button>";
                        echo "</form>";

                        echo "<form method='post' action='excluir_nota.php'>";
                        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
                        echo "<button type='submit' class='btn mini-menu-action'>Excluir</button>";
                        echo "</form>";

                        echo "<form method='post' action='atribuir_nota.php'>";
                        echo "<button type='submit' class='btn mini-menu-action'>Adicionar a Categoria</button>";
                        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
                        echo "<select class='select-categoria' name='id_categoria'>";

                        $sql_categorias = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
                        $result_categorias = $conn->query($sql_categorias);

                        if ($result_categorias->num_rows > 0) {
                            while ($categoria = $result_categorias->fetch_assoc()) {
                                echo "<option class='category-option' value='" . htmlspecialchars($categoria['id']) . "'>" . htmlspecialchars($categoria['nome']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>Não há categorias</option>";
                        }

                        echo "</select>";
                        echo "</form>";             
                        echo "</div>";
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

        <!-- Modal -->
        <div class="modal fade" id="updateNoteModal" tabindex="-1" aria-labelledby="updateNoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="padding-top: 50px">
                <div class="modal-content modal-width justify-content-center nota-contentt" style="border: none">
                    <form id="updateNoteForm" action="atualizar_nota.php" method="post">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between" style="margin-top: 0px">
                                <input type="text" class="form-control" name="txttitulo" id="noteTitle" required
                                    placeholder="Insira um título">
                                <button type="button" class="btn-cl" data-bs-dismiss="modal" aria-label="Close"
                                    style="margin-right: 20px; margin-top: 0;">close</button>
                            </div>
                            <input type="text" class="form-control" name="txtsubtitulo" id="noteSubtitle"
                                placeholder="Insira um subtítulo">
                            <textarea type="text" id="textarea-conteudo" class="form-control" name="txtconteudo"
                                cols="30" style="resize: none;" required rows="10"
                                placeholder="Comece aqui..."></textarea>
                        </div>
                        <div class="modal-footer" style="border: none; margin-top: 80px">
                            <div class="icons" style="margin-right: auto;">
                                <a href="#" class="icon-nota">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                </a>
                                <button type="button" class="icon-nota" id="dropdownTriggerEdit"
                                    style="border: none; background: transparent">
                                    <ion-icon name="color-palette-outline"></ion-icon>
                                </button>
                                <ul id="dropdownMenuEdit" class="dropdown-menu"
                                    style="height: 170px; width: 320px; border: none">
                                    <div class="container p-3">
                                        <div class="title-colors text-center">
                                            <h4 style="font-size: 20px">Selecione a cor de sua nota</h4>
                                        </div>
                                        <div class="container justify-content-center align-items-center">
                                            <input type="radio" class="color-checkbox color-radio" id="color1"
                                                value="#F95B99" name="cor_selecionada"><label for="color1">
                                                <div class="color-option" style="background-color: #F95B99;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color2" value="#CB6CE6"
                                                name="cor_selecionada"><label for="color2">
                                                <div class="color-option" style="background-color: #CB6CE6;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color3" value="#8C52FF"
                                                name="cor_selecionada"><label for="color3">
                                                <div class="color-option" style="background-color: #8C52FF;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color4" value="#AA8DE4"
                                                name="cor_selecionada"><label for="color4">
                                                <div class="color-option" style="background-color: #AA8DE4;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color5" value="#FF5757"
                                                name="cor_selecionada"><label for="color5">
                                                <div class="color-option" style="background-color: #FF5757;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color6" value="#ffff00"
                                                name="cor_selecionada"><label for="color6">
                                                <div class="color-option" style="background-color: #ffff00;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color7" value="#FFCF52"
                                                name="cor_selecionada"><label for="color7">
                                                <div class="color-option" style="background-color: #FFCF52;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color8" value="#FF914D"
                                                name="cor_selecionada"><label for="color8">
                                                <div class="color-option" style="background-color: #FF914D;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color9" value="#36DF32"
                                                name="cor_selecionada"><label for="color9">
                                                <div class="color-option" style="background-color: #36DF32;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color10" value="#397D1D"
                                                name="cor_selecionada"><label for="color10">
                                                <div class="color-option" style="background-color: #397D1D;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color11" value="#000"
                                                name="cor_selecionada"><label for="color11">
                                                <div class="color-option" style="background-color: #000;">
                                                </div>
                                            </label>
                                            <input type="radio" class="color-checkbox" id="color12" value="#bababa"
                                                name="cor_selecionada"><label for="color12">
                                                <div class="color-option" style="background-color: #bababa">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </ul>
                                <label class="icon-nota" for="input-arquivo" style="cursor: pointer">
                                    <ion-icon name="folder-outline" style="font-size: 20px;"></ion-icon>
                                    <input type="file" id="input-arquivo" class="visually-hidden" style="width: 20px;">
                                </label>
                                <a href="" class="icon-nota">
                                    <ion-icon name="text-outline"></ion-icon>
                                </a>
                            </div>
                            <input type="hidden" name="txtcor" id="txtcorr">

                            <input type="hidden" name="nota_id" id="nota_id">
                            <input type="hidden" id="userid" name="userid"
                                value="<?php echo htmlspecialchars($userid, ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="submit" class="btn" id="postar-nota" name="btnconfirmar" value="Salvar Nota">
                        </div>
                        <div id="file-name" class="file-add"></div>
                    </form>
                </div>
            </div>
        </div>

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

        <!--buscar valores da nota-->
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
        document.addEventListener('DOMContentLoaded', function() {
            const updateNoteModal = new bootstrap.Modal(document.getElementById('updateNoteModal'));

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
                    notaContentElement.style.setProperty('--color-bar-nota', noteColor ||
                    '#8C52FF'); 
                }
            }

            document.querySelectorAll('.btn.btn-transparent').forEach(button => {
                button.addEventListener('click', function() {
                    populateModal(this);
                    const updateNoteModal = new bootstrap.Modal(document.getElementById(
                        'updateNoteModal'));
                    updateNoteModal.show();
                });
            });
        });
        </script>

        <!--buscar id da cor-->
        <script>
        function selectColor(colorId) {
            document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
            document.querySelector(`label[for="${colorId}"] .color-option`).classList.add('selected');
            document.getElementById(colorId).checked = true;
        }
        </script>

        <!--busca e filtra as notas de acordo com a categoria-->
        <script>
        $(document).ready(function() {
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
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro na requisição AJAX:', status, error);
                    }
                });
            });
        });
        </script>

    </div>
</div>