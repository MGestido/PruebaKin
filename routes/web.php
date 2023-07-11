<?php

// Usamos el archivo que permite agregar y usar las rutas por el usuario
use lib\Route;

// Importamos el controlador home
use App\Controllers\HomeController;

// Usamos metodo get de Route, popnemos la uri, y luego el controlador y el metodo que va a usar
Route::get('/', [HomeController::class . 'index']);

Route::post('/contactos/:id/delete', [ContactController::class, 'destroy']);

Route::get('/contacto', function(){
    return "Pagina de contacto";
});

// Ruta variable, el :slug, es un valor variable que cambia segun lo que coloque el usuario
Route::get('/courses/:slug', function($slug){
    return 'El curso es de:' . $slug;
});


// Llamamos a la funcion que recorre las rutas en el Route.php
Route::dispatch();