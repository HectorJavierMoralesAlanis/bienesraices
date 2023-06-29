<?php
     //Base de datos
    include ('aux2.php');
    $dao1=new DAO();
    $consulta1="SELECT * FROM Propiedades";
    $propiedades=$dao1->ejecutarConsulta($consulta1);
    $dao2=new DAO();
    $consulta2="SELECT * FROM vendedores";
    $vendedores=$dao2->ejecutarConsulta($consulta2);

    // Obtenemos la extensión del archivo, esto para determinar el tipo de
    // archivo que vamos a regresar.
    $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

    // Determinamos el content-type a partir de la extensión del archivo.
    // El content-type le dice al client (el web browser) qué tipo de archivo
    // es y como tratar este archivo. Por ejemplo, si es un image/jpeg el web
    // browser puede desplegar este tipo de archivo, puesto que es una imagen;
    // si es un application/pdf, el web brower lo desplegara con su complemento
    // para ver archivos PDF.
    $contentType = 
            array_key_exists($extension, $CONTENT_TYPES_EXT) ? 
            $CONTENT_TYPES_EXT[$extension] : $CONTENT_TYPES_EXT["bin"];


    require 'includes/funciones.php';
    incluirTemplates('header');
?>


    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>
        <div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad){?>
            <div class="anuncio">
                <picture>
                    <source srcset=<?php echo $propiedad['imagen']?> type="image/webp">
                    <source srcset="<?php echo $propiedad['imagen']?>"  type="image/jpeg">
                    <img loading="lazy" src="<?php echo $propiedad['imagen']?>" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']?></h3>
                    <p><?php echo $propiedad['descripcion']?></p>
                    <p class="precio"><?php echo $propiedad['precio']?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc']?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad['estacionamiento']?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad['habitaciones']?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php }?>

        </div> <!--.contenedor-anuncios-->
    </main>

<?php
    incluirTemplates('footer');
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>