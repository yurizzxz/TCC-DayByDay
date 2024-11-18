<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

include_once './conexaocalendar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (isset($dados['cad_title'], $dados['cad_color'], $dados['cad_start'], $dados['cad_end'], $dados['cad_obs'])) {
        $id_usuario = $_SESSION['idUsuario']; // Recupera o ID do usuário da sessão

        $query_cad_event = "INSERT INTO events (title, color, start, end, obs, id_usuario) VALUES (:title, :color, :start, :end, :obs, :id_usuario)";

        try {
            $cad_event = $conne->prepare($query_cad_event);
            $cad_event->bindParam(':title', $dados['cad_title']);
            $cad_event->bindParam(':color', $dados['cad_color']);
            $cad_event->bindParam(':start', $dados['cad_start']);
            $cad_event->bindParam(':end', $dados['cad_end']);
            $cad_event->bindParam(':obs', $dados['cad_obs']);
            $cad_event->bindParam(':id_usuario', $id_usuario);

            $cad_event->execute();

            $lastInsertId = $conne->lastInsertId();

            if ($lastInsertId) {
                $retorna = [
                    'status' => true,
                    'mensagem' => 'Evento cadastrado com sucesso!',
                    'id' => $lastInsertId,
                    'title' => $dados['cad_title'],
                    'color' => $dados['cad_color'],
                    'start' => $dados['cad_start'],
                    'end' => $dados['cad_end'],
                    'obs' => $dados['cad_obs']
                ];
            } else {
                $retorna = ['status' => false, 'mensagem' => 'Erro: Não foi possível obter o ID do evento cadastrado!'];
            }
        } catch (PDOException $e) {
            $retorna = ['status' => false, 'mensagem' => 'Erro: Evento não cadastrado! Detalhes: ' . $e->getMessage()];
        }

        echo json_encode($retorna);
    } else {
        echo json_encode(['status' => false, 'mensagem' => 'Erro: Dados insuficientes para cadastrar o evento.']);
    }
} else {
    echo json_encode(['status' => false, 'mensagem' => 'Erro: Método de requisição inválido.']);
}
?>
