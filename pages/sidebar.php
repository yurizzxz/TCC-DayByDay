<!--SIDEBAR-->
<?php

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];
$sql = "SELECT id, nome, cor FROM categoria WHERE id_usuario = '$id_usuario'";
$result = $conn->query($sql);
?>

<body>



    <div class="sidebar d-flex">
        <nav id="sidebar">
            <div id="sidebar_content">

                <!--LINKS-->
                <ul id="side_items">
                    <li class="side-item active">
                        <a href="?p=calendario">
                            <ion-icon name="calendar-outline" style="z-index: 99; font-size: 25px; color: #8C52FF">
                            </ion-icon>
                            <span class="item-description">
                                Calendário
                            </span>
                        </a>
                    </li>

                    <li class="side-item">
                        <a href="?p=notas">
                            <ion-icon name="document-text-outline"
                                style=" z-index: 99; font-size: 25px; color: #8C52FF">
                            </ion-icon>
                            <span class="item-description">
                                Notas
                            </span>
                        </a>
                    </li>

                    <li class="side-item">
                        <a id="settingsItem" class="dropdown" type="button" href="#">
                            <ion-icon name="settings-outline" style="z-index: 99; font-size: 25px; color: #8C52FF">
                            </ion-icon>
                            <span class="item-description">
                                Configurações
                            </span>
                        </a>
                        <!-- DROPDOWN -->
                        <div id="myDropdown" class="dropdown-menu " style="border:none;" aria-labelledby="settingsItem">
                            <div class="form-check dark-mode-layout d-flex">
                                <ion-icon name="moon-outline"></ion-icon>
                                <p class="dark-mode-text" style="padding-left: 10px; padding-right: 22px">Modo Escuro
                                </p>
                                <input type="checkbox" id="chk" />
                                <label for="chk" class="switch">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <hr class="hr-muted">
                    <li class="side-item">
                        <a class="d-flex align-items-center" id="categoria-layout" data-bs-toggle="collapse"
                            href="#accordion-categorias" role="button" aria-expanded="false"
                            aria-controls="accordion-categorias">
                            <div class="head d-flex align-items-center">
                                <ion-icon name="newspaper-outline"></ion-icon>
                                <span class="item-description">Categorias</span>
                                <ion-icon name="chevron-down-outline" class="accordion-toggle"></ion-icon>
                            </div>
                        </a>
                        <div class="collapse" id="accordion-categorias">
                            <div class="accordion-body">
                                <?php if ($result->num_rows > 0): ?>
                                <ul class="category-list mt-2">
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <li class='category-item'
                                        style='background-color: <?php echo $row['cor']; ?>; color: black;'>
                                        <?php echo $row['nome']; ?>
                                        <div class="button-container">
                                            <button class="ion-icon-btn"
                                                onclick="openModal('edit', <?php echo $row['id']; ?>, '<?php echo $row['nome']; ?>', '<?php echo $row['cor']; ?>')">
                                                <ion-icon name='create-outline'></ion-icon>
                                            </button>
                                            <button class="ion-icon-btn"
                                                onclick="openModal('delete', <?php echo $row['id']; ?>)">
                                                <ion-icon name='trash-outline'></ion-icon>
                                            </button>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>

    </div>

    <!-- Modal Categoria -->
    <div id="modal-overlayy" class="modal-overlayy"></div>
    <div id="modal-cat" class="modal-cat">

        <form id="modal-form" method="POST" action="editar_categoria.php">
            <input type="hidden" name="action" id="modal-action">
            <input type="hidden" name="id_categoria" id="modal-id_categoria">
            <div id="modal-content"></div>
            <div class="modal-footer">
                <button class="btn-cat-action" id="btn-confirm" type="submit">Confirmar</button>
                <button class="btn-cat-action" id="btn-cancel" type="button" onclick="closeModal()">Cancelar</button>
            </div>
        </form>
    </div>

    <!-- SCRIPTS -->
    <!-- SCRIPTS -->
    <!-- SCRIPTS -->
    <script>
    function openModal(action, id_categoria, nome_categoria = '', cor_escolhida = '') {
        var modal = document.getElementById('modal-cat');
        var overlay = document.getElementById('modal-overlayy');
        var form = document.getElementById('modal-form');
        var content = document.getElementById('modal-content');

        // Configura o formulário
        document.getElementById('modal-action').value = action;
        document.getElementById('modal-id_categoria').value = id_categoria;

        if (action === 'edit') {
            content.innerHTML = `
            <div class="head-modal">
             <h5 class="modal-title" id="myModalLabel">Edite sua Categoria</h5>
                            <button type="button" class="btn-close" onclick="closeModal()"></button>
                   </div><div class="modal-body">
                            <form id="categoryForm" action="editar_categoria.php" onsubmit="return validateForm()"
                                method="post">
                                <div class="form-group">
                                    <label for="categoryName">Nome</label>
                                    <input type="text" class="form-control" id="categoryName" name="nome_categoria"
                                        placeholder="Digite o novo nome da categoria.." required>
                                </div>
                                <div class="form-group mt-4" id="cubo-colors">
                                    <label>Cor:</label><br>
                                    <div class="row mt-3" required>
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
                            </form>
                        </div>
                `;
        } else if (action === 'delete') {
            content.innerHTML = `<p>Você tem certeza que deseja excluir esta categoria?</p>`;
        }

        modal.style.display = 'block';
        overlay.style.display = 'block';
    }

    function closeModal() {
        var modal = document.getElementById('modal-cat');
        var overlay = document.getElementById('modal-overlayy');
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }

    document.getElementById('modal-overlayy').addEventListener('click', closeModal);
    </script>


    <script>
    const chk = document.getElementById('chk');
    const html = document.documentElement;
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        html.classList.add(currentTheme);
        chk.checked = true;
    }

    chk.addEventListener('change', () => {
        html.classList.toggle('dark-theme');

        const theme = html.classList.contains('dark-theme') ? 'dark-theme' : '';
        localStorage.setItem('theme', theme);
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var settingsItem = document.getElementById('settingsItem');
        var dropdownMenu = document.getElementById('myDropdown');

        settingsItem.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });

        // fecha o dropdown quando clicar fora dele
        window.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !settingsItem.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
    </script>

    <script>
    // limitar o número de caracteres
    function limitarCaracteres() {
        var btn = document.getElementById("modal-btn");
        var texto = btn.textContent;

        // Limita o texto a 1 caractere em resoluções menores que 768px
        if (window.innerWidth < 768) {
            if (texto.length > 2) {
                btn.textContent = texto.charAt(0);
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        limitarCaracteres();
        window.addEventListener("resize", limitarCaracteres);
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = new URLSearchParams(window.location.search).get('p');

        if (!currentPage) {
            currentPage = 'calendar';
        }

        var menuItems = document.querySelectorAll('.side-item');

        menuItems.forEach(function(item) {
            if (item.querySelector('a').getAttribute('href').indexOf('?p=' + currentPage) !== -1) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    });
    </script>

    <script>
    document.getElementById('open_btn').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('open-sidebar');
    });
    </script>
</body>