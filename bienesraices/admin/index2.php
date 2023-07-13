<?php
    //require '../includes/funciones.php';
    include '../aux2.php';
        // //Importa la conexión
    //require '../includes/config/database.php';
    $db = new DAO();

        // //Escribir el Query
    $consulta = "SELECT * FROM Propiedades";
    
        // //Consultar la BD
    //$resultadoConsulta = mysqli_query($db, $query);
    $resultadoConsulta =  $db->ejecutarConsulta($consulta);
        // //Muestra mensaje condicional
    //$resultado = $_GET['resultado'] ?? null;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
        if($id) {
    
            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = :id";
            $parametros=array("id"=>$id);
            $resultado = $dao->ejecutarConsulta($consulta,$parametros);
            $propiedad = mysqli_fetch_assoc($resultado);
    
            unlink("./retornoImagen.php?s_id=" . $propiedad['imagen']);
    
            //Eliminar la propiedad
            $consulta = "DELETE FROM propiedades WHERE id = :id";
            $parametros=array("id"=>$id);
            $resultado = $dao->ejecutarConsulta($consulta,$parametros);
    
            if($resultado) {
                header('Location: /bienesraices/admin?resultado=3');
            }
        }
    }
    
        //Incluye un template
    require '../includes/funciones.php';
    incluirTemplates('header');
    //incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>


        <a href=" /bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

        <tbody> <!-- Mostrar  los Resultados -->
            <?php foreach($resultadoConsulta as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img loading="lazy" src="../retornoImagen.php?s_id=<?php echo $propiedad["imagen"]?>"  alt="<?php echo $propiedad["nombre_archivo"] ?>" title="<?php echo $propiedad["nombre_archivo"] ?>"></td>                
                <td><?php echo $propiedad['precio']; ?></td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                    </form>
                    <a type="submit" class="boton-rojo-block" value="Eliminar" href="../admin/propiedades/borrar.php?id=<?php echo $propiedad['id']?>">Eliminar<a>
                    
                    <a href="/../bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>

<?php
        //Cerrar la conexión
    //mysqli_close($);

    incluirTemplates('footer');
?>