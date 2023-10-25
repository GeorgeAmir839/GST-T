<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $fillable = ['name', 'images'];
    protected $casts = [
        'images' => 'array',
    ];
}
