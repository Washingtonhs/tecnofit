<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $allowedUrls = ['/login','/recoverPassword'];
        $currentUrl = uri_string();
        $isRanking = in_array('ranking', explode('/', $currentUrl));

        if( !in_array($currentUrl, $allowedUrls) && !$isRanking )
        {
            if ( empty(session('id')) || session('auth') != true )
            {
                return redirect()->to(base_url('login'))->with('flash_error', 'Faça login para acessar o sistema.');
            }
        }
        else
        {
            if (session('auth') == true && !empty(session('id')) && !$isRanking )
            {
                return redirect()->to(base_url('logout'));
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}