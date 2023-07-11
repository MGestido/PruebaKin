<?php

namespace App\Models;

class Contact extends Model
{
        // Con este atributo, definimos la tabla en la ue voy a buscar en las consultas sql
        // Luego al hacer la consulta Model, vamos a la variable $table para ver donde debemos buscar
        protected $table = 'contactos';     
}

?>