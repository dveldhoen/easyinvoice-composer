<?php

require_once __DIR__ . '/src/EasyApis/EasyInvoice.php';

use EasyApis\EasyInvoice;

$invoiceData = [
    "bottom-notice" => "Kindly pay your invoice within 15 days.",
    "products" => [
        [
            "quantity" => 2,
            "description" => "Test1",
            "tax-rate" => 6,
            "price" => 33.87
        ],
        [
            "quantity" => 4.1,
            "description" => "Test2",
            "tax-rate" => 6,
            "price" => 12.34
        ],
        [
            "quantity" => 4.5678,
            "description" => "Test3",
            "tax-rate" => 21,
            "price" => 6324.453456
        ]
    ],
    "translate" => [
        "invoice" => "FACTUUR",
        "number" => "Nummer",
        "date" => "Datum",
        "due-date" => "Verloopdatum",
        "subtotal" => "Subtotaal",
        "products" => "Producten",
        "quantity" => "Aantal",
        "price" => "Prijs",
        "product-total" => "Totaal",
        "total" => "Totaal"
    ],
    "images" => [
        "logo" => "https://public.easyinvoice.cloud/img/logo_en_original.png",
        "background" => "https://public.easyinvoice.cloud/img/watermark-draft.jpg"
    ],
    "settings" => [
        "currency" => "EUR",
        "locale" => "nl-NL",
        "tax-notation" => "gst",
        "margin-top" => 25,
        "margin-right" => 25,
        "margin-left" => 25,
        "margin-bottom" => 25,
        "format" => "A4"
    ],
    "information" => [
        "number" => "2021.0001",
        "date" => "12-12-2021",
        "due-date" => "31-12-2021"
    ],
    "sender" => [
        "company" => "Sample Corp",
        "address" => "Sample Street 123",
        "zip" => "1234 AB",
        "city" => "Sampletown",
        "country" => "Samplecountry",
        "custom1" => "sender-custom1",
        "custom2" => "sender-custom2",
        "custom3" => "sender-custom3"
    ],
    "client" => [
        "company" => "Client Corp",
        "address" => "Clientstreet 456",
        "zip" => "4567 CD",
        "city" => "Clientcity",
        "country" => "Clientcountry",
        "custom1" => "client-custom1",
        "custom2" => "client-custom2",
        "custom3" => "client-custom3"
    ]
];

//Sample code to test the library
$invoice = EasyInvoice::create($invoiceData);

//The invoice object wil contain a base64 PDF string
print_r($invoice);

$fileName = 'invoice-test';
EasyInvoice::save(base64_decode($invoice['pdf']), $fileName);

echo 'Invoice saved as ' . $fileName . '.pdf';