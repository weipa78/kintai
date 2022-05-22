<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function form(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::all();
        $param = [
            'user' => $user,
            'employees' => $employee
        ];
        return view('menu.emp_registry', $param);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Employee::$rules);
        $employee = new Employee;
        
        $form = $request->all();
        unset($form['_token']);
        $insert = $employee->fill($form)->save();
        
        if($insert === true) {
            $msg = '1件登録しました。';
        } else {
            $msg = '登録できませんでした。';
        }
        $param = [
            'msg' => $msg,
            'user' => $user,
        ];
        return view('menu.emp_registry', $param);
    }
}
