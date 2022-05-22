<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    
//     protected $guarded = array('id');
    
    protected $fillable = [
        'id', 'yearMonth', 'day', 'start', 'end', 'rest',
        'total', 'divide', 'remarks'
    ];
    
    public static $rules = array(
        'yearMonth' => 'required',
        'day' => 'required',
        'divide' => 'required',
    );
}
