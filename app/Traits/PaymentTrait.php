<?php

namespace App\Traits;
use Illuminate\Http\Request;
// use App\Services\notificationServ;
class PaymentTrait 
{

    const ARB_HOSTED_ENDPOINT_TEST = 'https://securepayments.alrajhibank.com.sa/pg/payment/hosted.htm';
    const ARB_HOSTED_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/hosted.htm';

    const ARB_MERCHANT_HOSTED_ENDPOINT_TEST = 'https://securepayments.alrajhibank.com.sa/pg/payment/tranportal.htm';
    const ARB_MERCHANT_HOSTED_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/tranportal.htm';

    const ARB_PAYMENT_ENDPOINT_TESTING = 'https://securepayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';
    const ARB_PAYMENT_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';

    const ARB_SUCCESS_STATUS = 'CAPTURED';

    //The merchant must fill his credentials first
    const Tranportal_ID = "3301FZcrwsx3XJS";
    const Tranportal_Password = '$Lc$Sb$505GCli8';
    const resource_key = "30815220238230815220238230815220";
    const currencyCode = "682";
const ORDERID=1671;

    public function getmerchanthostedPaymentid($card_number, $expiry_month, $expiry_year, $cvv, $card_holder)
    {
        $amount = 100;

        $trackId = (string)rand(1, 1000000); // TODO: Change to real value

        $data = [
            "id" => self::Tranportal_ID,
            "password" => self::Tranportal_Password,
            "expYear" => $expiry_year,
            "expMonth" => $expiry_month,
            "member" => $card_holder,
            "cvv2" => $cvv,
            "cardNo" => str_replace('-', '', $card_number),
            "cardType" => "C",
            "action" => "1",
            "currencyCode" => "682",
            "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error",
            "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success",
            "trackId" => $trackId,
            "amt" => $amount,

        ];
        $data = json_encode($data, JSON_UNESCAPED_SLASHES);

        $wrappedData = $this->wrapData($data);

        $encData = [
            "id" => self::Tranportal_ID,
            "trandata" => $this->encrypt($wrappedData, self::resource_key),
            "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error",
            "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success",
        ];

        $wrappedData = $this->wrapData(json_encode($encData, JSON_UNESCAPED_SLASHES));

        $curl = curl_init();

        curl_setopt_array($curl, array(
            //in Production use Production End Point
            CURLOPT_URL => self::ARB_MERCHANT_HOSTED_ENDPOINT_TEST,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $wrappedData,

            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Accept-Language: application/json',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // parse response and get id
        $response_data = json_decode($response, true)[0];
        // var_dump($response);
        if ($response_data["status"] == "1") {
            $url = "https:" . explode(":", $response_data["result"])[2];
            return $url;
        } else {
            // handle error either refresh on contact merchant
            return null;
        }
    }

    public function getPaymentId(Request $request)
    {
        $order_id = $request->orderid;
        $order = \App\Models\Order::find($order_id);
        
        $offer = \App\Models\OrderOffer::where('order_id', $order_id)->where('status' , 1)->first();
        if($offer){
            if($order->shipper_id){
                //what will be cut off to shipper
                $shipperMoney = $order->price  + $offer->shipping - \App\Models\Setting::find(1)->commission_percent ;
                $user = \App\User::find($order->shipper_id);
                //if shipper wallet by negative عليه فلوس للتطبيق
               
            }
        }
        //total price will be paied by user
        $addition = $offer->shipping * (\App\Models\Setting::find(1)->addition_service_cost /100);
        $totalPrice =($order->price +  $offer->shipping  +  $addition - $order->discount) ;
        $total = $totalPrice - $order->getpaid;
        $plainData = $this->getRequestData($order_id,$total);
        $wrappedData = $this->wrapData($plainData);
        //لو تبقي فلوس للمندوب بعد الخصم ولا لا 
         if($user->amount < 0){
              $driver_pay = $shipperMoney + $user->amount;
                 // لو المحفظه اللي هيتخصم منها اكتر من قيمه الاوردر
                if($driver_pay <= 0){
                    $driver_pay = 0;
                    $user->amount =$shipperMoney+ $user->amount ;
                    $encData = [
                        "id" => self::Tranportal_ID,
                        "trandata" => $this->encrypt($wrappedData, self::resource_key),
                        "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error/".$order_id,
                        "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success/".$order_id.'/'. $user->amount,
                    ];
                    $wrappedData = $this->wrapData(json_encode($encData, JSON_UNESCAPED_SLASHES));
                }else{
                     // لو المحفظه اللي هيتخصم منها  اقل الاوردر
                    $user->amount = 0 ;
                    $accountDetails = $this->getPayoutData($user,$driver_pay);
                    $wrappedAccountDetails = $this->wrapData($accountDetails);
                    $encData = [
                        "id" => self::Tranportal_ID,
                        "trandata" => $this->encrypt($wrappedData, self::resource_key),
                        "accountDetails" => $this->encrypt($wrappedAccountDetails, self::resource_key),
                        "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error/".$order_id,
                        "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success/".$order_id.'/'. $user->amount,
                    ];
                    $wrappedData = $this->wrapData(json_encode($encData, JSON_UNESCAPED_SLASHES));
                }
        
    }else{
        // لو المحفظه بها فلوس بالموجب
        $accountDetails = $this->getPayoutData($user,$shipperMoney);
            $wrappedAccountDetails = $this->wrapData($accountDetails);
            $encData = [
                "id" => self::Tranportal_ID,
                "trandata" => $this->encrypt($wrappedData, self::resource_key),
                "accountDetails" => $this->encrypt($wrappedAccountDetails, self::resource_key),
                "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error/".$order_id,
                "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success/".$order_id,
            ];
            $wrappedData = $this->wrapData(json_encode($encData, JSON_UNESCAPED_SLASHES));
    }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            //in Production use Production End Point
            CURLOPT_URL => self::ARB_HOSTED_ENDPOINT_TEST,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $wrappedData,

            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Accept-Language: application/json',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        // print_r($response);
        curl_close($curl);

        // parse response and get id
        if($response != null){
            $data = json_decode($response, true)[0];
            if ($data["status"] == "1") {  
                // $user->amount =$user->amount+  $order->getpaid;  
                // $user->save();
                $id = explode(":", $data["result"])[0];
                $url = self::ARB_PAYMENT_ENDPOINT_TESTING . $id; //in Production use Production Payment End Point
                // $this->notificationServ->notifyChargeWallet(
                //     ['fcm', 'db'],
                //     ['order_id' =>  $order->id, 'user_id' => $user->id, 'amount' => $order->getpaid]
                // );
                return $url;
            }   else {
                // handle error either refresh on contact merchant
                return -1;
            }
        }  else {
            // handle error either refresh on contact merchant
            return -1;
        }
    
    }


    public function getResult($data)
    {
        $trandata = $data;
        $decrypted = $this->decrypt($trandata, self::resource_key);
        $raw = urldecode($decrypted);
        $dataArr = json_decode($raw, true);
        return $dataArr;
        // $paymentStatus = $dataArr[0]["result"];

        // if (isset($paymentStatus) && $paymentStatus === self::ARB_SUCCESS_STATUS) {
        //     return "success";
        // } else {
        //     return "rejected";
        // }
    }

    private function getRequestData($order_id,$total)
    {

        // $amount = 100;
      
        $trackId = (string)rand(1, 1000000); // TODO: Change to real value
            
        $data = [
            "id" => self::Tranportal_ID,
            "password" => self::Tranportal_Password,
            "action" => "1",
            "currencyCode" => self::currencyCode,
            // "accountDetails"=>$accountDetails,
            "errorURL" => "https://kafoosa.appsjannah.com/api/v1/error/".$order_id,
            "responseURL" => "https://kafoosa.appsjannah.com/api/v1/success/".$order_id,
            "trackId" => $trackId,
            "amt" => $total,

        ];

        $data = json_encode($data, JSON_UNESCAPED_SLASHES);
        return $data;
    }
    private function getPayoutData($user,$driver_pay)
    {
    if($user->benificiaryName == null ){
            $user->benificiaryName = "AlRajhi Bank Services";
      }
        $data = [
            "bankIdCode" => $user->bankIdCode,
            "iBanNum"=> $user->iBanNum,
            "benificiaryName"=>$user->benificiaryName,
            "serviceAmount"=>$driver_pay,
            "valueDate"=>date("Ymd"),
        ];

        $data = json_encode($data, JSON_UNESCAPED_SLASHES);
        return $data;
    }

    private function wrapData($data)
    {
        $data = <<<EOT
        [$data]
        EOT;
        return $data;
    }

    function encrypt($str, $key)
    {
        $blocksize = openssl_cipher_iv_length("AES-256-CBC");
        $pad = $blocksize - (strlen($str) % $blocksize);
        $str = $str . str_repeat(chr($pad), $pad);
        $encrypted = openssl_encrypt($str, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $encrypted = base64_decode($encrypted);
        $encrypted = unpack('C*', ($encrypted));
        $chars = array_map("chr", $encrypted);
        $bin = join($chars);
        $encrypted = bin2hex($bin);
        $encrypted = urlencode($encrypted);
        return $encrypted;
    }

    function decrypt($code, $key)
    {
        $string = hex2bin(trim($code));
        $code = unpack('C*', $string);
        $chars = array_map("chr", $code);
        $code = join($chars);
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $pad = ord($decrypted[strlen($decrypted) - 1]);
        if ($pad > strlen($decrypted)) {
            return false;
        }
        if (strspn($decrypted, chr($pad), strlen($decrypted) - $pad) != $pad) {
            return false;
        }
        return urldecode(substr($decrypted, 0, -1 * $pad));
    }
}
