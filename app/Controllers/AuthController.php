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

    // Método para mostrar el formulario de login
    public function showLogin()
    {
        $this->view('auth/login');
    }

    // Método para procesar el login
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($email === 'admin@test.com' && $password === '1234') {

            $_SESSION['user'] = [
                'name' => 'Admin',
                'role' => 'admin'
            ];

            $this->redirect('/dashboard');
            return;
        }

        echo "Credenciales incorrectas";
    }
}
