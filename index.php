<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

try{
    $client = new Client();
    $response = $client->request('POST', 'https://api.easyinvoice.cloud/v1/invoices', [
        'form_params' => [
            'field_name' => 'abc',
            'other_field' => '123',
            'nested_field' => [
                'nested' => 'hello'
            ]
        ]
    ]);

    if ($response->getBody()){
        $result = json_decode($response->getBody(), true);
        print_r($result['data']['pdf']);
//        return $result['data']['pdf'];
    }

}  catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e;
}

