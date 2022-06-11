<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    
//     出退勤管理/照会画面→更新入力画面
    public function input(Request $request) {
        $user = Auth::user();
        $id = Auth::id();
        $yearMonth = $request->get('yearMonth');
        $day = $request->get('day');
        
        $time = Time::where('id', '=', $id)
                ->where('yearMonth', '=', $yearMonth)
                ->where('day', '=', $day)
                ->find($id);
                
        $param = [
            'user' => $user,
            'time' => $time
        ];
        return view('time.timeUpdateInput', $param);
    }
    
    public function updateConfirm(Request $request) {
        $user = Auth::user();
        $param = [
            'user' => $user,
            'request' => $request
        ];
        
        return view('time.timeUpdateConfirm', $param);
    }
    
    //更新
    public function update(Request $request) {
        $user = Auth::user();
        $id = Auth::id();
        
        $data = [
            'id' => $id,
            'yearMonth' => $request->get('yearMonth'),
            'day' => $request->get('day'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'rest' => $request->get('rest'),
            'total' => $request->get('total'),
            'divide' => $request->get('divide'),
            'remarks' => $request->get('remarks'),
            
        ];
        
        $update = DB::table('times')
            ->where('id', '=', $id)
            ->where('yearMonth', '=', $request->get('yearMonth'))
            ->where('day', '=', $request->get('day'))
            ->update($data);
        
          if($update === 1) {
              $msg = '１件登録しました。';
          } else {
              $msg = '登録できませんでした。';
          }
        $times = Time::where('id', $id)->get();
        $param = [
            'user' => $user,
            'msg' => $msg,
            'times' => $times
        ];
        

        return view ('time.timeManageMenu', $param);
    }
    
//     削除確認
    public function deleteConfirm(Request $request) {
        $user = Auth::user();
        $id = Auth::id();
        $time = Time::where('id', '=', $id)
            ->where('yearMonth', '=', $request->get('yearMonth'))
            ->where('day', '=', $request->get('day'))
            ->find($id);
        
            $param = [
                'time' => $time,
                'user' => $user,
            ];
            
        return view('time.timeDeleteConfirm', $param);
    }
    
//     削除
    public function delete(Request $request) {
        $user = Auth::user();
        $id = Auth::id();
        
        $data = [
            'id' => $id,
            'yearMonth' => $request->get('yearMonth'),
            'day' => $request->get('day'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'rest' => $request->get('rest'),
            'total' => $request->get('total'),
            'divide' => $request->get('divide'),
            'remarks' => $request->get('remarks'),
            
        ];
        
        $delete = DB::table('times')
        ->where('id', '=', $id)
        ->where('yearMonth', '=', $request->get('yearMonth'))
        ->where('day', '=', $request->get('day'))
        ->delete($data);
        
        if($delete === 1) {
            $msg = '１件登録しました。';
        } else {
            $msg = '登録できませんでした。';
        }
        $times = Time::where('id', $id)->get();
//         dd($times);
        $param = [
            'user' => $user,
            'times' => $times
        ];
        
        return view ('time.timeManageMenu', $param);
    }
}
