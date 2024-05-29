<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o botão de confirmação foi clicado
    if (isset($_POST["btnconfirmar"])) {
        // Mensagem de depuração para verificar se os dados do formulário estão sendo recebidos corretamente
        echo "Dados recebidos do formulário:";
        var_dump($_POST); // Exibe os dados recebidos do formulário

        // Prepara a instrução SQL para inserir os dados na tabela nota
        $sql = "INSERT INTO nota (titulo, subtitulo, conteudo, cor) VALUES (:titulo, :subtitulo, :conteudo, :cor)";

        // Mensagem de depuração para verificar a consulta SQL
        echo "Consulta SQL: $sql";

        try {
            // Prepara e executa a consulta
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $_POST['txttitulo'],
                ':subtitulo' => $_POST['txtsubtitulo'],
                ':conteudo' => $_POST['txtconteudo'],
                ':cor' => $_POST['cor']
            ]);

            // Mensagem de sucesso se a consulta for executada sem erros
            echo "Nota salva com sucesso!";
        } catch (PDOException $e) {
            // Mensagem de erro se houver uma exceção durante a execução da consulta
            echo "Erro ao salvar a nota: " . $e->getMessage();
        }
    }
}
?>
