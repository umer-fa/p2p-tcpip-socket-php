<?php
declare(strict_types=1);

require "../vendor/autoload.php";
$host = "127.0.0.1";
$port = 9002;

$p2pSocket = new \FurqanSiddiqui\P2PSocket\P2PSocket(4);
$p2pSocket->createServer($host, $port);
try {
    $p2pSocket->peers()->connect($host,$port);
    $p2pSocket->peers()->broadcast("hello there");
    $p2pSocket->peers()->connect($host,$port);
    $p2pSocket->peers()->broadcast("hi there");
    $p2pSocket->peers()->connect($host,$port);
    $p2pSocket->peers()->broadcast("messages sent");
    $p2pSocket->peers()->connect($host,$port);
    $p2pSocket->peers()->broadcast("messages always sent");
} catch (\FurqanSiddiqui\P2PSocket\Exception\P2PSocketException $e) {
    print_r($e);
}
$p2pSocket->listen();
echo "<pre>";
var_dump($p2pSocket->peers()->read()->all());
