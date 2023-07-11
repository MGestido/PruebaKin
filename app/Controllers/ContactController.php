<?php

namespace App\Controllers;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // Obtenemos todos los contactos
        $contacts = $model->all();

        // Le paso a la vista el array de contactos
        // Contacts genera un array de los contactos, hace esto en definitiva:
        // compact('contacts') => ['contacts' => $contacts]
        return $this->view('contacts.index', compact('contacts'));
    }

    public function create(){
        return $this->view('contacts.create');
    }

    public function store(){

        // Retorna los datos del formulario
        $data = $_POST;

        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // Creamos el contacto
        $model ->create($data);

        // redirigimos con el metodo que definimos en Controller
        return $this->redirect('/contactos');
    }
    
    public function edit(){
        return "Aqui se mopstrara el listado de contactos";
    }

    public function update(){
        return "Aqui se mopstrara el listado de contactos";
    }
    
    public function destroy(){
        return "Aqui se mopstrara el listado de contactos";
    }
}