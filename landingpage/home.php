<style>
:root {
    --navbar-color: ;
    --landing-color: ;
    --content-landing-color: ;
    --title-color: ;
    --text-color: ;
}

#text-lg {
    font-size: 4.5rem;
    width: 100%;
}

#lead-landing {
    font-size: 1.3rem;
}

.landing-page {
    background: linear-gradient(to bottom, #ffffff 0%, #ffffff 70%, #FCFCFC 100%);
    height: 85vh;
}

.content-landing {
    background-color: #FCFCFC;
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

#title-circle {
    font-size: 28px;
    font-weight: 400;
}

#divider {
    margin-bottom: 10%;
    margin-top: 10%;
    opacity: 0.05;
}

#texto-lateral-l {
    font-size: 3.3vw;
    font-weight: bolder;
}



/* responsive details */

@media (max-width: 768px) {
    #text-lg {
        font-size: 3rem;
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
    #text-lg {
        font-size: 3rem;
    }

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
        font-size: 2.5rem;
    }
}

@media (max-width: 365px) {
    #text-lg {
        font-size: 2.4rem;
    }
    #lead-landing {
        font-size: 1.1rem;
    }
}

@media (max-width: 345px) {
    #text-lg {
        font-size: 2rem;
    }
}



.video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 25px;
    height: 0;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.headline-l {
    font-size: 4rem;
}

.content-landing .container {
    margin-top: 50px;
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

<section id="home-landing">
    <div class="landing-page d-flex align-items-center justify-content-center" id="ctner-landing" style="z-index:-99;">
        <section class="py-5 container">
            <div class="row justify-content-center" id="rowlanding">

                <div class="col-md-6 order-md-1 mb-5">
                    <h1 class="fw-bold mb-4" id="text-lg">Planeje. Organize. Conquiste </h1>
                    <p class="lead" id="lead-landing">Transforme suas ideias e alcance seus objetivos de estudo com
                        eficiência. DayByDay simplifica sua vida, otimiza sua rotina e ajuda você a crescer em sua
                        jornada de aprendizado!</p>
                    <div class="landing-button mt-3">
                        <a href="../pages/login.php" class="my-2" id="login-hub">Começar Agora</a>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center order-md-1">
                    <img src="../img/apdaybyday.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="800"
                        height="500" focusable="false">
                    </img>
                </div>
            </div>
        </section>
    </div>
    
    <div class="content-landing d-flex align-items-center justify-content-center">
        <div class="container">
     
            <div class="bg-roxo d-flex justify-content-center">
                <div class="row featurette justify-content-center align-items-center" id="leading">

                    <div class="col-md-6 order-md-1">
                        <h2 class="featurette-heading mb-3" id="texto-lateral-l">Estamos com você!</h2>
                        <p class="lead" id="text-leading">Estamos comprometidos em promover sua excelência acadêmica e
                            pessoal. Com DayByDay, oferecemos mais do que apenas organização e oferecemos um caminho
                            claro para o seu sucesso (profissional e pessoal), ajudando você a gerenciar suas tarefas e
                            compromissos de forma eficaz!
                        </p>
                    </div>
                    <div class="col-md-6 order-md-1 d-flex align-items-center justify-content-center">
                        <img src="../img/3.jpeg"
                            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            width="500" height="500" focusable="false">
                        </img>
                    </div>
                </div>
            </div>

            <div class="container">
                <hr class="featurette-divider" id="divider">
            </div>

            <section class="text-center">
                <div class="container">
                    <h1 class="fw-bold mb-4" id="text-content-landing">O que o DayByDay te ajuda?</h1>
                </div>
                <div class="container" id="circle-beneficios">
                    <div class="row">
                        <div class="col-lg-3">
                            <img class="bd-placeholder-img rounded-circle mt-4" width="200" height="200"
                                src="../img/1.jpeg" role="img" aria-label="Placeholder: 140x140" focusable="false">
                            </img>
                            <h2 class="fw-bold mt-3" id="title-circle">Organização eficiente</h2>
                        </div>
                        <div class="col-lg-3">
                            <img class="bd-placeholder-img rounded-circle mt-4" width="200" height="200"
                                src="../img/2.jpeg" role="img" aria-label="Placeholder: 140x140" focusable="false">
                            </img>
                            <h2 class="fw-bold mt-3" id="title-circle">Gestão do tempo</h2>
                        </div>
                        <div class="col-lg-3">
                            <img class="bd-placeholder-img rounded-circle mt-4" width="200" height="200"
                                src="../img/4.jpeg" role="img" aria-label="Placeholder: 140x140" focusable="false">
                            </img>
                            <h2 class="fw-bold mt-3" id="title-circle">Produtividade aprimorada</h2>
                        </div>
                        <div class="col-lg-3">
                            <img class="bd-placeholder-img rounded-circle mt-4" width="200" height="200"
                                src="../img/5.jpeg" role="img" aria-label="Placeholder: 140x140" focusable="false">
                            </img>
                            <h2 class="fw-bold mt-3" id="title-circle">Facilidade de uso</h2>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <hr class="featurette-divider" id="divider">
            </div>

            <div class="row featurette justify-content-center align-items-center" style="margin-bottom: 100px"
                id="leading">

                <div class="col-md-6 order-md-2">
                    <h2 class="featurette-heading" id="texto-lateral-l">Qual nosso <br> principal objetivo?</h2>
                    <p class="lead" id="text-leading">Nosso objetivo é ajudá-lo a prosperar. Teste agora o DayByDay e
                        experimente a diferença na sua organização pessoal e profissional!
                    </p>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center order-md-1">
                    <img src="../img/logo.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="600"
                        height="600" focusable="false">
                    </img>
                </div>
            </div>
     

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center fw-bold headline-l mb-5">Como nosso sistema funciona?</h1>
                    <div class="video-container d-none mb-5">
                        <iframe src="#" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
</section>