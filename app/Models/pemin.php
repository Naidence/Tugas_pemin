<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemin extends Model{
    protected $table = 'pemin';
    protected $fillable = ['user','pass'];
}