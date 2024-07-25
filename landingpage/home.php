<style>
    :root {
        --navbar-color: ;
        --landing-color: ;
        --content-landing-color: ;
        --title-color: ;
        --text-color: ;
    }

    #text-lg {
        font-size: 5vw;
        text-align: center;
        line-height: 90%;
    }

    #lead-landing {
        font-size: 1.3rem;
    }

    .landing-button #login-hub {
        display: inline-block;
        text-align: center;
        padding: 0.6rem 1.5rem;
        font-weight: bold;
        color: black;
        text-decoration: none;
        border: 2px solid #8C52FF;
        font-size: 28px;
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

    #leading {
        width: 82%;
        margin-left: auto;
        margin-right: auto;
    }

    /* responsive details */

    @media screen and (max-width: 768px) {
        #text-lg {
            font-size: 9.5vw;
            line-height: 8vw;
        }

        #texto-lateral-l {
            font-size: 5.3vw;
            width: 100%;
            font-weight: bolder;
        }

        #leading {
            width: 100%;
            margin-right: auto;
        }
    }

    @media screen and (max-width: 637px) {
        #text-lg {
            font-size: 11vw;
            line-height: 11vw;
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

        #leading {
            width: 100%;
            margin-right: auto;
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
        font-size: 8vh;
    }

    @media screen and (max-width: 500px) {
        .headline-l {
        font-size: 5vh;
    }
    }
</style>

<section id="home-landing">
    <div class="landing-page d-flex align-items-center justify-content-center" id="ctner-landing"
        style="z-index:-99; height: 88vh">
        <section class="py-5 text-center container">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-bold mb-4" id="text-lg">Maximize sua <br>produtividade!</h1>
                <p class="lead" id="lead-landing">Aumente sua eficiência o <strong>DayByDay</strong>, simplificando sua
                    vida
                    e otimizando sua
                    rotina!</p>
                <div class="landing-button mt-3">
                    <a href="#" class="my-2" id="login-hub">Começar Agora!</a>
                </div>
            </div>
        </section>
    </div>
    <div class="content-landing align-items-center justify-content-center" style="margin-top: 5%">
        <div class="container">
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

            <div class="bg-roxo">
                <div class="row featurette justify-content-center align-items-center" id="leading">

                    <div class="col-md-6 order-md-1">
                        <h2 class="featurette-heading mb-3" id="texto-lateral-l">Estamos com você!</h2>
                        <p class="lead" id="text-leading">Estamos comprometidos em promover sua excelência acadêmica e
                            pessoal. Com DayByDay, oferecemos mais do que apenas organização e oferecemos um caminho
                            claro para o seu sucesso (profissional e pessoal), ajudando você a gerenciar suas tarefas e
                            compromissos de forma eficaz!
                        </p>
                    </div>
                    <div class="col-md-6 order-md-1">
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

            <div class="row featurette justify-content-center align-items-center" style="margin-bottom: 100px"
                id="leading">

                <div class="col-md-6 order-md-2">
                    <h2 class="featurette-heading" id="texto-lateral-l">Qual nosso <br> principal objetivo?</h2>
                    <p class="lead" id="text-leading">Nosso objetivo é ajudá-lo a prosperar. Teste agora o DayByDay e
                        experimente a diferença na sua organização pessoal e profissional!
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <img src="../img/logo.png"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" focusable="false">
                    </img>
                </div>
            </div>
            <div class="container">
                <hr class="featurette-divider" id="divider">
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