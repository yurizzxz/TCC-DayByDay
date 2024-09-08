<?php
session_start();
include_once 'conexao.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'nota_id' ] ) ) {
    $nota_id = $_POST[ 'nota_id' ];
    $titulo = $_POST[ 'txttitulo' ];
    $subtitulo = $_POST[ 'txtsubtitulo' ];
    $conteudo = $_POST[ 'txtconteudo' ];
    $cor = $_POST[ 'txtcor' ];

    // Protege contra SQL Injection
    $stmt = $conn->prepare( 'UPDATE nota SET titulo=?, subtitulo=?, conteudo=?, cor=? WHERE id=?' );
    $stmt->bind_param( 'ssssi', $titulo, $subtitulo, $conteudo, $cor, $nota_id );

    if ( $stmt->execute() ) {
        $_SESSION[ 'mensagem' ] = 'Edição feita com sucesso!';
        header( 'location:index.php?p=notas' );
        exit();
    } else {
        $_SESSION[ 'mensagem' ] = 'Erro ao editar nota!' . $stmt->error;
        header( 'location:index.php?p=notas');
        exit();
    }

    $mensagem = isset( $_SESSION[ 'mensagem' ] ) ? $_SESSION[ 'mensagem' ] : '';
    unset( $_SESSION[ 'mensagem' ] );

    echo $mensagem;

    $stmt->close();
    $conn->close();
} else {
    header( 'Location: index.php?p=notas' );

}
?>