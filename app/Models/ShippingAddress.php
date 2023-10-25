<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingAddress extends Model
{
    use HasFactory;
    public $fillable = ['user_id','latitude', 'longitude','address','city','country','phone_number','notes'];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
  
}
