<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Welcome {$user}.",
        ];
    }

    // 检测socket连接是否正常
    public function connect()
    {
        $client = new \Swoole\Client(SWOOLE_SOCK_TCP);
//        $client->connect('127.0.0.1', 9504);
//        $client->connect('127.0.0.1', 9504, 10);

        $ip = $this->request->input('ip', '192.168.31.76');
        $port = (int)$this->request->input('port', 8899);
        $msg = $this->request->input('msg', 'true');

        $client->connect($ip, $port, 30);
        $client->send($msg);
        $ret = $client->recv();

        // tcp服务断开连接失败
        // 消息送达并返回消息

        return [
            'status' => $ret ? 1 : 0,
//            'message' => $ret ?: '连接失败',
        ];
    }
}
