<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\Contract\OnReceiveInterface;

class TcpServer implements OnReceiveInterface
{
    public function onReceive($server, int $fd, int $fromId, string $data): void
    {
        $server->send("{$fd}", 'recv:' . $data);
    }

    public function onConnect($server, $fd)
    {
        echo "Client: Connect" . PHP_EOL;
    }

    public function onClose($server, $fd)
    {
        echo "Client: Close" . PHP_EOL;
    }
}
