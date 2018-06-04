<?php

namespace App\Socialite;

class SocialiteManager extends \Laravel\Socialite\SocialiteManager
{
    protected function createLineDriver()
    {
        $config = $this->app['config']['services.line'];

        return $this->buildProvider('App\Socialite\LineProvider', $config);
    }
}