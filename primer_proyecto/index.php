<h1>Proyecto php</h1>

// Sintaxis basica
<?php
    // imprime en pantalla
    echo "Hola mundo";
?>

// Variables
<?php 
    $nota = 20; 
    // Concatenar variables
    echo "Mi nota es " . $nota;
    // otra manera de hacerlo, solo con comillas dobles
    echo "Mi nota es $nota" ;
?>

// Constantes
<?php 
    // Lo primero es el nombre de la constante, lo segundo es el valor
    define('CURSO', 'Nuevo curso de php');
    //Como usarla
    echo CURSO;
    // Constante array
    define('ANIMALES', 
    [
        'Perro',
        'Gato', 
        'Tortuga'
    ]);

    // Codigo que dice, si existe tal constante
    if(defined('CUSRSO')){
        echo "Existe";
    }

    // Como saber mi version de PHP
    echo "Mi version de php es: " . PHP_VERSION; 
    // Salto de linea 
    echo "<br>";
    // Sistema operativo
    echo "Mi sistema operativo es: " . PHP_OS ; 
    // En que linea se ejecuta
    echo __LINE__;
    // Hay otras constantes que se pueden tener en cuenta
?>

// Tipos de datos en PHP
<?php 
    // entero o decimal
    $numero = 123; // 123.45 seria decimal;
    // String
    $texto = "cadena de texto";
    // Usar datos que son reservados para variables, usar \
    $texto = "cadena de \$texto";
    // boolean - true va a retornar 1, y false es 0
    $bool = true;
?>

// Operadores
<?php 
    // Operadores aritmeticos
    // Tal y como se usa en otros lenguajes:
    // suma y resta: + y -
    // multiplñicacion: *
    // Modulo = %
    // Division = /
?>

// Operadores logicos y de comparacion
<?php 
    // Operador de comparacion es como siempre ==
    $a = 1;
    $b = 2;
    // Preugntamos si son iguales, y usamos el siguiente comando para que devuelva true o false, no 1 o 0
    // el var_dump da informacion detallada de las variables
    var_dump($a == $b);

    // Otros operadores
    // >=, <=, &&, ||

    // Que valores dan falso en string y numero: 0 y vacio, todo el rsto retorna verdadero
?>

// Operadores de asignacion combinado
<?php 
    // Operadores comunes con otros lenguajes
    // Variable
    $a = 1;
    $b = 1; 
    ++$a;
    $a++;
    $a += 1;
    // Lo mismo para otras operaciones;
?>

// If, if else
<?php 
    $a = 1;
    $b = 1; 

    // sintaxis
    if($a > $b){
        echo "mayo";
    } elseif ($a == $b){

        echo "Igual";
    } else{

        echo "Menor"; 
    }

?>

// Operadores ternarios
<?php 
    $a = 1;
    $b = 1; 

    // Condicional en una unica linea (if else)
    // El ? seria el if y el : el else
    $resultado = $a > $b ? "mayor" : "menor";
    echo $resultado;

    // Condicional en una unica linea (if else if)
    $resultado = $a > $b ? "mayo" : ($a < $b ? "menor" : "igual");
    // Imprimo el resultado
    echo $resultado;
?>

// Switch y match
<?php 
    $a = 1;

    // sintaxis switch
    switch ($a) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;    
        default:
            # code...
            break;
    }

    // sintaxis match
    echo match($a){
        // Si $a es 1, imprime lunes
        1=> "Lunes",
        2=> "Martes",
        3=> "Miercoles",
        default => "valor default"
    }
?>

// While y doWhile
<?php 
    $i = 1;

    // sintaxis while, ejecuta si cumple la condicion
    while ($i <= 10) {
        echo $i;
        $i++;
    }

    // sintaxis do while, se ejecuta una vez y a la sig vuelta ve si cumple la condicion
    do {
        echo "se ejecuta";
        $i++;
    } while ($i <= 10);
?>

// for y foreach
<?php 
    $suma = 0;
    // Sintaxis del for
    for ($i=0; $i < 5; $i++) { 
        $suma += $i;
    }
    echo $suma;

    // Array
    $nombres = ["Marce", "Nacho", "Lucas"];
    // foreach sintaxis
    // Indice almacena la posicion del array
    foreach ($nombres as $inidice => $nombre) {
        echo $nombre . "<br>";
    };
?>

// Break y continue
<?php 
    // Sintaxis del break, nos permite salir del bucle al 5 en este caso
    for ($i=0; $i < 10; $i++) { 
        if($i == 5){
            break;
        }
        echo $i . "<br>";
    }

    // Sinbtanxis del continue, continua si se cumple la condicion, 
    // o sea no ejecuta el codigo pero sigue el for 
    for ($i=0; $i < 10; $i++) { 
        if($i == 5){
            continue;
        }
        echo $i . "<br>";
    }

    // Sinbtanxis del die(), sale del programa si se cumple la condicion.
    for ($i=0; $i < 10; $i++) { 
        if($i == 5){
            die();
        }
        echo $i . "<br>";
    };

?>

// Funciones
<?php 
    // Sintaxis ralizar una funcion
    function suma($numero){
        $suma = 0;
        // Sintaxis del for
        for ($i=0; $i < $numero; $i++) { 
            $suma += i;
        }

        return $suma;
    }

    // Funcion con valor por defecto, en caso de que no se lo pasen por parametros
    // Siempre toma prioridad si se le pasa valor por parametros
    function suma($numero = 2){
        $suma = 0;
        // Sintaxis del for
        for ($i=0; $i < $numero; $i++) { 
            $suma += i;
        }

        return $suma;
    }

    // Funcion con n valores en parametros, no sabemos cuanto
    // Se almacena en un array lo que le pasamos por parametro
    function concatenar(...$palabras){
        $resultado = "";

        foreach ($palabras as $palabra) {
            // El . funciona como un +=
            $resultado .= $palabra . " ";
        }
        echo $resultado;

    }

    // Funciones con tipado definido
    // Definimos en los parametros que valor es
    function suma(int $numero1, int $numero2){
        return $numero1 + $numero2;
    }

    // Si queremos que sea mas estricto
    declare(strict_types = 1);
    function suma(int $numero1, int $numero2){
        return $numero1 + $numero2;
    }

    // Si queremos ESPECIFICART EL VALOR DE RETORNO
    // En este caso especificamos que puede devolver int o float
    function suma(int $numero1, int $numero2):int|float
    {
       return $numero1 + $numero2;
    }

    // Como ejecutar una funcion
    // Algunas predeterminadas:
    echo "Marca de tiempo: " . time() . "<br>";
    echo "Raiz cuadrada de nueve: " . sqrt(9) . "<br>";

    // Otras funciones / Cualquier cosa ver la documentacion
    // Numero aleatorio
    // Numero pi
?>

// Ambito de las variables
<?php 

// Globales
$a = 5;
$b = 10;

function suma(){
    // Sintaxis para tomar la variable global
    global $a;
}

// El signo de & en los parametros refiere a que tome 
// la variable como parametro, en definitica, si n fuera a, el resultado es 15 porque ya toma 
// los 5 existentes
function suma2(&$n){
    $n = $n + 10;
}

// Sin signo de & en parametros solo toma el valor de la variable, no la vartiable en si
// Aca la variable pasa a ser local, entonces si le pusieramos a en donde esta n, el resultado es 10
function suma3($n){
    $n = $n + 10;
}
?>

// Strings mas profundo
<?php 
    $string = "cadena";

    // retorna string en posicion
    echo $string[0];

    // Trae la cantidad de caratceres
    echo mb_strlen($string);

    // En que indice se encuentra la posicion del caracter buscado, el primero enbcontrado de izq a der
    echo strpos($string, "d");

    // En que indice se encuentra la posicion del caracter buscado, el primero enbcontrado de der a izq
    echo strrpos($string, "d");

    // Ve si contiene lo que buscamos, devolviendo booleano
    echo str_contains($string, 'dena');

    // Ve si comienza copn esa cadena la palabra
    echo str_starts_with($string, 'dena');

    // Ve si finaliza copn esa cadena la palabra
    echo str_ends_with($string, 'dena');

    // Compara las  cadenas, si son iguales devuelve 0, si el primero es mayor, devuelve 
    // cuanto mayor es, y asi al revez
    $cadena2 = "asdasd";
    echo strcmp($string, $cadena2);
 
    // Esta es igual a la anterior, pero no da diferente si hay diferencia en minusculas
    echo strcasecmp($string, $cadena2);

    // Substring, sintaxis. Te trae desde la posicion 1 al final
    echo substr($cadena, 1);

    // Remplazar partes de la cadena por otra
    echo str_replace("dena", "denita", $string);

    // Pasar a minuscula
    echo strtolower($cadena);

    // paso a mayuscula
    echo strtoupper($cadena);

    // Solo el primer caracter en mayuscula
    echo ucfirst($string);

    // La primera letra de cada palabra en mayuscula
    echo ucwords($string);
?>

// Arrayas unidimensionales
<?php 
    // sintaxis
    // Se pueden hacer arrays con combinacion de valores, boolean, int, string, etc
    $array = [10, 15, 20]; 

    // Buscar por indice, devuelve en esa pposicion
    $array[0];

    // Agregamos al final
    $array[] = 17;

    // Otra forma de definir un array
    // Cada posicion va a ser el titulo que le pusimos. En este caso en vez de 0 es nombre
    $datos = [
        'nombre' => 'Marcelo',
        'apellido' => 'Gestido'
    ];

    // Lo llamamos asi
    echo $datos['nombre'];

?>

// Arrays multidimensionales
<?php 
    // sintaxis de array con mas dimensiones
    $datos = [
        [
            'nombre' => 'Marcelo',
            'apellido' => 'Gestido',
            'direccion' => [
                'Pais' => 'Uruguay',
                'Ciudad' => 'Montevideo'
            ]
        ],
        [
            'nombre' => 'Luis',
            'apellido' => 'Boggio',
            'direccion' => [
                'Pais' => 'Argentina',
                'Ciudad' => 'Buenos Airtes'
            ]
        ],
    ];

    // Asi lo llamamos, al nombre del primer elemento.
    echo $datos[0]['nombre'];

    // Asi llamamos al pais del primer elemento
    echo $datos[0]['direccion']['Pais'];

    // Para recorrerlos todos lo hacemos con un foreach
?>

// Funciones con arrays
<?php 
    // Asignas variuables a los valres de un array
    $array = [10, 15, 20];
    list($a, $b, $c) = $array;

    // Llenar array con limites de numeros
    $array2 = range(10,20);

    // Veo cantidad de elementos del array
    echo count($array);

    // Saber si algun elemento se encuentra dentro del array, retornando booleano
    if (in_array(17)) {
        echo "Se encuentra";
    }

    // Borrar elementos del array, le pasas por parametro el elemento que queres eliminar. Si no, elimina todo el array
    unset($array[2]);
?>

// Formularios
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">+
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--En action especificamos a donde enviamos el formulario
    Si enviamos por get, toda la info va en el header, la url
    Si usamos post, toda la informacion del formulario va por body. Se usa con informacion sesible.
    -->
    <form action="procesar.php" method="get" enctype="multipart/form-data"> <!--Con el encype habilitam,os el envio de archivos -->
        <label>
            Nombre: <input type="text" name="name">
        </label>
        <label>
            Edad: <input type="number" name="age">
        </label>
        <p>Sexo</p>
        <label>
               <input type="radio" name="sexo" value="masculino"> 
        </label>
        <label>
               <input type="radio" name="sexo" value="femenino"> 
        </label>
        <p>Roles</p>
        <label>
                <!-- Roles tiene despues [] dado que puede selecionar mas de uno entyonces enviamos un array -->
               <input type="checkbox" name="roles[]" value="Usuario"> 
        </label>
        <label>
               <input type="checkbox" name="roles[]" value="Administrador"> 
        </label>
        <!--Siempre que se envian archivos, el metodo debe ser post-->
        <label>
            Imagen:
            <input type="file" name="imagen"> 
        </label>
        
        <input type="submit">

    </form>
</body>
</html>
<!--Select funciona similar al radio y textarea al input text-->
