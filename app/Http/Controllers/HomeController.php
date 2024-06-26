<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   
    public function UsersIndex()
    {
        return view ('home');
    }
  
    public function AboutIndex()
    {
        return view ('users/about');
    }
    public function FooterIndex()
    {
        return view ('users/footer');
    }
}
