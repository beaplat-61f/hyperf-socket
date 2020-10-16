<?php

$client = new \Swoole\Client(SWOOLE_SOCK_TCP);
$client->connect('192.168.4.20', 6000);
$client->send('Hello World.');
// $ret = $client->recv(); // recv:Hello World.


//fwrite(STDOUT, 'Please input:');
//$msg = trim(fgets(STDIN));
//$client->send($msg);
