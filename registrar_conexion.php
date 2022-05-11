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
        $consulta = "INSERT INTO usuarios VALUES ('', '$nombre', '$apellido', '$edad', '$sexo', '$telefono', '$correo', '$contraseña', 'admin')";

        $resultado = mysqli_query ($db,$consulta);
        if(!$resultado){
            $mensaje = '<h1> <font color = "#ffffff"> Correo existente </font></h1>';
        }else{$mensaje = '<h1> <font color = "#ffffff">  Su registro se a realizado con exito </h1>';}

        echo $mensaje;
?>

<form id="form" action="login.php" method="post">
    
    <input type="submit" href="login.php" value="Iniciar sesión">
</form>

<?php include("./head_foot/footer.php") ?>