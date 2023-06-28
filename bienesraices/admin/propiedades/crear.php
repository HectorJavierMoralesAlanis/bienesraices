<?php
    //Base de datos
    include ('../../aux2.php');
    $dao2=new DAO();
    $consulta2="SELECT * FROM vendedores";
    $user_access=$dao2->ejecutarConsulta($consulta2);
    if(isset($_POST['nombre'],$_POST['apellido'],$_POST['telefono'])){
        $dao = new DAO();
        $consulta="INSERT INTO vendedores (nombre,apellido,telefono)"."VALUES(:nombre,:apellido,:telefono)";
        $parametros=array("nombre"=>"$_POST[nombre]",
                        "apellido"=>"$_POST[apellido]",
                        "telefono"=>"$_POST[telefono]"
        );
        $resultados=$dao->insertarConsulta($consulta,$parametros);
        if($resultados>=0){
            header("/admin/index.php");
        }else{
            echo "error";
        }
    }else{
    }
    require '../../includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <form class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="text" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="text" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="text" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                
                <select name="vendedor">
                    <?php foreach($user_access as $row)?>
                        <option value="<?php echo $row['nombre']?>"><?php echo $row['nombre']?></option>
                    <?php ?>
                </select>
            </fieldset>

            <boton type="sumbit" class="boton boton-verde">Crear Propiedad</boton>
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>