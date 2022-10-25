<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user        =  DB::table('users')->count();
        $admin        =  DB::table('customers')->count();
        $customers        =  DB::table('customers')->count();

        return view('home.index', ['users' => $user, 'admin' => $admin, 'customers' => $customers]);
    }
}
