## 1. Desempenho e Otimização
Criado um service chamado PrimeNumberService
Pode ser testado chamando a rota /sum-prime-number
Lógica no PrimeNumberController

## 3. Arquitetura e Design Patterns
Criado uma tabela para gerenciar os comandos
Criado um controller CommandController onde podemos fazer a lógica de executar um comando em si, metódo execute() e o undo() para reverter

## 4. Segurança Avançada
Criei um ServiceProvider chamado SecurityServiceProvider, onde defino duas regras de validação personalizadas.
A regra secure_password valida se a senha tem pelo menos 8 caracteres e contém pelo menos uma letra maiúscula, uma letra minúscula e um número.
A regra bcrypt_password valida se a senha está no formato bcrypt. Isso é útil para verificar se a senha já foi criptografada antes de aplicar bcrypt() novamente.
Estas regras podem ser usadas nos arquivos de validação de formulários. Exemplo no arquivo SecurityPasswordController.php

## 5. Integração e Microsserviços

 Utilizado o pacote php-amqplib/php-amqplib para interagir com RabbitMQ
 Criado um controller RabbitMQController para lógica e a rota /send-message
 Ao enviar para RabbitMQ com um identificador único e confirma se a mensagem foi devidamente entregue usando o método wait_for_pending_acks(). 
