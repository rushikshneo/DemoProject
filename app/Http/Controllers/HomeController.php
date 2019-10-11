<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $users_count  = DB::table('users')->count();
    $config_count = DB::table('configures')->count(); 
    $banner_count = DB::table('banners')->count();   
    $categories_count= DB::table('categories')->count(); 
    // dd($categories_count);             
        return view('home',compact('users_count','config_count','banner_count',
              'categories_count'));

    }

    //  public function page()
    // {
    //     return view('layouts.master');
    // }
}
