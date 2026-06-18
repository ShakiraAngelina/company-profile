<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['job_title','description','requirements','status','created_at'];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}