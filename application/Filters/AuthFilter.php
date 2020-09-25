<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface {
    public function before(RequestInterface $req)
    {
        echo"after work";
    }

    public function after(RequestInterface $req, ResponseInterface $res)
    {
        echo"after work";
    }
}