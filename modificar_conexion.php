<?php include("./head_foot/header.php") ?>
<?php
    $servidor="localhost";
    $usuarioBD="root";
    $pwdBD="";
    $nomBD="proyectowebu5";

    $db=mysqli_connect($servidor,$usuarioBD,$pwdBD,$nomBD);

    if(!$db){
        die("La conexión falló: ".mysqli_connect_error());
    }

    else{

        mysqli_query($db, "SET NAMES 'UTF8'");

    }

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $correo = trim($_POST['correo']); 
        $contraseña = trim($_POST['contraseña']);
        $consulta = " UPDATE usuarios SET nombre='$nombre', apellido='$apellido', 
        edad='$edad', sexo='$sexo', telefono='$telefono', contraseña='$contraseña' 
                        WHERE correo='$correo'";

        $resultado = mysqli_query ($db,$consulta);
        if(!$resultado){
            $mensaje = '<h1> <font color = "#ffffff"> Verifique su correo </font></h1>';
            echo mysqli_error($db);
        }else{$mensaje = '<h1> <font color = "#ffffff">  Cambios realizados con exito </font></h1>';}

        echo $mensaje;
?>

<form id="form" action="login.php" method="post">
    
    <input type="submit" href="login.php" value="Iniciar sesión">
</form>

<?php include("./head_foot/footer.php") ?>