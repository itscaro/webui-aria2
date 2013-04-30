<?php

require_once 'jsonRpcClient.php';

class Aria2 {

    protected $client;

    public function __construct() {
        $this->client = new jsonRpcClient('http://127.0.0.1:6800/jsonrpc', 1);
    }

    public function addUri(array $url) {
        $result = $result = $this->client->__call('aria2.addUri', array($url));
        file_put_contents('aria2.php.log', var_export($result) . PHP_EOL, FILE_APPEND);

        return $result;
    }

    public function addTorrent($file) {
        $buffer = base64_encode(file_get_contents($file));
        $result = $this->client->__call('aria2.addTorrent', array($buffer));
        //file_put_contents('aria2.php.log', var_export($result) . PHP_EOL, FILE_APPEND);
        return $result;
    }

    public function addMetalink($file) {
        $buffer = base64_encode(file_get_contents($file));
        $result = $this->client->__call('aria2.addMetalink', array($buffer));
        file_put_contents('aria2.php.log', var_export($result) . PHP_EOL, FILE_APPEND);

        return $result;
    }

    public function getSessionInfo() {
        $result = $this->client->__call('aria2.getSessionInfo', array());
        print_r($result);
    }

}
