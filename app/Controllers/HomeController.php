<?php

namespace app\Controllers;

use App\Models\Contact;

class HomeController extends Controller{
        // Metodo que envia a la vista de home
        // COn el metodo view, pasamos la vista, y luego la informacion que queremos enviarle.
        public function index(){

            // Instanciamos a la base de datos
            $contactModel = new Contact();

            // Crear un nuevo contacto
            return $contactModel -> Create([
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'phone' => '0991928374'

            ]);

            // Hacemos la consulta, buscando el elemtno con id 2.
            return $contactModel->find(2);

            // Hacemos la consulta a la base de datos sin seguridad alguna
            return $contactModel->query("SELECT * FROM contacts")->first();

            // mandamos  la vista ciertos datos como un array
            return $this->view('home', [
                'title' => 'Home',
                'description' => 'Esta es la pagina de home'
            ]);

        }

}