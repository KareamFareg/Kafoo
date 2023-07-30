<?php

class ArbPg
{

    const ARB_HOSTED_ENDPOINT_TEST = 'https://securepayments.alrajhibank.com.sa/pg/payment/hosted.htm';
    const ARB_HOSTED_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/hosted.htm';

    const ARB_MERCHANT_HOSTED_ENDPOINT_TEST = 'https://securepayments.alrajhibank.com.sa/pg/payment/tranportal.htm';
    const ARB_MERCHANT_HOSTED_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/tranportal.htm';

    const ARB_PAYMENT_ENDPOINT_TESTING = 'https://securepayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';
    const ARB_PAYMENT_ENDPOINT_PROD = 'https://digitalpayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=';

    const ARB_SUCCESS_STATUS = 'CAPTURED';

    //The merchant must fill his credentials first
    const Tranportal_ID = "";
    const Tranportal_Password = "";
    const resource_key = "";


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
            "errorURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "responseURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "trackId" => $trackId,
            "amt" => $amount,

        ];
        $data = json_encode($data, JSON_UNESCAPED_SLASHES);

        $wrappedData = $this->wrapData($data);

        $encData = [
            "id" => self::Tranportal_ID,
            "trandata" => $this->encrypt($wrappedData, self::resource_key),
            "errorURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "responseURL" => "http://localhost/arbpg-php-sample-code/result.php",
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
        var_dump($response);
        if ($response_data["status"] == "1") {
            $url = "https:" . explode(":", $response_data["result"])[2];
            return $url;
        } else {
            // handle error either refresh on contact merchant
            return null;
        }
    }

    public function getPaymentId()
    {

        $plainData = $this->getRequestData();

        $wrappedData = $this->wrapData($plainData);



        $encData = [
            "id" => self::Tranportal_ID,
            "trandata" => $this->encrypt($wrappedData, self::resource_key),
            "errorURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "responseURL" => "http://localhost/arbpg-php-sample-code/result.php",
        ];

        $wrappedData = $this->wrapData(json_encode($encData, JSON_UNESCAPED_SLASHES));

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
        print_r($response);
        curl_close($curl);

        // parse response and get id
        $data = json_decode($response, true)[0];
        print_r($data);
        if ($data["status"] == "1") {
            $id = explode(":", $data["result"])[0];
            $url = self::ARB_PAYMENT_ENDPOINT_TESTING . $id; //in Production use Production Payment End Point
            return $url;
        } else {
            // handle error either refresh on contact merchant
            return -1;
        }
    }


    public function getResult($trandata)
    {

        $decrypted = $this->decrypt($trandata, self::resource_key);
        $raw = urldecode($decrypted);
        $dataArr = json_decode($raw, true);
        var_dump($dataArr);
        $paymentStatus = $dataArr[0]["result"];

        if (isset($paymentStatus) && $paymentStatus === self::ARB_SUCCESS_STATUS) {
            return "success";
        } else {
            return "rejected";
        }
    }

    private function getRequestData()
    {

        $amount = 100;

        $trackId = (string)rand(1, 1000000); // TODO: Change to real value

        $data = [
            "id" => self::Tranportal_ID,
            "password" => self::Tranportal_Password,
            "action" => "1",
            "currencyCode" => "682",
            "errorURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "responseURL" => "http://localhost/arbpg-php-sample-code/result.php",
            "trackId" => $trackId,
            "amt" => $amount,

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
