<?php
require 'conexaocalendar.php'; // Conecta ao seu banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : ''; // Obtém o ID do evento enviado via POST

    // Verifica se o ID está presente
    if (empty($id)) {
        echo json_encode(['success' => false, 'message' => 'ID do evento não fornecido.']);
        exit;
    }

    try {
        // Prepara a consulta para buscar a cor do evento
        $query = "SELECT color FROM events WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Corrige o bindParam com o nome correto

        // Executa a consulta
        if ($stmt->execute()) {
            $event = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se encontrou o evento
            if ($event) {
                echo json_encode(['success' => true, 'color' => $event['color']]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Evento não encontrado.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao executar a consulta.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}
