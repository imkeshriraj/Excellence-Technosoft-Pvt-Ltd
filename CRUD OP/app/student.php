<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ["name","age","street","email","created_at"];
}
