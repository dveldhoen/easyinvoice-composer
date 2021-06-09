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

## Platform support
|<b>Platform</b> | Supported  | Link |
|---|---|---|
| PHP | Yes! | <a href="https://packagist.org/packages/easyapis.io/easyinvoice"><img src="https://img.shields.io/badge/EasyInvoice%20on-Composer-blue" alt="Available on Composer"></a> |
| Javascript | Yes! | <a href="https://www.npmjs.com/package/easyinvoice"><img src="https://img.shields.io/badge/EasyInvoice%20on-NPM-blue" alt="Available on NPM"></a> |


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

//Set the data you wish to see on your invoice
$invoiceData = [
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
];

//Sample code to test the library
$invoice = EasyInvoice::create($invoiceData);

//The invoice object wil contain a base64 PDF string
echo $invoice;
```

## Locales and Currency
Used for number formatting and the currency symbol:
```php
//E.g. for Germany, prices would look like 123.456,78 €
$data = [ "locale" => "de-DE", "currency" => "EUR"];

//E.g. for US, prices would look like $123,456.78
$data = [ "locale" => "en-US", "currency" => 'USD'];
```

Formatting and symbols are applied through the [ECMAScript Internationalization API](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl)

[Click here for a list of locale codes](https://datahub.io/core/language-codes/r/3.html)
<br/>
[Click here for a list of currency codes](https://www.iban.com/currency-codes)

Disclaimer: Not all locales and currency codes found in the above lists might be supported by the ECMAScript Internationalization API.

## Logo and Background
The logo and url inputs accept either a URL or a base64 encoded file.

Supported file types:

- Logo: image
- Background: image, pdf

### URL

```php
$invoiceData = [
    "logo" => "https://public.easyinvoice.cloud/img/logo_en_original.png",
    "background" => "https://public.easyinvoice.cloud/img/watermark_draft.jpg"
];
```

### Base64

```php
$invoiceData = [
    //Note: Sample base64 string
    //Please use the link below to convert your image to base64    
    "logo" => "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==",
    "background" => "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==" 
];
```
[Click here for an online tool to convert an image to base64](https://base64.guru/converter/encode/image)

## View PDF

You could view your base64 pdf through the following website:
https://base64.guru/converter/decode/pdf

Paste the base64 string and click 'Decode Base64 to PDF'.