<?php

/**
 * Clase AuthController
 * 
 * Controlador para manejar la autenticación de usuarios, incluyendo mostrar el formulario de login y procesar las credenciales ingresadas.
 */

// Cargar el controlador base
require_once BASE_PATH . "/core/Controller.php";

class AuthController extends Controller
{

    public function showLogin()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        echo "Procesando login...";
    }
}
