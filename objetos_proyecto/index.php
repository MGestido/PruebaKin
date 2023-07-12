// Progreamacion orientada a objetos
<?php 
    
    // Traemos la clase, la importamos
    require_once('clases/Persona.php');

    //INSTANCIA DE CLASE QUE NO USA CONSTRUCTOR!!!
    // Instanciamos la clase
    $persona1 = new Persona;
    
    // Agregamos los valores
    $persona1->setNombre("Marcelo");
    $persona1->apellido = "Gestido";
    $persona1->edad = 27;

    // Si lo usamos en un echo
    echo "El nombre es " . $persona1 -> getNombre();


    // INSTANCIA DE CLASE CON CONSTRUCTOR!!
    $persona2 = new Persona("Marcelo", "Gestido", 27)
?>


// Herencia
<?php 
    
    // Traemos la clase, la importamos
    require_once('clases/Persona.php');

    $uruguayo = new Uruguayo;
?>


// AUTOLOAD
<?php
    // Autoload de las diferentes clases que estan en carpetas a nuestro index. Seria como importar los paquetes en c#
    // Recordar que la forma manual es:
    use clases/Persona;

    // Importamos la clase persona en la carpeta clases
    require_once("clases/Persona")

    // Ahora bien, para traerlo todos, usamos una funcion
    spl_autoload_register(function($clase)){
        // Verificamos que el archivo exitsa
        if (file_exists(str_replace('\\', '/', $clase) . '.php')){
            require_once str_replace('\\', '/', $clase) . '.php';
        }

    }

?>

// Propiedades y metodos estaticos: Lo usamos para que no dependa del comportamiento de la clase
<?php
    // Clase con metodo estatico, se puede llamar sin necesidad de instanciar a la clase
    class Humano{
        // propiedad estatica
        public static $nombre = "Marcelo";


        // Metodo estatico
        public static function saludar(){
            // El self llama a la propiedad guardada en la clase, o sea Marcelo.
            // Si no pusieramos self, no llamaria a ese nombre por mas de que lo hayamos 
            // igualado en la propiedad $nombre
            echo "Hola mundo" . self::$nombre;
        }

    }
    // Llamamos al metodo estatico sin necesidad de instanciar la clase
    Humano::saludar();

    // Llamamos a la propiedad estatica sin necesidad de instanciar la clase
    echo Humano::$nombre

    // Nos va a retornar, hola marcelo, eso porque pyusimo el self, sino daba error
    $humano = new Humano;
    $humano -> saludar();

    public class Uruguayo extends Humano{
        public function saludoUruguayo(){
            // En este caso, tomas el valor de la propiedad estaica de Humano, para eso el parent
            echo "Hola desde Uruguay, " . parent::$nombre;
        }
    }

?>

// Fluent interface
<?php
    //Veos como hacer para no llamar a la instancia cada vez que queremos setear un dato
    class Persona{
        // Atributos
        public $nombre, $apellido, $edad;

        // Constructor
        public function __construct($nombre, $apellido, $edad){
            $this->nombre = strtolower($nombre);
            $this->apellido = strtolower($apellido);
            $this->edad = strtolower($edad);
        }

        // Setters
        // A cada set devolver el propio objeto
        public function setNombre($nombre){
            
            $this->nombre = strtolower($nombre);
            return $this;
        }

        public function setApellido($apellido){
            
            $this->apellido = strtolower($apellido);
            return $this;
        }


        // getters
        public function getNombre(){
            return ucwords($this->nombre);
        }

    }

    // Pasamos a setear de la siguiente manera 
    $Persona = new Persona();

    $Persona->setNombre('Marcelo')
            ->setApellido('Gestido');

    // Si no estuviera el return $this en los setters, se veria asi
    $Persona->setNombre('Marcelo')
    $Persona->setApellido('Gestido');

?>

// Atributos con nombre 
<?php
    class Persona{
        // public $nombre, $apellido, $edad;

        // De la siguiente manera nos ahorramos definir las propiedades y el constructor.
        // Ya en los parametros del constructor las escribo y las almaceno
        public function __construct(public $nombre, public $apellido, public $edad){
        }

        public function setNombre($nombre){
            
            $this->nombre = strtolower($nombre);
            return $this;
        }

        public function setApellido($apellido){
            
            $this->apellido = strtolower($apellido);
            return $this;
        }

        public function getNombre(){
            return ucwords($this->nombre);
        }

    }

    // De esta forma se puede pasar los valores de los parameteros en desorden
    $persona = new Persona(apellido:'Gestido', nombre: 'Marcelo', edad: 27);
?>