<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_name',
    ];
    public $timestamps = false;
}
