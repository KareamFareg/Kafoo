<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Years;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\PaymentTrait;

class TestController extends PaymentTrait 
{

    use ApiResponse;
    // use PaymentTrait;
    public function getYears()
    {
        return $this->responseSuccess([
            'data' => Years::all(),
        ]);
    }

    public function show(Request $request)
    {
        $respo = $this-> getPaymentId();
        // $respo = $this->generateToken($request->amount,$request->action,$request->password,
        // $request->id,$request->currencyCode,$request->trackId,$request->key);
        return $respo;
    }

    public function testGetApiName(Request $request)
    {
       // return response()->json($request->description) ;
       // return response()->json([$request->route()->getName(),$request->all()]) ;
    }

}
