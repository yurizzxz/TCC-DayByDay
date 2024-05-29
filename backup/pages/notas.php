<style>
    #select-note {

        width: 22vh;
    }

    .color-bar {
        background-color: #4CAF50;
    }

    @media (min-width: 601px) {
        .color-bar {
            width: 30%;
            height: 92px;
        }

        #note-ctner {
            margin-left: 10px;
        }

        #content-card-note {
            margin-left: -95px
        }

        #card-layout-note {
            width: 160vh;
        }
    }

    @media (max-width: 600px) {
        .color-bar {
            width: 100%;
            height: 20px;
        }

        #content-card-note {
            margin-left: -0px
        }
    }
</style>

<div class="container mt-4" id="note-ctner">
    <div class="container">
        <div id="select-note">
            <select class="form-select" aria-label="Default select example">
                <option selected>Todas as categorias</option>
            </select>
        </div>

        <?php
        // Conecta ao banco de dados (substitua pelos detalhes da sua conexão)
        include_once 'conexao.php';

        // Prepara e executa a consulta para selecionar todas as notas da tabela
        $stmt = $pdo->query("SELECT * FROM nota");
        $notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Exibe as notas -->
        <?php foreach ($notas as $nota): ?>
            <div class="card mb-3 mt-3" id="card-layout-note">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="color-bar" style="background-color: <?= $nota['cor'] ?>"></div>
                    </div>
                    <div class="col-sm-6" id="content-card-note">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nota['titulo'] ?></h5>
                            <p class="card-text"><?= $nota['subtitulo'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>