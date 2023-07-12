<?php 
    // recupero la informacioin quye nos va a llegar por get
    $nombre = $_GET['name'];
    $edad = $_GET['age'];
    $sexo = $_GET['sexo'];
    // En ewl caso de roles pueden llegar mas de uno, por lo que para verlo podemos usar un foreach
    $roles = $_GET['roles'];
    
    // En el caso de archivos, va con _FILE
    $image = $_FILES['imagen'];
    // Este es el lgar donde se almaceno el archivo
    $patch = $_SERVER["DOCUMENT_ROOT"];
    // Esta es la forma de ver de cambiatr la ruta para mandarlo a otro lugar
    $patch = $_SERVER["DOCUMENT_ROOT"] . '/primer_proyecto/imagenes' . "/" . $image['name'];

    // Asi movemos el archivo. Decimo que mueva el archivo que esta en tmp_name a $patch. Sabemos que esta en tmp_name porque nos lo
    // lo inidca lo siguiente:  $patch = $_SERVER["DOCUMENT_ROOT"];
    move_uploaded_file($image["tmp_name"], $patch);

    // Si fuera un metodo por post
    $nombre = $_POST['name'];
    $edad = $_POST['age'];
    $sexo = $_POST['sexo'];

    echo "<p>El nombre del usuario es: $nombre </p>";

    // Si no sabemos si viene por get o por post
    $nombre = $_REQUEST['name'];
    $edad = $_REQUEST['age'];
    $sexo = $_REQUEST['sexo'];

    echo "<p>El nombre del usuario es: $nombre </p>"

?>
<!--Select funciona similar al radio y textarea al input text->