<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
   public function index(Request $request)
   {
       $user = Auth::user();
       $sort = $request->sort;
       $param = [
           'sort' => $sort,
           'user' => $user,
       ];
       return view('top.index', $param);
   }
}
