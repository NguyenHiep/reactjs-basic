# Truyentranh
Truyenhtranh is a show book, leech book, show chapter. Project based on Laravel 5.5 framework

# Requirement

#### PHP
    PHP version (>= 7.0.0)
    Mcrypt PHP Extension
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    Fileinfo Extension
    PHP JSON extension
    XML PHP Extension
#### Supported Image Libraries
    GD Library (>=2.0)
    Imagick PHP extension (>=6.5.7)

#### Supported Composer
- ref: https://getcomposer.org/doc/00-intro.md

# Deployment
To deployment, make sure your server support all of requirement above.
### New Installation
```bash
$ cd /var/www/html
$ git clone https://github.com/NguyenHiep/reactjs-basic.git ./project
$ cd ./project/truyentranh.net
$ composer update
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan storage:link
$ php artisan vendor:publish --all
$ php artisan db:seed
```

```
### Folder permission
The following folder and its sub-folder should be writable

    - {source_path}/storage
    - {source_path}/bootstrap/cache
    - {source_path}/public/uploads
    
# Frontend Development

Install `Node` and `grunt-cli` if they are not installed before:

1. [Download and install Node](https://nodejs.org/download)
2. Install the Grunt command line tools, with `npm install -g grunt-cli`.

Then, open your command line in this directory and run following commands:

1. Install project dependencies with `npm install`.
2. Run Grunt with `grunt`.
