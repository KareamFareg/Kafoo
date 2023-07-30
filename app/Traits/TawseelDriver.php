<?php

namespace App\Traits;
use Illuminate\Support\Facades\Http;

trait TawseelDriver
{
    public function CreatDriverInTawseel($request , $driver){
       
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Driver/create', [
            "credential" =>[
             "companyName"=>"kafu",
             "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
              "driver"=> [
                             "identityTypeId"=> $request->identityTypeId,
                             "idNumber"=> $request->idNumber,
                             "dateOfBirth"=> $request->dateOfBirth,
                             "registrationDate"=> gmdate('Y-m-d H:i:s', strtotime($driver->created_at)),
                             "mobile"=> $driver->phone,
                             "regionId"=> $request->region_id,
                             "carTypeId"=> $request->carTypeId,
                             "cityId"=> $request->city_id,
                             "carNumber"=> $request->carNumber,
                             "vehicleSequenceNumber"=> $request->vehicleSequenceNumber
                       ]
              ])->throw()->json();
              if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                // if($TawseelResponse['errorCodes'][0] == 0){
                //     $data['TawseelErrorMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][1]);
                // }else{
                //     $data['TawseelErrorMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                // }
                $data['TawseelErrorMessage'] = $TawseelResponse['errorCodes'];
                    return   $data;
            }else{
                        $data ['tawseelStatus']  = true;
                        $data['idNumber']        =  $TawseelResponse['data']['idNumber'];
                        $data['identityTypeId']  =  $TawseelResponse['data']['identityTypeId'];
                        $data['refrenceCode']    =  $TawseelResponse['data']['refrenceCode'];
                            return   $data;
            }     
    }
    public function UpdateDriverInTawseel($request , $driver){
          
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Driver/edit', [
            "credential" =>[
             "companyName"=>"kafu",
             "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
              "driver"=> [
                            "refrenceCode"=> $driver->refrenceCode ,
                            "identityTypeId"=> $driver->identityTypeId,           
                            "idNumber"=> $driver->idNumber,
                            "dateOfBirth"=> $request->dateOfBirth,
                            "registrationDate"=> gmdate('Y-m-d H:i:s', strtotime($driver->created_at)),
                            "mobile"=> $driver->phone,
                            "regionId"=> $request->regionId,
                            "carTypeId"=> $request->carTypeId,
                            "cityId"=> $request->cityId,
                            "carNumber"=> $request->carNumber,
                            "vehicleSequenceNumber"=> $request->vehicleSequenceNumber
                       ]
              ])->throw()->json();
    
            if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                $data['TawseelErrorMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                    return   $data;
            }else{
                        $data ['tawseelStatus']        = true;
                        $data ['tawseel']  = $TawseelResponse['data'];
                            return   $data;
            }     
     }     
     public function getDriverInTawseel($id){
          
        $TawseelResponse = Http::post('https://tawseelapi.ecloud.sa/api/Driver/get', [
            "credential" =>[
                     "companyName"=>"kafu",
                     "password"=>"iCnVcZO44fm49iJyw44oEwZF8mA8r0FB6B9FU3OFGmE0TnhcmIyluiHcx5mgxkZl"
                ],
              "idNumber"=>$id
          ])->throw()->json();
    
            if($TawseelResponse['status'] == false){
                $data ['tawseelStatus']        = false;
                $data['TawseelErrorMessage'] = $this ->getErrorCode($TawseelResponse['errorCodes'][0]);
                    return   $data;
            }else{
                        $data['tawseelStatus'] = true;
                        $data ['tawseel']  = $TawseelResponse['data'];
                            return   $data;
            }     
     }     
}
