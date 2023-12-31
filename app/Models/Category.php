<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public $fillable = ['name','description', 'image'];
    public function products() :BelongsToMany{
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
  
}
