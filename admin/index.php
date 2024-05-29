<?php
date_default_timezone_set('America/Sao_Paulo');
//include_once 'trava.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'header.php'; ?>
</head>

<body><!--nem mexi maiskkkkkkkkkkkkkkkk-->
    <!--navbar-->
    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-2">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6"><img src="../img/logopng.png" height="30" alt=""></a>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">logout</a>
            </div>
        </div>
    </header>


    <div class="d-flex">
        <!--sidebar-->
        <?php include_once 'sidebar.php'; ?>
        <!-- ligaçao entre as paginas-->
        <?php
        $pagina = filter_input(INPUT_GET, 'p');
        if (empty ($pagina) || $pagina == "index") {
            include_once 'pages/cadastro.php';
        } else {
            if (file_exists($pagina . '.php')) {
                include_once $pagina . '.php';
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Erro 404, página não encontrada!
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php include_once 'scripts.php'; ?>
</body>

</html>