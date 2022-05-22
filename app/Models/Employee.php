<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
//     protected $guarded = array('employeeId');
    
    protected $fillable = [
        'employeeName', 'employeeFurigana', 'employeeGender',
        'employeeBirth', 'employeeAge', 'employeePostNo', 'employeeAddress',
        'employeeTel', 'employeeMail'
    ];
    
    public static $rules = array(
        'employeeName' => 'required',
        'employeeFurigana' => 'required',
        'employeeAge' => 'integer|min:0|max:150'
    );
}
