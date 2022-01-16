<h1 align="center">Api Autenticação JWT com Laravel 8</h1>

git clone https://github.com/feliperodriguesfariasphp/laravel8-jwt.git

cd laravel8-jwt

cp .env_example .env

Altere os dados de conexão do banco de dados no arquivo .env

composer install

php artisan jwt:secret

php artisan migrate

php artisan serve

Importe no postman o arquivo que está na raiz do projeto: laravel8-jwt.postman_collection.json

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/importar_json_postman.png?raw=true)

Como inserir um novo usuário

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/novo_usuario.png?raw=true)

Como fazer login e recuperar o Token

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/login.png?raw=true)

Como inserir um post passando Authorization Bearer {Token}

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/inserir_post_1_header.png?raw=true)

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/inserir_post_2_Bady.png?raw=true)

Referências: 

- https://dev.to/wenlopes/laravel-8-e-autenticacao-jwt-tymon-jwt-auth-com-model-customizada-2l7k


- https://www.youtube.com/watch?v=kP2N_eEv-iA&t=19s&ab_channel=Inform%C3%A1ticaDP
