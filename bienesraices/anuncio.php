<?php
    include ('aux2.php');
    $id=$_GET['id'];

    $dao=new DAO();
    $consulta="SELECT * FROM Propiedades WHERE id=:id";
    
    $parametros=array("id"=>$id);
    
    $propiedades=$dao->ejecutarConsulta($consulta,$parametros);
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <?php foreach($propiedades as $propiedad):?>
            <h1><?php echo $propiedad['titulo']?></h1>

            <picture>
                <source srcset="build/img/destacada.webp" type="image/webp">
                <source srcset="build/img/destacada.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
            </picture>
            <div class="resumen-propiedad">
                <p class="precio">$<?php echo $propiedad['precio']?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="./retornoImagen.php?s_id=<?php echo $propiedad["imagen"]?>"  alt="<?php echo $propiedad["nombre_archivo"] ?>" title="<?php echo $propiedad["nombre_archivo"] ?>">                
                        <p><?php echo $propiedad['wc']?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']?></p>
                    </li>
                    <li>
                        <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones']?></p>
                    </li>
                </ul>

                <p><?php echo $propiedad['descripcion']?></p>
            </div>
        <?php endforeach;?>
    </main>

<?php
    incluirTemplates('footer');
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>