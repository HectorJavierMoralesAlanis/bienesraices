<?php
    //Base de datos
    include ('./../../aux2.php');
    //echo $imagen;
    $dao2=new DAO();
    $consulta2="SELECT * FROM vendedores";
    $user_access=$dao2->ejecutarConsulta($consulta2);
    if(isset($_POST['titulo'],$_POST['precio'],$_POST['imagen'],$_POST['descripcion'],$_POST['habitaciones'],$_POST['wc'],$_POST['estacionamiento'],$_POST['vendedor'])){
        $dao = new DAO();
        $fecha=date('Y-m-d H:i:s');
        $consulta="INSERT INTO Propiedades (titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedores_id)".
        "VALUES(:titulo,:precio,:imagen,:descripcion,:habitaciones,:wc,:estacionamiento,:fecha,:id_vendedores)";

        $parametros=array("titulo"=>"$_POST[titulo]",
                        "precio"=>"$_POST[precio]",
                        "imagen"=>addslashes(file_get_contents($_FILES['imagen']['tmp_name'])),
                        "descripcion"=>"$_POST[descripcion]",
                        "habitaciones"=>"$_POST[habitaciones]",
                        "wc"=>"$_POST[wc]",
                        "estacionamiento"=>"$_POST[estacionamiento]",
                        "fecha"=>$fecha,
                        "id_vendedores"=>"$_POST[vendedor]",
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

        <form class="formulario" method="POST" action="/../bienesraices/admin/propiedades/crear.php" enctype="multipart/fomr-data">
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
                    <option selected>Opciones</option>
                    <?php foreach($user_access as $row){?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
                    <?php }?>
                </select>
            </fieldset>

            <button type="sumbit" class="boton boton-verde">Crear Propiedad</button>
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>