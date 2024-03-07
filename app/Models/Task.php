<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deu_date',
        'status',
        'catagory',
        'assign_to',
        'attach_file'
    ];
    protected $table = "tasks";
    protected $primaryKey = "id";
}
