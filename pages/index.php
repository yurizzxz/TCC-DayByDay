<?php
date_default_timezone_set('America/Sao_Paulo');
//include_once 'trava.php';
$pagina = filter_input(INPUT_GET, 'p');
if (empty($pagina) || $pagina == "index") {
    header("Location: ?p=notas");
    exit; 
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'header.php'; ?>
    <style>
        
    </style>
   <link rel="stylesheet" href="../css/css.css">

</head>

<body>
    <?php include_once 'navbar.php'; ?>

    <div class="d-flex">
        <?php include_once 'sidebar.php'; ?>

        
        <?php
        $pagina = filter_input(INPUT_GET, 'p');
        if (empty($pagina) || $pagina == "index") {
            include_once 'notas.php';
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