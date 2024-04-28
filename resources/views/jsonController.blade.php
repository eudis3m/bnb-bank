<?php

namespace App\Http\Controllers;
//use App\Models\User;
use Illuminate\Http\Request;

class jsonController extends Controller
   
{
      
    public function index()
        {
            $users = UserTransaction::with('transactions')->get();
            return response()->json($users);
        }
    
      
}
