<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de contactos</h1>

    <a href="/contacts/create">Crear contacto</a>
    <ul>
        <?php
            // Los : significan que estoy abierno el foreach ahi, y debajo lo voy a cerrar en endforeach
            // Esto nos permite meter codigo html entre medio
            foreach ($contacts as $contact) : ?>

                <li>
                    <!--El ?= refiere a php + echo-->
                    <a href="/contacts/<?= $contact['id']?>">
                        <?= $contact['name']?>
                    </a>
                </li>
        
        <?php endforeach?>
    </ul>
</body>
</html>