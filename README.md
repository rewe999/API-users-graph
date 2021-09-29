#Posts
![screen shot](https://i.ibb.co/4MXD5WS/posts.png)

#Users
![screen shot](https://i.ibb.co/mtC8gHS/chart.png)

# RBR

This project was made as an recruitment task for [GrupaRBR](https://www.gruparbr.pl/).
It's an simple app that uses two endpoints:
- https://jsonplaceholder.typicode.com/users
- https://jsonplaceholder.typicode.com/posts

This is a simple application showing two views:
<p>posts - where all the users' posts are shown in the form of a table</p>
<p>users - where a graph of the most active users from the last 7 days is shown.</p>

Application allows you to run a script once a day that retrieves data from API and saves them in MySQL database

## Installation
### 1. Create `.env` file based on `.env.example`:
```
copy .env.example .env
```

### 2. Fetch dependencies:
```shell script
composer install
```

### 3. Generate application key:
```shell script
 php artisan key:generate
```

### 4. Run migrations:
```shell script
 php artisan migrate --seed
```
### 5. Now you can access the app here:
Post table:
http://localhost/posts

User chart:
http://localhost/users

### 6.You can run a script that will download data from Api once a day with the command
```shell script
 php artisan schedule:work
```

## Author:
- [Patryk Zym](https://github.com/rewe999/)
