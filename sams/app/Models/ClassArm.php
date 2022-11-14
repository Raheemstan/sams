<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassArm extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'class_id'];
    protected $table = "class_arms";
}
