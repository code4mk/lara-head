<?php

namespace Code4mk\LaraHead;

/**
 * @author    @code4mk <hiremostafa@gmail.com>
 * @author    @0devco <with@0dev.co>
 * @copyright 0dev.co (https://0dev.co)
 */

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Code4mk\LaraHead\Head as HeadMain;

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
      return new HeadMain;
     });
   }
}
