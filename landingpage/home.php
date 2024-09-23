<style>
:root {
    --navbar-color: ;
    --landing-color: ;
    --content-landing-color: ;
    --title-color: ;
    --text-color: ;
}

.home-landing #text-lg {
    font-size: 4rem;
}

#lead-landing {
    font-size: 1.3rem;
}

.landing-page {
    background: linear-gradient(to bottom, #ffffff 0%, #ffffff 70%, #FCFCFC 100%);
    height: 93vh;
}

.landing-button #login-hub {
    display: inline-block;
    text-align: center;
    padding: 0.6rem 1.5rem;
    font-weight: bold;
    color: black;
    text-decoration: none;
    border: 2px solid #8C52FF;
    font-size: 23px;
    border-radius: 6px;
    margin-left: auto;
    margin-right: auto;
    transition: 0.3s ease-in-out;
}

.landing-button #login-hub:hover {
    display: inline-block;
    font-weight: bold;
    color: white;
    text-decoration: none;
    background: #A200FF;
    transition: 0.3s ease-in-out;
}

.content-landing #text-lg,
.calendar-content #text-lg,
.create-note #text-lg,
.about-us #text-lg,
.questions #text-lg {
    font-size: 3.3rem;
}

.content-landing {
    height: 90%;
    background: #A200FF;
    color: white;
}


.content-landing .lead {
    font-size: 1.3rem;
}

.content-landing .sliders {
    display: flex;
    justify-content: flex-start;
    padding-block: 7px;
    gap: 10px;
}

.content-landing .sliders .color-carousel-button {
    padding: 15px;
    border-radius: 50%;
    cursor: pointer;
}

.active {
    transform: scale(1.2);
    border: 1.5px solid;
}

.calendar-content {
    padding-block: 65px;
}

.about-us {
    padding-block: 75px;
}

.student {
    color: #8C52FF;
}

.create-note {
    background: url(../img/pattern-lapis.jpg);
    padding-block: 30px;
    background-color: rgba(255, 255, 255, 0.95);
    filter: grayscale(100%);
    background-blend-mode: lighten;
}

.create-note .container {
    display: flex;
    justify-content: center;
    align-items: center;
}


/* responsive details */

@media (max-width: 768px) {
    #text-lg {
        font-size: 3.2rem;
    }

    .content-landing #text-lg {
        font-size: 2.5rem;
        padding-top: 25px;
    }

    #texto-lateral-l {
        font-size: 4vw;
        width: 100%;
        font-weight: bolder;
    }

    #lead-landing {
        font-size: 1.2rem;
    }

    .landing-button #login-hub {
        max-width: 600px;
        width: 100%;
    }

    .home-landing #text-lg {
        font-size: 3rem;
    }
}

@media (max-width: 637px) {


    #divider {
        margin-bottom: 15%;
        margin-top: 15%;
    }

    #texto-lateral-l {
        font-size: 9vw;
        width: 100%;
        font-weight: bolder;
    }
}

@media (max-width: 500px) {
    #text-lg {
        font-size: 2.7rem;
    }

    .content-landing #text-lg {
        font-size: 2rem;
    }
}

@media (max-width: 365px) {
    #text-lg {
        font-size: 2.5rem;
    }

    #lead-landing {
        font-size: 1.1rem;
    }

    .content-landing #text-lg {
        font-size: 1.8rem;
    }

    .home-landing #text-lg {
        margin-top: 30px;
        font-size: 2.5rem;
    }
}

@media (max-width: 345px) {
    .home-landing #text-lg {
        margin-top: 0px;
    }

    #text-lg {
        font-size: 2rem;
    }

    .content-landing #text-lg {
        font-size: 1.5rem;
    }
}



@media (max-height: 715px) {
    .landing-page {
        margin-top: 100px;
    }
}

@media (max-height: 665px) {
    .landing-page {
        margin-top: 70px;
    }
}

@media (max-height: 645px) {
    .landing-page {
        margin-top: 75px;
    }
}


.carousel-container {
    position: relative;
    width: 100%;
    max-width: 1250px;
    margin: auto;
    overflow: hidden;
}

.carousel-slide {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-image {
    min-width: 100%;
    height: auto;
    object-fit: contain;
}

.prev,
.next {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 50%;
    opacity: 0;
    background: transparent;
    border: none;
    cursor: pointer;
}


.prev {
    left: 0;
}

.next {
    right: 0;
}

/* faq */
.accordion-button {
    padding-block: 55px;
    font-size: 27px;
    font-weight: bold;
}

.accordion-item:not(.collapsed) {
    box-shadow: 0 0 0 0;
}

.accordion-button:not(.collapsed) {
    padding-block: 35px;
    box-shadow: 0 0 0 0;
    color: white;
    background-color: #8c52ff !important;
}

.accordion-button:focus {
    box-shadow: 0 0 0 0;
}

.accordion-body {
    color: white;
    padding-bottom: 30px;
    background: #8C52FF;
}
</style>


<section class="principal" id="home-landing">
    <main class="home-landing">
        <div class="landing-page d-flex align-items-center justify-content-center" id="ctner-landing"
            style="z-index:-99;">
            <section class="py-5 container">
                <div class="row justify-content-center" id="rowlanding">

                    <div class="col-md-6 order-md-1 mb-4">
                        <h1 class="fw-bold mb-2" id="text-lg">Seu bloco de notas em cliques!</h1>
                        <p class="lead" id="lead-landing">Com o DayByDay, suas anotações ficam estruturadas com apenas
                            alguns cliques. Crie, categorize e acesse de maneira fácil e rápida. Tudo que você precisa,
                            na palma da sua mão!</p>
                        <div class="landing-button mt-3">
                            <a href="../pages/login.php" class="my-2" id="login-hub">Começar Agora</a>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center order-md-1">
                        <img src="../img/apresentação.png"
                            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            width="800" height="500" focusable="false">
                        </img>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!--landing-content-->
    <article class="content-landing" id="cat-divisao">
        <section class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row featurette justify-content-center align-items-center">
                    <div class="col-md-6 order-md-1">
                        <h1 class="fw-bold mb-2" id="text-lg">
                            <span class="color-slide"></span>Suas notas com
                            <span class="color-slide">Categorias!</span>
                        </h1>
                        <p class="lead mb-5" id="text-leading">
                            Agora você pode ver suas notas de forma clara e personalizadas. Separe suas anotações e
                            eventos por temas, matérias ou projetos, e tenha tudo organizado e acessível.
                        </p>
                        <h4 class="fw-bold">Qual cor é a próxima?</h4>
                        <div class="sliders color-buttons d-flex justify-content-start mt-3 mb-4">
                            <div class="color-carousel-button btn btn-green active" style="background-color: #FF914D"
                                onclick="changeCarousel(0, this, '#FF914D', '../img/orange-notes.png')">
                            </div>
                            <div class="color-carousel-button btn btn-orange" style="background-color: #FF5757"
                                onclick="changeCarousel(1, this, '#FF5757', '../img/red-notes.png')">
                            </div>
                            <div class="color-carousel-button btn btn-red" style="background-color: #36DF32;"
                                onclick="changeCarousel(2, this, '#36DF32', '../img/green-notes.png')">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center order-md-2">
                        <img id="carousel-image" src="../img/orange-notes.png"
                            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            width="800" height="600" focusable="false">
                        </img>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <article class="calendar-content" id="calendario">
        <section class="container mt-5 mb-5">
            <div class="row featurette justify-content-center align-items-center" id="leading">
                <div class="col-md-6 order-md-2">
                    <h1 class="fw-bold mb-3" id="text-lg">Calendário</h1>
                    <p class="lead mb-3" id="text-leading">Organize seu dia a dia com calendário do DayByDay! Com ele,
                        você pode marcar eventos, definir lembretes e visualizar sua semana ou mês com clareza.
                        Personalize suas atividades com cores e categorias.
                        <br>Acesse de qualquer lugar e tenha o controle total da sua agenda!
                    </p>

                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center order-md-1">
                    <img src="../img/Calendário.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="550"
                        height="500" focusable="false">
                    </img>
                </div>
            </div>
        </section>
    </article>

    <article class="create-note mt-5">
        <section class="container">
            <h1 class="fw-bold mb-3" id="text-lg">Crie Notas do Seu Jeito!</h1>
        </section>

        <section class="container">
            <div class="carousel-container mt-3">
                <div class="carousel-slide">
                    <img src="../img/nt1.png" class="carousel-image">
                    <img src="../img/nt2.png" class="carousel-image">
                    <img src="../img/nt3.png" class="carousel-image">
                    <img src="../img/nt4.png" class="carousel-image">
                    <img src="../img/nt5.png" class="carousel-image">
                </div>

                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </section>
    </article>

    <article class="about-us" id="about">
        <section class="container">
            <div class="row featurette justify-content-center align-items-center" style="margin-block: 50px"
                id="leading">
                <div class="col-md-6 order-md-1">
                    <h5 class="student">#SobreNós</h5>
                    <h1 class="fw-bold mb-3" id="text-lg">Alunos <span class="student">por</span> Alunos</h1>
                    <p class="lead mb-3" id="text-leading">Somos estudantes do terceiro ano do ensino médio cursando
                        desenvolvimento de sistemas, nosso projeto de TCC, o DayByDay tem como objetivo criar uma
                        plataforma que combine um calendário online e blocos de notas personalizados para ajudar os
                        estudantes a gerenciar suas rotinas de forma mais eficiente, buscamos oferecer uma ferramenta
                        prática e acessível, pensada para atender às necessidades dos estudantes e facilitar seu dia a
                        dia.
                        <br> Estamos animados para compartilhar nossa solução com você.
                    </p>

                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center order-md-2">
                    <img src="../img/logo.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="600"
                        height="600" focusable="false">
                    </img>
                </div>
            </div>
        </section>
    </article>

    <article class="questions" id="faq">
        <section class="container">
            <h1 class="fw-bold mb-5" id="text-lg">Perguntas Frequentes</h1>
        </section>
        <section class="container">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Como o DayByDay pode me ajudar a me organizar melhor?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">O DayByDay oferece um calendário online e blocos de notas que
                            facilitam o planejamento de tarefas e compromissos. Você pode categorizar suas anotações e
                            visualizar seus prazos de forma clara, ajudando a manter sua rotina organizada.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Posso acessar minhas notas e calendário de qualquer lugar?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Sim! O DayByDay é acessível em qualquer dispositivo com internet, o
                            que permite que você visualize e edite suas anotações e compromissos em qualquer lugar.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            O DayByDay envia lembretes para meus compromissos?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Sim! O DayByDay permite configurar lembretes para que você nunca perca prazos importantes.</div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</section>


<script>
let currentSlide = 0;

function moveSlide(direction) {
    const slides = document.querySelectorAll('.carousel-image');
    const totalSlides = slides.length;

    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    const carouselSlide = document.querySelector('.carousel-slide');

    const slideWidth = slides[0].clientWidth;
    carouselSlide.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

window.addEventListener('resize', () => {
    const slides = document.querySelectorAll('.carousel-image');
    const carouselSlide = document.querySelector('.carousel-slide');

    const slideWidth = slides[0].clientWidth;
    carouselSlide.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const defaultColor = '#FF914D';
    const colorSlideText = document.querySelectorAll('.color-slide-text, .color-slide');
    colorSlideText.forEach(text => text.style.color = defaultColor);
});

function changeCarousel(index, element, color, imageUrl) {
    const buttons = document.querySelectorAll('.color-carousel-button');
    buttons.forEach(btn => btn.classList.remove('active'));

    element.classList.add('active');
    element.style.backgroundColor = color;

    const imageElement = document.getElementById('carousel-image');
    imageElement.src = imageUrl;

    const colorSlideText = document.querySelectorAll('.color-slide-text, .color-slide');
    colorSlideText.forEach(text => text.style.color = color);
}
</script>