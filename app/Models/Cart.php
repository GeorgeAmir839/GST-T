<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'product_id'];
    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
  
}
