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

    .navbar.scrolled {
        background-color: white !important;
        transition: background-color 0.3s ease-in-out;
        box-shadow: 0.5px 0px 8px 2px #F9F9F9;
        transition: 0.3s ease-in-out;
    }

    .sign-up {
        display: block;
        padding: 0.5rem 1.5rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: white;
        text-decoration: none;
        background: #8C52FF;
        text-align: center;
        border: 0;
        transition: 0.3s ease-in-out;
    }

    .sign-up:hover {
        display: block;
        padding: 0.5rem 1.5rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: white;
        text-decoration: none;
        background: #A200FF;
        border: 0;
        transition: 0.3s ease-in-out;
    }

    .login-hub {
        display: block;
        text-align: center;
        padding: 0.4rem 1.2rem;
        font-size: var(--bs-nav-link-font-size);
        font-weight: bold;
        color: black;
        text-decoration: none;
        border: 2px solid #8C52FF;
    }

    /* responsive details */

    @media screen and (max-width: 768px) {
        #topnavbar{
            box-shadow: 0.5px 0px 8px 2px F9F9F9;
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
<nav class="navbar navbar-expand-md fixed-top p-3" id="topnavbar" style="transition: 0.3s ease-in-out;">
    <div class="container" style="margin-top: 5px; margin-bottom: 5px" style="transition: 0.3s ease-in-out;">
        <a class="navbar-brand" href="?p=home"><img src="../img/logopng.png" width="135" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style=" transition: 0.3s ease-in-out;">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="login-hub me-2" aria-current="page" href="../pages/login.php">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="sign-up" href="../pages/login.php #second-column">Cadastrar</a>
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