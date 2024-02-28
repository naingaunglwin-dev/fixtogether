<?php

namespace App\Http\Controllers;

use App\Traits\AuthTrait;
use Illuminate\Http\Request;

class Auth extends BaseController
{
    use AuthTrait;

    /**
     * @route GET|POST `baseUrl/auth/login`
     */
    public function login(Request $request)
    {
        $this->pageTitle = 'Login';

        return $this->view('auth.login');
    }

    /**
     * @route GET|POST `baseUrl/auth/register`
     */
    public function register(Request $request)
    {
        $this->pageTitle = 'Register';

        return $this->view('auth.register');
    }
}
