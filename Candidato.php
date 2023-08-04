<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Encuentra a los mejores talentos en TI. Transforma tu proceso de contratación con AgoraTalent. Descubre perfiles especializados en desarrollo de software, diseño UX, marketing digital, gestión de proyectos y más.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <title>AgoraTalent - Encuentra a los mejores talentos en TI</title>
</head>
<body class="PaginaCandidato">
    <div class="banner">
        <p class="banner__texto text-center">
            Únete a nuestra plataforma y descubre un nuevo nivel de reclutamiento en TI.
        </p>
    </div>

    <header class="header">
        <div class="header__logo">
            <a href="/">
                <p>AgoraTalent</p>
            </a>
        </div>
        <div class="header__navegacion">
            <div class="navegacion__bloque1">
                <nav>
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                    <a href="/" class="navegacion__enlace">Empresas</a>
                    <a href="/Candidato.php" class="navegacion__enlace">Candidatos</a>
                </nav>
            </div>
            <div class="navegacion__bloque2">
                <a href="/Empresa/loginEmpresa.php" class="navegacion__enlace">Inicia Sesión</a>
                <a href="/Empresa/logoutEmpresa.php" class="navegacion__enlace">registrate</a>
                <a href="#" class="navegacion__enlace">descarga la app</a>
            </div>

        </div>
        <div class="navegacion__mobil">
            <img src="/build/img/menu.webp" alt="menu" id="menu">
        </div>
        <div class="header__navegacionMobile ocultarMenu" id="menuMobile">

            <nav class="navegacionMobile__menu">
                <a href="#" class="navegacion__enlace--cerrar"><img src="src/img/error.png" alt="Boton de error"
                        id="cerrar"></a>
                <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                <a href="/" class="navegacion__enlace">Empresa</a>
                <a href="/Candidato.php" class="navegacion__enlace">Candidatos</a>
                <a href="/Empresa/loginEmpresa.php" class="navegacion__enlace">Iniciar Sesion</a>
                <a href="/Empresa/logoutEmpresa.php" class="navegacion__enlace">registrate</a>
                <a href="#" class="navegacion__enlace">descarga la app</a>
            </nav>


        </div>
    </header>


    <seccion class="candidatoPortada">
        <div class="candidatoPortada__contenedor">
            <div class="candidatoPortada__texto">
                <h1>Encuentra el Empleo de tus Sueños</h1>
                <p>Al registrarte, tendrás acceso a una plataforma innovadora que te conectará directamente con pequeñas empresas, pymes y startups del sector de Tecnologías de la Información (TI). </p>
                <a href="/Candidato/logoutCandidato.php" class="boton__verde">Registrate</a>
            </div>
            <div class="candidatoPortada__img">
                <img src="/build/img/bg-candidato.png" alt="bg candidato">
            </div>
        </div>
    </seccion>
    <section class="candidatoPasos">
        <div class="candidatoPasos__contenedor">
            <h2>Encuentra trabajo en <span>AgoraTalent</span></h2>
            <div class="candidatoPasos__pasos">
                <div class="candidatoPasos__paso">
                    <h3>Registrate</h3>
                    <p>Registrate de forma fácil y segura! El registro en la plataforma es seguro y rápido.</p>
                </div>
                <div class="candidatoPasos__paso">
                    <h3>Personaliza</h3>
                    <p>Agrega a tu perfil todo sobre ti! Atuda a las empresas a conocer sobre tus habilidades, formacion y experiencia en tu ámbito.</p>
                </div>
                <div class="candidatoPasos__paso">
                    <h3>Postulate</h3>
                    <p>Busca la vacante más adecuada a tus necesidades y habilidades con nuestro filtrado de vacantes.</p>
                </div>

            </div>
        </div>

    </section>

    <seccion class="candidatoCategorias">
        <div class="candidatoCategorias__contenedor">
            <h2>¡Tenemos los mejores Empleos!</h2>
            <p>Puedes buscar empleo en las siguientes categorías en la industria de TI.</p>
            <div class="candidatoCategorias__cards">
                <div class="candidatoCategorias__card cardVerde" >
                    <img src="/build/img/desarrollo-de-software.png" alt="Logo card">
                    <h3>Desarrollo de Software y Programación</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Desarrollo Web.</li>
                        <li>Desarrollo Mobil.</li>
                        <li>Ingeniero de Datos.</li>
                        <li>Arquitecto de Software.</li>
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->

                <div class="candidatoCategorias__card cardMorada" >
                    <img src="/build/img/ui.png" alt="Logo card">
                    <h3>Diseño y Experiencia de Usuario UX</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Diseñador Grafico.</li>
                        <li>Especialista de Usabilidad</li>
                        <li>Diseñador de interacción.</li>
                        <li>Diseñador Web.</li>
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->

                <div class="candidatoCategorias__card cardAzul" >
                    <img src="/build/img/megafono.png" alt="Logo card">
                    <h3>Marketing digital y análisis de datos</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Analista de datos.</li>
                        <li>Especialista en SEO.</li>
                        <li>Especialista en redes sociales.</li>
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->

                <div class="candidatoCategorias__card cardVerde" >
                    <img src="/build/img/desarrollo-de-software.png" alt="Logo card">
                    <h3>Gestión de proyectos y productividad</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Gerente de proyectos.</li>
                        <li>Scrum Master.</li>
                        <li>Product Owner.</li>
                        <li>Director de proyectos.</li>
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->

                <div class="candidatoCategorias__card cardMorada" >
                    <img src="/build/img/seguridad-informatica.png" alt="Logo card">
                    <h3>Seguridad informática</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Ingeniero de seguridad.</li>
                        <li>Analista de seguridad.</li>
                        <li>Auditor de seguridad.</li>
                        <!-- <li>Arquitecto de Software.</li>Seguridad informática -->
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->

                <div class="candidatoCategorias__card cardAzul" >
                    <img src="/build/img/grafico-de-barras.png" alt="Logo card">
                    <h3>Ventas y desarrollo de negocios</h3>
                    <p>Encuentra empleos como :</p>
                    <ul>
                        <li>Ejecutivo de ventas.</li>
                        <li>Gerente de cuentas.</li>
                        <li>Representante de ventas.</li>
                        <!-- <li>Arquitecto de Software.</li> -->
                    </ul>
                    <p>Y mas ...</p>
                </div> <!--Fin del card-->
            </div>
        </div>
    </seccion>
    <section class="canidatoInsignias">
        <div class="canidatoInsignias__contenedor">
            <h2>¿Cómo alcanzar el éxito con <span>AgoraTalent</span>?</h2>
            <p>Realiza nuestros test de habilidades y gana insignias para hacer mas atractivo tu perfil para las empresas.</p>
            <div class="canidatoInsignias__insignias">
                <div class="canidatoInsignias__insignias__texto">
                    <h3>Nuestras Insignias</h3>
                    <p>Las insignias son una forma de demostrar tus habilidades y conocimientos a las empresas. Contamos con 3 insignias y cada una refleja el nivel de conocimiento.</p>	
                </div>
                <div class="canidatoInsignias__insignias__cards">
                    <div class="canidatoInsignias__insignias__card cardBronce">
                        <img src="/build/img/medalla-de-bronce.webp" class="MedallaBronce" alt="Logo card">
                        <h3>Bronce</h3>
                        <p>Esta insignia refleja que tienes conocimientos básicos en el área.</p>
                        <a href="/Candidato/logoutCandidato.php">Registrate </a>
                    </div>
                    <div class="canidatoInsignias__insignias__card cardOro sombra">
                        <img src="/build/img/medalla-de-oro.webp" class="MedallaOro" alt="Logo card">
                        <h3>Oro</h3>
                        <p>Con esta medalla demuestras tener un dominio en la habilidad que escogiste.</p>
                        <a href="/Candidato/logoutCandidato.php">Registrate</a>
                    </div>
                    <div class="canidatoInsignias__insignias__card cardPlata">
                        <img src="/build/img/medalla-de-plata.png" class="MedallaPlata" alt="Logo card">
                        <h3>Plata</h3>
                        <p>La medalla de plata demuestra que tienes conocimientos intermedios en dicha habilidad.</p>
                        <a href="/Candidato/logoutCandidato.php">Registrate </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="personalizacion">
        <div class="personalizacion__contenedor">
            <h2>Personaliza al máximo tu perfil.</h2>
            <p>Personaliza la información de tu perfil y construye tu CV con <span>AgoraTalent</span></p>
            <div class="personalizacion__contenido">
                <div class="personalizacion__contenido__texto">
                    <h3>Mejora tu Perfil</h3>
                    <p>Personaliza tu Perfil agregando datos como:</p>
                    <ul>
                        <li>Datos Personales.</li>
                        <li>Experiencia Laboral.</li>
                        <li>Estudios.</li>
                        <li>Tus proyectos generales.</li>
                    </ul>
                    <p>Y mas...</p>
                    <a href="/Candidato/logoutCandidato.php" class="boton__verde">Encuentra empleo Aquí</a>
                </div>
                <div class="personalizacion__contenido__img">
                    <img src="/build/img/personalizacion.png">
                </div>
            </div>
        </div>
    </section>
  
    <footer class="footer">
        <div class="footer__principal">
            <div class="footer__logo">
                <a href="/">AgoraTalent</a>
                <p>Simplificando la búsqueda y seleccion de talento</p>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Contenido</p>
                    <a href="/Empresa/logoutEmpresa.php" class="enlace">Empresas</a>
                    <a href="#" class="enlace">Candidatos</a>
                    <a href="nosotros.php" class="enlace">Nosotros</a>
                    <a href="#" class="enlace">App Móvil</a>
                </nav>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Ayuda</p>
                    <a href="#" class="enlace">Acerca de</a>
                    <a href="#" class="enlace">Privacidad</a>
                    <a href="#" class="enlace">Condiciones</a>
                    <a href="#" class="enlace">FAQs</a>
                </nav>

            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Redes sociales</p>
                    <div class="footer__logos">
                        <a href="#" class="logos">
                            <img src="src/img/facebook.png" alt="Logo de Facebook">
                        </a>
                        <a href="#" class="logos">
                            <img src="src/img/tw.png" alt="Logo Tweeter">
                        </a>
                        <a href="#" class="logos">
                            <img src="src/img/youtube.png" alt="Logo Youtube">
                        </a>
                    </div>
                    <a href="#" class="enlace">Blog</a>
                    <a href="#" class="enlace">Contacto</a>
                </nav>

            </div>
            <hr>
            <div class="footer__descarga">
                <div class="footerApp btn__App ">
                    <div class="btn__logo">
                        <img src="src/img/google-play.png" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>Google Play</p>
                    </div>
                </div>
                <div class="btn__App footerApp">
                    <div class="btn__logo">
                        <img src="src/img/logo-apple.png" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>App Store</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="Copy">Derechos reservados para AgoraTalent&#174; 2023</p>
    </footer>

    <!-- <script src="/build/js/bundle.min.js"></script> -->
    <script src="/src/js/app.js"></script>
</body>

</html>