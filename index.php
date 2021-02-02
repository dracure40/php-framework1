<?php

require_once './vendor/autoload.php';

use Framework1\Database\Adaptor;

Adaptor::setup('mysql:dbname=php_framework', 'root', null);

class Post
{
}

$posts = Adaptor::getAll('SELECT * FROM posts', [], Post::class);

var_dump($posts);

