<?php
// namespace
namespace Raphaeltrust\Paytredphp;

class PaytredApi
{
    private $endpoint;
    private $options;
    private $authorization;
    public $base_url;

           
    /**
     * @param string $url     Request URL
     * @param array  $options cURL options
     */
    public function __construct($endpoint, $key, array $options = [])
    {
      $s = var_export($key, true);
        $this->endpoint = $endpoint;
        $this->options = $options;
        $this->authorization = "Authorization: Bearer ".$key;

    }

    /**
     * Get the response
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function __invoke(array $post = NULL)
    {
$headers = array();
$headers[] = 'pragma: no-cache';
$headers[] = 'cache-control: no-cache';
$headers[] = $this->authorization;
//$headers[] = 'content-Type: application/x-www-form-urlencoded';

//$headers[] = 'sec-fetch-site: same-origin';
//$headers[] = 'referrer-policy: same-origin';

       $ch = \curl_init($this->endpoint);
        
        foreach ($this->options as $key => $val) {
            \curl_setopt($ch, $key, $val);
        }
      \curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      \curl_setopt($ch, CURLOPT_POST, 1);
      \curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, $post);

        $response = \curl_exec($ch);
        $error    = \curl_error($ch);
        $errno    = \curl_errno($ch);
        
        if (\is_resource($ch)) {
            \curl_close($ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }
        
        return $response;
    }

}