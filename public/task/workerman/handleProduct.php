<?php
set_time_limit(0);

use \workerman\Worker;
use \workerman\Lib\Timer;

require_once __DIR__ . '/Autoloader.php';

$task = new Worker();

class handleProduct
{
    
    public function send()
    {
        echo 'begin';
        $res = shell_exec("cd /www/wwwroot/tyc2022910.com/public && php index.php /index/index/product");
        //$res = $this->http_request("https://103.144.242.193/index/index/product");
        var_dump($res);
        echo 'die';;
    }
    
    public function http_request($url, $data = null, $header = null){

        $curl = curl_init();
        if(!empty($header)){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_HEADER, 0);//返回response头部信息
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_HTTPGET, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
$task->onWorkerStart = function ($task) {
    $ctoc = new handleProduct();
    Timer::add(2, array($ctoc, 'send'), '', true);
};
$task->listen();
Worker::runAll();