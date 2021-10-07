# CRUD Fretes
API Crud de fretes + Front VUE (Em Desenvolvimento)

## Requerimentos
- Docker e docker-compose instalado

## Instalação
- Faça o clone da aplicação e entre na raiz do projeto.
- Abra um terminal e digite o comando:
```sh
docker-compose up -d
```
e espere os containers subirem.
- Verifique se deu tudo certo executando o comando "docker ps", é necessario que tenha 3 containers, um app, um mysql e um nginx.
- Acesse o container da aplicação executando o comando:
```sh
docker exec -it api_frete bash
```
 
#### Execute os comandos abaixo:

```sh
cp .env.example .env
```
```sh
composer install
```
```sh
php artisan key:generate && php artisan migrate
```
```sh
php artisan optimize
```
Após isso a api estará rodando em:

```sh
127.0.0.1:8081
```
e o front vue em: 
```sh
127.0.0.1:8080
```
> Nota: Por enquanto o front tem apenas a parte de login e a tabela de fretes cadastrados.

##Usuário Padrão
email: teste@teste.com
senha: password

## Endpoints
### /api/shipping
 Method: GET
 Descrição: Traz todos os fretes cadastrados
 Obs: Precisa estar autenticado

### /api/shipping
 Method: POST
 Descrição: Cria um frete
 Params: 
```json
{
	"board": "JWT0034",
	"vehicle_owner": "Luiz Felipe",
	"amount": "25",
	"start_date": "2021-09-10 12:00:00",
	"end_date": "2021-09-11 12:00:00",
	"status": "started"
}
```
> Nota: O paramêtro `status` aceita as seguintes palavras: "started", "in_transit" ou "completed"

### /api/shipping/{shipping_id}
 Method: PUT
 Descrição: Edita um frete
 Params: 
```json
{
	"board": "JWT0034",
	"vehicle_owner": "Luiz Felipe",
	"amount": "25",
	"start_date": "2021-09-10 12:00:00",
	"end_date": "2021-09-11 12:00:00",
	"status": "started"
}
```

### /api/shipping/{shipping_id}
 Method: DELETE
 Descrição: Deleta um frete

### /api/search/shipping?term=vehicle
 Method: GET
 Descrição: Pesquisa por fretes com o termo digitado
 Params: term=vehicle

 ## Informações Adicionais
Foi implementado os padrão de projeto Injeção de Dependência e Repository, o código foi implementado com o princípio de POO, e utilizando um Banco de Dados relacional.