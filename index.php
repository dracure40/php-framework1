<?php


require_once './vendor/autoload.php';

use Framework1\Database\Adaptor;
use Framework1\Http\Request;
use Framework1\Routing\Route;
use Framework1\Routing\Middleware;
use Framework1\Session\DatabaseSessionHandler;

use Framework1\Support\ServiceProvider;
use Framework1\Application;

/*
Adaptor::setup('mysql:dbname=php_framework', 'root', null);

class Post
{
}

class HelloMiddleware extends Middleware
{
    public static function process()
    {
        return true;
    }
}

$posts = Adaptor::getAll('SELECT * FROM posts', [], Post::class);

// var_dump($posts);



$_SERVER['REQUEST_METHOD'] = 'GET';
// $_SERVER['PATH_INFO'] = '/posts/write';

// var_dump(Request::getMethod());
var_dump(Request::getPath());

Route::add('get', '/', function() {
    echo 'adsf';
}, [HelloMiddleware::class]);

// Route::add('get', 'posts', function() {
//     var_dump($posts);
// });

Route::add('get', 'posts/{id}', function() {
    var_dump($id);
    http_response_code(404);
});

Route::run();

session_set_save_handler(new DatabaseSessionHandler());
// session_set_save_handler(new DatabaseSessionHandler($conn));

session_start();
*/




class SessionServiceProvider extends ServiceProvider
{
    public function register()
    {
        // session_set_save_handler

        // Route::add
    }

    public function boot()
    {
        // session_start();

        // Route::run();
    }
}

$app = new Application([
    SessionServiceProvider::class
]);

$app->boot();
