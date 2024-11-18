<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">

    <link href="../css/css.css" rel="stylesheet">

    <style>
        .modal-content {
            position: relative;
        }
    </style>

</head>

<body>

    <div class="container" style="margin-left: 100px;">

        <span id="msg"></span>

        <div id='calendar'></div>

    </div>

    <!-- Modal Visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div id="sidebarcolor" class="sidebar-color">
                    <input type="text" class="d-none" id="sidebarColorInput" value="">
                </div>

                <div class="modal-header" style="justify-content: flex-end; padding: 0px;">
                    <h1 class="modal-title fs-5 d-none" style="margin-left: 20px;" id="visualizarModalLabel">Visualizar
                        o
                        Evento</h1>
                    <h1 class="modal-title fs-5" style="margin-left: 20px;" id="editarModalLabel"
                        style="display: none;"></h1>
                    <button type="button" class="btn-cl" data-bs-dismiss="modal">close</button>
                </div>
                <div class="modal-body" style="padding-top: 5px;">

                    <span id="msgViewEvento"></span>

                    <div id="visualizarEvento">

                        <dl class="row">
                            <dt class="col-sm-3 d-none">ID: </dt>
                            <dd class="col-sm-9 d-none" id="visualizar_id"></dd>

                            <dt class="col-sm-3">Título: </dt>
                            <dd class="col-sm-9" id="visualizar_title"></dd>

                            <dt class="col-sm-3">Descrição: </dt>
                            <dd class="col-sm-9" id="visualizar_obs"></dd>

                            <dt class="col-sm-3 hidden">Início: </dt>
                            <dd class="col-sm-9 hidden" id="visualizar_start"></dd>

                            <dt class="col-sm-3 hidden">Fim: </dt>
                            <dd class="col-sm-9 hidden" id="visualizar_end"></dd>

                            <dt class="col-sm-3 hidden">Cor: </dt>
                            <dd class="col-sm-9 hidden" id="visualizar_color"></dd>
                        </dl>

                        <button style="background: transparent; margin-left: 80%; border: 0px; font-size: 30px;"
                            type="button" class="material-symbols-outlined brush" id="btnViewEditEvento">
                            brush</button>

                        <button style="background: transparent; border: 0px; font-size: 30px; color: #ff0000;"
                            type="button" class="material-symbols-outlined" id="btnApagarEvento">
                            delete</button>

                    </div>

                    <div id="editarEvento" style="display: none;">
                        <span id="msgEditEvento"></span>

                        <form method="POST" id="formEditEvento">
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row mb-3" style="width: 125%;">
                                <label for="edit_title" class="col-sm-2 col-form-label d-none">Título:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="edit_title" class="form-control txtarea" id="edit_title"
                                        placeholder="Título do evento">
                                </div>
                            </div>

                            <div class="row mb-3" style="width: 125%;">
                                <label for="edit_obs" class="col-sm-2 col-form-label d-none">Descrição:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="edit_obs" class="form-control txtarea" id="edit_obs"
                                        placeholder="Descrição do evento">
                                </div>
                            </div>

                            <div class="row mb-3 d-none">
                                <label for="edit_start" class="col-sm-2 col-form-label d-none">Início:</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="edit_start" class="form-control date hidden"
                                        id="edit_start">
                                </div>
                            </div>

                            <div class="row mb-3 d-none">
                                <label for="edit_end" class="col-sm-2 col-form-label d-none">Fim:</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="edit_end" class="form-control date hidden"
                                        id="edit_end">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_color" class="col-sm-2 col-form-label d-none">Cor</label>
                                <div class="bolinhas col-sm-10 d-flex flex-wrap justify-content-between"
                                    style="margin-left: 40px;">

                                    <div class="form-check form-check-inline hidden">
                                        <input style="background-color: #F95B99;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color" value="#F95B99">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #8C52FF;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_3" value="#8C52FF">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #CB6CE6;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_2" value="#CB6CE6">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #AA8DE4;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_4" value="#AA8DE4">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #F95B99;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color" value="#F95B99">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FF5757;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_5" value="#FF5757">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FF914D;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_6" value="#FF914D">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FFCF52;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_7" value="#FFCF52">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #FFF178;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_8" value="#FFF178">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #00FFFF;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_9" value="#00FFFF">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #3091FF;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_10" value="#3091FF">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #397D1D;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_11" value="#397D1D">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input style="background-color: #36DF32;" class="form-check-input" type="radio"
                                            name="edit_color" id="edit_color_12" value="#36DF32">
                                    </div>
                                </div>
                            </div>

                            <button style="background: transparent; border: 0px; font-size: 30px;" type="button"
                                class="material-symbols-outlined back" id="btnViewEvento">
                                arrow_back</button>

                            <button style="margin-left: 80%; background: transparent; border: 0px; font-size: 30px;"
                                type="submit" name="btnEditEvento" id="btnEditEvento"
                                class="material-symbols-outlined purple">send</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        


    </script>

    <!-- Modal Cadastrar -->
    <div class="modal fade modal-calendario" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div id="sidebarcolor_cad" class="sidebar-color"></div>

                <div class="modal-header" style="justify-content: flex-end; padding: 0px;">
                    <h1 class="modal-title fs-5" style="margin-left: 20px;" id="cadastrarModalLabel">
                    </h1>
                    <button type="button" class="btn-cl" data-bs-dismiss="modal">close</button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center" style="padding-top: 5px;">

                    <span id="msgCadEvento"></span>

                    <form method="POST" id="formCadEvento" class="w-100">
                        <div class="row mb-3" style="width: 125%;">
                            <label for="cad_title" class="col-sm-2 col-form-label d-none">Título:</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_title" class="form-control txtarea" id="cad_title"
                                    placeholder="Título do evento" required>
                            </div>
                        </div>

                        <div class="row mb-3" style="width: 125%;">
                            <label for="cad_obs" class="col-sm-2 col-form-label d-none">Descrição:</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_obs" class="form-control txtarea" id="cad_obs"
                                    placeholder="Descrição do evento">
                            </div>
                        </div>

                        <div class="row mb-3 d-none">
                            <label for="cad_start" class="col-sm-2 col-form-label d-none">Início:</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_start" class="form-control date hidden"
                                    id="cad_start">
                            </div>
                        </div>

                        <div class="row mb-3 d-none">
                            <label for="cad_end" class="col-sm-2 col-form-label d-none">Fim:</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_end" class="form-control date hidden"
                                    id="cad_end">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label d-none">Cor:</label>
                            <div class="bolinhas col-sm-10 d-flex flex-wrap justify-content-between"
                                style="margin-left: 40px;">

                                <!-- Adicione as cores conforme o padrão -->
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #8C52FF;" class="form-check-input" type="radio"
                                        name="cad_color" id="color1" value="#8C52FF" checked>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #CB6CE6;" class="form-check-input" type="radio"
                                        name="cad_color" id="color2" value="#CB6CE6">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #AA8DE4;" class="form-check-input" type="radio"
                                        name="cad_color" id="color3" value="#AA8DE4">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #F95B99;" class="form-check-input" type="radio"
                                        name="cad_color" id="color4" value="#F95B99">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FF5757;" class="form-check-input" type="radio"
                                        name="cad_color" id="color5" value="#FF5757">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FF914D;" class="form-check-input" type="radio"
                                        name="cad_color" id="color6" value="#FF914D">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FFCF52;" class="form-check-input" type="radio"
                                        name="cad_color" id="color7" value="#FFCF52">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #FFF178;" class="form-check-input" type="radio"
                                        name="cad_color" id="color8" value="#FFF178">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #00FFFF;" class="form-check-input" type="radio"
                                        name="cad_color" id="color9" value="#00FFFF">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #3091FF;" class="form-check-input" type="radio"
                                        name="cad_color" id="color10" value="#3091FF">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #397D1D;" class="form-check-input" type="radio"
                                        name="cad_color" id="color11" value="#397D1D">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="background-color: #36DF32;" class="form-check-input" type="radio"
                                        name="cad_color" id="color12" value="#36DF32">
                                </div>
                            </div>
                        </div>

                        <button style="margin-left: 90%; background: transparent; border: 0px; font-size: 30px;"
                            type="submit" name="btnCadEvento" id="btnCadEvento"
                            class="material-symbols-outlined purple">
                            send</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div id="popup-overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;">
    </div>

    <div id="popup"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
        <p id="popup-message" style="margin: 0; font-size: 18px; font-weight: bold;"></p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src='js/index.global.min.js'></script>
    <script src="js/bootstrap5/index.global.min.js"></script>
    <script src='js/core/locales-all.global.min.js'></script>
    <script src='js/custom.js'></script>

    <script>
        // Função para exibir o popup com a mensagem
        function showPopupMessage(message) {
            document.getElementById('popup-message').innerText = message;
            document.getElementById('popup-overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';

            setTimeout(function () {
                document.getElementById('popup-overlay').style.display = 'none';
                document.getElementById('popup').style.display = 'none';
            }, 3000);
        }

        // Função chamada no envio do formulário
        document.getElementById('formCadEvento').addEventListener('submit', function (e) {
            e.preventDefault(); // Impede o envio padrão do formulário

            // Lógica de envio do formulário (AJAX ou outro método)

            // Armazena o sucesso no sessionStorage
            sessionStorage.setItem('eventoCadastrado', 'true');

            // Recarrega a página
            location.reload();
        });

        // Verifica se o evento foi cadastrado após o reload da página
        document.addEventListener('DOMContentLoaded', function () {
            // Se houver a chave 'eventoCadastrado' no sessionStorage, exibe o popup
            if (sessionStorage.getItem('eventoCadastrado') === 'true') {
                showPopupMessage("Evento cadastrado com sucesso");
                sessionStorage.removeItem('eventoCadastrado'); // Remove a chave após exibir o popup
            }
        });

        // Função para atualizar a cor da barra lateral no modal de edição
        function updateSidebarEditColor(color) {
            const sidebarColorElement = document.getElementById('sidebarcolor');
            if (sidebarColorElement) {
                sidebarColorElement.style.backgroundColor = color;
            }
        }

        // Seleciona todos os radio buttons que representam as cores no modal de edição
        const colorRadios = document.querySelectorAll('input[name="edit_color"]');
        colorRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    updateSidebarEditColor(this.value); // Atualiza a cor da barra lateral no modal de edição
                }
            });
        });

        // Função para atualizar a cor da barra lateral no modal de cadastro
        function updateSidebarCadColor(cad_color) {
            const sidebarColorElement = document.getElementById('sidebarcolor_cad');
            if (sidebarColorElement) {
                sidebarColorElement.style.backgroundColor = cad_color;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Atualização da barra lateral no modal de cadastro
            const colorInputsCad = document.querySelectorAll('input[name="cad_color"]');
            colorInputsCad.forEach(input => {
                input.addEventListener('change', function () {
                    updateSidebarCadColor(this.value); // Chama a função para atualizar a cor no modal de cadastro
                });
            });
        });

        // Exibe a cor do evento quando o modal de visualização é aberto
        document.getElementById('visualizarModal').addEventListener('show.bs.modal', function (event) {
            const eventColor = event.relatedTarget.getAttribute('data-event-color');
            updateSidebarEditColor(eventColor); // Atualiza a cor da barra lateral no modal de edição
        });

        document.getElementById('formCadEvento').addEventListener('submit', function (e) {
            var titulo = document.getElementById('cad_title').value;
            var descricao = document.getElementById('cad_obs').value;

            // Validação do campo título
            if (!titulo) {
                alert('Por favor, preencha o título do evento.');
                e.preventDefault(); // Impede o envio do formulário
                return false;
            }

            // Verifica se a descrição está vazia, se sim, define "Evento sem descrição"
            if (!descricao) {
                document.getElementById('cad_obs').value = "Evento sem descrição.";
            }

            // Aqui você pode adicionar mais validações, se necessário
        });
    </script>

    <script>
        // Função para atualizar o valor do input com a cor de fundo da div
        function updateInputWithBackgroundColor() {
            const sidebarColorDiv = document.getElementById('sidebarcolor');
            const sidebarColorInput = document.getElementById('sidebarColorInput');

            // Obtém o estilo de fundo da div e atribui ao valor do input
            const backgroundColor = window.getComputedStyle(sidebarColorDiv).backgroundColor;
            sidebarColorInput.value = backgroundColor;
        }

        // Inicializa o valor do input ao carregar a página
        updateInputWithBackgroundColor();

        // Exemplo: Atualize o valor do input quando a cor de fundo mudar (caso seja mudada por um evento)
        sidebarColorDiv.style.backgroundColor = "nova_cor"; // Exemplo de como alterar a cor
        updateInputWithBackgroundColor(); // Chame a função novamente para atualizar o input
    </script>

</body>

</html>