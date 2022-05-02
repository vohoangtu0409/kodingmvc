<?php

namespace Application\View;

use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\FileEngine;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\ViewServiceProvider;

class BladeServiceProvider extends ViewServiceProvider{
    public function registerFileEngines($resolver)
    {
        $resolver->register('file', function () {
            return new FileEngine($this->app['files']);
        });
    }
    public function registerPhpEngines($resolver)
    {
        $resolver->register('php', function () {
            return new PhpEngine($this->app['files']);
        });
    }
    public function registerBladeEngines($resolver)
    {
        $resolver->register('blade', function () {
            return new CompilerEngine($this->app['blade.compiler'], $this->app['files']);
        });
    }
}