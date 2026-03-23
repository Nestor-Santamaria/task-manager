<?php

/** 
 * Clase Router
 * 
 * Este enrutador es responsable de registrar rutas para diferentes métodos HTTP (GET, POST) y despachar las solicitudes entrantes a los controladores y métodos correspondientes. Permite definir rutas con parámetros dinámicos y manejar errores 404 cuando no se encuentra una ruta.
 * Ejemplo de uso:
 * $router = new Router();
 * $router->get('/users/{id}', 'UserController@show');
 * $router->dispatch('/users/123', 'GET'); // Llamará a UserController@show con el parámetro id=123
 * */
class Router
{

    // Lista de rutas, cada una con su método HTTP correspondiente
    private $routes = [];

    // Método para registrar una ruta GET
    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    // Método para registrar una ruta POST
    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri, $method)
    {

        // Elimina los parámetros de consulta de la URI. Ejem: /home?user=1 => /home
        $uri = parse_url($uri, PHP_URL_PATH);

        // Busca la acción correspondiente a la URI y el método HTTP
        $action = $this->routes[$method][$uri] ?? null;

        // Si no se encuentra la ruta, devuelve un error 404
        if (!isset($this->routes[$method])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        // Itera sobre las rutas registradas para el método HTTP dado
        foreach ($this->routes[$method] as $route => $action) {

            // Reemplaza los parámetros de ruta con expresiones regulares para capturar los valores
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            // Agrega delimitadores y anclas para que coincida con toda la URI
            $pattern = "#^" . $pattern . "$#";

            // Verifica si la URI coincide con el patrón de la ruta
            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches); // Elimina el primer elemento que es la URI completa

                // Separar el controlador y el método de acción
                [$controller, $methodAction] = explode('@', $action);

                // Cargar el controlador correspondiente
                require_once __DIR__ . "/../app/Controllers/{$controller}.php";

                // Crear una instancia del controlador y llamar al método de acción
                $controllerInstance = new $controller();

                // Llamar al método de acción con los parámetros capturados
                call_user_func_array([$controllerInstance, $methodAction], $matches);

                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
