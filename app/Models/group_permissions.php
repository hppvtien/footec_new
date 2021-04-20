<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_permissions extends Model
{
    use HasFactory;
    public $fillable = ['group_id', 'model_name','perms'];
}
