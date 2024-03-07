<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_catagory extends Model
{
    use HasFactory;

    protected $fillable = [
        'catagory_name'
    ];
    protected $table = "task_categories";
    protected $primaryKey = "id";
}
