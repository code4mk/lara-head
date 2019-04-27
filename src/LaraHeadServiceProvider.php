<?php

namespace Code4mk\LaraHead;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Code4mk\LaraHead\Og;

/**
 * @author    @code4mk <hiremostafa@gmail.com>
 * @author    @0devco <with@0dev.co>
 * @since     2019
 * @copyright 0dev.co (https://0dev.co)
 */

class LaraHeadServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
   public function boot()
   {


      // publish config

      AliasLoader::getInstance()->alias('Khead', 'Code4mk\LaraHead\Facades\Khead');
   }

  /**
   * Register any application services.
   *
   * @return void
   */
   public function register()
   {
     $this->app->bind('khead', function () {
      return new Og;
     });
   }
}
