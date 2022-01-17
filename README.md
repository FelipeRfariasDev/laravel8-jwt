<h1 align="center">Api Autenticação JWT com Laravel 8</h1>

git clone https://github.com/feliperodriguesfariasphp/laravel8-jwt.git

cd laravel8-jwt

cp .env_example .env

Altere os dados de conexão do banco de dados no arquivo .env

composer install

php artisan key:generate

php artisan jwt:secret

php artisan migrate

php artisan serve

Importe no postman
<a href="https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/Introdu%C3%A7%C3%A3o%20-%20Importar%20json%20postman/laravel8-jwt.postman_collection.json">🔗 laravel8-jwt.postman_collection.json</a>

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/Introdu%C3%A7%C3%A3o%20-%20Importar%20json%20postman/Importar%20arquivo%20json%20postman.png?raw=true)

Define a variável API_URL

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/0%20-%20Define%20a%20vari%C3%A1vel%20API_URL/Environments_API_URL.png?raw=true)

Como inserir um novo usuário

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/1%20-%20Novo%20Usu%C3%A1rio/NovoUsuario.png?raw=true)

Como fazer login e recuperar o Token

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/2%20-%20Realiza%20o%20Login%20e%20recupera%20o%20Token/LoginRecuperandoToken.png?raw=true)

Como inserir um post passando Authorization Bearer {Token}

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/3%20-%20Adicionar%20um%20post%20autenticado/CadastrarNovoPostHeadersAuthorizationBearer_1.png?raw=true)

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/3%20-%20Adicionar%20um%20post%20autenticado/CadastrarNovoPostBodyJson_2.png?raw=true)

Buscar todos os posts sem a necessidade de autorização

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/4%20-%20Buscar%20todos%20os%20posts%20ou%20apenas%20um%20post%20pelo%20id%20sem%20autentica%C3%A7%C3%A3o/BuscarTodosPosts.png?raw=true)

Buscar um post pelo Id sem a necessidade de autorização

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/4%20-%20Buscar%20todos%20os%20posts%20ou%20apenas%20um%20post%20pelo%20id%20sem%20autentica%C3%A7%C3%A3o/BuscarPostPeloId.png?raw=true)

Como atualizar um post passando Authorization Bearer {Token}

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/5%20-%20Atualizar%20um%20post%20autenticado/AtualizarPostHeadersAuthorizationBearer_1.png?raw=true)

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/5%20-%20Atualizar%20um%20post%20autenticado/AtualizarPostBodyJson_2.png?raw=true)

Como excluir um post pelo id passando Authorization Bearer {Token}

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/6%20-%20Excluir%20um%20post%20Autenticado/ExcluirPostHeadersAuthorizationBearer_1.png?raw=true)

![alt text](https://github.com/feliperodriguesfariasphp/laravel8-jwt/blob/main/postman/6%20-%20Excluir%20um%20post%20Autenticado/ExcluirPostBody_2.png?raw=true)

Referências: 

- https://dev.to/wenlopes/laravel-8-e-autenticacao-jwt-tymon-jwt-auth-com-model-customizada-2l7k


- https://www.youtube.com/watch?v=kP2N_eEv-iA&t=19s&ab_channel=Inform%C3%A1ticaDP
