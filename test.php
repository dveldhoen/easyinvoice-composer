<?php

require_once __DIR__ . '/src/BudgetInvoice/EasyInvoice.php';

use BudgetInvoice\EasyInvoice;

$invoiceData = [
    'apiKey' => 'free',
    // Set mode to development so we don't run into any rate limiting while developing or testing
    'mode' => 'developmentx',
    // Customize enables you to provide your own templates
    // Please review the documentation for instructions and examples
    "customize" => [
        //  "template" => fs.readFileSync('template.html', 'base64') // Must be base64 encoded html
    ],
    "images" => [
        // The logo on top of your invoice
        "logo" => "https://public.easyinvoice.cloud/img/logo_en_original.png",
        // The invoice background
        "background" => "https://public.easyinvoice.cloud/img/watermark-draft.jpg"
    ],
    // Your own data
    "sender" => [
        "company" => "Sample Corp",
        "address" => "Sample Street 123",
        "zip" => "1234 AB",
        "city" => "Sampletown",
        "country" => "Samplecountry"
        //"custom1" => "custom value 1",
        //"custom2" => "custom value 2",
        //"custom3" => "custom value 3"
    ],
    // Your recipient
    "client" => [
        "company" => "Client Corp",
        "address" => "Clientstreet 456",
        "zip" => "4567 CD",
        "city" => "Clientcity",
        "country" => "Clientcountry"
        // "custom1" => "custom value 1",
        // "custom2" => "custom value 2",
        // "custom3" => "custom value 3"
    ],
    "information" => [
        // Invoice number
        "number" => "2021.0001",
        // Invoice data
        "date" => "12-12-2021",
        // Invoice due date
        "due-date" => "31-12-2021"
    ],
    // The products you would like to see on your invoice
    // Total values are being calculated automatically
    "products" => [
        [
            "quantity" => 2,
            "description" => "Product 1",
            "tax-rate" => 6,
            "price" => 33.87
        ],
        [
            "quantity" => 4.1,
            "description" => "Product 2",
            "tax-rate" => 6,
            "price" => 12.34
        ],
        [
            "quantity" => 4.5678,
            "description" => "Product 3",
            "tax-rate" => 21,
            "price" => 6324.453456
        ]
    ],
    // The message you would like to display on the bottom of your invoice
    "bottom-notice" => "Kindly pay your invoice within 15 days.",
    // Settings to customize your invoice
    "settings" => [
        "currency" => "USD", // See documentation 'Locales and Currency' for more info. Leave empty for no currency.
        // "locale" => "nl-NL", // Defaults to en-US, used for number formatting (See documentation 'Locales and Currency')
        // "tax-notation" => "gst", // Defaults to 'vat'
        // "margin-top" => 25, // Defaults to '25'
        // "margin-right" => 25, // Defaults to '25'
        // "margin-left" => 25, // Defaults to '25'
        // "margin-bottom" => 25, // Defaults to '25'
        // "format" => "A4" // Defaults to A4, options => A3, A4, A5, Legal, Letter, Tabloid
    ],
    // Translate your invoice to your preferred language
    "translate" => [
        // "invoice" => "FACTUUR",  // Default to 'INVOICE'
        // "number" => "Nummer", // Defaults to 'Number'
        // "date" => "Datum", // Default to 'Date'
        // "due-date" => "Verloopdatum", // Defaults to 'Due Date'
        // "subtotal" => "Subtotaal", // Defaults to 'Subtotal'
        // "products" => "Producten", // Defaults to 'Products'
        // "quantity" => "Aantal", // Default to 'Quantity'
        // "price" => "Prijs", // Defaults to 'Price'
        // "product-total" => "Totaal", // Defaults to 'Total'
        // "total" => "Totaal" // Defaults to 'Total'
    ],
];

try {
//Sample code to test the library
    $invoice = EasyInvoice::create($invoiceData);

//The invoice object wil contain a base64 PDF string
//print_r($invoice);

    $fileName = 'invoice-test';
    EasyInvoice::save($invoice['pdf'], $fileName);

    echo 'Invoice saved as ' . $fileName . '.pdf';
} catch (Exception $e) {
    echo $e->getMessage();
}

