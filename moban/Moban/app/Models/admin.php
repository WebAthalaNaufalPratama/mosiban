<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'adminsetting';
    protected $fillable = [
        'tinggi_sensor',
        'luas_area',
        'stat1',
        'stat2',
        'stat3'
    ];
}
