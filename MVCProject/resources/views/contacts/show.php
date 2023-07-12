<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalle del contacto</h1>
    <!--Enlace que envia a el listado de contactos-->
    <a href="/contactos">Volver</a>
    <!--Enlace que envia a editar el contacto-->
    <a href="/contactos/<?= $contact['id']?>/edit">Editar</a>
    <p>Nombre <?= $contact['name']?></p>
    <p>Email <?= $contact['email']?></p>
    <p>Telefonmo <?= $contact['phone']?></p>

    <!--Boton que nos permite eliminar el contacto, va a ir a la ruta que usa el metodo destroy-->
    <form action="/contacts/<?=$contact['id']?>/delete" method="post">
        <button>
            Eliminar
        </button>
    </form>
</body>
</html>