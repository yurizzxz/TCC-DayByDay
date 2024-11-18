<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['idUsuario'])) {
    echo "<p>Você precisa estar logado para ver seus eventos.</p>";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$idUsuario = $_SESSION['idUsuario'];

$query = "SELECT * FROM events WHERE id_usuario = ? AND end >= NOW() ORDER BY end ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idUsuario); // 'i' para inteiro
$stmt->execute();
$result = $stmt->get_result();

echo "<h2 style='font-size: 18px; margin-bottom: 15px;'>Eventos Próximos de Expirar:</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $titulo = $row['title'];
        $data = date('d/m/Y', strtotime($row['end']));
        $color = $row['color'];

        echo "<div class='mb-3' style='border-left: 5px solid $color; padding: 10px; margin-bottom: 10px;'>
                <strong>$titulo</strong> - $data
              </div>";
    }
} else {
    echo "<p>Nenhum evento próximo de expirar encontrado.</p>";
}

$stmt->close(); 
$conn->close();
?>
