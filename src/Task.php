<?php

namespace Bsadjetey\Todoey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $fillable = ["name"];
}
