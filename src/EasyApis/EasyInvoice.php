<?php

namespace EasyApis;

if (file_exists(__DIR__ . '/../../vendor/autoload.php')){
    require __DIR__ . '/../../vendor/autoload.php';
} else {
    require __DIR__ . '/../../../../autoload.php';
}



use GuzzleHttp\Client;

class EasyInvoice
{
    public static function create($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://api.easyinvoice.cloud/v1/invoices', [
                'json' => ["data" => $data]
            ]);

            if ($response->getBody()) {
                $result = json_decode($response->getBody(), true);
                return $result['data']['pdf'];
            }

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e;
        }
    }
}