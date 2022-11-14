<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = "class_units";
}
