<?php

namespace App\Http\Controllers;

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQController extends Controller
{
    /**
     * @throws Exception
     */
    public function sendMessage(): void
    {
        // Conectar ao RabbitMQ
        $connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_USERNAME'),
            env('RABBITMQ_PASSWORD')
        );
        $channel = $connection->channel();

        // Declarar a fila
        $queueName = 'minha_fila';
        $channel->queue_declare($queueName, false, true, false, false);

        // Gerar um identificador único para a mensagem
        $messageId = uniqid();

        // Enviar a mensagem
        $messageBody = 'Mensagem com identificador único: ' . $messageId;
        $message = new AMQPMessage($messageBody, ['message_id' => $messageId]);
        $channel->basic_publish($message, '', $queueName);

        // Confirmar que a mensagem foi entregue
        if ($channel->wait_for_pending_acks()) {
            echo 'Mensagem enviada com sucesso e entregue corretamente.';
        } else {
            echo 'Falha ao enviar a mensagem ou a mensagem não foi entregue corretamente.';
        }

        // Fechar a conexão
        $channel->close();
        $connection->close();
    }
}
