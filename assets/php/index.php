<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("conexao/banco.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== BOOTSTRAP ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" integrity="sha256-DBYdrj7BxKM3slMeqBVWX2otx7x4eqoHRJCsSDJ0Nxw=" crossorigin="anonymous" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--==================== SWIPER CSS ====================-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="/Estagio/assets/css/style.css">
    <!-- <link rel="stylesheet" href="http://localhost/Estagio/assets/css/card_style.css" /> -->

    <script src="/Estagio/assets/js/vanilla-masker.js"></script>

    <!-- Font Awesome CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Página inicial</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="" class="nav__logo">Colégios Univap</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list grid">

                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class="bi bi-house nav__icon"></i>
                            Home
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class="bi bi-person nav__icon"></i>
                            Sobre-nos
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class="bi bi-chat-left-text nav__icon"></i>
                            Contate
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="centrodecusto.php" class="nav__link">
                            <i class='bx bx-spreadsheet nav__icon'></i>
                            Centro de Custos
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="departamento.php" class="nav__link">
                            <i class='bx bx-buildings nav__icon'></i>
                            Departamentos
                        </a>
                    </li>

                    <li class="nav__item">
                        <a class="nav__link">
                            <div class="action">
                                <div class="profile" onclick="menuToggle()">
                                    <img src="/Estagio/assets/img/zoro-ashura.jpg" alt="">
                                </div>
                                <div class="menu">
                                    <h3>Usuário não identificado<br>
                                        <span>Emprego não identificado</span>
                                    </h3>

                                    <ul>
                                        <li>
                                            <i class="bi bi-person"></i>
                                            <a href="#person"> Meu perfil </a>
                                        </li>
                                        <li>
                                            <i class="bi bi-pen"></i>
                                            <a href="#edit">Edite o perfil</a>
                                        </li>
                                        <li>
                                            <i class="bi bi-gear"></i>
                                            <a href="#settings">Configurações</a>
                                        </li>
                                        <li>
                                            <i class='bx bx-log-out'></i>
                                            <a href="#logout">Sair</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
                <i class="bx bx-x bx-sm nav__close" id="nav-close"></i>
            </div>

            <div class="nav__btns">
                <!-- Theme change button  -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <div class="nav__toggle" id="nav-toogle">
                    <i class="uil uil-apps"></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__content grid">
                    <div class="home__social">
                        <a href="https://github.com/AkiraSendoh7/EstagioUnivap" target="_blank" class="home__social-icon">
                            <i title="Repositório do programa no GitHub" class='bx bxl-github github-png'></i>
                        </a>

                        <figure class="img-univap" id="img-univap">
                            <a href="https://www.univap.br/home/colegio/portal-educacional/portal-educacional.html" target="_blank" class="home__social-icon">
                                <img title="Site da Univap" src="/Estagio/assets/img/icone-u.png"" alt=" Ícone da Univap" width="23" height="21">
                            </a>
                        </figure>

                        <a href="https://codepen.io" target="_blank" class="home__social-icon">
                            <i title="Design do site no CodePenIO" class='bx bxl-codepen codepen-png'></i>
                        </a>
                    </div>

                    <div class="home__img">
                        <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <mask id="mask0" mask-type="alpha">
                                <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z" />
                            </mask>
                            <g mask="url(#mask0)">
                                <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
                                    165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
                                    129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
                                    -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z" />
                                <image class="home__blob-img" x='12' y='18' xlink:href="/Estagio/assets/img/icone_personagem.jpg" />
                            </g>
                        </svg>

                        <!-- <img src="https://www.univap.br/source/files/c/1085/Imagem_Texto_Home_Principal-809212_536-720-0-0.jpg" alt="Personagem mascote da Univap" title="Foto de um personagem da Univap"> -->
                    </div>

                    <div class="home__data">
                        <h1 class="home__title">Centro de custo e departamento</h1>
                        <h3 class="home__subtitle">Feito para cadastro dos centros de custos e departamentos</h3>
                        <p class="home__description">
                            Site para manusear e manipular quando é necessário ocorrências e vistorias no departamento
                            ao qual foi pedido.
                        </p>
                        <a href="#contact" class="button button--flex">
                            Contate-nos <i class="uil uil-message button__icon"></i>
                        </a>
                    </div>
                </div>

                <div class="home__scroll">
                    <a href="#footer" class="home__scroll-button button--flex">
                        <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                        <span class="home__scroll-name">Role para baixo</span>
                        <i class="uil uil-arrow-down home__scroll-arrow"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <h2 class="section__title"> Sobre </h2>
            <span class="section__subtitle">Introdução</span>
            <div class="about__container container grid">
                <img src="/Estagio/assets/img/icone-u.png" alt="Ícone da Univap" class="about__img">

                <div class="about__data">
                    <p class="about__description">
                        Zoro não passou dois anos treinando sozinho. O Olhos de Falcão pode ter sugerido isso ao
                        notar a ganância do espadachim por poder. Mihawk fez a cicatriz em Zoro no primeiro
                        treino dos dois durante o timeskip, como forma de marcar um novo início no caminho de Zoro
                    </p>
                    <div class="about__info">
                        <div>
                            <span class="about__info-title">08+</span>
                            <span class="about__info-name">Years <br> experience</span>
                        </div>

                        <div>
                            <span class="about__info-title">20+</span>
                            <span class="about__info-name">Completed <br> project</span>
                        </div>

                        <div>
                            <span class="about__info-title">05+</span>
                            <span class="about__info-name">Companies <br> worked</span>
                        </div>

                        <div>
                            <span class="about__info-title">1000+</span>
                            <span class="about__info-name">Dúvidas <br> do que fazer</span>
                        </div>
                    </div>

                    <div class="about__buttons">
                        <a download="" href="\assets\pdf\DarkLightmode.js" class="button button--flex">
                            Não sei o que colocar<i class="uil uil-download-alt button__icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== ABOUT - CAROUSEL SLIDER IMAGES====================-->
        <section class="start section" id="start">
            <div class="slider">
                <div class="slide active">
                    <img src="/Estagio/assets/img/univap-aquarius.jpg" alt="">
                    <div class="info">
                        <h1 class="start__title" id="aquarius">Unidade Aquarius.</h1>
                    </div>
                </div>
                <div class="slide">
                    <img src="/Estagio/assets/img/univap-centro.jpeg" alt="">
                    <div class="info">
                        <h1 class="start__title" id="centro">Unidade Centro.</h1>
                    </div>
                </div>
                <div class="slide">
                    <img src="/Estagio/assets/img/univap-villa-branca.png" alt="">
                    <div class="info">
                        <h1 class="start__title" id="villaBranca">Unidade Villa Branca.</h1>
                    </div>
                </div>
                <div class="navigation">
                    <i class="fas fa-chevron-left prev-btn"></i>
                    <i class="fas fa-chevron-right next-btn"></i>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active"></div>
                    <div class="slide-icon"></div>
                    <div class="slide-icon"></div>
                </div>
            </div>
        </section>

        <!--==================== CONTACT ME ====================-->
        <?php include 'sendmail.php' ?>

        <!--alert messages start-->
        <?php echo $alert; ?>
        <!--alert messages end-->

        <section class="contact section" id="contact">
            <div class="container_contact">
                <span class="big-circle"></span>
                <img src="/Estagio/assets/img/shape.png" class="square" alt="" />
                <div class="form_contact">
                    <div class="contact-info">
                        <h3 class="title">Fale conosco</h3>
                        <p class="text">
                            Fale conosco caso ocorra algum erro no site, ou até se quiser
                            falar algo sobre o problema que está tendo.
                        </p>

                        <div class="info">
                            <div class="information">
                                <i class="bi bi-geo-alt icon"></i>
                                <p>Avenida Shishima Hifumi, 2911 - Urbanova</p>
                            </div>
                            <div class="information">
                                <i class="bi bi-envelope icon"></i>
                                <p>tudoaqui@univap.br</p>
                            </div>
                            <div class="information">
                                <i class="bi bi-telephone icon"></i>
                                <p>(12) 3947-1000</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-form">
                        <span class="circle one"></span>
                        <span class="circle two"></span>

                        <form action="" id="contact" method="POST" autocomplete="off">
                            <h3 class="title">Contate nos</h3>
                            <div class="input-container">
                                <input type="text" id="subject" name="subject" class="input" data-validation-required-message="Digite o título, por favor" required />
                                <label for="">Título</label>
                                <span>Título</span>
                            </div>
                            <div class="input-container">
                                <input type="email" id="email" name="email" class="input" data-validation-required-message="Digite seu email, por favor" />
                                <label for="">Email</label>
                                <span>Email</span>
                            </div>
                            <div class="input-container">
                                <input attrname="telephone1" data-mask="(00) 0000-0000" data-mask-reverse="true" type="tel" id="phone" name="phone" class="input" pattern="\(\d{2}\)\s*\d{5}-\d{4}" minlength="9" maxlength="15" />
                                <label for="">Telefone</label>
                                <span>Telefone</span>
                            </div>

                            <script>
                                // Listen the input element masking it to format with pattern.
                                function inputHandler(masks, max, event) {
                                    var c = event.target;
                                    var v = c.value.replace(/\D/g, '');
                                    var m = c.value.length > max ? 1 : 0;
                                    VMasker(c).unMask();
                                    VMasker(c).maskPattern(masks[m]);
                                    c.value = VMasker.toPattern(v, masks[m]);
                                }

                                var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
                                var tel = document.querySelector('input[attrname=telephone1]');
                                VMasker(tel).maskPattern(telMask[0]);
                                tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
                            </script>

                            <div class="input-container textarea">
                                <textarea name="message" id="message" class="input" data-validation-required-message="Digite uma mensagem do ocorrido,  por favor"></textarea>
                                <label for="">Mensagem</label>
                                <span>Mensagem</span>
                            </div>
                            <!-- <div class="sucess"></div> -->
                            <input type="submit" name="submit" value="Envie a mensagem" class="btn" id="send_button" />
                        </form>
                    </div>
                </div>
            </div>

            <script>
                $('input').click(function() {
                    $('.alert').addClass("show");
                    $('.alert').removeClass("hide");
                    $('.alert').addClass("showAlert");
                    setTimeout(function() {
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    }, 5000);
                });
                $('.close-btn').click(function() {
                    $('.alert').removeClass("show");
                    $('.alert').addClass("hide");
                });
            </script>

            <script type="text/javascript">
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer" id="footer">
        <div class="footer__bg">
            <div class="footer__container container grid">
                <div class="">
                    <h1 class="footer__title">Colégios UNIVAP</h1>
                    <span class="footer__subtitle">
                        Fundação ValeParaíbana de Ensino
                    </span>
                </div>

                <ul class="footer__links">
                    <li>
                        <a href="#home" class="footer__link">Home</a>
                    </li>

                    <li>
                        <a href="#about" class="footer__link">Sobre</a>
                    </li>

                    <li>
                        <a href="#contact" class="footer__link">Contate</a>
                    </li>

                </ul>

                <!-- <div class="footer__sociais">
                    <a href="https://www.facebook.com/colegiosunivap" target="_blank" class="footer__social">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://www.instagram.com/univapcolegios/" target="_blanks" class="footer__social">
                        <i class='bx bxl-instagram'></i>
                    </a>
                </div> -->

                <!-- Ícones do footer do facebook e Instagram da escola  -->
                <div class="icons_wrapper">
                    <a class="icon facebook" href="https://www.facebook.com/colegiosunivap" target="_blank">
                        <div class="tooltip">Facebook</div>
                        <span><i class="fab fa-facebook-f"></i></span>
                    </a>
                    <a class="icon instagram" href="https://www.instagram.com/univapcolegios/" target="_blank">
                        <div class="tooltip">Instagram</div>
                        <span><i class="fab fa-instagram"></i></span>
                    </a>
                </div>
            </div>

            <p class="footer__copy">&#169; Colégios UNIVAP - Todos os direitos reservados</p>
        </div>
    </footer>

    <!--==================== SCROLL TOP ====================-->
    <a href="" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup__icon"></i>
    </a>

    <!--==================== SWIPER JS ====================-->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!--==================== MAIN JS ====================-->
    <script src="/Estagio/assets/js/main.js"></script>
</body>

</html>