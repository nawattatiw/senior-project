<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(){
      return view('layout.ShowOrder');
    }
}
