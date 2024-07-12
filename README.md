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

POST Login
```
curl --location 'http://localhost:8080/api/login' \
--header 'Accept: application/json' \
--form 'name="merchant"' \
--form 'email="merchant1@example.com"' \
--form 'password="123456"'
```

POST Payments
```
curl --location 'http://localhost:8080/api/payments' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer {{JWT_TOKEN}}' \
--data '{
    "name_client": "Joseph Alfred",
    "cpf": "05310993002",
    "description": "Payment of products",   
    "amount": 100.00,
    "payment_method": "pix"
}'
```

GET Payments
```
curl --location 'http://localhost:8080/api/payments' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer {{JWT_TOKEN}}'
```
GET Payments/{id}
```
curl --location 'http://localhost:8080/api/payments/218efdbd-0474-4210-a621-b0cea9ae2dcf' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer {{JWT_TOKEN}}'
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
