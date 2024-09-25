<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moban extends Model
{
    use HasFactory;
    protected $table = 'monitoring';
    protected $fillable = [
        'curah_hujan', 
        'longitude',
        'latitude',
        'date',
        'time',
        'debit',
        'intensitas_hujan',
        'nilai' ,
        'tinggi',
    ];
}
