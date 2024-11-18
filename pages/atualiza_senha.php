<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $novaSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $host = 'localhost';
    $dbname = 'tcc';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar o token
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE reset_token = :token AND reset_token_expires > NOW()");
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch();

        if (!$user) {
            die('Token inválido ou expirado!');
        }

        $stmt = $pdo->prepare("UPDATE usuarios SET senha = :senha, reset_token = NULL, reset_token_expires = NULL WHERE id = :id");
        $stmt->execute([
            'senha' => $novaSenha,
            'id' => $user['id']
        ]);

        echo 'Senha redefinida com sucesso!';
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}
?>
