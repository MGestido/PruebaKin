<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear contacto</h1>

    <form action="/contactos" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="email">Nombre</label>
            <input type="email" name="email" id="email">        
        </div>

        <div>
            <label for="phone">Nombre</label>
            <input type="text" name="phone" id="phone">
        </div>
        
        <button type="submit">Crear</button>
    </form>
</body>
</html>