<?php
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Nuestra empresa cuenta con una amplia experiencia en el mercado de bienes raíces, respaldada por años de trayectoria exitosa. Nos enorgullece haber asistido a numerosos clientes en la compra, venta y alquiler de propiedades, brindándoles un servicio personalizado y de calidad. Nuestro equipo de expertos posee un profundo conocimiento del mercado inmobiliario, lo que nos permite ofrecer asesoramiento confiable y estratégico a nuestros clientes.</p>

                <p>Con cada transacción, nos esforzamos por superar las expectativas, proporcionando una experiencia transparente, segura y satisfactoria. Confíe en nuestra experiencia y permítanos ayudarlo a alcanzar sus metas en el emocionante mundo de los bienes raíces.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Contamos con profesionales altamente capacitados en medidas de seguridad, lo que nos permite ofrecer un entorno confiable y protegido para la compra, venta o alquiler de propiedades. </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Trabajamos en estrecha colaboración con nuestros clientes para comprender sus necesidades y presupuesto, y así proporcionar opciones que se ajusten a sus expectativas. Nos esforzamos por mantener una política de transparencia en nuestros precios, asegurando que cada cliente reciba una inversión inmobiliaria justa y rentable.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Como empresa dedicada al sector de bienes raíces, valoramos el tiempo de nuestros clientes y nos esforzamos por proporcionar una experiencia eficiente y ágil en cada etapa del proceso.</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplates('footer');
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>