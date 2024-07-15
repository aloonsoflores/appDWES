<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Validación de datos
    $errores = array();

    // Validación de nombre y apellidos (existencia y longitud)
    if (empty($nombre) || strlen($nombre) > 50) {
        $errores[] = "El campo Nombre es inválido.";
    }

    if (empty($apellidos) || strlen($apellidos) > 100) {
        $errores[] = "El campo Apellidos es inválido.";
    }

    // Validación de edad (existencia y rango)
    if (empty($edad) || !is_numeric($edad) || $edad < 0 || $edad > 120) {
        $errores[] = "El campo Edad es inválido.";
    }

    // Validación de teléfono (existencia y formato)
    if (empty($telefono) || !preg_match("/^\d{9}$/", $telefono)) {
        $errores[] = "El campo Teléfono es inválido.";
    }

    // Validación de email (existencia y formato)
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El campo Email es inválido.";
    }

    // Validación del archivo de imagen (foto)
    if (is_uploaded_file ($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $nombreFichero = $_FILES['foto']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreCompleto);
            echo "Fichero subido con el nombre: $nombreFichero<br>";
            echo '<img src="'.$nombreCompleto.'" alt="">';
    } else {
        print ("No se ha podido subir el fichero\n");
    }

    if (!empty($errores)) {
        // Mostrar errores en pantalla
        echo "Errores en el formulario:<br>";
        foreach ($errores as $error) {
            echo "<span style='color: red;'>$error</span><br>";
        }
    }
}
?>

</body>
</html>