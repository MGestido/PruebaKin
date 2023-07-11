<?php

namespace App\Models;

class Contact extends Model
{
        // Con este atributo, definimos la tabla en la ue voy a buscar en las consultas sql
        // Luego al hacer la consulta Model, vamos a la variable $table para ver donde debemos buscar
        protected $table = 'contactos';
        
        // Si deseamos, conectamos con una Base de datos diferente por modelo, cambiando las credenciales
        protected $db_host = DB_HOST;
        protected $db_user = DB_USER;
        protected $db_pass = DB_PASS;
        protected $db_name = DB_NAME;
}

?>