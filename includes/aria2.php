<?php

require_once 'jsonRpcClient.php';

/**
 * @link http://aria2.sourceforge.net/manual/en/html/aria2c.html#rpc-interface Documentation
 */
class Aria2 {

    protected $client;
    protected $log = "/tmp/aria2.php.log";

    public function __construct() {
        $this->client = new jsonRpcClient('http://127.0.0.1:6800/jsonrpc');
    }

    protected function _exec($method, array $params) {
        $return = false;
        try {
            $params = array_filter($params);
            file_put_contents($this->log, "Calling aria.{$method} with parameters " . var_export(array_keys($params), 1) . PHP_EOL, FILE_APPEND);

            //$params = array_filter($params);
            $return = $this->client->__call('aria2.' . $method, $params);
            file_put_contents($this->log, var_export($return, 1) . PHP_EOL, FILE_APPEND);
        } catch (Exception $e) {
            file_put_contents($this->log, var_export($e->getMessage(), 1) . PHP_EOL, FILE_APPEND);
            error_log($e->getMessage());
        }
        return $return;
    }

    public function addUri(array $uris, $options = null, $position = null) {
        $params = array(
            'uris' => $uris,
            'options' => $options,
            'position' => $position
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function addTorrent($file, $uris = null, $options = null, $position = null) {
        $torrent = base64_encode(file_get_contents($file));

        $params = array(
            'torrent' => $torrent,
            'uris' => $uris,
            'options' => $options,
            'position' => $position
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function addMetalink($file, $options = null, $position = null) {
        $metalink = base64_encode(file_get_contents($file));

        $params = array(
            'metalink' => $metalink,
            'options' => $options,
            'position' => $position
        );

        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function remove($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function forceRemove($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function pause($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function pauseAll() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function forcePause($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function forcePauseAll() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function unpause($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function unpauseAll() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function tellStatus($gid, $keys = null) {
        $params = array(
            'gid' => $gid,
            'keys' => $keys
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getUris($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getFiles($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getPeers($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getServers($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function tellActive($keys = null) {
        $params = array('keys' => $keys);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function tellWaiting($offset, $num, $keys = null) {
        $params = array(
            'offset' => $offset,
            'num' => $num,
            'keys' => $keys
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function tellStopped($offset, $num, $keys = null) {
        $params = array(
            'offset' => $offset,
            'num' => $num,
            'keys' => $keys
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function changePosition($gid, $pos, $how) {
        $params = array(
            'gid' => $gid,
            'pos' => $pos,
            'how' => $how
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function changeUri($gid, $fileIndex, $delUris, $addUris, $position = null) {
        $params = array(
            'gid' => $gid,
            'pos' => $fileIndex,
            'how' => $delUris,
            'addUris' => $addUris,
            'position' => $position
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getOption($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function changeOption($gid, $options) {
        $params = array(
            'gid' => $gid,
            'options' => $options
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getGlobalOption() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function changeGlobalOption($options) {
        $params = array(
            'options' => $options
        );
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getGlobalStat() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function purgeDownloadResult() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function removeDownloadResult($gid) {
        $params = array('gid' => $gid);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getVersion() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function getSessionInfo() {
        $result = $this->_exec(__FUNCTION__, array());

        return $result;
    }

    public function shutdown() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function forceShutdown() {
        $params = array();
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

    public function multicall($methods) {
        $params = array('methods' => $methods);
        $result = $this->_exec(__FUNCTION__, $params);

        return $result;
    }

}
