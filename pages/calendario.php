<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link href="../css/css.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <span id="msg"></span>

        <div id='calendar'></div>

    </div>

    <!-- Modal Visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar o Evento</h1>

                    <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;">Editar o Evento</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgViewEvento"></span>

                    <div id="visualizarEvento">

                        <dl class="row">

                            <dt class="col-sm-3">ID: </dt>
                            <dd class="col-sm-9" id="visualizar_id"></dd>

                            <dt class="col-sm-3">Título: </dt>
                            <dd class="col-sm-9" id="visualizar_title"></dd>

                            <dt class="col-sm-3">Descrição: </dt>
                            <dd class="col-sm-9" id="visualizar_obs"></dd>

                            <dt class="col-sm-3">Início: </dt>
                            <dd class="col-sm-9" id="visualizar_start"></dd>

                            <dt class="col-sm-3">Fim: </dt>
                            <dd class="col-sm-9" id="visualizar_end"></dd>

                        </dl>

                        <button style="background: transparent; margin-left: 80%; border: 0px; font-size: 30px;" type="button" class="material-symbols-outlined" id="btnViewEditEvento">
                            brush</button>

                        <button style="background: transparent; border: 0px; font-size: 30px; color: #ff0000;" type="button" style="color: red;" class="material-symbols-outlined" id="btnApagarEvento">
                            delete</button>

                    </div>

                    <div id="editarEvento" style="display: none;">

                        <span id="msgEditEvento"></span>

                        <form method="POST" id="formEditEvento">

                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row mb-3">
                                <label for="edit_title" class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input type="text" name="edit_title" class="form-control" id="edit_title" placeholder="Título do evento">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_obs" class="col-sm-2 col-form-label">Descrição</label>
                                <div class="col-sm-10">
                                    <input type="text" name="edit_obs" class="form-control" id="edit_obs" placeholder="Descrição do evento">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_start" class="col-sm-2 col-form-label">Início</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="edit_start" class="form-control" id="edit_start">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_end" class="col-sm-2 col-form-label">Fim</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="edit_end" class="form-control" id="edit_end">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_color" class="col-sm-2 col-form-label">Cor</label>
                                <div class="bolinhas col-sm-10 d-flex flex-wrap justify-content-between">

                                    <div style="width: 1px; height: 1px;" class="form-check form-check-inline">
                                        <input style="border: 0px; width: 1px; height: 1px;" class="form-check-input" type="radio" name="edit_color" id="edit_color" value="#">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #F95B99;" class="form-check-input" type="radio" name="edit_color" id="edit_color" value="#F95B99">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #CB6CE6;" class="form-check-input" type="radio" name="edit_color" id="edit_color_2" value="#CB6CE6">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #8C52FF;" class="form-check-input" type="radio" name="edit_color" id="edit_color_3" value="#8C52FF">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #AA8DE4;" class="form-check-input" type="radio" name="edit_color" id="edit_color_4" value="#AA8DE4">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FF5757;" class="form-check-input" type="radio" name="edit_color" id="edit_color_5" value="#FF5757">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FF914D;" class="form-check-input" type="radio" name="edit_color" id="edit_color_6" value="#FF914D">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FFCF52;" class="form-check-input" type="radio" name="edit_color" id="edit_color_7" value="#FFCF52">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FFF178;" class="form-check-input" type="radio" name="edit_color" id="edit_color_8" value="#FFF178">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #040404;" class="form-check-input" type="radio" name="edit_color" id="edit_color_9" value="#040404">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #B6B5B5;" class="form-check-input" type="radio" name="edit_color" id="edit_color_10" value="#B6B5B5">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #397D1D;" class="form-check-input" type="radio" name="edit_color" id="edit_color_11" value="#397D1D">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #36DF32;" class="form-check-input" type="radio" name="edit_color" id="edit_color_12" value="#36DF32">
                                    </div>
                                </div>
                            </div>

                            <button style="background: transparent; border: 0px; font-size: 30px;" type="button" class="material-symbols-outlined" id="btnViewEvento">
                                arrow_back</button>

                            <button style="margin-left: 80%; color: #8C52FF; background: transparent; border: 0px; font-size: 30px;" type="submit" name="btnEditEvento" id="btnEditEvento" class="material-symbols-outlined">send</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar o Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgCadEvento"></span>

                    <form method="POST" id="formCadEvento">

                        <div class="row mb-3">
                            <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_title" class="form-control" id="cad_title" placeholder="Título do evento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_obs" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_obs" class="form-control" id="cad_obs" placeholder="Descrição do evento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_start" class="col-sm-2 col-form-label">Início</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_start" class="form-control" id="cad_start">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_end" class="col-sm-2 col-form-label">Fim</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_end" class="form-control" id="cad_end">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label">Cor</label>
                            <div class="bolinhas col-sm-10 d-flex flex-wrap justify-content-between">

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #F95B99;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#F95B99">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #CB6CE6;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#CB6CE6">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #8C52FF;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#8C52FF">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #AA8DE4;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#AA8DE4">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FF5757;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#FF5757">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FF914D;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#FF914D">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FFCF52;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#FFCF52">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FFF178;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#FFF178">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #040404;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#040404">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #B6B5B5;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#B6B5B5">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #397D1D;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#397D1D">
                                </div>

                                <div class="form-check form-check-inline">
                                    <input style="background-color: #36DF32;" class="form-check-input" type="radio" name="cad_color" id="inlineRadio2" value="#36DF32">
                                </div>
                            </div>
                        </div>

                        <button style="margin-left: 90%; color: #8C52FF; background: transparent; border: 0px; font-size: 30px;" type="submit" name="btnCadEvento" id="btnCadEvento" class="material-symbols-outlined">send</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    
    <div class="content">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src='js/index.global.min.js'></script>
        <script src="js/bootstrap5/index.global.min.js"></script>
        <script src='js/core/locales-all.global.min.js'></script>
        <script src='js/custom.js'></script>

</body>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {

        var visualizarIdDt = document.getElementById("visualizar_id").previousElementSibling;
        var visualizarIdDd = document.getElementById("visualizar_id");

        visualizarIdDt.style.display = "none";
        visualizarIdDd.style.display = "none";
    });
</script>

</html>