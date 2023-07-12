<?php
    //require '../includes/funciones.php';
    /*include_once '../aux2.php';
        // //Importa la conexión
    //require '../includes/config/database.php';
    $db = new DAO();
    
        // //Escribir el Query
    $consulta = "SELECT * FROM propiedades";
    
        // //Consultar la BD
    //$resultadoConsulta = mysqli_query($db, $query);
    $resultadoConsulta =  $dao1->ejecutarConsulta($consulta);
        // //Muestra mensaje condicional
    //$resultado = $_GET['resultado'] ?? null;
    /*
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
    */
        //Incluye un template
    //require '../includes/funciones.php';
    incluirTemplates('header');
    //incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        

        <!--<a href=" /bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>-->

        <table class="propiedades">
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
            
        </tbody>
        </table>

<?php
        //Cerrar la conexión
    //mysqli_close($);

    incluirTemplates('footer');
?>