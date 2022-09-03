# Laravel Sanctum REST API

This is an example of a REST API using auth tokens with Laravel Sanctum.

## Project Setup
```sh
git clone https://github.com/aralim11/laravel-sanctum-rest-api
cd laravel-sanctum-rest-api
```

Change the .env.example to .env and add your database info. After setup database run the web server.

```
php artisan serve
```

## Routes
```
# Public
    GET  /api/blogs
    GET  /api/blogs/:id
    
    POST  /api/login
    @body: email, password

    POST  /api/register
    @body: name, email, password

# Private
    #Category
        GET  /api/category

        POST  /api/category
        @body: name

        GET  /api/category/:id
        GET  /api/category/:id/edit

        PUT  /api/category/{id}
        @body: ?name

        DELETE  /api/category/{id}

    #Blog
        GET  /api/blog

        POST  /api/blog
        @body: name, category_id, title, details, image

        GET  /api/blog/:id
        GET  /api/blog/:id/edit

        PUT  /api/blog/{id}
        @body: ?name, ?category_id, ?title, ?details, ?image

        DELETE  /api/blog/{id}

    POST  /api/logout

```