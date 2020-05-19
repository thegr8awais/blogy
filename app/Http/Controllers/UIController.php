<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class UIController extends Controller
{
    public function index(Request $request)
    {
      if (Auth::check() && superAdmin()) {
        return redirect()->route('adminHome');
      }
      return view('welcome');
    }

}
