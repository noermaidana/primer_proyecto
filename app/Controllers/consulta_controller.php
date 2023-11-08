<?php
namespace App\Controllers;
use App\Models\consulta_model; //Llamamos a la tabla que se encuentra en el "Model"
use CodeIgniter\Controller;

class consulta_controller extends Controller{
    //Sirve para cargar el formulario
    public function __construct(){
        helper(['form', 'url']);
    }

    public function create() {
        $dato['titulo']= 'consultas';
        echo view('front/head_view',$dato);
        echo view('front/navbar_view');
        echo view('back/producto/consultar_producto');
        echo view('front/footer_view');
    }

    public function formValidation() {
        $input = $this->validate([
            'nombre'   => 'required|min_length[5]',
            'email'    => 'required|min_length[4]|max_length[100]',
        ],
        );
            //Llamamos nuevamente a nuestra tabla "consulta_model"
        $formModel = new consulta_model();
        //Si no existe la variable de entrada "input" te manda a agregar un producto
        //Verificara que se cumplan los campos anteriores con sus respectivos errores
        //empleamos "$this->validator" como método de validación
        if (!$input) {
            $data['titulo']='consultas';
            echo view('front/head_view',$data);
            echo view('front/navbar_view');
            echo view('back/producto/consultar_producto', ['validation' => $this->validator]);
            echo view('front/footer_view');
        //Si se genera la variable "input" guarda los datos
        //con "getVar" va a ir extrayendo los datos del formulario (en consultar_producto.php) 
        //y los guarda en el campo
        } else {
        $formModel -> save([
                'nombre'   => $this -> request -> getVar('nombre'),  
                'email' => $this -> request -> getVar('email'),
                'motivo'  => $this -> request -> getVar('motivo'),
                'descripcion'  => $this -> request -> getVar('descripcion'),
            ]);
            //Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            //es decir, que va a mandar un mensaje hacia otra página
            //en este caso nos va a reistrar el producto con el mjs "Consulta realizada"
            session()->setFlashdata('success','Consulta realizada');
            return redirect()->to(base_url('/consulta'));

        }
    }
    
}
