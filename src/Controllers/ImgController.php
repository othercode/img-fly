<?php

namespace OtherCode\ImgFly\Controllers;

use Illuminate\Routing\Controller;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class ImgController extends Controller
{
    public function __invoke($directory, $image)
    {
        if (!file_exists("$directory/$image") || empty($image)) {
            $directory = 'assets/img';
            $image = 'notfound.webp';
        }

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => "./$directory/",
            'cache' => "$directory/",
            'source_path_prefix' => '/',
            'cache_path_prefix' => '/.cache',
            'base_url' => '/public/'
        ]);

        $server->outputImage($image, request()->all());
    }
}
