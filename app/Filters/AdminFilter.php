<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session()->get();
        if(!session('id')){
            return redirect()->to('/login');
        }    
        if(!$session['isAdmin'])
            {
                return redirect()->to('/home');
            }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}