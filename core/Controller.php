<?php

class Controller
{
    // Método para cargar una vista y pasarle datos
    protected function view($view, $data = [])
    {

        // Convierte el array de datos en variables individuales para que puedan ser utilizadas en la vista
        extract($data);

        // Construye la ruta completa de la vista
        $viewPath = BASE_PATH . "/app/views/{$view}.php";

        // Incluye la plantilla principal que a su vez incluirá la vista específica
        require BASE_PATH . '/app/views/layouts/main.php';
    }

    // Método para redirigir a otra URL
    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    // Método para verificar si el usuario está autenticado, si no lo está, redirige al login
    protected function auth() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }
}
