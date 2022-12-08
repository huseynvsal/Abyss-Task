# Quick Start Project

### Step by step
Clone this Repository
```sh
git clone https://github.com/huseynvsal/Abyss-Task.git task-project
```

Create the .env file
```sh
cd task-project/
cp .env.example .env
```


Update environment variables in .env
```dosini
APP_NAME="Name Your Project"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=name_you_want_db
DB_USERNAME=root
DB_PASSWORD=
```


Create tables
```sh
php artisan migrate
```


Install project dependencies
```sh
composer install
```

Start the project
```sh
php artisan serve
```

Access the project
[http://127.0.0.1:8000](http://127.0.0.1:8000)
