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
