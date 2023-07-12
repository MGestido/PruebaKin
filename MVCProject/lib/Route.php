<?php
    namespace lib;

    // Creando urls validas para la aplicacion
    class Route{
        // Almacena las rutas
        private static $routes = [];

        // Metodos get y post para registrar rutas en la aplicacion
        public static function get($uri, $callback){
            $uri = trim($uri, '/');
            // Almacena las rutas en $routes junto con un callback
            self::$routes['GET'][$uri] = $callback;
        } 

        public static function post($uri, $callback){
            $uri = trim($uri, '/');
            self::$routes['POST'][$uri] = $callback;
        }

        
        // Metodo que maneja las solicitudes y las enruta a la ruta correspondiente
        public static function dispatch(){
            // Recupera la URI, $_SERVER es una variable de php que devuelve la parte de la URL 
            // después del nombre de dominio y del puerto
            $uri = $_SERVER['REQUEST_URI'];
            $uri = trim($uri, '/');

            // Con el siguiente if, queremos sacar parte de la cadena para evitar errores en la paginacion
            // strpos busca el segundo parametro en la cadena pasada en el 1er parametro
            // Nos va a retornar esa funcion, en que posicion encontro el elemento pasado por parametrto
            if(strpos($uri, '?')){
                // Aca nos quedamos con la cadena que va desde el 0 hasta el ?
                $uri = substr($uri, 0, strpos($uri, '?')) ;
            }
            
            // Nos da el metodo que hemos utilizado, si get o post
            $method = $_SERVER['REQUEST_METHOD'];

            
            // Vemos si existe la ruta con su respectivo method
            // Si encuentra una ruta, ejecuta la funcion que va a la pagina, si no,, muestra el 404
            foreach(self::$routes[$method] as $route => $callback){
                // Codigo que nos dice que si encuentra una ruta con los :
                // Hace una expresion regular para encontrar la cadena de texto despues de los :
               if(strpos($route, ':') != false){
                    $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9]+)', $route);
                }

                // Vemos si la URI coincide exactamente con alguna ruta
                // $matches captura en un array si hay coincidencias
                if (preg_match("#^$route$#", $uri, $matches)) {
                    // arraySlice permite capturar los parametros dinamicos, no la ruta central
                    $params = array_slice($matches, 1);

                    // Aca pregunta que si lo que tenemos es un callback, ejecuta el primer if
                    if(is_callable($callback)){
                        $response = $callback(...$params);
                    }

                    // SI lo que tenemos es un array, asumiendo que es un controlador
                    if (is_array($callback)) {
                        // Creamos una nueva instancia del controlador
                        $controller = new $callback[0];

                        // Llamamos al metodo index del HomeController, se vincula con web.php
                        // esta es la estructura del callback: $callback = [$controllerClassName, $methodName];
                        $response = $controller->{$callback[1]}(...$params); 
                    }
                    
                    // El if cambia la respuesta si lo que le viene es un array o no, manda en json o mensaje
                    if(is_array($response) || is_object($response)){
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    } else {
                        echo $response;
                    }

                    return;
                }
            }
            echo '404 not found';
        }
    }
?>