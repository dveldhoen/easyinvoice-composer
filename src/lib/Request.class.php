<?php

require __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;

class Request
{
    // Properties
    public $method;
    public $url;
    public $data;

    //Methods
    function send($data)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://api.easyinvoice.cloud/v1/invoices', [
                'json' => ["data" => $data]
            ]);

            if ($response->getBody()){
                $result = json_decode($response->getBody(), true);
                echo $result;
                return $result['data']['pdf'];
            }

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e;
        }

    }

    //Getters and Setters

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

}