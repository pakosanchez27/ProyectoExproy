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

    <section class="bienvenida">
        <div class="bienvenida__contenedor">
            <div class="bienvenida__texto">
                <p>Encuentra a los mejores talentos en TI</p>
                <h1>Transforma tu proceso de contratación </h1>
                <div class="botones">
                    <a href="/Empresa/logoutEmpresa.php" class="boton__verde">Encuentra Candidatos</a>
                    <a href="/Candidato/logoutCandidato.php" class="boton__blanco">Encuentra Empleo</a>
                </div>
            </div>
            <div class="cajavacia"></div>
        </div>
    </section>
    <div class="botonesMobile">
        <a href="/Empresa/logoutEmpresa.php" class="boton__verde">Encuentra Candidatos</a>
        <a href="/Candidato/logoutCandidato.php" class="boton__negro">Encuentra Empleo</a>
    </div>

    <main class="principal ">
        <div class="principal__titulo">
            <h2>Encuentra los mejores candidatos</h2>
        </div>
        <div class="principal__texto">
            <p>Busca a los mejores candidatos para tu empresa en las siguientes areas</p>
        </div>
        <div class="principal__cards">
            <div class="card cat1">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-1.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Desarrollo de software y programacion</div>
                </div>
                <div class="card__des">
                    <p>Transformando ideas en código y creando soluciones tecnológicas innovadoras.</p>
                </div>
            </div><!-- /.card -->

            <div class="card cat2">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-2.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Diseño y experiencia de usuario (UX)</div>
                </div>
                <div class="card__des">
                    <p>Diseñando interfaces intuitivas y atractivas para brindar experiencias digitales excepcionales.
                    </p>
                </div>
            </div><!-- /.card -->

            <div class="card cat3">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-3.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Marketing digital y análisis de datos</div>
                </div>
                <div class="card__des">
                    <p>Conectando marcas con audiencias mediante estrategias digitales efectivas respaldadas por
                        análisis detallados.</p>
                </div>
            </div><!-- /.card -->

            <div class="card cat5">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-4.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Gestión de proyectos y productividad</div>
                </div>
                <div class="card__des">
                    <p>Dirigiendo equipos y recursos con eficiencia para alcanzar objetivos y entregar proyectos
                        exitosos.</p>
                </div>
            </div><!-- /.card -->

            <div class="card cat4">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-5.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Ventas y desarrollo de negocios</div>
                </div>
                <div class="card__des">
                    <p>Impulsando el crecimiento y estableciendo relaciones sólidas para lograr resultados comerciales
                        sobresalientes.</p>
                </div>
            </div><!-- /.card -->

            <div class="card cat6">
                <div class="hero"></div>
                <div class="card__contendido">
                    <div class="card__icon">
                        <img src="src/img/icon-6.png" alt="icono 1">
                    </div>
                    <div class="card__titulo">Seguridad informática</div>
                </div>
                <div class="card__des">
                    <p>Protegiendo activos digitales y salvaguardando la información sensible en un mundo cada vez más
                        conectado.</p>
                </div>
            </div><!-- /.card -->
        </div>
        <section class="beneficios">
            <div class="beneficios__titulo">
                <h2>¿Qué hace que esto sea tan increíble?</h2>
            </div>
            <div class="beneficios__cards">
                <div class="beneficios__card">
                    <div class="beneficio__img">
                        <img src="src/img/eficiencia.png" alt="Icono de eficiencia">
                    </div>
                    <div class="beneficio__titulo">
                        <h3>Eficiencia en el reclutamiento</h3>
                    </div>
                    <div class="beneficio__desc">
                        <p>Optimiza tu proceso de reclutamiento con nuestra plataforma</p>
                    </div>
                </div> <!--fin card-->
                <div class="beneficios__card">
                    <div class="beneficio__img">
                        <img src="src/img/reduccion.png" alt="Icono de eficiencia">
                    </div>
                    <div class="beneficio__titulo">
                        <h3>Reducción de costos</h3>
                    </div>
                    <div class="beneficio__desc">
                        <p>Obtén soluciones rentables para el reclutamiento. Automatiza tareas, evita gastos adicionales</p>
                    </div>
                </div> <!--fin card-->
                <div class="beneficios__card">
                    <div class="beneficio__img">
                        <img src="src/img/curriculum.png" alt="Icono de eficiencia">
                    </div>
                    <div class="beneficio__titulo">
                        <h3>Enfoque en perfiles adecuados</h3>
                    </div>
                    <div class="beneficio__desc">
                        <p>Personaliza tus requisitos con perfiles personalizadosOptimiza tu proceso de reclutamiento con nuestra plataforma</p>
                    </div>
                </div> <!--fin card-->
            </div>
        </section>
    </main>

    <section class="ecologia">
        <div class="ecologia__contenido">
          <div class="ecologia__img">
            <img src="src/img/Imagen 2.png" alt="imagen ecologica">
          </div>
          <div class="ecologia__texto">
            <h2>¡Construyamos equipos excepcionales y dejemos una huella verde juntos!</h2>
            <p>Únete a nuestra plataforma y construyamos un futuro sostenible. Por cada 10 contratados, plantamos un árbol.</p>
            <a href="#" class="boton__verde">Más Información</a>
          </div>
        </div>
    </section>
    <section class="planes">
        <div class="planes__contenedor">
            <div class="planes__titulo">
                <h2>Tenemos un plan perfecto para tu empresa.</h2>
                <div class="plan__cambiar">
                    <div class="toggle-button-cover">
                        <div class="button-cover">
                          <div class="button b2" id="button-10">
                            <input type="checkbox" class="checkbox" id="plan"/>
                            <div class="knobs">
                              <span>Mensual</span>
                            </div>
                            <div class="layer"></div>
                          </div>
                        </div>        
                    </div>
                </div>
            </div>
            
          
            <div class="plan__cards">
                
                <div class="plan__cards__contenedor">
                    <div class="plan__card plan__card__basico ">
                        <p>Agora Basic</p>
                        <div class="plan__precio">
                            <span>$0</span>
                            <p>por <br> mes.</p>
                        </div>
                        <a href="#" class="boton__negro ">Iniciar plan</a>
                        <div class="plan_caracteristicas">
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Publicacion de hasta 3 vacantes simultaneas.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Acceso a perfiles de candidatos sin insignias</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Posicionamiento básico de las vacantes en los resultados de busqueda.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Soporte tecnico</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Duracion de publicacion de vacantes: 10 días</p>
                            </div>
                        </div>
                    </div>
                    <div class="plan__card plan__card__premium sombra">
                        <p>Agora Premium</p>
                        <div class="plan__precio">
                            <span>$299</span>
                            <p>por <br> mes.</p>
                        </div>
                        <a href="#" class="boton__verde">Iniciar plan</a>
                        <div class="plan_caracteristicas">
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Publicacion de hasta 10 vacantes simultaneas.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Acceso a perfiles de candidatos bronce, oro y plata</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Posicionamiento básico de las vacantes en los resultados de busqueda.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Soporte tecnico</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Duracion de publicacion de vacantes: 10 días</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>4 Arboles plantados</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="plan__card plan__card__estandar">
                        <p>Agora Standar</p>
                        <div class="plan__precio">
                            <span>$199</span>
                            <p>por <br> mes.</p>
                        </div>
                        <a href="#" class="boton__negro btn_plan">Iniciar plan</a>
                        <div class="plan_caracteristicas">
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Publicacion de hasta 5 vacantes simultaneas.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Acceso a perfiles de candidatos bronce</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Posicionamiento básico de las vacantes en los resultados de busqueda.</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Soporte tecnico</p>
                            </div>
                            <div class="caracteristica">
                                <img src="src/img/check2.png" alt="imagen check">
                                <p>Duracion de publicacion de vacantes: 10 días</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        
        </div>
    </section>
    <section class="app">
        <div class="hero__app"></div>
        <div class="app__contenido">
            <div class="app__texto">
                <h2>Descarga nuestra app</h2>
                <p>lleva tu proceso de reclutamiento a otro nivel</p>
            </div>
            <div class="btns__App">
                <div class="btn__App">
                    <div class="btn__logo">
                        <img src="src/img/google-play.png" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>Google Play</p>
                    </div>
                </div>
                <div class="btn__App">
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
    </section>
    <div class="app2">
        <div class="app2__bloque1">
            <div class="beneficio derecha">
                <img src="src/img/check.png" alt="Imagen check">
                <h3>Personalizacion de perfiles</h3>
                <p>Nuestra app permite a las empresas crear perfiles personalizados y publicar vacantes utilizando plantillas automáticas adaptadas a sus necesidades.</p>
            </div>
            <div class="beneficio derecha">
                <img src="src/img/check.png" alt="Imagen check">
                <h3>Proceso de selección eficiente</h3>
                <p>Nuestra app agiliza el proceso de selección al incorporar un sistema de evaluación automatizada. </p>
            </div>
        </div>
        <div class="app2__img">
            <img src="src/img/cel.png" alt="imagen de celular">
        </div>
        <div class="app2__bloque2 ">
            <div class="beneficio izquierda ">
                <img src="src/img/check.png" alt="Imagen check" >
                <h3>Interacción directa y rápida</h3>
                <p>Facilitamos la comunicación entre las empresas y los candidatos a través de nuestra funcionalidad de chat integrado en la app.</p>
            </div>
            <div class="beneficio izquierda ">
                <img src="src/img/check.png" alt="Imagen check" >
                <h3>Búsqueda avanzada de perfiles</h3>
                <p>Nuestra app ofrece una función de búsqueda avanzada que permite a las empresas filtrar y buscar perfiles de candidatos según sus capacidades y preferencias. </p>
            </div>
        </div>
    </div>
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
                    <a href="/" class="enlace">Empresas</a>
                    <a href="/Candidato.php" class="enlace">Candidatos</a>
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
    <script src="/src/js/app.js"></script>
    <!-- <script src="/build/js/bundle.min.js"></script> -->
</body>

</html>