<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name','email','phone','cv_file','message','career_id','created_at'];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}