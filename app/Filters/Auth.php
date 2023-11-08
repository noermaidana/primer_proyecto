<?php

namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si el usuario no está logueado
        if (!session()->get('logged_in')) 
        {
        //entonces redireciona al login
        return redirect()->to(base_url('/login'));
        }
    }
//_________________________________________________________//
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
