<?php

require __DIR__ . '/../vendor/autoload.php';

use BudgetInvoice\EasyInvoice;

//Sample code to test the library
$invoice = EasyInvoice::create(
    [
        'apiKey' => 'free',
        'mode' => 'development',
        'currency' => 'USD',
        'taxNotation' => 'vat',
        'marginTop' => 50,
        'marginRight' => 50,
        'marginLeft' => 50,
        'marginBottom' => 25,
        'background' => 'https://public.easyinvoice.cloud/pdf/sample-background.pdf',
        'sender' => [
            'company' => 'Sample Corp',
            'address' => 'Sample Street 123',
            'zip' => '1234 AB',
            'city' => 'Sampletown',
            'country' => 'Samplecountry',
        ],
        'client' => [
            'company' => 'Client Corp',
            'address' => 'Clientstreet 456',
            'zip' => '4567 CD',
            'city' => 'Clientcity',
            'country' => 'Clientcountry',
        ],
        'invoiceNumber' => '2021.0001',
        'invoiceDate' => '1.1.2021',
        'products' => [
            [
                'quantity' => '2',
                'description' => 'Test1',
                'tax' => 6,
                'price' => 33.87,
            ],
            [
                'quantity' => '4',
                'description' => 'Test2',
                'tax' => 21,
                'price' => 10.45,
            ],
        ],
        'bottomNotice' => 'Kindly pay your invoice within 15 days.',
    ]
);
echo $invoice;