![Screenshot](/screenshot.jpeg)

# Laravel ImgFly

> This package was originally created by [shawnsandy](https://github.com/shawnsandy).

### Dynamically resize images on the Fly in your Laravel App using the [Glide library from thephpleague](http://glide.thephpleague.com/).

> Glide is a wonderfully easy on-demand image manipulation library written in PHP. Its straightforward API is exposed via HTTP, similar to cloud image processing services like Imgix and Cloudinary. Glide leverages powerful libraries like Intervention Image (for image handling and manipulation) and Flysystem (for file system abstraction).

- Adjust, resize and add effects to images using a simple HTTP based API.
- Manipulated images are automatically cached and served with far-future expires headers.
- Create your own image processing server or integrate Glide directly into your app.
- Supports both the GD library and the Imagick PHP extension.
- Supports many response methods, including PSR-7, HttpFoundation and more.
- Ability to secure image URLs using HTTP signatures.
- Works with many different file systems, thanks to the Flysystem library.
- Powered by the battle tested Intervention Image image handling and manipulation library.
- Framework-agnostic, will work with any project.
- Composer ready and PSR-2 compliant.
- [Get more info - glide.thephpleague.com](http://glide.thephpleague.com/)

## Install Package

* Run the composer require to install the package:

```bash
composer require othercode/img-fly
```

* Add the provider to your `config\app.php` providers.

```php
OtherCode\ImgFly\ImgFlyServiceProvider::class,
```

* Add the facade to your `config\app.php` alias.

```php
'ImgFly' => OtherCode\ImgFly\Facades\ImgFlyFacade::class,
```

## Usage

* Display and resize an image from your Storage folder `storage/app/images` directory `w=500` sets the image width to `500`.


```html
<img src="{{ ImgFly::imgFly('apple-mouse.jpeg?w=500') }}" alt="">
```

* Display and resize an image from your `public/img` directory `w=500` sets the image width parameter to `500`. Read more on setting additional parameters (height, crop, orientation) [Glide quick reference](http://glide.thephpleague.com/1.0/api/quick-reference/).

```html
<img src="{{ ImgFly::imgPublic('hands.jpeg?w=500', 'img') }}" alt="">
```

### Presets

You can also use preset to dynamically resize image on the fly. Parameters are set in the config `app/imgfly.php` 

- Publish the config file

```bash
php artisan vendor:publish --tag=config
```

- Open and modify the presets:

```php
[
    "icon" => "?w=60&h=60&fit=crop-center",
    "small" => "?w=100&h=100&fit=crop-center",
    "thumbnail" => "?w=200&h=200&fit=crop-center",
    "medium" => "?w=600&h=400&fit=crop-center",
    "large" => "?w=1200&h=600&fit=crop-center",
];
```

- Call the facade `ImgFly::imgPreset(image, preset)` 

```html
<img src="{{ ImgFly::imgPreset('hands.jpg', 'icon') }}" alt="">
<img src="{{ ImgFly::imgPreset('hands.jpg', 'small') }}" alt="">
<img src="{{ ImgFly::imgPreset('hands.jpg', 'thumbnail') }}" alt="">
```

## Security

If you discover any security related issues, please email usantisteban@othercode.io instead of using the issue tracker.

## Credits

- [Shawn Sandy](https://github.com/shawnsandy)
