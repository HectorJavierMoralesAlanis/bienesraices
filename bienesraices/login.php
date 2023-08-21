<?php
    //Incluye el header
    require './aux2.php';

    $db = new DAO();
    
    // Autenticar el usuario

    $errores = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        echo "dsfkjfbn";
        $email =  (filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = (filter_var($_POST['password']));

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }

        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios"."WHERE email = :email";
        $parametros = array("email"=>$email);
        $resultado = $db->ejecutarConsulta($query,$parametros);
        echo "dsjklfn";
        if($resultado!==NULL){
            // Revisar si el password es correcto
            foreach ($resultado as $usuarios):
                if($usuarios['email']==$email){
                    $usuario =$usuarios;
                }
            endforeach;
            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            if($auth){
                // El usuario esta autenticado
                session_start();
                // Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: http://143.198.163.107/bienesraices/admin/index2.php');
            }else{
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }

    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" novalidate>
            <fieldset>
                <legend>Email y Password</legend>

                <label for="nombre">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>