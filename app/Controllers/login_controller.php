<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuarios_model; //Llamamos a nuestra tabla

class login_controller extends BaseController 
{
    public function index()
    {
        helper(['form', 'url']);

        $dato['titulo'] = 'login';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new usuarios_model(); 

        // Traemos los datos del formulario (en login.php)
        $email = $this->request->getVar('email'); 
        $password = $this->request->getVar('pass'); 

        //Compara el email de la tabla con el del login
        $data = $model->where('email', $email)->first(); 
         if ($data) {
         $pass = $data['pass'];
         $ba = $data['baja'];
        
            if ($ba === 'SI') {
            $session->setFlashdata('msg', 'Usuario dado de baja');
            return redirect()->to('/login_controller');
            } 

            //Se verifican los datos ingresados y si pasan crea una sesion
            //"password_verify" determina los requisitos de la configuracion de la contraseña
            // es decir que compara la pass de la tabla con la del formulario
            $verify_pass = password_verify($password, $pass);
    
            //Si pasa la verificación, arma los datos de la sesión
            if ($verify_pass) {
            $ses_data = [
            //A la izquierda estan los datos que se comparan con
            //los de la derecha que corresponden a los campos de la tabla
            'id_usuario' => $data['id_usuario'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'usuario' => $data['usuario'],
            'perfil_id' => $data['perfil_id'],
            'logged_in' => TRUE,
            ];

            //Se cumple la verificación de sesión, se inicia la sesión
            $session->set($ses_data);
            $session->setFlashdata('msg', '¡Bienvenido!');
            return redirect()->to('/panel');
            }
        
            //Si no cumple la verificación de sesión, la contraseña es incorrecta
            else{
            $session->setFlashdata('msg', 'Password incorrecta');
            return redirect()->to('/login');
            } 
            }
            //Si no cumple la verificación de sesión, el email no existe o es incorrecto
            else {
            $session->setFlashdata('msg','No existe el email o es incorrecto');
            return redirect()->to('/login');
            }
        }
    

    //cerrar sesion//
    public function logout()
    {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
    }

}