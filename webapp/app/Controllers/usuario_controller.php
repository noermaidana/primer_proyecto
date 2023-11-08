<?php
namespace App\Controllers;
use App\Models\usuarios_model; //Llamamos a la tabla que se encuentra en el "Model"
use CodeIgniter\Controller;

class usuario_controller extends Controller{

    public function __construct(){
        helper(['form', 'url']);
    }

    public function create() {
        $dato['titulo']= 'Registro';
        echo view('front/head_view',$dato);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function formValidation() {
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]',
            //[usuarios.email] esto es [nombredetabla.nombredecampo]
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ],
        );
            //Llamamos nuevamente a nuestra tabla "usuario_model"
        $formModel = new usuarios_model();
        //Si no existe la variable de entrada "input" te manda a registrarte
        //Verificara que se cumplan los campos anteriores con sus respectivos errores
        //empleamos "$this->validator" como método de validación
        if (!$input) {
            $data['titulo']='Registro';
            echo view('front/head_view',$data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
        //Si se genera la variable "input" guarda los datos
        //con "getVar" va a ir extrayendo los datos del formulario (en registro.php) y los guarda en el campo
        } else {
        $formModel -> save([
                'nombre'   => $this -> request -> getVar('nombre'),  
                'apellido' => $this -> request -> getVar('apellido'),
                'usuario'  => $this -> request -> getVar('usuario'),
                'email'    => $this -> request -> getVar('email'), 
                'pass'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                //password_hash() crea un nuevo hash de contrasña usando un algoritmo de hash de único sentido.
                //cuando se guardan las contraseñas en base de datos, estan enciptadas
            ]);
            //Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            //es decir, que va a mandar un mensaje hacia otra página
            //en este caso nos va a mandar al registro con el mjs "Usuario registrado con éxito"
            session()->setFlashdata('success','Usuario registrado con éxito');
            return redirect()->to(base_url('/login'));
        }
    }
}