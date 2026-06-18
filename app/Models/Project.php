<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','description','image','category','created_at'];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}