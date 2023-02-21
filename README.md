# Carefer Project
This Task belongs to Carefer Company.

# My development Environment
PHP 8.1
Mysql 8.0
Nginx



# installation:

For Interactive mode :

`docker-compose up --build`


for detached mode:

`docker-compose up -d --build`


You could check installation through this URL

`http://localhost:8000/`

You could see fresh installation of laravel application.

**DON't Forget to change your .env credentials like [.env.example] to its corresponding values at docker-compse.yml file.**


after finishing every steps

`docker exec -it php81-container /bin/bash`

`php artisan migrate`

`php artisan db:seed`

`exit`

NOW everything is running Smoothly - check endpoints

You can find  Api Documentation on 
`https://app.swaggerhub.com/apis/deve_meno/Carefer/0.1`

### Developed APIS


| Method   | URL                  | Description                            |
|----------|----------------------|----------------------------------------|
| `GET`    | `/api/orders`        | Retrieve all bookings.                 |
| `POST`   | `/api/book`          | Create a Booking to a trip.            |
| `GET`    | `/api/orders/28`     | Retrieve B ooking number #28.          |
| `PUT`    | `/api/orders/28`     | Update Booking data in booking #28.    |
| `DELETE` | `/api/order/28`      | Delete Booking #28.                    |
| `GET`    | `/api/most-frequent` | list most frequent trips per each user |








