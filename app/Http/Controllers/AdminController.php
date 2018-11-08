<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
       //proteger com middleware pra verificar se é capaz ou não de acessar a pag
        $this->middleware('auth:admin');
    }
    public function index() 
    {
        return view('admin');
    }
}
