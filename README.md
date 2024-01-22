## Test project

### Requirements

MongoDB connection and existing database
php 8.1
composer

### Installation
1.1 Clone the repository
git clone git@github.com:vicumg/csv-project.git
composer install

1.2 Create the .env file
provide the database connection:
MONGODB_URI=here is the connection string

Use the app

1.1. generate the csv file
php artisan app:generate-csv

1.2. import the csv file
Post request to http://localhost:8000/api/data
headers: Content-Type: x-www-form-urlencoded
params: file: csv file
error:
400 if the file is not present
422 if the file is not a csv file
500 if the file is not valid

1.2 get the data
Get request to http://localhost:8000/api/custumer
params:
* offset: default 0 optional
* limit: int (max 1000) default 10 (more than 1000 will return default 10)
* first_name: string optional
* last_name: string optional
* age: string optional
* gender: string optional
* mobile_number: string optional
* email: string optional
* city: string optional
* login: string optional
* car_model: string optional
* salary: int optional
