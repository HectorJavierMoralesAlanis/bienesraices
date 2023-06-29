<?php 
    include ('aux2.php');
    define("DIR_UPLOADS","/var/www/html/bienesraices/imagenes/");
    $secureId = filter_input(INPUT_GET, "s_id");
    // Consultamos el registro del archivo/foto subido en la base de datos.
    //$sqlCmd = "SELECT * FROM Propiedades WHERE imagen = ?";  // SQL query.
    //$params = [$secureId];  // Los parámetros de la consulta, en este caso el secure_id.
    $db = new DAO();  // Objeto PDO para hacer la interaccion con la DB.
    $consulta = "SELECT * FROM Propiedades WHERE imagen =: imagen";
    
    $parametros = array("imagen"=>$secureId);
    $r= $dao->ejecutarConsulta($consulta,$parametros);  // Preparamos la consulta a ejecutar. y Ejecutamos la consulta.
      // Obtenemos el primer registro de la consulta.

    if (!$r) {  // Si no se regresó ningun registro de la consulta por el secure_id.
        http_response_code(404);  // Regresamos error 404 = Not Found, no existe el archivo.
        exit;  // Fin de la ejecución.
    }

    // Ruta completa de donde se guardó el archivo. El archivo debió guardarse en
    // el directorio de archivos subidos, además que debió guardarse con el nombre
    // de archivo que es el secureId
    $rutaArchivo = DIR_UPLOADS . $secureId;

    if (!file_exists($rutaArchivo)) {  // si no existe el archivo.

        // Regresamos error 500 = Internal Server Error. Esto porque no
        // debería de pasar... si no se guardó el archivo en la carpeta,
        // algo salió mal en el proceso de guardado del archivo.
        http_response_code(500);  
        echo "NO SE ENCONTRÓ EL ARCHIVO EN DIR :(";
        exit;  // Fin de la ejecución.
    }

    // Se obtiene el tamaño del archivo en bytes.
    $tamaño = filesize($rutaArchivo);

    // El nombre del archivo original, esto para regresar la respuesta con el
    // nombre del archivo original.
    $nombreArchivo = $r["nombre_archivo"];

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


    // Especificamos el tipo de respuesta.
    header("Content-Type: $contentType");

    // Definimos un header que contiene el nombre del archivo, que para
    // este caso será el nombre de archivo origina.
    header("Content-Disposition: inline; filename=\"$nombreArchivo\"");

    // Enviamos el tamaño de la respuesta, que será el tamaño del archivo.
    header("Content-Length: $tamaño");

    // Enviamos el archivo como respuesta.
    readfile($rutaArchivo);
    //echo file_get_contents($rutaArchivo);  // Otra forma de regresar archivo como respuesta.

?>