<?php

namespace App\Traits;
use Illuminate\Support\Facades\Http;
use App\User;

trait TawseelOrder
{
//TAWSEEL ORDER
    public function CreateOrderInTawseel($request,$order){
        if($order->shop_name == null){
            $order->shop_name= "unknown";
        }
        $user = User::find($order->user_id);
        if($user->region_id == null){
            $user->region_id = "Nap4gA1tyeY=";
        }
        if($user->city_id == null){
            $user->city_id = "Nap4gA1tyeY=";
        }
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Order/create', [
            "credential" =>[
             "companyName"=>"kafu",
             "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
             "order"=> [
             "orderNumber"  => $order->id,
             "authorityId"  => "NV25GlPuOnQ=",
             "deliveryTime" => gmdate('Y-m-d H:i:s', strtotime($order->created_at)),
             "regionId"     => $user->region_id,
             "cityId"       => $user->city_id,
             "coordinates"  => $order->destination_lat .",". $order->destination_lng,
             "storetName"   => $order->shop_name,
             "storeLocation"=> $order->source_lat .",". $order->source_lng,
             "categoryId"   =>"Nap4gA1tyeY=",
             "orderDate"    => gmdate("Y-m-d\TH:i:s\Z", time())
            ]
        ])->throw()->json();
   
            if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                $data['tawseelMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                    return   $data;
       } else{
                $data ['tawseelStatus']        = true;
                $data['refrenceCode'] =  $TawseelResponse['data']['referenceCode'];
                    return   $data;
       } 
    }
    public function AcceptOrderInTawseel( $refrenceCode ){

        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Order/accept', [
            "credential" =>[
            "companyName"=>"kafu",
            "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
            "referenceCode"=> $refrenceCode,
            "acceptanceDateTime"=> gmdate("Y-m-d\TH:i:s\Z", time()),

            ])->throw()->json();
        if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                $data['tawseelMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                    return   $data;
       }
       else{
                $data ['tawseelStatus'] = true;
                $data ['response']      =  $TawseelResponse;
                    return   $data;
        }

    }
    
    public function CancelOrderInTawseel( $refrenceCode){

        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Order/cancel', [
            "credential" =>[
            "companyName"=>"kafu",
            "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
            "orderId"=> $refrenceCode,
            "cancelationReasonId"=> "NV25GlPuOnQ="

            ])->throw()->json();
        if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                $data['tawseelMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                    return   $data;
       }
       else{
                $data ['tawseelStatus'] = true;
                $data ['response']      =  $TawseelResponse;
                    return   $data;
        }

    }
    
    public function ExecuteOrderInTawseel($request , $order){
        //excute order  in Tawseel
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Order/execute', [
            "credential" =>[
            "companyName"=>"kafu",
            "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
                "orderExecutionData" => [
                    "referenceCode"   => $order->refrenceCode,
                    "executionTime"   =>gmdate("Y-m-d\TH:i:s\Z", time()),
                    "paymentMethodId" => 'NV25GlPuOnQ=',
                    "price"           => $order->total
                    ]

        ])->throw()->json();
    
    if($TawseelResponse['status'] == false){
        $data ['tawseelStatus']        = false;
        $data['tawseelMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
            return   $data;
    }
    else{
            $data ['tawseelStatus'] = true;
            $data ['response']      =  $TawseelResponse;
                return   $data;
    }
}
    public function AssignDriverToOrderInTawseel($refrenceCode , $idNumber){
   //assign driver to order in Tawseel
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Order/assign-driver-to-order', [
            "credential" =>[
            "companyName"=>"kafu",
            "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
            "referenceCode" => $refrenceCode,
            "idNumber"      => $idNumber

        ])->throw()->json();
    
    if($TawseelResponse['status'] == false){
        $data ['tawseelStatus']        = false;
        $data['tawseelMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
            return   $data;
    }
    else{
            $data ['tawseelStatus'] = true;
            $data ['response']      =  $TawseelResponse;
                return   $data;
    }
  }
}
