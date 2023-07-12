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

    public function show($id){
        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // nRecupero la informacion de ese contacto
        $contact = $model->find($id);

        return $this->view('contacts.show', compact('contacts'));
    }    
    
    public function edit($id){
        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // nRecupero la informacion de ese contacto
        $contact = $model->find($id);


        return $this->view('contacts.edit', compact('contacts'));
    }

    public function update($id){
        // Retorna los datos del formulario
        $data = $_POST;

        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // Hacemos la consulta sql
        $model ->update($id, $data);

        // redirigimos con el metodo que definimos en Controller, lo mandamos al show del contacto
        $this->redirect("/contactos/{$id}");
    }
    
    public function destroy($id){
        // Instancia del modelo para acceder a BD
        $model = new Contact;

        // Hacemos la consulta sql
        $model ->delete($id);

        // redirigimos con el metodo que definimos en Controller, lo mandamos al listado de contactos
        $this->redirect("/contactos");
    }
}