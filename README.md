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

Collection postman

```
https://api.postman.com/collections/3918561-68e50eb7-434f-44c1-b312-9c51e15543c1?access_key=PMAT-01J2JAKPKK0NYJA65NHJ5ZF07Z
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
