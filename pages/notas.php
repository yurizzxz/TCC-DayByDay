<div class="container mt-4" id="note-ctner">
    <div class="container">
        <div id="select-note">
            <select style="border: 0px; padding: 5px 5px" id="categorySelect" aria-label="Default select example">
                <option>Todas as categorias</option>
                <option value="all">Criar Categoria +</option>
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
                            <form id="categoryForm" method="post">
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
                                            <input type="radio" class="color-checkbox" id="color1" value="#F95B99"
                                                name="cor_selecionada">
                                            <label for="color1">
                                                <div class="color-option" style="background-color: #F95B99;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color2" value="#CB6CE6"
                                                name="cor_selecionada">
                                            <label for="color2">
                                                <div class="color-option" style="background-color: #CB6CE6;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color3" value="#8C52FF"
                                                name="cor_selecionada">
                                            <label for="color3">
                                                <div class="color-option" style="background-color: #8C52FF;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color4" value="#AA8DE4"
                                                name="cor_selecionada">
                                            <label for="color4">
                                                <div class="color-option" style="background-color: #AA8DE4;"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Second Row -->
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color5" value="#FF5757"
                                                name="cor_selecionada">
                                            <label for="color5">
                                                <div class="color-option" style="background-color: #FF5757;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color6" value="#ffff00"
                                                name="cor_selecionada">
                                            <label for="color6">
                                                <div class="color-option" style="background-color: #ffff00;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color7" value="#FFCF52"
                                                name="cor_selecionada">
                                            <label for="color7">
                                                <div class="color-option" style="background-color: #FFCF52;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color8" value="#FF914D"
                                                name="cor_selecionada">
                                            <label for="color8">
                                                <div class="color-option" style="background-color: #FF914D;"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Third Row -->
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color9" value="#36DF32"
                                                name="cor_selecionada">
                                            <label for="color9">
                                                <div class="color-option" style="background-color: #36DF32;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color10" value="#397D1D"
                                                name="cor_selecionada">
                                            <label for="color10">
                                                <div class="color-option" style="background-color: #397D1D;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color11" value="#000"
                                                name="cor_selecionada">
                                            <label for="color11">
                                                <div class="color-option" style="background-color: #000;"></div>
                                            </label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <input type="radio" class="color-checkbox" id="color12" value="#bababa"
                                                name="cor_selecionada">
                                            <label for="color12">
                                                <div class="color-option" style="background-color: #bababa;"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="push-cat justify-content-center mb-2 text-center align-items-center">
                                    <button type="submit" class="btn mt-3" id="change-info-btn">Finalizar</button>
                                </div>
                            </form>
                        </div>
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
            $(document).ready(function () {
                $('#categorySelect').change(function () {
                    var selectedOption = $(this).children("option:selected").val();
                    if (selectedOption === 'all') {
                        $('#myModal').modal('show');
                    }
                });
            });
        </script>
    </div>
</div>