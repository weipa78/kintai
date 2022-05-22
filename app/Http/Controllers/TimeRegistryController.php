<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeRegistryController extends Controller
{
    public function form()
    {
        $user = Auth::user();
        $insert = '';
        $msg = 'データを登録して下さい。';
        $param = [
            'msg' => $msg,
            'user' => $user,
            'insert' => $insert,
        ];
        return view('time.timeAddForm', $param);
    }
    
    public function create(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Time::$rules);
        $time = new Time;
        
        $form = $request->all();
        unset($form['_token']);
        $insert = $time->fill($form)->save();
        
        if($insert === true) {
            $msg = '1件登録しました。';
        } else {
            $msg = '登録できませんでした。';
        }
        $param = [
            'msg' => $msg,
            'user' => $user,
        ];
        return view('time.timeAddForm', $param);
    }
}
