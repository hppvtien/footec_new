<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_permissions extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'model_name','perms'];
}
