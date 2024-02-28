<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Top extends BaseController
{
    /**
     * @route GET `baseUrl/`
     */
    public function index()
    {
        $this->pageTitle = 'FixTogether';

        return $this->view('index');
    }
}
