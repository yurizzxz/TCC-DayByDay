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
    background: #A200FF;
    padding-block: 65px;
    color: white;
}

.content-landing .color-slide {
    color: orange;
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

.color-carousel-button:nth-child(1) {
    background-color: #FF914D;
    padding: 15px;
}

.color-carousel-button:nth-child(2) {
    background-color: #FF5757;
}

.color-carousel-button:nth-child(3) {
    background-color: #36DF32;
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
}

@media (max-width: 345px) {
    #text-lg {
        font-size: 2rem;
    }

    .content-landing #text-lg {
        font-size: 1.5rem;
    }
}

@media (max-height: 960px) {
    .landing-page {
        height: 90dvh;
    }
}

@media (max-height: 930px) {
    .landing-page {
        margin-top: 30px;
    }
}

@media (max-height: 860px) {
    .landing-page {
        margin-top: 30px;
    }
}

@media (max-height: 810px) {
    .landing-page {
        margin-top: 45px;
    }
}

@media (max-height: 775px) {
    .landing-page {
        margin-top: 135px;
    }

    .img-fluid {
        margin-bottom: 130px;
    }
}

@media (max-height: 715px) {
    .landing-page {
        margin-top: 155px;
    }
}

@media (max-height: 665px) {
    .landing-page {
        margin-top: 170px;
    }
}

@media (max-height: 645px) {
    .landing-page {
        margin-top: 185px;
    }
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
                        <img src="../img/apdaybyday.png"
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
                        <h1 class="fw-bold mb-2" id="text-lg"><span class="color-slide">#</span>Categoria Dividida por
                            <span class="color-slide">Cores</span>
                        </h1>
                        <p class="lead color-slide-text">Laranja,</p>
                        <p class="lead mb-5" id="text-leading">Suspendisse congue ullamcorper nisl quis dictum. Donec
                            vitae
                            ex sed arcu ultricies pretium.
                        </p>
                        <h4 class="fw-bold">Qual cor é a próxima?</h4>
                        <div class="sliders">
                            <div class="color-carousel-button active-button"></div>
                            <div class="color-carousel-button"></div>
                            <div class="color-carousel-button"></div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center order-md-2">
                        <img src="../img/logo.png"
                            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            width="800" height="600" focusable="false">
                        </img>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <article class="calendar-content">
        <section class="container">
            <div class="row featurette justify-content-center align-items-center"
                id="leading">
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
                    <img src="../img/logo.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="600"
                        height="600" focusable="false">
                    </img>
                </div>
            </div>
        </section>
    </article>

    <article class="create-note">
        <section class="container">
            <h1 class="fw-bold mb-3" id="text-lg">Crie Notas do Seu Jeito!</h1>
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
            <h1 class="fw-bold mb-3" id="text-lg">Perguntas Frequentes</h1>
        </section>
    </article>
</section>