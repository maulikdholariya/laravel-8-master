/*
*
<!-- laravel install -->
composer global require laravel/installer
laravel new example-app

<!-- set database -->
<!-- add ui in laravel  -->
composer require laravel/ui

php artisan ui:auth

php artisan ui:controllers

php artisan ui bootstrap

npm install

npm run development

<!-- yajra datatable  -->

composer require yajra/laravel-datatables

<!-- config/app.php  -->
'providers' => [
    ...,
    Yajra\DataTables\DataTablesServiceProvider::class,
]
'aliases' => [
    ...,
    'DataTables' => Yajra\DataTables\Facades\DataTables::class,
]
php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
<!-- after link asset  datatable -->

<!-- laravel-debugbar -->
composer require barryvdh/laravel-debugbar --dev
DEBUGBAR_ENABLED=false # deguger is disabled but error reporting works
<!-- if remove -->
composer remove vendor/barryvdh/laravel-debugbar
composer update

https://github.com/Wulfheart/pretty-routes
composer require wulfheart/pretty_routes
php artisan route:pretty
php artisan route:pretty --except-path=horizon --method=POST --reverse
php artisan route:pretty --only-path=app --method=POST --reverse
php artisan route:pretty --only-name=app --method=POST 
php artisan route:pretty --only-name=app --method=POST --group=path --reverse-group
php artisan route:pretty --only-name=app,horizon,debugbar --except-path=foo,bar --group=name --reverse


https://github.com/andreaselia/laravel-api-to-postman
composer require andreaselia/laravel-api-to-postman
php artisan vendor:publish --provider="AndreasElia\PostmanGenerator\PostmanGeneratorServiceProvider" --tag="postman-config"
php artisan export:postman
php artisan export:postman --bearer="1|XXNKXXqJjfzG8XXSvXX1Q4pxxnkXmp8tT8TXXKXX"
php artisan export:postman --bearer=123456789


https://github.com/spatie/laravel-mail-preview
composer require spatie/laravel-mail-preview

// in config/mail.php

'mailers' => [
    'smtp' => [
        'transport' => 'preview',
        // ...
    ],
    // ...
],

https://github.com/bennett-treptow/laravel-migration-generator
https://github.com/mattkingshott/axiom
https://github.com/diglactic/laravel-breadcrumbs

https://github.com/nascent-africa/jetstrap
https://github.com/michaeldyrynda/laravel-cascade-soft-deletes
composer require dyrynda/laravel-cascade-soft-deletes

https://www.cloudways.com/blog/best-laravel-packages/

























*/