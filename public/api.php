<?php

function logIt($result){
    $html = print_r($result, true);
    $html.="\n".date("d.m.Y H:i:s")."\n--------------------\n\n\n";
    $file = $_SERVER["DOCUMENT_ROOT"]."/public/log.txt";
    $old_data = file_get_contents($file);
    file_put_contents($file, $html.$old_data);
}

/*class Api
{
    public function getHeaders()
    {
        $headers = '';
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $_SERVER;
    }

    public function getHeader()
    {

    }
}

$api = new Api();

$getHeaders = $api->getHeaders();*/


if (!function_exists('getallheaders')) {
    function getallheaders()
    {
        $headers = '';
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}
$headers = getallheaders();
$input = json_decode(file_get_contents('php://input'));

logIt($input);
logIt($headers);


$result = [
    'SUCCESS' => true
];


if(!empty($input)) {
    header('Content-type: application/json; charset=utf-8');
    die(json_encode($result));
}
