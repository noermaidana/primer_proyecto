<?php
namespace App\Controllers;
use App\Models\producto_model; //Llamamos a la tabla que se encuentra en el "Model"
use CodeIgniter\Controller;

class producto_controller extends Controller{
    //Sirve para cargar el formulario
    public function __construct(){
        helper(['form', 'url']);
    }

    public function create() {
        $dato['titulo']= 'producto';
        echo view('front/head_view',$dato);
        echo view('front/navbar_view');
        echo view('back/producto/registro_producto');
        echo view('front/footer_view');
    }

    public function formValidation() {
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]|max_length[100]',
            'precio' => 'required|min_length[3]|max_length[7]',
            'stock'  => 'required|min_length[1]',
        ],
        );
            //Llamamos nuevamente a nuestra tabla "producto_model"
        $formModel = new producto_model();
        //Si no existe la variable de entrada "input" te manda a agregar un producto
        //Verificara que se cumplan los campos anteriores con sus respectivos errores
        //empleamos "$this->validator" como método de validación
        if (!$input) {
            $data['titulo']='agregar producto';
            echo view('front/head_view',$data);
            echo view('front/navbar_view');
            echo view('back/producto/registro_producto', ['validation' => $this->validator]);
            echo view('front/footer_view');
        //Si se genera la variable "input" guarda los datos
        //con "getVar" va a ir extrayendo los datos del formulario (en registro_producto.php) 
        //y los guarda en el campo
        } else {
        $formModel -> save([
                'nombre'   => $this -> request -> getVar('nombre'),  
                'precio' => $this -> request -> getVar('precio'),
                'stock'  => $this -> request -> getVar('stock'),
            ]);
            //Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            //es decir, que va a mandar un mensaje hacia otra página
            //en este caso nos va a reistrar el producto con el mjs "Producto actualizado"
            session()->setFlashdata('success','Producto agregado con éxito');
            return redirect()->to(base_url('/agregar-producto'));
        }
    }
}