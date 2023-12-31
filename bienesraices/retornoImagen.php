<?php
    define("DIR_UPLOADS","/var/www/html/bienesraices/imagenes/");
        /**
     * Regresa una instancia de PDO para poder trabajar con la base de datos.
     */
    function getDbConnection() {

        // Opciones para la conexión a DB.
        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false, //desactiva la emulación de sentencias preparadas
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //manejo de errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //modo de fetch por default
        ];

        // Creamos una instancia de tipo PDO, que es la que regresamos.
        // Los parámetros de conexión a DB están definidos en el archivo config.php.
        return new PDO("mysql:host=localhost;dbname=bienesraices","NuevoU","Unuevo1234");
    }

    // Extensiones de archivos con su correspondiente content-type.
    $CONTENT_TYPES_EXT = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "gif" => "image/gif",
        "png" => "image/png",
        "json" => "application/json",
        "pdf" => "application/pdf",
        "bin" => "application/octet-stream"
    ];
    // Se obtiene el parámetro del secure id, enviado por el URL.
    $secureId = filter_input(INPUT_GET, "s_id");
    if (!$secureId) {   // Si no existe el parámetro.
        http_response_code(400);  // Regresamos error 400 = Bad Request.
        exit;  // Fin de la ejecución.
    }
    
    // Consultamos el registro del archivo/foto subido en la base de datos.
    $sqlCmd = "SELECT * FROM Propiedades WHERE imagen = ?";  // SQL query.
    $params = [$secureId];  // Los parámetros de la consulta, en este caso el secure_id.
    $db = getDbConnection();  // Objeto PDO para hacer la interaccion con la DB.
    $stmt = $db->prepare($sqlCmd);  // Preparamos la consulta a ejecutar.
    $stmt->execute($params);  // Ejecutamos la consulta.
    $r = $stmt->fetch();   // Obtenemos el primer registro de la consulta.

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