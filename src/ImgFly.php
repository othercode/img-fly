<?php

namespace OtherCode\ImgFly;

use OtherCode\ImgFly\Contracts\ImgFlyContract;

class ImgFly implements ImgFlyContract
{
    /**
     * Load image create a full url to the image page
     *
     * @param  string  $path
     * @param  string|null  $image  default path with url parameters
     * @return string
     */
    public function loadImg(string $path, ?string $image): string
    {
        return url("/imgfly/$path/$image");
    }

    /**
     * Display images in storage/app
     *
     * @param  string|null  $image
     * @return string
     */
    public function img(?string $image): string
    {
        return $this->loadImg('images', $image);
    }

    /**
     * Display images from public/img
     *
     * @param  string|null  $image
     * @param  string  $dir
     * @return string
     */
    public function imgPublic(?string $image, string $dir = 'img'): string
    {
        return $this->loadImg("public/$dir", $image);
    }

    /**
     * @param  string|null  $image
     * @param  string  $preset
     * @param  string  $method
     * @return mixed
     */
    public function imgPreset(?string $image, string $preset = 'small', string $method = 'img')
    {
        $parameters = config("imgfly.$preset");
        return call_user_func([$this, $method], "$image.$parameters");
    }
}
