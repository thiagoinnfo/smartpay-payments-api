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
Rename the file .env.testing.example to .env.testing

```bash
cp .env.testing.example .env.testing
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
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2xvZ2luIiwiaWF0IjoxNzIwNzQ3NjY3LCJleHAiOjE3MjA3NTEyNjcsIm5iZiI6MTcyMDc0NzY2NywianRpIjoia0xud3UzUGxRNXB1WGc0UiIsInN1YiI6IjEiLCJwcnYiOiI5M2JkY2M1OGRkMDFjZTM2ZWM1NmUzMmI1YmI1ODBkODMwMzJmZDE4In0.8E_MaTFTYAHWuZdLdkz1CIm06xE4XqvkUFMO2lVEtA8' \
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
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2xvZ2luIiwiaWF0IjoxNzIwNzM1NzQyLCJleHAiOjE3MjA3MzkzNDIsIm5iZiI6MTcyMDczNTc0MiwianRpIjoiWU91VGxoRkhvUFBYSFgyVSIsInN1YiI6IjEiLCJwcnYiOiI5M2JkY2M1OGRkMDFjZTM2ZWM1NmUzMmI1YmI1ODBkODMwMzJmZDE4In0.Z927y0S_a7CAU7NIEUFmzQC2_G2YWEXhal4OEGL5RW8'
```
GET Payments/{id}
```
curl --location 'http://localhost:8080/api/payments' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2xvZ2luIiwiaWF0IjoxNzIwNzM1NzQyLCJleHAiOjE3MjA3MzkzNDIsIm5iZiI6MTcyMDczNTc0MiwianRpIjoiWU91VGxoRkhvUFBYSFgyVSIsInN1YiI6IjEiLCJwcnYiOiI5M2JkY2M1OGRkMDFjZTM2ZWM1NmUzMmI1YmI1ODBkODMwMzJmZDE4In0.Z927y0S_a7CAU7NIEUFmzQC2_G2YWEXhal4OEGL5RW8'
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
