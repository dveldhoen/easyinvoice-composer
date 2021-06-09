<p align="center"><a href="https://easyinvoice.cloud" target="_blank" rel="noopener noreferrer"><img width="250" src="https://public.easyinvoice.cloud/img/logo_en_original.png" alt="Easy Invoice logo"></a></p>

<p align="center">Easy Invoice is a package that will help you to create beautiful PDF invoices with ease.</p>

<p align="center">
If this package helped you out please star us on Github!
<br/>
Much appreciated!
<br/>
<br/>
<a href="https://github.com/dveldhoen/easyinvoice-composer/"><img src="https://img.shields.io/github/stars/dveldhoen/easyinvoice-composer.svg?style=social&label=Star" alt="Pull Request's Welcome"></a>
</p>

[comment]: <> (## Features)

[comment]: <> (- [x] Create invoices)

[comment]: <> (- [ ] List, get, update, delete invoices &#40;api ready / npm in progress&#41;)

[comment]: <> (- [ ] Create, list, get, update, delete clients &#40;api ready / npm in progress&#41;)

[comment]: <> (- [ ] More soon...)

## Sample
<div align="center">
    <img width="350" style="border: 1px black solid" src="https://public.easyinvoice.cloud/img/sample-invoice.png" alt="Easy Invoice Sample Logo Only">
    <img width="350" style="border: 1px black solid" src="https://public.easyinvoice.cloud/img/sample-invoice-background.png" alt="Easy Invoice Sample With Background">
</div>

## Demo
Sample 1:
<br/>
<a href="https://phpsandbox.io/n/3czoi"><img src="https://phpsandbox.io/img/brand/badge.png" height="20" alt="PHPSandbox Notebook"></a>

Sample 2:
<br/>
<a href="https://phpsandbox.io/n/w2gev"><img src="https://phpsandbox.io/img/brand/badge.png" height="20" alt="PHPSandbox Notebook"></a>

## Installing

Using composer:

```bash
$ composer require easyapis.io/easyinvoice
```

## Example

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use EasyApis\EasyInvoice;

//Sample code to test the library
$invoice = EasyInvoice::create(
    [
        'currency' => 'USD',
        'taxNotation' => 'vat',
        'marginTop' => 25,
        'marginRight' => 25,
        'marginLeft' => 25,
        'marginBottom' => 25,
        'logo' => 'https://public.easyinvoice.cloud/img/logo_en_original.png',
        'background' => 'https://public.easyinvoice.cloud/img/watermark-draft.jpg',
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

//The invoice object wil contain as base64 PDF
echo $invoice;
```