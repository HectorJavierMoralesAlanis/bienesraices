<?php
     //Base de datos
    define("APP_PATH","/var/www/html/bienesraices/");
    include ('aux2.php');
    $dao1=new DAO();
    $consulta1="SELECT * FROM Propiedades";
    $propiedades=$dao1->ejecutarConsulta($consulta1);
    $dao2=new DAO();
    $consulta2="SELECT * FROM vendedores";
    $vendedores=$dao2->ejecutarConsulta($consulta2);

    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y Departamentos en Venta</h2>
        <div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad):?>
            <div class="anuncio">
                <picture>
                    <img loading="lazy" src="./retornoImagen.php?s_id=<?php echo $propiedad["imagen"]?>"  alt="<?php echo $propiedad["nombre_archivo"] ?>" title="<?php echo $propiedad["nombre_archivo"] ?>">                
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']?></h3>
                    
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
                    <a href="anuncio.php?id=<?php echo$propiedad['id']?>" method="POST" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php endforeach;?>

        </div> <!--.contenedor-anuncios-->
    </main>

<?php
    incluirTemplates('footer');
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>