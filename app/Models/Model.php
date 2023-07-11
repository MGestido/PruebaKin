<?php

namespace App\Models;

// Metodo de php que permite la conexion con mysql
use mysqli;

class Model{
    // Credenciales necesarias para conectarse a la base de datos
        // Traemos las variables constantes definidas en database.php
        protected $db_host = DB_HOST;
        protected $db_user = DB_USER;
        protected $db_pass = DB_PASS;
        protected $db_name = DB_NAME;
        // Generamos una variable de conexion, para acceder a ella mas adelante
        // La guardamos en el metodo connection
        protected $connection;
        // Generamos una variable en donde almacenaremos el resultado d ela consulta, de la query
        protected $query;
        // Atributo que contiene la tabla a la que se dirigira la consulta. Va a ser remplazado dependiendo
        // de que tabla tenga en la clase que extienda al Model
        protected $table;

        // Generamos constructor, en donde establece la conexion al generar una instancia de la clase
        public function __construct(){
            $this->connection();
        }

        // Metodo para realizar la conexion, le pasamos todos los datos por parametro
        public function connection(){
            $this->connection = new mysqli($this ->db_host, $this ->db_user, $this ->db_pass, $this ->db_name);
            
            // Verificamos si existe error dentro de la conexion.
            // Si la tenemos, imprima el mensaje de error
            if($this ->connection->connect_error){
                die('Error de conexion: ' . $this->connection->connect_error);
            }
        }

        public function paginate($cant = 15){
            // Guardamos en una variable lo que nos llega por url el valor de page
            // Hacemos una condicional, que dice que si existe la palabra page en la url (con isset), le 
            // asigna a $page el valor que tenga, sino, le asigna 1. 
            // ($_GET es un metodo de php que obtiene la url)
            $page = isset($_GET['page']) ? $_GET['page'] : 1;

            // Con esta sentencia, traemos los registros de acuerdo a las paginas ingresadas en url
            // El SQL_CALC_FOUND_ROWS guarda la cantidad de filas que hay, para usalra despues
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} LIMIT " .($page - 1) * $cant . ", {$cant}";

            // retorn todos los registros de la base de datos
            $data = $this->query($sql)->get();

            // Aca trae el total de filas previamente calculado, primero lo seleccionamos y luego lo traemos
            $total = $this->query('SELECT FOUND_ROWS() as total')->first()['total'];

            // Devolvemos un array con los datos, el total de filas, y de cual a cual registro va
            return[
                'total' => $total,
                'from' => ($page - 1) * $cant + 1,
                'to'=> ($page - 1) * $cant + count($data),
                'data' => $data
            ];
        }


        // Consulta a la base de datos, la consulta sql(query) recibe un parametro que es la sentencia
        public function query($sql){
            // Este metodo hace la consulta
            $this->query = $this->connection->query($sql);

            // Le retornas una instancia del propio objeto para poder concatenarlo con mas metodos
            return $this;
        }

        public function first(){
            // Con esta consulta trae el primer contacto de todos, como un array.
            // El primero es por el fetch_assoc.
            return $this->query->fetch_assoc();
        }

        public function get(){
            // Trae todos los registros, de forma asociativa, eso lo hacen los ultimos dos comandos.
            // Asociativo es que en vez de llamar a algun elemento del array por el indice, lo llamas
            // por el nombre
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }

        // Consultas que me va a traer todos los registros de la base de datos
        public function all(){
            // Hacemos la consulta sql para buscar todos los elementos (sin seguridad)
            $sql = "SELECT * FROM {$this->table}";
            // retornamos el resultado de la consulta
            return $this->query($sql)->get();

        }

        public function find($id){
            // Hacemos la consulta sql para buscar todos los elementos de un deter id (sin seguridad)
            $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
            // retornamos el resultado de la consulta
            return $this->query($sql)->first();
        }


        public function where($column, $operator ,$value = null){

            // Hacemos que si no le pasamos value, este sea =, y cambiamos el operador por el value
            if($value == null){
                $value = $operator;
                $operator = '=';
            }

            // Una manera de agregar seguridad
            // Agregar capa de seguridad
            // Si el usuario agrega algo mas al valor, de forma de manipular la consulta sql, esto 
            // hace que elimine las comillas simples, poniendole un \ adelante. La barra, hace que se tomen, 
            // Esas comillas simples como texto plano. 
            // Si alguien ingresa $contactModel->where("name", "Marcelo' or 'a' = 'a") ->get();,
            // obtendria todos los usuarios, pero el real_espcape_string, saca los caracteres especiales (').
            $value = $this -> connection->real_escape_string($value);
            

            // Otra forma de agregar seguridad, el signo de interrogacion va a swer el value
           $sql = "SELECT * FROM {$this -> table} WHERE {$column} {$operator} ?";

            
            $stmt = $this->connection->prepare($sql);

            // Consulta sin seguridad
            $sql = "SELECT * FROM {$this -> table} WHERE {$column} {$operator}'{$value}'";

            // Hace la consulta y la almacena en query()
           $this->query($sql);

            // En este caso devolvemos todo el objeto, para luego elegir si 
            // queremos el primer o todos los registros
            return $this;
        }

        public function create($data){
            

        }
}
?>