<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once 'header.php'; ?>

        <style>
              ::-webkit-scrollbar {
            width: 7px;
        }
        
        ::-webkit-scrollbar-thumb {
            background-color: #8C52FF;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-track {
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        .scroll-container {
            scrollbar-width: thin;
            scrollbar-color: #8C52FF #f0f0f0;
        }
        </style>
    </head>
    <body>
        <?php include_once 'navbar.php'; ?>
        
                    <?php
                    $pagina = filter_input(INPUT_GET, 'p');
                    if (empty($pagina) || $pagina == "index") {
                        include_once 'home.php';
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
                <?php include_once 'footer.php'; ?>
        <?php include_once 'scripts.php'; ?>
    </body>
</html>