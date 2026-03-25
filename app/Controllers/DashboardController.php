<?php

require_once BASE_PATH . "/core/Controller.php";

class DashboardController extends Controller {

    public function index()
    {
        $this->auth(); // Verificar autenticación antes de mostrar el dashboard
        
        $this->view('dashboard/index');
    }

    public function home()
    {
        if (isset($_SESSION['user'])){
            $this->view('/dashboard');
        } else {
            $this->redirect('/login');
        }
    }

}