<style>
    body {
        transition: 0.3s ease-in-out;
        min-height: 100vh;
        background-color: #f7f3ff;
    }

    #sidebar {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: #ffffff;
        height: 94vh;
        position: relative;
        transition: all .5s;
        min-width: 82px;
        z-index: 2;
        margin-left: -30px;
    }

    #sidebar_content {
        padding: 12px;
    }

    #side_items {
        display: flex;
        flex-direction: column;
        gap: 8px;
        list-style: none;
    }

    .side-item a {
        border-radius: 8px;
        font-size: 20px;
        padding: 14px;
        cursor: pointer;
    }

    .side-item.active a {
        background-color: #fafafa;
    }

    .side-item a:hover:not(.active),
    #logout_btn:hover {
        background-color: #faf6ff;
    }

    .side-item a {
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
    }

    .side-item.active a {
        color: #8C52FF;
    }

    #open_btn_icon {
        transition: transform .3s ease;
    }

    .open-sidebar #open_btn_icon {
        transform: rotate(180deg);
    }

    .item-description {
        width: 0px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-size: 14px;
        transition: width .6s;
        height: 0px;
    }

    #sidebar.open-sidebar {
        min-width: 11vh;
    }

    #sidebar.open-sidebar .item-description {
        width: 150px;
        height: auto;
    }

    #sidebar.open-sidebar .side-item a {
        justify-content: flex-start;
        gap: 14px;
    }

    #open_btn {
        background-color: transparent;
        border: none;
    }

    #open_btn ion-icon {
        color: black;
    }

    /* MODAL */

    #modal-btn {
        background: #e8e8e8;
        transition: 0.3s ease-in-out;
    }

    #modal-btn:hover {
        background: #cfcfcf;
        transition: 0.3s ease-in-out;
    }

    #notifications {
        margin-left: 15px;
        margin-right: 15px;
    }

    .dropdown-menu {
        top: auto;
        bottom: 0;
        width: 350px;
        transform-origin: right;
        animation: slideFromTop 0.3s forwards;
        border: none;
        height: 28vh;
        margin-left: -298px;

    }

    .profile-img {
        border-radius: 100px;
    }



    .offcanvas-end {
        animation: slideFromLeft 0.3s forwards;
        border: none;
    }
</style>





<!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR-->
<!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR--><!--SIDEBAR-->

<div class=" sidebar d-flex">
    <nav class="bg-light" id="sidebar">
        <div id="sidebar_content">

            <!--LINKS-->
            <ul id="side_items">
                <li class="side-item active">
                    <a href="?p=calendar ">
                        <ion-icon name="calendar-outline" style="z-index: 99; font-size: 25px; color: #8C52FF"></ion-icon>
                        <span class="item-description">
                            Calendário
                        </span>
                    </a>
                </li>

                <li class="side-item">
                    <a href="?p=notas">
                        <ion-icon name="document-text-outline" style=" z-index: 99; font-size: 25px; color: #8C52FF"></ion-icon>
                        <span class="item-description">
                            Notas
                        </span>
                    </a>
                </li>

                <li class="side-item">
                    <a class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                        <ion-icon name="settings-outline" style=" z-index: 99; color: #8C52FF"></ion-icon>
                        <span class="item-description">
                            Configurações
                        </span>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">Modo Noturno</a></li>
                        <li><input type="radio"></li>
                    </ul>
                </li>
            </ul>

        </div>

        <div id="logout" class="d-none">
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">
                    Logout
                </span>
            </button>
        </div>
    </nav>
</div>

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