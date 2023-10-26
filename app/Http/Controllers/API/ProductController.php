<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::select('name', 'price', 'description','old_price','images','main_image')->get();
        return $this->apiResponse($data , 'Data get successfully');
    }
}
