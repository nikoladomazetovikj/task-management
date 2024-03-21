# Task Management

## Requirements

>PHP 8.2 or above
>
> MySQL
>
> Composer (Latest)
>
> Node LTS
> 
> You can also setup project using Docker (Sail) ignoring all stack requirements

## Setup (Docker)

- Clone this repo:

```bash
git clone https://github.com/nikoladomazetovikj/task-management.git
```

- Create your `.env` file:

```bash
cp .env.docker .env
```

- Run following command to initialize project:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

- Run Docker containers:

```bash
./vendor/bin/sail up -d
```

- Open `Sail` shell

```bash
./vendor/bin/sail shell
```

- Create database and run migrations:

```bash
php artisan migrate 
```

- Generate encryption key:

```bash
php  artisan key:generate
```

- Install Node:

```bash
npm install
```

- Start project

```bash
npm run dev
```


- Default url: `http://localhost`

- To stop the servers use:

```bash
./vendor/bin/sail stop
```

## Setup (Local)

- Clone this repo:

```bash
git clone https://github.com/nikoladomazetovikj/job-viser-api.git
```

- Create your `.env` file:

```bash
cp .env.example .env
```

- Setup your php local environment

- Download/Install Composer (Latest Version)

```angular2html
https://getcomposer.org/download/
```

- Create database (MySQL)

```mysql
CREATE DATABASE task_management
```

>>NOTE: you can configure db name and user credentials (also you should apply this configuration in your .env file)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
```

- Run composer:

```bash
composer install
```

- Generate application encryption key

```bash
php artisan key:generate
```

- Run migrations:

```bash
php artisan migrate 
```

- Install Node:

```bash
npm install
```

- Start project

```bash
npm run dev
```


