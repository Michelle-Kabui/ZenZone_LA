<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin; 

class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('AdminRegister');
    }


    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins', 
            'password' => 'required|min:8',
        ]);

        $admin = new admin; 
        $admin->name = $request->name; 
        $admin->email = $request->email; 
        $admin->password = bcrypt($request->password); 

        $admin->save(); 

        // return redirect()->route('admin.dashboard');
    } 
}
