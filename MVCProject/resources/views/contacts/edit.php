<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Actualizar contacto</h1>

    <!--Mandamos a la url de edit post, enviandole el id en la url-->
    <form action="/contactos/<?= $contactos['id']?>" method="post">
        <div>
            <label for="name">Nombre</label>
            <!--En el value le pasamos los datos del contacto para que aparezcan en el placeholder-->
            <input value="<?=$contact['name'] ?>" type="text" name="name" id="name">
        </div>

        <div>
            <label for="email">Nombre</label>
            <!--En el value le pasamos los datos del contacto para que aparezcan en el placeholder-->
            <input value="<?=$contact['email'] ?>" type="email" name="email" id="email">        
        </div>

        <div>
            <label for="phone">Nombre</label>
            <!--En el value le pasamos los datos del contacto para que aparezcan en el placeholder-->
            <input value="<?=$contact['phone'] ?>" type="text" name="phone" id="phone">
        </div>
        
        <button type="submit">Actuqalizar</button>
    </form>
</body>
</html>