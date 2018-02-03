<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection so we can send messages to it later
        $this->clients[$conn->resourceId] = [
            'connection' => $conn,
        ];
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg);
        $valid_functions = ['task_verifier','task_agent','connect','typing'];
        
               
        if(in_array($data->event,$valid_functions)) {
            $functionName = 'event_' . $data->event;

            $this->$functionName($from,$data);
        } else {
            $from->send('INVALID REQUEST');
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        unset($this->clients[$conn->resourceId]);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }


    public function event_connect(ConnectionInterface $from, $data)
    {
        $this->clients[$from->resourceId]['type'] = $data->type;

        /*$send_data = [
            'event' => 'connect',
            'clients' => $this->clients,
        ];*/
        //$from->send(json_encode(['event' => 'connected']));

      /*  if($data->to=='verifiers')
        {
            $this->sendMessageToVerifiers($send_data);
        }*/


    }

    public function event_task_verifier(ConnectionInterface $from, $data)
    {

        $send_data=[
            'event'=>'new_task_verifier',
        ];
        $this->sendMessageToVerifiers($send_data);
    }

    public function event_task_agent(ConnectionInterface $from, $data)
    {

        $send_data=[
            'event'=>'new_task_agent',
        ];
        $this->sendMessageToAgents($send_data);
    }


    private function sendMessageToVerifiers($msg)
    {
        if(is_object($msg) || is_array($msg)) {
            $msg = json_encode($msg);
        }
        foreach ($this->clients as $client) {

            if($client['type']=='verifier')
            {
                $client['connection']->send($msg);
            }else{
                echo 'no es enterprise';
            }

        }
    }

    private function sendMessageToAgents($msg)
    {
        if(is_object($msg) || is_array($msg)) {
            $msg = json_encode($msg);
        }
        foreach ($this->clients as $client) {

            if($client['type']=='enterprise')
            {
                $client['connection']->send($msg);
            }else{
                echo 'no es enterprise';
            }

        }
    }

    private function sendMessageTo($data)
    {

        $key=$data['to_key'];
        $key_from=$data['from_key'];
        if(is_object($data) || is_array($data)) {
            $data = json_encode($data);
        }

        $this->clients[$key]['connection']->send($data);
        //$this->clients[$key_from]['connection']->send($data);

    }

}