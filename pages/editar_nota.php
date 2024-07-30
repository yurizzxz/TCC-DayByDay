<?php
session_start();

if ( !isset( $_SESSION[ 'idUsuario' ] ) ) {
    header( 'Location: login.php' );
    exit();
}

if ( !isset( $_GET[ 'nota_id' ] ) ) {
    header( 'Location: index.php' );
    exit();
}

$id_usuario = $_SESSION[ 'idUsuario' ];

$nota_id = $_GET[ 'nota_id' ];

$conn = mysqli_connect( '127.0.0.1', 'root', '', 'tcc' );
if ( $conn->connect_error ) {
    die( 'Erro de conexão: ' . $conn->connect_error );
}

$sql = "SELECT * FROM nota WHERE id_usuario = '$id_usuario' AND id = '$nota_id'";
$result = $conn->query( $sql );

if ( $result->num_rows == 1 ) {
    $row = $result->fetch_assoc();
    $titulo = $row[ 'titulo' ];
    $subtitulo = $row[ 'subtitulo' ];
    $conteudo = $row[ 'conteudo' ];
    $cor = $row[ 'cor' ];
} else {
    header( 'Location: index.php' );
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Editar Nota <?php echo $titulo;
?></title>
    <?php include_once 'header.php';
?>
    <style>
    .ctner-editar {
        width: 90%;
        max-width: 600px;
        margin: 20vh auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
    }

    .color-checkbox {
        display: none;
    }

    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid #fff;
        margin: 5px;
        display: inline-block;
    }

    .color-checkbox:checked+label .color-option {
        border: 2px solid #000;
    }

    #colors-dropdown {
        margin-left: 0;
        margin-top: -20px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .form-group textarea {
        resize: none;
    }

    .btn-atualizar-nota input {
        background-color: #bababa;
        color: black;
        border: none;
        padding: 8px 20px;
        cursor: pointer;
    }

    .btn-atualizar-nota input:hover {
        background-color: #a0a0a0;
    }

    .icon-nota {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
        cursor: pointer;
    }

    .icon-nota ion-icon {
        font-size: 24px;
    }

    .title-colors h4 {
        margin-bottom: 15px;
    }

    .container.d-flex {
        flex-wrap: wrap;
        justify-content: center;
    }

    .color-picker-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    @media (max-width: 768px) {
        .color-picker-container {
            max-width: 360px;
            margin: 0 auto;
        }

        .color-option {
            flex: 1 1 calc(25% - 10px);
            box-sizing: border-box;
        }

        .color-picker-container label {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    @media (min-width: 769px) {
        .color-picker-container {
            max-width: 600px;
        }

        .color-option {
            flex: 1 1 calc(20% - 10px);
        }
    }
    </style>
</head>

<body>

    <div class='container ctner-editar' style='margin-top: 20vh'>
        <div class='button-close'>
            <a href='index.php?p=notas' class='fw-bold'>
                <ion-icon name='close-outline' style='color: black; font-size: 30px'></ion-icon>
            </a>
        </div>
        <h2 class='text-center'>Editar Nota</h2>

        <div class='form-container'>
            <form action='atualizar_nota.php' method='post'>
                <input type='hidden' name='nota_id' value="<?php echo $nota_id; ?>">
                <div class='form-group'>
                    <label for='txttitulo'>Título:</label>
                    <input type='text' class='form-control' id='txttitulo' name='txttitulo'
                        value="<?php echo $titulo; ?>">
                </div>
                <div class='form-group'>
                    <label for='txtsubtitulo'>Subtítulo:</label>
                    <input type='text' class='form-control' id='txtsubtitulo' name='txtsubtitulo'
                        value="<?php echo $subtitulo; ?>">
                </div>
                <div class='form-group'>
                    <label for='txtconteudo'>Conteúdo:</label>
                    <textarea class='form-control' id='txtconteudo' name='txtconteudo' rows='4' cols='50'><?php echo $conteudo;
?></textarea>
                </div>
                <div class='form-group'>
                    <div class='title-colors mt-3 text-center'>
                        <h4>Selecione a cor de sua nota</h4>
                    </div>
                    <div class='d-flex justify-content-center mb-3'>
                        
                        <div class='container d-flex justify-content-center align-items-center'>

                            <input type='radio' class='color-checkbox' id='color1' value='#F95B99'
                                name='cor_selecionada'><label for='color1'>
                                <div class='color-option' style='background-color: #F95B99;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color2' value='#CB6CE6'
                                name='cor_selecionada'><label for='color2'>
                                <div class='color-option' style='background-color: #CB6CE6;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color3' value='#8C52FF'
                                name='cor_selecionada'><label for='color3'>
                                <div class='color-option' style='background-color: #8C52FF;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color4' value='#AA8DE4'
                                name='cor_selecionada'><label for='color4'>
                                <div class='color-option' style='background-color: #AA8DE4;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color5' value='#FF5757'
                                name='cor_selecionada'><label for='color5'>
                                <div class='color-option' style='background-color: #FF5757;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color6' value='#ffff00'
                                name='cor_selecionada'><label for='color6'>
                                <div class='color-option' style='background-color: #ffff00;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color7' value='#FFCF52'
                                name='cor_selecionada'><label for='color7'>
                                <div class='color-option' style='background-color: #FFCF52;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color8' value='#FF914D'
                                name='cor_selecionada'><label for='color8'>
                                <div class='color-option' style='background-color: #FF914D;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color9' value='#36DF32'
                                name='cor_selecionada'><label for='color9'>
                                <div class='color-option' style='background-color: #36DF32;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color10' value='#397D1D'
                                name='cor_selecionada'><label for='color10'>
                                <div class='color-option' style='background-color: #397D1D;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color11' value='#000'
                                name='cor_selecionada'><label for='color11'>
                                <div class='color-option' style='background-color: #000;'>
                                </div>
                            </label>
                            <input type='radio' class='color-checkbox' id='color12' value='#bababa'
                                name='cor_selecionada'><label for='color12'>
                                <div class='color-option' style='background-color: #bababa'>
                                </div>
                            </label>
                        </div>

                        <input type='hidden' name='txtcor' id='txtcor'>
                    </div>
                </div>
                <div class='text-center btn-atualizar-nota'>
                    <input type='submit' class='btn btn-primary' value='Atualizar'>
                </div>

            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>