<!--Clases-->
<?php 
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
        public function setNombre($nombre){
            
            $this->nombre = strtolower($nombre);
        }

        // getters
        public function getNombre(){
            return ucwords($this->nombre);
        }

    }


    // HERENCIA
    // Uruguayo hereda todo de persona, pero podemos agregar mas aspecos
    class Uruguayo extends Persona{
        public $departamento, $ciudad;

        // podemos sobreescribir algun metodo, en este caso si llamamos al metodo con una instacia de uruguayo, 
        // Va a traer este metodo, no el de persona
        public function getNombre(){
            return ucwords($this->apellido);
        }

        // Podemos no solo sobre escribirlo, sino extender sus propiedades
        public function setNombre($nombre){
            // Aca estamos llamando al metodo, es como que pasas el getNom,bre, todo el codigo, para luego seguir escribiendo
            parent:: setNombre($nombre);
            echo "Nombre asignado correctamente";
        }
    }

?>

// ENCAPSULAMIENTO
<?php
        class nuevaClase(){
            // SOLO PODEMOS SOBREESCRIBIR PROPIEDADES PUBLICAS O PROTECTED SI ESTAS EN UNA HIJA
            // podemnos llamar el atributo donde queramos
            public $public = "publica";
            // Podemos llamar el atributo solo en clases hijas
            protected $protected = "Protegica";
            // podemos acceder al atributo solo dentro de la clase
            private $private = "Privada";

            function mostrar(){
                echo $this->public . "<br>";
                echo $this->protected . "<br>";
                echo $this->private . "<br>";

            }

            // La manera de acceder a sus atributos es a traves del metodo
            $objeto = new MyClass;
            $objeto->mostrar();

        }
    ?>

    // Interfaces
    <?php
        //INTERFACES
        interface Interfaz_a{
            public function suma();

        }

        // En esta interfaz va a tener su metodo y el extendido de a
        interface Interfaz_b extends Interfaz_a{
            public function suma2();

        }

        // Clase para implementar interfaz
        class nueva implements Interfaz_a{
            public function suma(){}

        }

    ?>


    // Clases abstractas, no instanciables
    <?php

    // Clase abstracta
    abstract class ClaseAbstracta{

        // Defino una funcion que va a ser abstracta
        abstract public function getValor();

        public function imprimir(){
            echo $this->getValor();
        }
    };

    // Implementacion de la clase abstracta
     class claseImplementada extends ClaseAbstracta {

        // La funcion de la clase abstracta debo implementarla
        abstract public function getValor(){
            return "clase concreta";
        }
    }
    ?>

    // TRAITS
    <?php
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
            public function setNombre($nombre){                
                $this->nombre = strtolower($nombre);
            }

            // getters
            public function getNombre(){
                return ucwords($this->nombre);
            }

        }

    // La herencia multiple no existe en PHP, por eso se usa TRAITS
    // Los traits no se pueden instanciar, solo extender.
    trait Latino{
        public function saludar(){
            return "Hola soy latino";
        }
    }

    trait deUruguay{
        protected function deDonde(){
            return ", soy de uruguay";
        }
    }

    class uruguayo extends Persona{
        // Aqui usa la clase persona y el trait latino
        use Latino; 
        // Aca hacemos que el metodo que en el trait era protected, pase a ser publico
        use deUruguay{deDonde as public};

    }

    // Uso el trait latino y deUruguay con la clase uruguayo
    $uruguayo = new uruguayo;
    $uruguayo->saludar();
    $uruguayo->deDonde();


    // Otro caso, podemos hacer un trait que implemento otros dos traits. 
    trait contenedor{
        use Latino, deUruguay;

        // Hacemos un metodo abstracto que pueda implementar la clase
        abstract public saludarFinal();

    }

    // La clase luego implementaria solo el contendopr
    class uruguayo extends Persona{
        use contenedor;

        public function saludarFinal(){
            $this -> saludar();
            $this -> deDonde();
        }
    }
?>

// NAMESPACES
<?php
    // En ocasiones mas de una clase se llaman igual, por ejemplo, dos clases persona pero en carpetas diferentes
    // Para resolverlo usamos namespace, que va a ser el nombre de sus capretas
    
    // Lo siguienbte seria denbtro de las clases de sus propias carpetas
    namespace latinos
        class Persona{ // Imaginemos esta en una carpeta llamada latinos
    }   

    namespace europeos
        class Persona{ // Imaginemos esta en una carpeta llamada europeos
    }  
    
    
    // Si estamos usando el index y queremos usar los dos, que hacemos:
    // Podemos poner usar la persona de latinos
    use latinos/Persona;

    // Aca estamos llamando a los dos, pero no entra en conflicto porque antes le dijimos a quien usar
    require_once("latinos/Persona")
    require_once("europeos/Persona")

    // Una forma de usar los dos, seria nombrando su uso de forma diferente
    use latinos/Persona as personasLatinas;
    use europeos/Persona;

    // Para instancia a personas latinos harias
    $latino = new personasLatinas;
?>


// CLASE FINAL
<?php
    // Clase final, hace que no se pueda extender por otras clases
    final class Hogar{

    }

    // Lo mismo es con los metodos, por ejemplo, si la clase hogar fuera publica, podemos hacere 
    // que su metodo no se pueda sobreescribir
    // La clase se puede extender por otra clase, pero no sobreescribir
    public class Hogar{
        final public function saludar(){
            echo "Hola";

        }
    }
?>
