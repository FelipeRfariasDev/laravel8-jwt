git clone https://github.com/feliperodriguesfariasphp/laravel8-jwt.git

cp .env_example .env

Altere os dados de conexão do banco de dados no arquivo .env

composer install

php artisan jwt:secret

php artisan migrate

php artisan db:seed

php artisan serve

Importe no postman o arquivo que está na raiz do projeto: laravel8-jwt.postman_collection.json

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/importar_postman.png?raw=true)

Referências: 

- https://dev.to/wenlopes/laravel-8-e-autenticacao-jwt-tymon-jwt-auth-com-model-customizada-2l7k


- https://www.youtube.com/watch?v=kP2N_eEv-iA&t=19s&ab_channel=Inform%C3%A1ticaDP
