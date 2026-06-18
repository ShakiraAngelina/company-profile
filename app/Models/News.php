<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','content','image','created_at'];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}