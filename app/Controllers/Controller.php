<?php

namespace app\Controllers;

class Controller{


    // Este metodo te va retornar la ruta de la vista enviada por parametro
    public function view($route){

        // Crea variable con los nombres clave del array
        // Son las que despues pasamos a la vista
        extract ($data);

        // Si existe un archivo con esa ruta
        if(file_exists("../resources/views/{$route}.php")){
            // Se almacena la informacion en un bufer   
            ob_start();
            // se incluye el archivo en la ruta proporcionada
            include "../resources/views/{$route}.php";
            // Se obtiene el contenido y se limpia el bufer
            $content = ob_get_clean();

            // Se retorna el contenido
            return $content;

        } else{
            return "El archivo no existe";

        }

    }    

}