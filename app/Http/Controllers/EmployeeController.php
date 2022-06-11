<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function form(Request $request)
    {
        $user = Auth::user();
        
        $employees = Employee::all();
//         dd($employee);
        $param = [
            'user' => $user,
            'employees' => $employees
        ];
        return view('menu.emp_registry', $param);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
//         $this->validate($request, Employee::$rules);
        $employee = new Employee;
        $maxIdArray = DB::select("select max(employeeId) from employees")
                        ->value;
//         $maxIdnum = value($maxIdArray);
        $maxId = $maxIdArray[0];
//         dd($maxIdnum);
        $maxId1 = $maxId + 1;
        
//         DBの最後のデータのIDが7で$maxId1を8にしてから下記で使用したいが、
//          できない
        $employee->employeeId = $maxId1;
        $employee->employeeName = $request->name;
        $employee->employeeFurigana = $request->hurigana;
        $employee->employeeGender = $request->gender;
        $employee->employeeBirth = $request->birth;
        $employee->employeeAge = $request->age;
        $employee->employeePostNo = $request->postNo;
        $employee->employeeAddress = $request->address;
        $employee->employeeTel = $request->tel;
        $employee->employeeMail = $request->mail;
        
        
        
//         unset($form['_token']);
//         dd($employee);
        $insert = $employee->fill($employee)->save();
//         dd($insert);
        if($insert === true) {
            $msg = '1件登録しました。';
        } else {
            $msg = '登録できませんでした。';
        }
        $employees = Employee::all();
        $param = [
            'msg' => $msg,
            'user' => $user,
            'employees' => $employees
        ];
        return view('menu.emp_registry', $param);
    }
}
