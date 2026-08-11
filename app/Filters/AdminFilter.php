<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        // Not logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cashier attempting to access admin panel
        if (session()->get('user_role') !== 'Administrator') {
            return redirect()->to('/pos');
        }

        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
    }
}