<?php
// Defina as variáveis de conexão com o banco de dados
$host = 'localhost';
$dbname = 'tcc';
$user = 'root';
$password = '';

// Tente se conectar ao banco de dados
try {
    // Cria uma nova instância do objeto PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    // Configura o modo de erro para lançar exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se ocorrer um erro de conexão, exibe a mensagem de erro
    echo 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    exit();
}
?>
