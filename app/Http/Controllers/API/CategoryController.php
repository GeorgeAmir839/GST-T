<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show($id)
    {
        $data = Category::find($id)->select('name')->get();
        if (!$data) {
            return $this->sendError(['message' => 'Resource not found'], 404);
        }
        $data->load('products');
        return $this->apiResponse($data, 'Data get successfully.');
    }
    public function index()
    {
        $data = Category::select('name', 'image', 'description')->get();
        return $this->apiResponse($data , 'Data get successfully');
    }
}
