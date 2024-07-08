# SmartPay Payments API

SmartPay Payments API

## Requeriments

Install the [ Docker ](https://docs.docker.com/engine/)
and [ Docker Compose](https://docs.docker.com/compose/).

## Installation

Clone the repository

```bash
git clone https://github.com/thiagoinnfo/smartpay-payments-api
```

Rename the file .env.example to .env

```bash
cp .env.example .env
```

Start the containers

```bash
docker-compose up -d
```
Install the dependencies using composer

```bash
docker exec -ti app composer install
```

Run the migrations

```bash
docker exec -ti app php artisan migrate
```

Run the seeds

```bash
 docker exec -ti app php artisan db:seed
```

## How to use

Command generate swagger file

```
docker exec -ti app php artisan swg:scan
```

Swagger

```
http://localhost:8080/docs/index.html
```

Collection postman

```
https://www.getpostman.com/collections/077e15dcd9989b2de4f0
```

## Tests

Run tests

```bash
docker exec -ti app ./vendor/bin/phpunit
```

## Author
Thiago de oliveira
thiagoinnfo@gmail.com

## License
[MIT](https://choosealicense.com/licenses/mit/)
