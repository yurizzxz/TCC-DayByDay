document.addEventListener('DOMContentLoaded', function () {

    // Função genérica para exibir o popup com uma mensagem personalizada
    function showPopupMessage(message) {
        document.getElementById('popup-message').innerText = message;
        document.getElementById('popup-overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
        setTimeout(function () {
            document.getElementById('popup-overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }, 3000); // Oculta o popup após 3 segundos
    }

    var calendarEl = document.getElementById('calendar');
    const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));
    const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));
    const msgViewEvento = document.getElementById('msgViewEvento');

    function changeSidebarColor(color) {
        var sidebar = document.getElementById('sidebarcolor');
        if (sidebar) {
            sidebar.style.backgroundColor = color;
        }
    }

    function loadEventColor() {
        // Pegando o valor do id e da cor dentro dos elementos <dd>
        const eventId = document.getElementById("visualizar_id").textContent.trim();
        const eventColor = document.getElementById("visualizar_color").textContent.trim();

        // Verifica se o id e a cor foram encontrados
        if (!eventId) {
            console.error("ID do evento não fornecido.");
            return;
        }
        if (!eventColor) {
            console.error("Cor do evento não fornecida.");
            return;
        }

        // Atualiza a cor da barra lateral
        changeSidebarColor(eventColor); // Muda a cor da barrinha

        // Atualiza o elemento <dd> com a cor (caso ainda não tenha sido atualizado)
        document.getElementById("visualizar_color").textContent = eventColor;
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: 'title',
            center: '',
            right: 'today prev,next dayGridMonth multiMonthYear'
        },
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true,
        events: 'listar_evento.php',
        dayCellClassNames: function (arg) {
            const today = new Date();
            if (
                arg.date.getFullYear() === today.getFullYear() &&
                arg.date.getMonth() === today.getMonth() &&
                arg.date.getDate() === today.getDate()
            ) {
                return ['day-today'];
            }
            return [];
        },

        eventDrop: function (info) {
            // Função para ajustar a data com o fuso horário local
            function ajustarFusoHorario(date) {
                // Retorna a data ajustada para o fuso local sem mudar o horário visual
                return new Date(date.getTime() - (date.getTimezoneOffset() * 60000));
            }

            // Ajusta a nova data de início e fim considerando o fuso horário local
            var newStart = ajustarFusoHorario(info.event.start).toISOString().slice(0, 19).replace('T', ' ');
            var newEnd = info.event.end ? ajustarFusoHorario(info.event.end).toISOString().slice(0, 19).replace('T', ' ') : newStart;

            // Envia a atualização para o servidor
            $.ajax({
                url: 'editar_evento.php',
                type: 'POST',
                data: {
                    edit_id: info.event.id, // ID do evento
                    edit_start: newStart,   // Nova data de início
                    edit_end: newEnd,       // Nova data de fim
                    edit_title: info.event.title,  // Título (caso você também queira permitir edição)
                    edit_color: info.event.backgroundColor, // Cor
                    edit_obs: info.event.extendedProps.obs  // Observações
                },
                success: function (response) {
                    try {
                        response = JSON.parse(response);
                        if (response.status) {
                            showPopupMessage('Data do evento atualizada com sucesso!');
                        } else {
                            showPopupMessage(response.msg);
                            info.revert(); // Reverte a posição do evento no calendário
                        }
                    } catch (e) {
                        console.error('Erro ao analisar resposta do servidor:', e);
                        info.revert();
                    }
                },
                error: function () {
                    showPopupMessage('Erro ao atualizar a data do evento.');
                    info.revert();
                }
            });
        },



        eventClick: function (info) {
            const edit_color = info.event.backgroundColor;

            var sidebar = document.getElementById('sidebarcolor');
            if (sidebar) {
                sidebar.style.backgroundColor = edit_color;
            } else {
                console.error("Elemento 'sidebarcolor' não encontrado.");
            }

            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("visualizarModalLabel").style.display = "block";
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("editarModalLabel").style.display = "none";
            document.getElementById("visualizar_id").innerText = info.event.id;
            document.getElementById("visualizar_title").innerText = info.event.title;
            document.getElementById("visualizar_color").innerText = info.event.backgroundColor;
            document.getElementById("visualizar_obs").innerText = info.event.extendedProps.obs;
            document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
            document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.toLocaleString() : info.event.start.toLocaleString();
            document.getElementById("edit_id").value = info.event.id;
            document.getElementById("edit_title").value = info.event.title;
            document.getElementById("edit_obs").value = info.event.extendedProps.obs;
            document.getElementById("edit_start").value = converterData(info.event.start);
            document.getElementById("edit_end").value = info.event.end !== null ? converterData(info.event.end) : converterData(info.event.start);
            document.getElementById("edit_color").value = info.event.backgroundColor;

            // Função para carregar a cor do evento do banco de dados
            loadEventColor(info.event.id);

            // Exibe o modal
            visualizarModal.show();

            // Lógica para atualizar a seleção de cores
            // Obtém o valor da cor do elemento <dd> com id "visualizar_color"
            const visualizarColorElement = document.getElementById("visualizar_color");

            // Verifica se o elemento e seu conteúdo existem
            if (visualizarColorElement) {
                const selectedColor = visualizarColorElement.textContent.trim();
                console.log("Valor de cor selecionado:", selectedColor); // Exibe para verificação

                // Seleciona todos os inputs do tipo radio com o nome "edit_color"
                const colorOptions = document.querySelectorAll('input[name="edit_color"]');

                // Itera sobre as opções de cor e define o checked no valor correspondente
                let colorFound = false;
                colorOptions.forEach(option => {
                    if (option.value === selectedColor) {
                        option.checked = true;
                        colorFound = true;
                    } else {
                        option.checked = false;
                    }
                });

                if (!colorFound) {
                    console.error("Nenhuma cor correspondente encontrada para:", selectedColor);
                }
            } else {
                console.error("Elemento 'visualizar_color' não encontrado.");
            }
        },
        select: function (info) {
            document.getElementById("cad_start").value = converterData(info.start);
            document.getElementById("cad_end").value = converterData(info.start);
            cadastrarModal.show();
        },
        datesSet: function () {
            updateTodayButtonVisibility();
        }

    });

    function updateTodayButtonVisibility() {
        const todayButton = document.querySelector('.fc-today-button');
        if (todayButton) {
            const view = calendar.view;
            const viewStart = view.currentStart;
            const viewEnd = view.currentEnd;
            const today = new Date();

            // Verifica se a data atual está dentro do intervalo de datas da visualização
            if (today >= viewStart && today <= viewEnd) {
                todayButton.classList.add('hidden');
            } else {
                todayButton.classList.remove('hidden');
            }
        }
    }

    calendar.render();

    var dayGridMonthButton = document.querySelector('.fc-dayGridMonth-button');
    var multiMonthYearButton = document.querySelector('.fc-multiMonthYear-button');

    if (dayGridMonthButton) {
        dayGridMonthButton.classList.add('hidden');
    }

    // Adicionando event listeners para os botões
    if (dayGridMonthButton) {
        dayGridMonthButton.addEventListener('click', function () {
            dayGridMonthButton.classList.add('hidden');
            multiMonthYearButton.classList.remove('hidden');
        });
    }

    if (multiMonthYearButton) {
        multiMonthYearButton.addEventListener('click', function () {
            multiMonthYearButton.classList.add('hidden');
            dayGridMonthButton.classList.remove('hidden');
        });
    }

    // Inicializa a visibilidade do botão "Hoje" ao carregar a página
    updateTodayButtonVisibility();

    function converterData(data) {
        const dataObj = new Date(data);
        const ano = dataObj.getFullYear();
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
        const dia = String(dataObj.getDate()).padStart(2, '0');
        const hora = String(dataObj.getHours()).padStart(2, '0');
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    }

    const formCadEvento = document.getElementById("formCadEvento");
    const msgCadEvento = document.getElementById("msgCadEvento");
    const btnCadEvento = document.getElementById("btnCadEvento");

    if (formCadEvento) {
        formCadEvento.addEventListener("submit", async (e) => {
            e.preventDefault();
            btnCadEvento.value = "Salvando...";
            const dadosForm = new FormData(formCadEvento);
            const dados = await fetch("cadastrar_evento.php", {
                method: "POST",
                body: dadosForm
            });
            const resposta = await dados.json();
            if (!resposta['status']) {
                // Trate o erro aqui se necessário
            } else {
                msgCadEvento.innerHTML = "";
                formCadEvento.reset();
                const novoEvento = {
                    id: resposta['id'],
                    title: resposta['title'],
                    color: resposta['color'],
                    start: resposta['start'],
                    end: resposta['end'],
                    obs: resposta['obs'],
                }
                calendar.addEvent(novoEvento);
                showPopupMessage("Evento cadastrado com sucesso!");
                cadastrarModal.hide();
            }
            btnCadEvento.value = "Cadastrar";
        });
    }

    const btnViewEditEvento = document.getElementById("btnViewEditEvento");
    if (btnViewEditEvento) {
        btnViewEditEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "none";
            document.getElementById("visualizarModalLabel").style.display = "none";
            document.getElementById("editarEvento").style.display = "block";
            document.getElementById("editarModalLabel").style.display = "block";
        });
    }

    const btnViewEvento = document.getElementById("btnViewEvento");
    if (btnViewEvento) {
        btnViewEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("visualizarModalLabel").style.display = "block";
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("editarModalLabel").style.display = "none";
        });
    }

    const formEditEvento = document.getElementById("formEditEvento");
    const msgEditEvento = document.getElementById("msgEditEvento");
    const btnEditEvento = document.getElementById("btnEditEvento");

    if (formEditEvento) {
        formEditEvento.addEventListener("submit", async (e) => {
            e.preventDefault();
            btnEditEvento.value = "Salvando...";
            const dadosForm = new FormData(formEditEvento);
            const dados = await fetch("editar_evento.php", {
                method: "POST",
                body: dadosForm
            });
            const resposta = await dados.json();
            if (!resposta['status']) {
                msgEditEvento.innerHTML = 'Erro ao salvar o evento'; // Corrija conforme necessário
            } else {
                msgEditEvento.innerHTML = "";
                formEditEvento.reset();
                const eventoExiste = calendar.getEventById(resposta['id']);
                if (eventoExiste) {
                    eventoExiste.setProp('title', resposta['title']);
                    eventoExiste.setProp('color', resposta['color']);
                    eventoExiste.setExtendedProp('obs', resposta['obs']);
                    eventoExiste.setStart(resposta['start']);
                    eventoExiste.setEnd(resposta['end']);
                }
                showPopupMessage("Evento editado com sucesso!");
                visualizarModal.hide();
            }
            btnEditEvento.value = "Salvar";
        });
    }

    const btnApagarEvento = document.getElementById("btnApagarEvento");
    if (btnApagarEvento) {
        btnApagarEvento.addEventListener("click", async () => {
            const confirmacao = window.confirm("Tem certeza de que deseja apagar este evento?");
            if (confirmacao) {
                var idEvento = document.getElementById("visualizar_id").textContent;
                const dados = await fetch("apagar_evento.php?id=" + idEvento);
                const resposta = await dados.json();
                if (!resposta['status']) {
                    msgViewEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
                } else {
                    msgViewEvento.innerHTML = "";
                    const eventoExisteRemover = calendar.getEventById(idEvento);
                    if (eventoExisteRemover) {
                        eventoExisteRemover.remove();
                    }
                    showPopupMessage("Evento apagado com sucesso!");
                    visualizarModal.hide();
                }
            }
        });
    }

    // Ajusta o carregamento da cor do evento ao abrir o modal de visualização
    $('#visualizarModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que abriu o modal
        var eventId = button.data('id'); // Id do evento passado no botão
        loadEventColor(eventId); // Chama a função com o ID do evento
    });

});
