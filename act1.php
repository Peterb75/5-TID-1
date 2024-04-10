<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act1</title>
</head>
<body>

    <form method="post" action="#" onsubmit="return mostrarAlerta()">
        <label for="Usuario">Usuario</label>
        <input type="text" id="Usuario" name="Usuario" required>
        <br>
        <label for="Contraseña">Contraseña:</label>
        <input type="password" id="Contraseña" name="Contraseña" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>

    <script>
        function mostrarAlerta() {
            var usuario = document.getElementById("Usuario").value;
            var contraseña = document.getElementById("Contraseña").value;

            alert("Usuario: " + usuario + "\nContraseña: " + contraseña);
            return false;
        }
    </script>

</body>
</html>