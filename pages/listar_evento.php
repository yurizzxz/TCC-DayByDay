<?php

include_once './conexao.php';

$query_events = "SELECT id, title, color, start, end, obs
                FROM events";

$result_events = $conn->prepare($query_events);

$result_events->execute();

$eventos = [];

// Percorrer a lista de registros retornado do banco de dados
while ($row_events = $result_events->fetch(PDO::FETCH_ASSOC)) {

    extract($row_events);

    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end,
        'obs' => $obs
    ];
}

echo json_encode($eventos);