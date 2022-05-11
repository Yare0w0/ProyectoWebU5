
<?php include("./head_foot/header.php") ?>

<div class="login-box">

    <h1>Registrate</h1>
    <form id="form" action="registrar_conexion.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="nombre..." id="nombre" required>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="apellido..." id="apellido" required>
        <label for="edad">Edad</label>
        <input type="number" name="edad" placeholder="edad..." id="edad" required>
        <br> </br>
        <label for="sexo">Sexo</label>
        <select id="sexo" name="sexo">
        <option value="femenino">Femenino</option>
        <option value="masculino">Masculino</option>
        </select>
        <br> </br>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" placeholder="telefono..." id="telefono" required>
        <label for="correo">Correo</label>
        <input type="text" name="correo" placeholder="correo..." id="correo" required>
        <!-- PASSWORD INPUT -->
        <label for="contraseña">Contraseña</label>

        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña..." required>

        <label for="Spassword">Ver contraseña</label>

        <input type="checkbox" id="Spassword" onclick="mostrar()">

        <p style="color: red; font-size:small;" id="mensaje"></p>

        <input type="submit" class="button" onclick="validar()" value="Registrarme">

        <br></br> 

        

    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = $_POST["error"];
    if ($error == "si") {
?>
        <script>
            document.getElementById("mensaje").innerHTML = "Contraseña o usuario incorrecto";
        </script>
<?php
    }
}
?>

<script>
    var pass = document.getElementById("contraseña");
    var user = document.getElementById("usuario")
    var mensaje = document.getElementById("mensaje");
    var expreg = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/g;
    pass.onkeyup = function() {
        if (pass.value.match(expreg)) {
            mensaje.innerHTML = "";
        } else {
            mensaje.innerHTML = "La contraseña debe contener al menos 1 mayuscula 1 minuscula 1 numero y ser de 6 caracteres";
        }
    }

    function validar() {
        if (user.value != "") {
            if (pass.value.match(expreg)) {
                document.getElementById('form').submit();
            } else {
                mensaje.classList.add("invalido");
                mensaje.innerHTML = "La contraseña debe contener al menos 1 mayuscula 1 minuscula 1 numero y ser de 6 caracteres";
            }
        } else {
            mensaje.innerHTML = "Llene todos los campos antes de continuar";
        }
    }

    function mostrar() {
        var x = document.getElementById("contraseña");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


<?php include("./head_foot/footer.php") ?>