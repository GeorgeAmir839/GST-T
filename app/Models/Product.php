<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['name','description', 'main_image','images','old_price','price'];
    protected $casts = [
        'images' => 'array',
    ];
    public function categories() :BelongsToMany{
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
}
