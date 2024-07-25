<?php
session_start();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $id_usuario = $_SESSION[ 'idUsuario' ];
    $senha = $_POST[ 'password' ];

    $conn = mysqli_connect( '127.0.0.1', 'root', '', 'tcc' );
    if ( $conn->connect_error ) {
        die( 'Erro de conexão: ' . $conn->connect_error );
    }

    $sql = "SELECT senha FROM usuarios WHERE id = '$id_usuario'";
    $result = $conn->query( $sql );


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['senha'];
    
        if (password_verify($senha, $hashed_password)) {
            $_SESSION['authenticated'] = true;
            header('Location: perfil.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Senha incorreta. Tente novamente.';
            exit();
        }
    } else {
        $_SESSION['msg'] = 'Erro ao verificar a senha. Tente novamente.';
        
        exit();
    }

    $msg = isset( $_SESSION[ 'msg' ] ) ? $_SESSION[ 'msg' ] : '';
    unset( $_SESSION[ 'msg' ] );

    echo $msg;

    $conn->close();
}

?>