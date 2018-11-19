<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $logs = Log::all();
        return view('log.logs', compact('logs'));
    }

  
    public function create()
    {
       
    }
   
    public function store(Request $request)
    {
      
    }

    
    public function destroy($id)
    {
       
    }
}
