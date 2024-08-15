<?php

include_once './conexaocalendar.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_apagar_event = "DELETE FROM events WHERE id=:id";

    $apagar_event = $conne->prepare($query_apagar_event);

    $apagar_event->bindParam(':id', $id);

    // Verifica se foi possível apagar corretamente
    if($apagar_event->execute()){
        $retorna = ['status' => true, 'msg' => 'Evento apagado com sucesso!'];
    }else{
        $retorna = ['status' => false, 'msg' => 'Erro: Evento não apagado!'];
    }

} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Necessário enviar o id do evento!'];
}

echo json_encode($retorna);