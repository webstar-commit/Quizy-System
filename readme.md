# Quizy

## How to get the project up and running on your development enviroment

- please, make sure to run the following commands first

```sh
composer install
```

- Change your file `.env.example` to `.env` by 
```sh
cp .env.example .env
```

then run this command:

```sh
php artisan key:generate
```
then
```sh
php artisan migrate
```
Finaly 

```sh
php artisan db:seed
```


### admin area login credentials

GET `/admin` 

username `admin`  
password `admin` 

it's the time to add some quizzes :)

PS: Graphs will not be shown (in the admin area home page) unless puting some quizzes and submit students answers.

Thank You!
