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
            $response = $client->request('POST', 'https://api.easyinvoice.cloud/v2/free/invoices', [
                'json' => ["data" => $data]
            ]);

            if ($response->getBody()) {
                $result = json_decode($response->getBody(), true);
                return $result['data'];
            }

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e;
        }
    }

    public static function save($pdfBase64, $filename = 'invoice'){
        file_put_contents($filename . '.pdf', base64_decode($pdfBase64));
    }
}