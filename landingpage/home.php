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
    border-radius: 3px;
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
                        <h1 class="fw-bold mb-2" id="text-lg">Seu bloco de notas em um clique!</h1>
                        <p class="lead" id="lead-landing">Anotar se torna fácil, faça suas anotações, gerencie suas
                            datas
                            importantes e organize seu dia com o DayByDay.</p>
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
    <article class="content-landing">
        <section class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row featurette justify-content-center align-items-center">
                    <div class="col-md-6 order-md-1">
                        <h1 class="fw-bold mb-2" id="text-lg">
                            <span class="color-slide">#</span>Categoria Dividida por
                            <span class="color-slide">Cores</span>
                        </h1>
                        <p class="lead color-slide-text">Laranja,</p>
                        <p class="lead mb-5" id="text-leading">
                            Suspendisse congue ullamcorper nisl quis dictum. Donec vitae
                            ex sed arcu ultricies pretium.
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

    <article class="calendar-content">
        <section class="container mt-5 mb-5">
            <div class="row featurette justify-content-center align-items-center" id="leading">
                <div class="col-md-6 order-md-2">
                    <h1 class="fw-bold mb-3" id="text-lg">Calendário</h1>
                    <p class="lead mb-3" id="text-leading">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                    <p class="lead mb-3">
                        Suspendisse congue ullamcorper nisl quis dictum. Donec vitae ex sed arcu ultricies pretium.
                    </p>

                    <p class="lead mb-3">
                        Suspendisse congue ullamcorper nisl quis dictum. Donec vitae ex sed arcu ultricies pretium.
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
        <!-- Carrossel de Imagens -->
        <section class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/nt1.png" class="d-block w-100" alt="Imagem 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/nt2.png" class="d-block w-100" alt="Imagem 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/nt3.png" class="d-block w-100" alt="Imagem 3">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/nt4.png" class="d-block w-100" alt="Imagem 4">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/nt5.png" class="d-block w-100" alt="Imagem 5">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>


    </article>

    <article class="about-us">
        <section class="container">
            <div class="row featurette justify-content-center align-items-center" style="margin-block: 50px"
                id="leading">
                <div class="col-md-6 order-md-1">
                    <h5 class="student">#SobreNós</h5>
                    <h1 class="fw-bold mb-3" id="text-lg">Alunos <span class="student">por</span> Alunos</h1>
                    <p class="lead mb-3" id="text-leading">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse congue ullamcorper nisl quis dictum. Donec vitae ex sed arcu ultricies pretium.
                    </p>
                    <p class="lead mb-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse congue ullamcorper nisl
                        quis dictum. Donec vitae ex sed arcu ultricies pretium.
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

    <article class="questions">
        <section class="container">
            <h1 class="fw-bold mb-5" id="text-lg">Perguntas Frequentes</h1>
        </section>
        <section class="container">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                            body.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                            body. Let's imagine this being filled with some actual content.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                            body. Nothing more exciting happening here in terms of content, but just filling up the
                            space to make it look, at least at first glance, a bit more representative of how this would
                            look in a real-world application.</div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</section>

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