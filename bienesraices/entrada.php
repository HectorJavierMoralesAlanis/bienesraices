<?php
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

   
        <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/blog1.jpg" alt="imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>


        <div class="resumen-propiedad">
            <p>Planificación cuidadosa: Antes de comenzar la construcción, elabora un plan detallado que incluya el diseño de la terraza, los materiales necesarios y un presupuesto. Esto te ayudará a evitar gastos innecesarios y a tener una visión clara del proyecto.

            Investigación de materiales: Investiga y compara diferentes opciones de materiales para la construcción de la terraza. Busca alternativas de calidad que sean duraderas y resistentes a la intemperie, pero a un precio más accesible. Considera opciones como madera tratada, materiales compuestos o pavimentos de concreto</p>.

            <p>Compras inteligentes: Una vez que hayas decidido los materiales, busca las mejores ofertas y descuentos en tiendas de construcción. Aprovecha las promociones y las ventas al por mayor para ahorrar dinero en la compra de los materiales necesarios.

            Mano de obra especializada: Si no tienes experiencia en la construcción, contratar a profesionales para llevar a cabo el trabajo puede ahorrarte tiempo y dinero a largo plazo. Un equipo experimentado evitará errores costosos y garantizará que la terraza se construya correctamente desde el principio.

            Mantenimiento regular: Una vez que la terraza esté terminada, asegúrate de realizar un mantenimiento regular para prolongar su vida útil. Realiza limpiezas periódicas y trata los materiales según las recomendaciones del fabricante para evitar daños y reemplazos costosos en el futuro.</p>

        </div>
    </main>

<?php
    incluirTemplates('footer');
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>