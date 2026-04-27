<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class QueueServer implements MessageComponentInterface {
    protected $clients;
    protected $pdo;

    public function __construct() {
        $this->clients = new \SplObjectStorage;

        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=clinic_queue",
            "root",
            ""
        );

        echo "WebSocket running...\n";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Client connected\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);

        if ($data['action'] === 'next') {

            // naikkan nomor
            $this->pdo->query("UPDATE queue SET current_number = current_number + 1 WHERE id = 1");

            $result = $this->pdo->query("SELECT current_number FROM queue WHERE id = 1")
                                ->fetch(PDO::FETCH_ASSOC);

            // broadcast ke semua client
            foreach ($this->clients as $client) {
                $client->send(json_encode([
                    "number" => $result['current_number']
                ]));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}

use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new WsServer(new QueueServer()),
    8080
);

$server->run();