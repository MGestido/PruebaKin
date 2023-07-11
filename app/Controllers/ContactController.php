<?php

namespace App\Controllers;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $model = new Contact;

        $contacts = $model->all();

        // Le paso a la vista el array de contactos
        // Contacts genera un array de los contactos, hace esto en definitiva:
        // compact('contacts') => ['contacts' => $contacts]
        return $this->view('contacts.index', compact('contacts'));
    }

    public function create(){
        return "Aqui se procesara el formulario para un contacto";
    }

    public function stroe(){
        return "Aqui se procesara el formulñario para crear un contactol";
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