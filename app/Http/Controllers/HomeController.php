<?php

namespace servicos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = DB::select("select count(id) as quantidade from users");
        return view('home-index')
        ->with('usuarios', $usuario[0]->quantidade);
    }
    
    public function logout(){
        Auth::logout();
        return response()->redirectTo("/login");
    }
}
