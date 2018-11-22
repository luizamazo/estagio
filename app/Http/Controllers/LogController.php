<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
        
    public function index()
    {
        $logs = Log::all();
        return response()->json([
            'logs'=> $logs
        ], 201);
    }
    
    public function destroy()
    {
       Log::truncate();
       return response()->json(['msg' => 'deletou'], 200);
    }
}
