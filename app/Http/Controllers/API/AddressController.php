<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingAddressRequest;
use App\Http\Requests\UpdateShippingAdressRequest;
use App\Http\Requests\UpdateShippingAddressRequest;

class AddressController extends Controller
{
    
    public function shippingAddresses()
    {
        $data = ShippingAddress::all();
        return $this->apiResponse($data , 'Data get successfully');
    }
    public function storeShippingAddress(StoreShippingAddressRequest $request)
    {


        $input = $request->all();
        $data = ShippingAddress::create($input);
        return $this->apiResponse($data, 'Data saved successfully.');
    }
    public function updateShippingAddress(UpdateShippingAddressRequest $request, string $id)
    {


        if ($request->password != null) {

            $request['password']  = bcrypt($request->password);
        }
        $user = ShippingAddress::find($id);
        $user->update($request->all());
        return $this->apiResponse($user,  'Data Updated successfully');
    }
    
}
