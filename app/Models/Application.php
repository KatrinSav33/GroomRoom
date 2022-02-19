<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_animal',
        'description',
        'id_category',
        'id_user',
        'status',
        'photo',
        'new_img',
        'cause'

    ];
}
