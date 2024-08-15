<?php
include_once './conexaocalendar.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_cad_event = "INSERT INTO events (title, color, start, end, obs) VALUES (:title, :color, :start, :end, :obs)";

try {

    $cad_event = $conne->prepare($query_cad_event);
    // Substitue os placeholders pelos valores recebidos
    $cad_event->bindParam(':title', $dados['cad_title']);
    $cad_event->bindParam(':color', $dados['cad_color']);
    $cad_event->bindParam(':start', $dados['cad_start']);
    $cad_event->bindParam(':end', $dados['cad_end']);
    $cad_event->bindParam(':obs', $dados['cad_obs']);
    
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

if ($stmt->execute()) {
    $_SESSION['mensagem'] = 'Categoria excluída com sucesso.';
    header('Location: index.php?p=notas');
} else {
    $_SESSION['mensagem'] = 'Erro ao excluir a categoria: ' . $stmt->error;
    header('Location: index.php?p=editar_categoria&id=' . $id_categoria);
}

echo json_encode($retorna);