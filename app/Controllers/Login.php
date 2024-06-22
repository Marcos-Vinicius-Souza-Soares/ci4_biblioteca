<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\UsuarioModel;

class Login extends Controller
{
    public function __construct(){
    $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        echo view('_partials/header');
        if ($this->session->has('logged_in')) {
            return redirect()->to(base_url('Home/index'));
        }

        return view('login/index.php');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        if (empty($email) || empty($senha)) {
            return redirect()->back()->withInput()->with('error', 'Preencha todos os campos!');
        }

        $db = \Config\Database::connect();

        $query = $db->table('usuario')->where('email', $email)->where('senha', $senha)->get();

        if ($query->getNumRows() > 0) {
            $usuario = $query->getResult('array');
            $this->session->set('logged_in', true);
            $this->session->set('email', $email);

            return redirect()->to(base_url('Home/index'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Email ou senha incorretos!');
        }
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(base_url('login'));
    }
}