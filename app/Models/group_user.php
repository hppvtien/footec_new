<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_user extends Model
{
    use HasFactory;
    public $fillable = ['group_id', 'user_id'];
    public $timestamps = false;
}
