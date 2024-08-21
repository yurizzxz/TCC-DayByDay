<style>
    * {
        transition: 0.3s ease-in-out;
    }

    :root {
        --navbar-color: ;
        --body-color: ;
        --title-color: ;
        --text-color: ;
    }

    #topnavbar {
        padding-block: 30px;
    }

    .width-nav {
        width: 86%;
        display: flex;
        padding: 15px 35px;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        background-color: #fcfcfc;
    }

    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .link-nav {
        text-decoration: none;
        color: black;
    }

    .link-nav:hover {
        color: #8C52FF;
    }
   

    .login-hub {
        display: block;
        padding: 0.5rem 2rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: white;
        text-decoration: none;
        background: #8C52FF;
        text-align: center;
        border: 0;
        border-radius: 6px;
        transition: 0.3s ease-in-out;
    }

    .login-hub:hover {
        display: block;
        padding: 0.6rem 2.1rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: white;
        text-decoration: none;
        background: #A200FF;
        border: 0;
        transition: 0.3s ease-in-out;
    }

    /* responsive details */

    @media screen and (max-width: 768px) {
        #topnavbar {
        padding-block: 0;
    }

    .width-nav {
        width: 100%;
        display: flex;
        padding: 15px 35px;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        background-color: #fdfdfd;
    }
        #topnavbar.container {
            width: 100%;
        }

        .navbar {
            background-color: white;
        }

        .navbar-collapse {
            margin-top: 20px;
        }


    }

    /* voltar ao inicio */

    .btn-corner {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        font-size: 25px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        background-color: #8C52FF;
        color: white;
        border-radius: 50%;
        transition: 0.3s ease-in-out;
    }

    .btn-corner:hover {
        background-color: #8C52FF;
        transition: 0.3s ease-in-out;
        padding: 15px;
        color: white;
        font-size: 30px;
    }

    .navbar-toggler {
        outline: none;
        border: none;
    }

    .navbar-toggler:focus {
        text-decoration: none;
        outline: 0;
        box-shadow: 0 0 0 0;
    }

    
</style>
<nav class="navbar navbar-expand-md fixed-top" id="topnavbar" style="transition: 0.3s ease-in-out;">
    <div class="container-fluid width-nav">
        <a class="navbar-brand" href="?p=home"><img src="../img/logopng.png" width="135" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style=" transition: 0.3s ease-in-out;">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="link-nav" href="#">Calendário</a>
                </li>
                <li class="nav-item">
                    <a class="link-nav" href="#">Anotações</a>
                </li>
                <li class="nav-item">
                    <a class="link-nav" href="#">Sobre nós</a>
                </li>
                <li class="nav-item">
                    <a class="link-nav" href="#">Perguntas</a>
                </li>
                <li class="nav-item">
                    <a class="login-hub me-2" href="../pages/login.php">Entrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--botao voltar ao inicio-->
<a href="#home-landing" class="btn btn-corner align-items-center justify-content-center" id="scrollBtn"
    id="button-redirect" title="Voltar ao Início">

    <ion-icon name="arrow-up-circle-outline"></ion-icon>
</a>


<script>
    window.addEventListener('scroll', function () {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 125) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>