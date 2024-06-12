

<div class="container mt-4" id="note-ctner">
    <div class="container">
        <div id="select-note">
            <select id="categorySelect" class="form-select" aria-label="Default select example">
                <option>Todas as categorias</option>
                <option value="all">Criar Categoria +</option>
            </select>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Adicionar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" action="salvar_categoria.php" method="post">
                            <div class="form-group">
                                <label for="categoryName">Nome da Categoria:</label>
                                <input type="text" class="form-control" id="categoryName" name="nome_categoria" placeholder="Digite o nome da categoria" required>
                            </div>
                            <div class="form-group mt-5">
                                <label>Cor:</label><br>
                                <div class="container justify-content-center align-items-center">
                                    <input type="radio" class="color-checkbox" id="color1" value="#ff0000" name="cor_categoria"><label for="color1">
                                        <div class="color-option" style="background-color: #ff0000;"></div>
                                    </label>
                                    <input type="radio" class="color-checkbox" id="color2" value="#00ff00" name="cor_categoria"><label for="color2">
                                        <div class="color-option" style="background-color: #00ff00;"></div>
                                    </label>
                                    <input type="radio" class="color-checkbox" id="color3" value="#0000ff" name="cor_categoria"><label for="color3">
                                        <div class="color-option" style="background-color: #0000ff;"></div>
                                    </label>
                                    <!-- Adicione mais opções de cores conforme necessário -->
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Salvar Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="aaaa">
            <?php


            // Conexão com o banco de dados
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
    </div>
</div>