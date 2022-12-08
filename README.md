# API usage

#### For All API requests, it is required to set Header `Accept:application/json`

### 1. API to list the whole records only with name, type and description
Request URL
```sh
GET http://127.0.0.1:8000/api/cars
```

### 2. API to save inputs in DB
Request URL
```sh
POST http://127.0.0.1:8000/api/cars
```

Body:
```
'name' => 'required|string|max:50',
'description' => 'required|string|max:250',
'file' => 'required|image|max:5000|mimes:jpg,bmp,png,jpeg,gif',
'type' => 'required|integer|in:1,2,3'
```

### 3. API to show a single record with name, type, description and temporary URL of image
Request URL
```sh
GET http://127.0.0.1:8000/api/cars/{id}
```

`{id}` - `id` of record that you want to get information about

# Cron Job

### A cron job to delete 30 days old records each hour
Run this command to start crons to execute
```sh
php artisan schedule:work
```
Run following to test command manually

```sh
php artisan delete:records {days}
```

`{days}` - The number of days of old records that you are going delete

# Seeding

### Bulk Upload data to Database
Run this command to bulk upload fake data to database
```sh
php artisan db:seed
```

## Possible issues
If you are having some problem to access API routes follow these steps:

1. Autoload Classmap
```sh
composer dump-autoload
```

2. Clear caches
```sh
php artisan optimize:clear
```

2. If your project is not running at all try to change host or port
```sh
php artisan serve --host=127.0.0.1 --port=8080
```
