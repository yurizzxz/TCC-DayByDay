<!--SIDEBAR-->

<body>



    <div class="sidebar d-flex">
        <nav id="sidebar">
            <div id="sidebar_content">

                <!--LINKS-->
                <ul id="side_items">
                    <li class="side-item active">
                        <a href="?p=calendar ">
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
                    <?php

if (isset($_SESSION['idUsuario'])) {
    $id_usuario = $_SESSION['idUsuario'];

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT id, nome, cor FROM categoria WHERE id_usuario = '$id_usuario'";
    $result = $conn->query($sql);

    echo '<li class="side-item">';
    echo '<a class="d-flex" id="categoria-layout">';
    echo '<div class="head">';
    echo '<ion-icon name="newspaper-outline"></ion-icon>';
    echo '<span class="item-description">Categorias</span>';
    echo '</div>';
    echo '<ul class="category-list">';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li class='category-item' style='background-color: {$row['cor']}'>{$row['nome']}</li>";
        }
    } else {
        echo '<li class="category-item">Nenhuma categoria encontrada.</li>';
    }
    
    echo '</ul>';
    echo '</a>';
    echo '</li>';

    $conn->close();
} else {
    header('Location: login.php');
    exit();
}
?>


                </ul>
            </div>
        </nav>

    </div>

    <script>
    const chk = document.getElementById('chk');
    const html = document.documentElement;
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        html.classList.add(currentTheme);
    }

    chk.addEventListener('change', () => {
        html.classList.toggle('dark-theme');
        const theme = html.classList.contains('dark-theme') ? 'dark-theme' : '';
        localStorage.setItem('theme', theme);

        if (html.classList.contains('dark-theme')) {
            document.getElementById('icon').setAttribute('name', 'sunny-outline');
        } else {
            document.getElementById('icon').setAttribute('name', 'moon-outline');
        }
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