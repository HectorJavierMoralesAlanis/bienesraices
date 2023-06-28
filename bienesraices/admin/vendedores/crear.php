<?php
    //Base de datos
    echo $_POST['nombre'];
    echo $_POST['apellido'];
    echo $_POST['telefono'];
    include_once('../bienesraices/PDO/DAO.php');
    if(isset($_POST['nombre'],$_POST['apellido'],$_POST['telefono'])){
        $dao = new DAO();
        echo "Fuck you";
        $consulta="INSERT INTO vendedores (nombre,apellido,telefono)"."VALUES(:nombre,:apellido,:telefono)";
        $parametros=array("nombre"=>"$_POST[nombre]",
                        "apellido"=>"$_POST[apellido]",
                        "telefono"=>"$_POST[telefono]"
        );
        $resultados=$dao->insertarConsulta($consulta,$parametros);
        echo $resultados;
        if($resultados>=0){
            header("http://143.198.163.107/bienesraices/admin/index.php");
        }else{
            header("http://143.198.163.107/bienesraices/admin/index.php");
        }
    }else{
        echo "error";
    }
    require '../../includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Crear Vendedor</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" action="/../bienesraices/admin/vendedores/crear.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="nombre">Nombre del vendedor:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido">

                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Telefono">
            </fieldset>
            <button type="sumbit" class="boton boton-verde">Crear Vendedor</button>
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>