<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeManageController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userId = Auth::user()->id;
        
        $times = Time::where('id', $userId)->get();
        $param = [
            'userId' => $userId,
            'user' => $user,
            'times' => $times,
        ];
        return view('time.timeManageMenu', $param);
    }
}
