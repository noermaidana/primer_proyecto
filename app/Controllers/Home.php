<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'pagina principal';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal');
        echo view('front/footer_view');
    }

    public function quienes_somos()
    {
        $data['titulo'] = 'quienes somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }

    public function acerca_de()
    {
        $data['titulo'] = 'acerca de';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/acerca_de');
        echo view('front/footer_view');
    }

    public function consultar_producto()
    {
        $data['titulo'] = 'consultar productos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/producto/consultar_producto');
        echo view('front/footer_view');
    }

    public function ver_consulta()
    {
        $data['titulo'] = 'ver consulta';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/producto/ver_consulta');
        echo view('front/footer_view');
    }

    public function agregar_producto()
    {
        $data['titulo'] = 'actualizar catalogo';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/producto/registro_producto');
        echo view('front/footer_view');
    }

    public function registro()
    {
        $data['titulo'] = 'registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }
    
    public function login()
    {
        $data['titulo'] = 'login';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }
}
