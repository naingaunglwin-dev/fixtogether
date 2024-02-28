<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class BaseController extends Controller
{
    /**
     * Page Title
     *
     * @var string
     */
    protected string $pageTitle = '';

    /**
     * View Path
     *
     * @var string
     */
    protected string $path = '';

    /**
     * Render View
     *
     * @param string $view
     * @param array $data
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function view(string $view, array $data = []): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $view = $this->path !== '' ? "$this->path.$view" : $view;

        $viewData = [
            'pageTitle'   => $this->pageTitle,
            'previousUrl' => url()->previous(),
            'baseUrl'     => url(''),
        ];

        $data = array_merge($viewData, $data);

        return view($view, $data);
    }
}
