<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="build/css/app.css">
    <title>Nosotros</title>
</head>

<body>
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
                    <a href="#" class="navegacion__enlace">Candidatos</a>
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
                <a href="#" class="navegacion__enlace">Empresa</a>
                <a href="#" class="navegacion__enlace">Candidatos</a>
                <a href="/Empresa/loginEmpresa.php" class="navegacion__enlace">Iniciar Sesion</a>
                <a href="/Empresa/logoutEmpresa.php" class="navegacion__enlace">registrate</a>
                <a href="#" class="navegacion__enlace">descarga la app</a>
            </nav>


        </div>
    </header>

    <main class="nosotros">
        <div class="nosotros__contenedor">
            <div class="nosotros__img">
                <img src="src/img/nosotros.jpg" alt="imagen nosotros">
            </div>
            <div class="nosotros__texto">
                <h2>Sobre nosotros</h2>
                <p>En <span>AgoraTalent </span>, entendemos los desafíos que enfrentan las pequeñas empresas, pymes y
                    startups del sector de las Tecnologías de la Información (TI) en el proceso de contratación de
                    personal calificado. Por eso, hemos desarrollado una solución integral que ofrece eficiencia y
                    ahorro de costos para los departamentos de recursos humanos.</p>
                <p>Nuestra plataforma se centra en optimizar el proceso de contratación al proporcionar herramientas y
                    funcionalidades diseñadas específicamente para satisfacer las necesidades de las empresas del sector
                    de TI.
                </p>
            </div>
        </div>
    </main>

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
                    <a href="#" class="enlace">Empresas</a>
                    <a href="#" class="enlace">Candidatos</a>
                    <a href="nosotros.html" class="enlace">Nosotros</a>
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


    <script src="js/app.js"></script>
</body>

</html>