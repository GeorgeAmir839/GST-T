<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    //get banners
    public function getBanners()
    {
        $data = Banner::select('images')->get();
        return $this->apiResponse($data , 'Data get successfully');
    }
}
