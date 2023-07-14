<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assessment;
class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function viewusers()
    {
        $users = User::all(['id','name', 'email']); 
        return view('viewusers', compact('users'));

    }

    public function viewassessments()
    {
        $set1_mean = Assessment::select('set1_mean')->get();
    
        $set2_mean = Assessment::select('set2_mean')->get();
    
        return view('viewassessments', ['set1_mean' => $set1_mean, 'set2_mean' => $set2_mean]);
    }

    public function viewjournals()
    {
        return view('viewjournals');
    }



}
