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

// Consulta para obter todas as categorias do usuário
$sql = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
$result = $conn->query($sql);

$options = '';

// Montando as opções de categoria, se existirem
if ($result->num_rows > 0) {
    $options .= "<option value='todas'>Todas as Categorias</option>";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row['id']}'>{$row['nome']}</option>";
    }
} else {
    $options = "<option value=''>Nenhuma categoria encontrada</option>";
}

// Adicionando opção para mostrar todas as categorias


// Adicionando opção para criar uma nova categoria
$options .= "<option value='all'>Criar Nova Categoria +</option>";

$conn->close();
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
            <select class="p-1 mb-3" id="categorySelect" name="categorySelect">
                <?php echo $options; ?>
            </select>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content justify-content-center align-items-center">
                    <div class="container">
                        <div class="modal-header" style="border-bottom: none">
                            <h5 class="modal-title" id="myModalLabel">Adicionar Categoria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
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
                                <div class="push-cat justify-content-center mb-2 text-center align-items-center">
                                    <button type="submit" class="btn mt-3" id="change-info">Finalizar</button>
                                </div>
                            </form>
                        </div>
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
                    echo "<div class='card mb-3 mt-3' id='card-layout-note'>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-1'>";
                    echo "<div class='color-bar' style='background-color: " . $row['cor'] . "'></div>";
                    echo "</div>";
                    echo "<div class='col-sm-6' id='content-card-note'>";
                    echo "<div class='card-body' style='margin-top: 7px'>";
                    echo "<h5 class='card-title fw-bold fs-4'>" . $row['titulo'] . "</h5>";
                    echo "<p class='card-text'  style='font-size: 18px'>" . $row['subtitulo'] . "</p>";
                    echo "<p class='card-text textmuted'>" . $row['conteudo'] . "</p>";

                    echo "</div>";
                    echo "</div>";
                    // menu no canto extremo direito
                    echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
                    echo "<div class='mini-menu'>";
                    echo "<input type='checkbox' id='toggle-" . $row['id'] . "'>";
                    echo "<label for='toggle-" . $row['id'] . "'><ion-icon name='ellipsis-vertical-outline'></ion-icon></label>";
                    echo "<div class='menu'>";
                    // botão de edição
                    echo "<form method='get' action='editar_nota.php'>";
                    echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn mini-menu-action'>Editar</button>";
                    echo "</form>";
                    // botão de excluir
                    echo "<form method='post' action='excluir_nota.php'>";
                    echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn mini-menu-action'>Excluir</button>";
                    echo "</form>";
                    // atribuiçao
                    // Dropdown para selecionar categoria existente
                    echo "<form method='post' action='atribuir_nota.php'>";
                    echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn mini-menu-action'>Adicionar a Categoria</button>";
                    echo "<select class='p-1' name='id_categoria'>";

                    // Consulta para obter todas as categorias do usuário
                    $sql_categorias = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
                    $result_categorias = $conn->query($sql_categorias);

                    // Adicionar opções de categorias ao dropdown
                    if ($result_categorias->num_rows > 0) {
                        while ($categoria = $result_categorias->fetch_assoc()) {
                            echo "<option value='" . $categoria['id'] . "'>" . $categoria['nome'] . "</option>";
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
                echo "<div class='mt-2 no-note'>Nenhuma nota encontrada.";
            }

            $conn->close();
            ?>
        </div>
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
        function selectColor(colorId) {
            document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
            document.querySelector(`label[for="${colorId}"] .color-option`).classList.add('selected');
            document.getElementById(colorId).checked = true;
        }
        </script>
        <script>
        $(document).ready(function() {
            $('#categorySelect').change(function() {
                var categoriaId = $(this).val();

                // Requisição AJAX para obter as notas da categoria selecionada
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