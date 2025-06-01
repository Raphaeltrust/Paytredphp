# A PHP API wrapper for Paytred
## Requirements
#### Curl 7.34.0 or more recent (Unless using Guzzle)
#### PHP 5.4.0 or more recent


## Installation
### Via Composer
    $ composer require raphaeltrust/paytredphp
### Via download
Download a release version from the releases page. Extract, then:

    require 'path/to/src/
To make a payment do a redirect to the authorization URL received from calling the /pay endpoint. This URL is valid for one time use, so ensure that you generate a new URL per transaction.

When the payment is successful, we will call your callback URL (as setup in your dashboard or while initializing the payment) and return the reference and transaction status as a query parameter.

# Using the API
## Check your Paytred wallet balance 
The endpoint for checking wallet balance is [/balance]

    <?php
    $paytred = new \Raphaeltrust\Paytredphp\PaytredApi('https://api.paytred.com/v1/balance','YOUR_API_KEY'); 
    try {
    //get response
    $response = $paytred();
    //print response
    echo $response;
    } catch (\RuntimeException $ex) {

    // catch errors
    die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
    }
    
A JSON response will be returned.

## Create a new product token
The endpoint for creating a new product token is [/create-token]
Required fields:
* product_name: (string)/ Name of the product
* product_amount: (float)/ The product amount
* product_type: (int)/ The type of product. (1) Physical Product (2) Digital Product (3) Service
* product_timeframe: (int)/ Number of days

    $paytred = new \Raphaeltrust\Paytredphp\PaytredApi('https://api.paytred.com/v1/create-token','YOUR_API_KEY');
    try {
    //fields
    $response = $paytred([
        'product_name' => 'Mecury Photo Art',
        'product_amount' => 50000,
        'product_type' => 1,
        'product_timeframe' => 30,

    ]);
    //print response
    echo $response;
    } catch (\RuntimeException $ex) {

    // catch errors
    die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
    }
     
